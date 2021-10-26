<?php
/*
COPYRIGHT 2008 - 2010 DO PORTAL PUBLICO INFORMATICA LTDA

Este arquivo e parte do programa E-ISS / SEP-ISS

O E-ISS / SEP-ISS e um software livre; voce pode redistribui-lo e/ou modifica-lo
dentro dos termos da Licenca Publica Geral GNU como publicada pela Fundacao do
Software Livre - FSF; na versao 2 da Licenca

Este sistema e distribuido na esperanca de ser util, mas SEM NENHUMA GARANTIA,
sem uma garantia implicita de ADEQUACAO a qualquer MERCADO ou APLICACAO EM PARTICULAR
Veja a Licenca Publica Geral GNU/GPL em portugues para maiores detalhes

Voce deve ter recebido uma copia da Licenca Publica Geral GNU, sob o titulo LICENCA.txt,
junto com este sistema, se nao, acesse o Portal do Software Publico Brasileiro no endereco
www.softwarepublico.gov.br, ou escreva para a Fundacao do Software Livre Inc., 51 Franklin St,
Fith Floor, Boston, MA 02110-1301, USA
*/
?>
<?php
require_once("../../include/conect.php");
require_once("../../funcoes/util.php");

// variaveis globais vindas do conect.php
// $CODPREF,$PREFEITURA,$USUARIO,$SENHA,$BANCO,$TOPO,$FUNDO,$SECRETARIA,$LEI,$DECRETO,$CREDITO,$UF	

// descriptografa o codigo
$CODIGO = base64_decode($_GET['cod']);

//Busca os dados da nota tomada
$sql_dados_nota_tomada = $PDO->query("
	SELECT
		codigo,
		numero,
		data,
		codtomador,
		cnpjcpf_prestador,
		codverificacao,
		total,
		iss,
		issretido,
		estado,
		motivo_cancelamento
	FROM
		notas_tomadas
	WHERE
		codigo = '$CODIGO'
");
$nota = $sql_dados_nota_tomada->fetchObject();

//Busca os dados do prestador de servico
$sql_prestador = $PDO->query("
	SELECT 
		cnpj,
		cpf,
		nome,
		razaosocial,
		logradouro,
		numero,
		bairro,
		municipio,
		uf,
		cep,
		inscrmunicipal,
		pispasep,
		logo
	FROM
		cadastro
	WHERE
		(cnpj = '{$nota->cnpjcpf_prestador}' OR cpf = '{$nota->cnpjcpf_prestador}')
");
$prestador = $sql_prestador->fetchObject();

if (!$prestador->razaosocial) {
	$razaosocial_prestador = $prestador->nome;
} else {
	$razaosocial_prestador = $prestador->razaosocial;
}

$endereco_prestador = $prestador->logradouro . ", " . $prestador->numero;

if ($prestador->bairro) {
	$endereco .= ", " . $prestador->bairro;
}

$cnpjcpf_prestador = $prestador->cnpj . $prestador->cpf;

$sql_tomador = $PDO->query("
	SELECT 
		cnpj,
		cpf,
		nome,
		razaosocial,
		logradouro,
		numero,
		bairro,
		municipio,
		uf,
		cep,
		inscrmunicipal,
		pispasep,
		email
	FROM
		cadastro
	WHERE
		codigo = '{$nota->codtomador}'
");
$tomador = $sql_tomador->fetchObject();

if (!$tomador->razaosocial) {
	$razaosocial_tomador = $tomador->nome;
} else {
	$razaosocial_tomador = $tomador->razaosocial;
}

$endereco_tomador = $tomador->logradouro . ", " . $tomador->numero;

if ($tomador->bairro) {
	$endereco .= ", " . $tomador->bairro;
}

$cnpjcpf_tomador = $tomador->cnpj . $tomador->cpf;

$sql_leidecreto = $PDO->query("SELECT lei, decreto FROM configuracoes");
$configuracoes = $sql_leidecreto->fetchObject();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>e-Nota Tomada[Imprimir Nota]</title>
	<link href="../../css/imprimir_emissor.css" rel="stylesheet" type="text/css" media="screen" />
	<style type="text/css" media="screen">
		table.gridview {
			width: 100%;
			font-size: 10px;
			font-family: Verdana, Arial, Helvetica, sans-serif;
			border-bottom-width: thick;
			border-collapse: collapse;
		}

		table.gridview tr td {
			border: 1px solid #000000;
		}

		table.gridview tr th {
			background-color: #CCCCCC;
			border: 1px solid #000000;
		}
	</style>
	<style type="text/css" media="print">
		#btImprimir {
			display: none;
		}
	</style>
</head>

<body>
	<center>
		<input name="btImprimir" id="btImprimir" type="button" class="botao" value="Imprimir">
		<table width="800" border="0" cellspacing="0" cellpadding="2" style="border:#000000 1px solid;border-collapse:collapse">
			<tr>
				<td colspan="3" rowspan="3" width="75%" style="border:#000000 1px solid" align="center">
					<!-- tabela prefeitura inicio -->
					<table width="100%" border="0" cellspacing="0" cellpadding="2">
						<tr>
							<td rowspan="4" width="20%" align="center" valign="top"><?php if ($CONF_BRASAO && file_exists(dirname(__FILE__) . "/../../img/brasoes/{$CONF_BRASAO}")) { ?>
									<img src="../../img/brasoes/<?php echo rawurlencode($CONF_BRASAO); ?>" width="100" height="100" />
								<?php } //fim if para mostrar a imagem somente se existir 
								?>
								<br />
							</td>
							<td width="80%" class="cab01"><?php print "Prefeitura Municipal de " . strtoupper($CONF_CIDADE); ?></td>
						</tr>
						<tr>
							<td class="cab03"><?php print strtoupper($CONF_SECRETARIA); ?></td>
						</tr>
						<tr>
							<td class="cab02">NOTA FISCAL ELETR&Ocirc;NICA DE SERVI�OS TOMADOS - NF-e Tomada</td>
						</tr>
					</table>
					<!-- tabela prefeitura fim -->
				</td>
				<td width="25%" align="left" style="border:#000000 1px solid">Número da Nota<br />
					<div align="center">
						<font face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?php echo $nota->numero; ?></strong></font>
					</div>
				</td>
			</tr>
			<tr>
				<td align="left" style="border:#000000 1px solid">Data e Hora de Emissão<br />
					<div align="center">
						<font face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?php echo DataPt($nota->data); ?></strong></font>
					</div>
				</td>
			</tr>
			<tr>
				<td align="left" style="border:#000000 1px solid">Código de Verificação<br />
					<div align="center">
						<font face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?php print $nota->codverificacao; ?></strong></font>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="5" align="center" style="border:#000000 1px solid">
					<!-- tabela prestador -->
					<table width="100%" border="0" cellspacing="0" cellpadding="2">
						<tr>
							<td colspan="3" class="cab03" align="center">PRESTADOR DE SERVIÇOS</td>
						</tr>
						<tr>
							<td rowspan="6">
								<?php
								// verifica o logo
								if ($prestador->logo != "") {
									echo "<img src=\"../../img/logos/{$prestador->logo}\" width=\"100\" height=\"100\" >";
								}
								?>
							</td>
							<td height="27" align="left">CNPJ/CPF: <strong><?php print $cnpjcpf_prestador; ?></strong></td>
							<td align="left">Inscrição Municipal: <strong><?php print verificaCampo($prestador->inscrmunicipal); ?></strong></td>
						</tr>
						<tr>
							<td align="left">Nome: <strong><?php print $prestador->nome; ?></strong></td>
							<td align="left">PIS/PASEP: <strong><?php echo verificaCampo($prestador->pispasep); ?></strong></td>
						</tr>
						<tr>
							<td align="left">Razão Social: <strong><?php echo $razaosocial_prestador; ?></strong></td>
							<td align="left">CEP: <strong><?php echo $prestador->cep; ?></strong></td>
						</tr>
						<tr>
							<td colspan="2" align="left">Endereço: <strong><?php print $endereco_prestador; ?></strong></td>
						</tr>
						<tr>
							<td align="left">Município: <strong><?php print $prestador->municipio; ?></strong></td>
							<td align="left">UF: <strong><?php print $prestador->uf; ?></strong></td>
						</tr>
					</table>
					<!-- tabela prestador -->
				</td>
			</tr>
			<tr>
				<td colspan="5" align="center" style="border:#000000 1px solid">
					<!-- tabela tomador inicio -->
					<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
						<tr>
							<td colspan="3" class="cab03" align="center">TOMADOR DE SERVIÇOS</td>
						</tr>
						<tr>
							<td colspan="3" align="left">Nome/Razão Social: <strong><?php print verificaCampo($razaosocial_tomador); ?></strong></td>
						</tr>
						<tr>
							<td align="left" width="450">CPF/CNPJ: <strong><?php print verificaCampo($cnpjcpf_tomador); ?></strong></td>
							<td colspan="2" align="left">Inscrição Municipal: <strong><?php print verificaCampo($tomador->inscrmunicipal); ?></strong></td>
						</tr>
						<tr>
							<td align="left">Endereço: <strong><?php print verificaCampo($endereco_tomador); ?></strong></td>
							<td colspan="2" align="left">CEP: <strong><?php print verificaCampo($tomador->cep) ?></strong></td>
						</tr>
						<tr>
							<td align="left">Município: <strong><?php print verificaCampo($tomador->municipio); ?></strong></td>
							<td align="left">UF: <strong><?php print verificaCampo($tomador->uf); ?></strong></td>
						</tr>
						<tr>
							<td align="left">E-mail: <strong><?php print verificaCampo($tomador->email); ?></strong></td>
						</tr>
					</table>
					<!-- tabela tomador fim -->
				</td>
			</tr>
			<tr>
				<td colspan="5" align="center" style="border:#000000 1px solid">
					<!-- tabela discrimacao dos servicos -->
					<table width="100%" border="0" cellspacing="0" cellpadding="2">
						<tr>
							<td class="cab03" align="center">DISCRIMINAÇÃO DE SERVIÇOS E DEDUÇÕES</td>
						</tr>
						<tr>
							<td height="400" align="left" valign="top"><br />
								<?php
								//sql para listar os servicos da nota atual
								$sql_servicos = $PDO->query("
								SELECT 
									codservico,
									basecalculo,
									iss,
									issretido,
									discriminacao
								FROM
									notas_tomadas_servicos
								WHERE
									codnota_tomada = '{$nota->codigo}'
							");
								?>
								<table class="gridview" align="center">
									<tr>
										<th align="center">Código</th>
										<th align="center">Serviço</th>
										<th align="center">Alíquota (%)</th>
										<th align="center">Base de Cálculo (R$)</th>
										<th align="center">Iss retido (R$)</th>
										<th align="center">Iss (R$)</th>
									</tr>
									<?php
									while ($servicosNota = $sql_servicos->fetchObject()) {
										$sql_dados_servico = $PDO->query("SELECT descricao, aliquota FROM servicos WHERE codservico = '{$servicosNota->codservico}'");
										$servico = $sql_dados_servico->fetchObject();
									?>
										<tr>
											<td align="center" <?php if (!$servicosNota->codservico) {
																	echo "title = 'Não possui codigo de serviço'";
																} ?>>
												<?php
												if ($servicosNota->codservico) {
													echo $servicosNota->codservico;
												} else {
													echo "N/P";
												}
												?>
											</td>
											<td align="left"><?php echo $servico->descricao; ?></td>
											<td align="right"><?php echo $servico->aliquota; ?></td>
											<td align="right"><?php echo DecToMoeda($servicosNota->basecalculo); ?></td>
											<td align="right"><?php echo DecToMoeda($servicosNota->issretido); ?></td>
											<td align="right"><?php echo DecToMoeda($servicosNota->iss); ?></td>
										</tr>
										<tr>
											<th colspan="6" align="left"><strong>Discriminação</strong></th>
										</tr>
										<tr>
											<td height="30" colspan="6">
												<?php
												if ($servicosNota->discriminacao) {
													echo $servicosNota->discriminacao;
												} else {
													echo "Não foi informado";
												}
												?>
											</td>
										</tr>
									<?php
									} //fim while
									?>
								</table>
								<br />
								<?php
								// verifica o estado da nfe
								if ($nota->estado == "C") {
									echo "<div align=center><font size=7 color=#FF0000><b>ATENÇÃO!!<BR>NFE CANCELADA</B></font></div>";
								} // fim if

								?>
							</td>
						</tr>
					</table>
					<!-- tabela discrimacao dos servicos -->
				</td>
			</tr>
			<tr>
				<td colspan="5" class="cab03" align="center" style="border:#000000 1px solid">VALOR TOTAL DA NOTA = R$ <?php print DecToMoeda($nota->total); ?></td>
			</tr>
			<tr>
				<td style="border:#000000 1px solid" align="left">Base de Cálculo (R$)<br />
					<div align="right"><strong><?php echo DecToMoeda($nota->total); ?></strong></div>
				</td>
				<td style="border:#000000 1px solid" align="left"> Valor do ISS (R$) <br />
					<div align="right"><strong><?php echo DecToMoeda($nota->iss); ?></strong></div>
				</td>
				<td style="border:#000000 1px solid" align="left" colspan="2">Valor do ISS Retido (R$)<br />
					<div align="right"><strong><?php echo DecToMoeda($nota->issretido); ?></strong></div>
				</td>
				<!--
			<td style="border:#000000 1px solid;" align="left"> Crédito (R$)<br />
				<div align="right"><strong><?php //echo DecToMoeda($nota->credito); 
											?></strong></div>
			</td>
			-->
			</tr>
			<tr>
				<td colspan="5" style="border:#000000 1px solid" class="cab03">OUTRAS INFORMAÇÕES</td>
			</tr>
			<tr>
				<td colspan="5" style="border:#000000 1px solid" align="left">
					<?php
					echo "- Esta NF-e foi emitida com respaldo na Lei nº {$configuracoes->lei} e no Decreto nº {$configuracoes->decreto}. <br />";
					?>
				</td>
			</tr>
		</table>
	</center>
</body>

</html>