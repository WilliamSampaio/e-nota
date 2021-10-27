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
require_once("../include/conect.php");
require_once("../include/util.php");

$codEmissor = base64_decode($_GET['codUser']);

$sql_dados = $PDO->query("
	SELECT
		cnpj,
		cpf,
		nome,
		razaosocial,
		logradouro,
		numero,
		complemento,
		bairro,
		cep,
		municipio,
		uf,
		inscrmunicipal,
		pispasep,
		fonecomercial
	FROM
		cadastro
	WHERE 
		codigo = '$codEmissor'
");
$dadosEmissor = $sql_dados->fetchObject();

$cnpjcpf = $dadosEmissor->cnpj . $dadosEmissor->cpf;

$fone = $dadosEmissor->fonecomercial;

if (!$dadosEmissor->razaosocial) {
	$dadosEmissor->razaosocial = $dadosEmissor->nome;
}

$endereco = $dadosEmissor->logradouro;

if ($dadosEmissor->numero) {
	$endereco .= ", " . $dadosEmissor->numero;
}

if ($dadosEmissor->bairro) {
	$endereco .= ", " . $dadosEmissor->bairro;
}

if ($dadosEmissor->complemento) {
	$endereco .= ", " . $dadosEmissor->complemento;
}


//verifica o codtipo do simples nacional
$codtipoSN = coddeclaracao('Simples Nacional');

//COnsulta o limite de RPS disponivel//
$sql_leidecreto = $PDO->query("SELECT lei, decreto FROM configuracoes");
list($lei, $decreto) = $sql_leidecreto->fetch();

$sql_ultimanota = $PDO->query("SELECT ultimo_limite,limite FROM rps_controle WHERE codcadastro = '$codEmissor'");
$dadoslimiterps = $sql_ultimanota->fetchObject();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>e-Nota [Imprimir Nota]</title>
	<link href="../css/imprimir_emissor.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php
	//$cont
	for ($cont = $dadoslimiterps->limite; $cont > $dadoslimiterps->ultimo_limite; $cont--) {
		//echo $cont.'<br>';
	} ?>
	<center>
		<input name="btImprimir" id="btImprimir" type="button" class="botao" value="Imprimir" onClick="document.getElementById('btImprimir').style.display = 'none';print();document.getElementById('btImprimir').style.display = 'block';">
		<div id="all">
			<div id="cabecalho" class="divBorder">
				<table width="100%" border="0" cellspacing="0" cellpadding="2">
					<tr>
						<td align="center">
							<?php if ($CONF_BRASAO && file_exists(dirname(__FILE__) . "/../img/brasoes/{$CONF_BRASAO}")) { ?>
								<img src="../img/brasoes/<?php echo rawurlencode($CONF_BRASAO); ?>" width="100" height="100" /> <br />
							<?php } //fim if para mostrar a imagem somente se existir 
							?>
						</td>
					</tr>

					<tr>
						<td class="cab2" align="center">
							Recibo Provisório de Serviços - Nº do RPS - <?php echo $cont; ?>
						</td>
					</tr>
				</table>
			</div>
			<div id="prestador" class="divBorder">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr>
						<td colspan="2" class="cab03" align="center">PRESTADOR DE SERVIÇOS</td>
					</tr>
					<tr>
						<td align="left">
							<strong><?php echo $dadosEmissor->nome; ?></strong>
						</td>
					</tr>
					<tr>
						<td align="left">R. Social: <strong><?php echo $dadosEmissor->razaosocial; ?></strong></td>
					</tr>
					<tr>
						<td align="left">CNPJ: <strong><?php print $cnpjcpf; ?></strong></td>
					</tr>
					<tr>
						<td align="left" width="60%">Endereço: <strong><?php echo $endereco; ?></strong></td>

						<td align="left">Cep: <strong><?php echo $dadosEmissor->cep; ?></strong></td>
					</tr>
					<tr>
						<td align="left">Município: <strong><?php print $dadosEmissor->municipio; ?></strong></td>
						<td align="left">UF:<strong><?php echo $dadosEmissor->uf; ?></strong></td>
					</tr>
					<tr>
						<td align="left">Fone: <strong><?php print $fone; ?></strong></td>
						<td align="left">Fax: <strong><?php print $dadosEmissor->fax; ?></strong></td>
					</tr>
					</tr>
					<td align="left" colspan="5"></td>
					</tr>
				</table>
			</div>
			<div id="tomador" class="divBorder">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr>
						<td colspan="8" class="cab03" align="center">TOMADOR DE SERVIÇOS</td>
					</tr>
					<tr>
						<td align="left">Nome:</td>
						<td><input type="text" class="inputTomador" <?php {
																		echo "disabled=\"disabled\"";
																	} ?> /></td>
					</tr>
					<tr>
						<td align="left">Empresa:</td>
						<td> <input type="text" class="inputTomador" <?php {
																			echo "disabled=\"disabled\"";
																		} ?> /></td>
					</tr>
					<tr>
						<td align="left">CPF/CNPJ:</td>
						<td><input type="text" class="inputTomador" <?php {
																		echo "disabled=\"disabled\"";
																	} ?> /></td>
					</tr>
					<tr>
						<td align="left" width="65">Endereço:</td>
						<td><input type="text" class="inputTomador" <?php {
																		echo "disabled=\"disabled\"";
																	} ?> /></td>
						<td align="left">CEP:</td>
						<td colspan="2"><input type="text" class="input" <?php {
																				echo "disabled=\"disabled\"";
																			} ?> /></td>
					</tr>
					<tr>
						<td align="left">Município:</td>
						<td><input type="text" class="inputTomador" <?php {
																		echo "disabled=\"disabled\"";
																	} ?> /></td>
						<td align="left">UF:</td>
						<td><input type="text" class="inputP" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td width="33" align="left">País:</td>
						<td width="218"><input type="text" class="input" <?php {
																				echo "disabled=\"disabled\"";
																			} ?> /></td>
					</tr>
					<tr>
						<td align="left">E-mail:</td>
						<td><input type="text" class="inputTomador" <?php {
																		echo "disabled=\"disabled\"";
																	} ?> /></td>
					</tr>
					</tr>
					<td align="left" colspan="8"></td>
					</tr>
				</table>
			</div>
			<div id="identRps" class="divBorder">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr>
						<td colspan="4" class="cab03" align="center">IDENTIFICAÇÃO DO RPS</td>
					</tr>
					<tr>
						<td align="left">Série do RPS:</td>
						<td colspan="2"><input type="text" class="inputTomador" <?php {
																					echo "disabled=\"disabled\"";
																				} ?> /></td>
					</tr>
					<tr>
						<td align="left">Data da Emissão do RPS:</td>
						<td colspan="2"><input type="text" class="inputTomador" <?php {
																					echo "disabled=\"disabled\"";
																				} ?> /></td>
					</tr>
					</tr>
					<td align="left" colspan="5"></td>
					</tr>
				</table>
			</div>
			<div id="discServ">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr>
						<td colspan="8" class="cab03" align="center">IDENTIFICAÇÃO DA PRESTAÇÃO DO SERVIÇOS</td>
					</tr>
					<tr>
						<td align="left">Valor do Serviço:</td>
						<td> <input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left" nowrap="nowrap">Valor Deduções:</td>
						<td> <input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left" nowrap="nowrap">Valor do PIS:</td>
						<td> <input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap">Valor COFINS: </td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left" nowrap="nowrap">Valor do INSS:</td>
						<td> <input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left" nowrap="nowrap">Valor do IR: </td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
					</tr>
					<tr>
						<td align="left">Valor do CSLL:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left" nowrap="nowrap">Item lista Serviços:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left">Cód. CNAE:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap">Cód. Trib. Municipio:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left">Base Cálculo:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left" nowrap="nowrap">Alíq. Serviços:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
					</tr>
					<tr>
						<td align="left">Valor do ISS:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left">Valor Líq. NFSE:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left" nowrap="nowrap">Outras Retenções:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
					</tr>
					<tr>
						<td align="left">ISS Retido:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left">Valor ISS Retido:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
						<td align="left">Discriminação:</td>
						<td><input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> /></td>
					</tr>

					<tr>
						<td align="left" colspan="5">Municipio da Prestação de Serviço:
							<input type="text" class="input" <?php {
																	echo "disabled=\"disabled\"";
																} ?> />
						</td>
					</tr>
					<td align="left" colspan="5"></td>
					</tr>
				</table>
			</div>
			<div id="diaria" class="divBorder"></div>
			<div id="rps" class="divBorder">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr>
						<td align="left" colspan="3">
							<p class="pRps">
								* Este documento não tem valor fiscal;<br /><br />
								* Este RPS deverá ser convertido em nota fiscal eletrônica em até 5 dias úteis. Caso contrário, contate o  prestador de serviço e/ou a Secretaria Municipal da Fazenda;<br /><br />
								* A não conversão deste RPS em nota fiscal eletrônica não irá gerar crédito ao tomador do serviço, e sujeita o emissor a multa.<br />
							</p>
						</td>
					</tr>
				</table>
			</div>
			<div id="resp" class="divBorder">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr>
						<td align="left" colspan="3">
							<p class="p"> CONCORDO QUE A MINHA RESPONSABILIDADE POR ESTE R.P.S CONTINUA EM VIGOR TORNANDO-ME RESPONSÁVEL NO CASO EM QUE A PESSOA, COMPANHIA OU ASSOCIAÇÃO INDICADA DEIXE DE PAGAR PARCIAL OU TOTALMENTE A SOMA DAS DESPESASAQUI ESPECIFICADAS.
							</p>
						</td>
					</tr>
				</table>
			</div> <br /><br />
			<div id="resp" class="rodape"></div>
		</div>
	</center>
	<?php //}
	?>
</body>

</html>