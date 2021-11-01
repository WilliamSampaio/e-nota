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
	//Includes
	require_once("../../inc/conect.php");
	require_once("../../funcoes/util.php");
	
	//Pega o brasão
	$sql_brasao = $PDO->query("SELECT brasao_nfe, rpsdataconversao FROM configuracoes");
	list($BRASAO,$dataconversao) = $sql_brasao->fetch();
	
	//Recebe o mes
	$mes = $_POST["cmbMes"];
	
	//Define o título do relatório de acordo com o que vem do rdbServicos
	if ($_POST['rdbRPS'] == 'dentro'){
		$titulo = 'RPS CONVERTIDOS EM NFE DENTRO DO PRAZO LEGAL';
		$where = "AND DAY(rps_data) < '$dataconversao'";
	}else{
		$titulo = 'RPS CONVERTIDOS EM NFE FORA DO PRAZO LEGAL';
		$where = "AND DAY(rps_data) > '$dataconversao'";
	}
?>

<!-- Início do css da visualização da página -->
	<style type="text/css" media="screen">
	<!--
	.style1 {font-family: Georgia, "Times New Roman", Times, serif}
	
	.tabela {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		border-collapse:collapse;
		border: 1px solid #000000;
	}
	.tabelameio {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		border-collapse:collapse;
		border: 1px solid #000000;
	}
	.tabela tr td{
		border: 1px solid #000000;
	}
	.fonte{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
	div.pagina {
		writing-mode: tb-rl;
		height: 100%;
		/*margin: 10% 0%;*/
	}
	-->
	</style>
<!-- Fim do css da visualização da página -->


<!-- Início do css da Impressão da página -->
	<style type="text/css" media="print">
    #DivImprimir{
		display: none; /*Tira a div imprimir na hora da impressão*/
	}
	</style>
<!-- Fim do css da Impressão da página -->

<title>Imprimir Relatório - RPS</title>

<div class="pagina"> <!-- Início div página -->
	<div id="DivImprimir">
		<input type="button" onClick="print();" value="Imprimir" /><br />
		<i><b>Este relatório é melhor visualizado em formato de impressão em paisagem.</b></i>
	</div>
	
	<!-- Início do topo com as informações -->
	<div id="DivTopo">
		<table width="95%" height="120" border="2" cellspacing="0" class="tabela" align="center">
			<tr>
				<td width="106">
					<center>
						<img src="../../img/brasoes/<?php print $BRASAO; ?>" width="96" height="105"/>
					</center>
				</td>
				<td width="584" height="33" colspan="2">
					<span class="style1">
						<center>
							<p>RELATÓRIO - <?php print strtoupper($titulo); ?> </p>
							<p>PREFEITURA MUNICIPAL DE <?php print strtoupper($CONF_CIDADE); ?> </p>
							<p><?php print strtoupper($CONF_SECRETARIA); ?> </p>
						</center>
					</span>
				</td>
			</tr>
		</table>
	</div>
	<!-- Fim do topo com as informações -->
	
	<br>

<?php
	$query = ("
		SELECT 
			numero, 
			codverificacao, 
			datahoraemissao, 
			rps_numero, 
			rps_data, 
			tomador_nome, 
			tomador_cnpjcpf, 
			tomador_municipio, 
			tomador_uf, 
			valortotal
		FROM 
			notas
		WHERE rps_data <> '' $where
		ORDER BY
			numero, rps_numero
	");
	$sql_pesquisa = $PDO->query($query);
	$result = mysql_num_rows($sql_pesquisa); //Pega o número de registros que voltaram
	if($result){ //Se existir algum registro, mostra na tabela
?>

<!-- Início da Tabela -->
<table width="95%" class="tabela" border="1" cellspacing="0" style="page-break-after: always" align="center">
	<tr style="background-color:#999999">
		<?php
			if($result <= 1){
				echo "<center><b>Foi encontrado $result  Resultado</b></center>";
			}else{
				echo "<center><b>Foram encontrados $result  Resultados</b></center>";
			}
		?>
	</tr>
	<tr style="background-color:#999999; font-weight:bold" align="center">
		<td>Número da NFe </td>
		<td>Cód Verificação </td>
		<td>Data Emisão </td>
		<td>RPS - Número </td>
		<td>RPS - Data </td>
		<td>Tomador - Nome </td>
		<td>Tomador - CNPJ/CPF </td>
		<td>Tomador - Município </td>
		<td>Tomador - UF </td>
		<td>Valor Total </td>
	</tr>
	
<?php
	while ($dados = $sql_pesquisa->fetch()){
	$datahoraemissao = $dados['datahoraemissao'];
	$rps_data = $dados['rps_data'];
?>
	<tr align="center">
		<td><?php echo $dados['numero']; ?></td>
		<td><?php echo $dados['codverificacao']; ?></td>
		<td><?php echo substr($datahoraemissao,8,2)."/".substr($datahoraemissao,5,2)."/".substr($datahoraemissao,0,4); ?></td>
		<td><?php echo $dados['rps_numero']; ?></td>
		<td><?php echo substr($rps_data,8,2)."/".substr($rps_data,5,2)."/".substr($rps_data,0,4); ?></td>
		<td><?php echo $dados['tomador_nome']; ?></td>
		<td><?php echo $dados['tomador_cnpjcpf']; ?></td>
		<td><?php echo $dados['tomador_municipio']; ?></td>
		<td><?php echo $dados['tomador_uf']; ?></td>
		<td>R$ <?php echo $dados['valortotal']; ?></td>
	</tr>
<?php
	}// Fim while ($dados = $sql_pesquisa))
?>
</table>
<?php

}else{
?>
<table width="95%" class="tabela" border="1" cellspacing="0" style="page-break-after: always" align="center">
	<tr style="background-color:#999999;font-weight:bold;" align="center">
		<td>Não há resultados!</td>
	</tr>
</table>
<?php
}
?>
</div>
