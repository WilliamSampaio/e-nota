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
	//Conecta ao banco
	require_once('../../conect.php');
	require_once('../../../funcoes/util.php');
	
	//Recebe as variaveis enviadas pelo form por get
	$nome        = $_GET['txtNome'];
	$cnpj        = $_GET['txtCNPJ'];
	$compmes     = $_GET['cmbMes'];
	$compano     = $_GET['cmbAno'];
	$data        = $_GET['txtData'];
	$estado      = $_GET['cmbEstado'];
	$numero      = $_GET['txtNroDif'];
	$cancelaDif  = $_GET['hdCancelaDif'];
	
	//se foi cancelada alguma declaração da o updade no banco e da um alert se der algum erro
	if($cancelaDif){
		$PDO->query("UPDATE dif_des SET estado = 'C' WHERE codigo = '$cancelaDif'");
	}//fim if cacela
	
	$str_where = "";
	//verifica quais campos foram preenchidos e concatena na variavel str_where
	if($compmes){
		$str_where .= " AND MONTH(dif_des.competencia) = '$compmes'";
	}
	if($compano){
		$str_where .= " AND YEAR(dif_des.competencia) = '$compano'";
	}
	if($data){
		$data = DataMysql($data);
		$str_where .= " AND dif_des.data = '$data'";
	}
	if($cnpj){
		$str_where .= " AND inst_financeiras.cnpj = '$cnpj'";
	}
	if($estado){
		$str_where .= " AND dif_des.estado = '$estado'";
	}
	if($numero){
		$str_where .= " AND dif_des.codigo = '$numero'";
	}
	
	//Sql buscando as informa��es que o usuario pediu e com o limit estipulado pela função
	$query = ("
		SELECT
			dif_des.codigo, 
			DATE_FORMAT(dif_des.data,'%d/%m/%Y') as data,
			DATE_FORMAT(dif_des.competencia,'%m/%Y') as competencia,
			dif_des.estado,
			SUM(dif_des_contas.iss),
			inst_financeiras.nome
		FROM
			dif_des 
		INNER JOIN
			cadastro as inst_financeiras ON inst_financeiras.codigo = dif_des.codinst_financeira
		INNER JOIN
			dif_des_contas ON dif_des.codigo = dif_des_contas.coddif_des
		WHERE 
			(inst_financeiras.nome LIKE '$nome%' OR inst_financeiras.razaosocial LIKE '$nome%') $str_where
		GROUP BY
			dif_des.codigo
		ORDER BY
			dif_des.codigo
		DESC
		");
	$sql_pesquisa = Paginacao($query,'frmInstituicao','divDeclaracoesInstituicoes',10);
if($sql_pesquisa->rowCount()){
?>
<table width="100%">
	<tr bgcolor="#999999">
    	<td width="7%" align="center">Nº Dec</td>
        <td width="38%" align="center">Nome</td>
        <td width="15%" align="center">Data</td>
        <td width="13%" align="center">Competencia</td>
        <td width="13%" align="center">Estado</td>
        <td width="14%" colspan="2" align="center"></td>
  </tr>
    <?php
		$x = 0;
		while($dados_pesquisa = $sql_pesquisa->fetch()){
			//alterna o valor da variavel pelo seu valor por extenso
			switch($dados_pesquisa['estado']){
				case "B": $str_estado = "Boleto";      break;
				case "N": $str_estado = "Normal";      break;
				case "C": $str_estado = "Cancelada";   break;
				case "E": $str_estado = "Escriturada"; break;		
			}
			if($dados_pesquisa['estado'] == "C"){
				$bgcolor = "#FFAC84";
			}else{
				$bgcolor = "#FFFFFF";
			}
	?>
    <input type="hidden" name="txtCodigoGuia<?php echo $x;?>" id="txtCodigoGuia<?php echo $x;?>" value="<?php echo $dados_pesquisa['codigo'];?>" />
    <tr id="trDecc<?php echo $x;?>">
    	<td bgcolor="<?php echo $bgcolor;?>" align="center"><?php echo $dados_pesquisa['codigo'];?></td>
        <td bgcolor="<?php echo $bgcolor;?>" align="left"><?php echo $dados_pesquisa['nome'];?></td>
     	<td bgcolor="<?php echo $bgcolor;?>" align="center"><?php echo $dados_pesquisa['data'];?></td>
        <td bgcolor="<?php echo $bgcolor;?>" align="center"><?php echo $dados_pesquisa['competencia'];?></td>
        <td bgcolor="<?php echo $bgcolor;?>" align="center"><?php echo $str_estado;?></td>
<td bgcolor="#FFFFFF" align="left" colspan="2">
        	<label title="Ver Detalhes">
        		<input name="btDetalhesDif" id="btLupa" type="button" class="botao" value="" 
            	onClick="VisualizarNovaLinha('<?php echo $dados_pesquisa['codigo'];?>','<?php echo"tddif".$x;?>',this,'inc/declaracoes/dif/declarar_vizualizar.ajax.php')">
            </label>
            
            <?php if($dados_pesquisa['estado'] != "C"){?>
            <label title="Cancelar Declara��o" id="lbCancelar<?php echo $x;?>">
            	<input name="btCancelarDif" id="btX" type="button" class="botao" value=""
                onClick="return cancelarDeclaracao('<?php echo $dados_pesquisa['codigo'];?>','<?php echo $dados_pesquisa['nome'];?>','inc/declaracoes/dif/declarar_pesquisa.ajax.php','frmInstituicao','divDeclaracoesInstituicoes','hdCancelaDif');">
            </label>
            <?php }?>
        </td>
    </tr>
    <tr>
        <td id="<?php echo"tddif".$x; ?>" colspan="7" align="center"></td>
    </tr>
    <?php
			$x++;
		}//fim while
	?>
    <input name="hdCodDelDif" id="hdCodDelDif" type="hidden">
</table>
<?php
}else{
	echo "<center><b>Não há resultados!</b></center>";
}
?>

