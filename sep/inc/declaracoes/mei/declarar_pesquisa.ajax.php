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
	$numero      = $_GET['txtNroDes'];
	$cancelaDes  = $_GET['hdCancelaDes'];
	
	//se foi cancelada alguma declaração da o update no banco e da um alert se der algum erro
	if($cancelaDes){
		$PDO->query("UPDATE mei_des SET estado = 'C' WHERE codigo = '$cancelaDes'");
		add_logs('Cancelou uma Declara��o MEI');
	}//fim if cancela
	
	//verifica quais campos foram preenchidos e concatena na variavel str_where
	if($compmes){
		$str_where = " AND MONTH(mei_des.competencia) = '$compmes'";
	}
	if($compano){
		$str_where .= " AND YEAR(mei_des.competencia) = '$compano'";
	}
	if($data){
		$data = DataMysql($data);
		$str_where .= " AND mei_des.data_gerado = '$data'";
	}
	if($cnpj){
		$str_where .= " AND cadastro.cnpj = '$cnpj'";
	}
	if($estado){
		$str_where .= " AND mei_des.estado = '$estado'";
	}
	if($numero){
		$str_where .= " AND mei_des.codigo = '$numero'";
	}
	
	//Sql buscando as informa��es que o usuario pediu e com o limit estipulado pela função
	$query = ("
			SELECT 
				mei_des.codigo,
				mei_des.data_gerado,
				mei_des.total,
				mei_des.codverificacao,
				mei_des.estado,
				mei_des.competencia,
				cadastro.nome
			FROM 
				mei_des
			INNER JOIN
				cadastro ON mei_des.codemissor = cadastro.codigo
			WHERE 
				(cadastro.nome LIKE '$nome%' OR cadastro.razaosocial LIKE '$nome%') $str_where
			ORDER BY 
				mei_des.codigo
			DESC");
	$sql_pesquisa = Paginacao($query,'frmDes','divDeclaracoesMei',10);
if($sql_pesquisa->rowCount()){
?>
<table width="100%">
	<tr bgcolor="#999999">
    	<td width="7%" align="center">Nº Des</td>
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
				//case "B": $str_estado = "Boleto";      break;
				case "N": $str_estado = "Normal";      break;
				case "C": $str_estado = "Cancelada";   break;
				//case "E": $str_estado = "Escriturada"; break;		
			}
			if($dados_pesquisa['estado'] == "C"){
				$bgcolor = "#FFAC84";
			}else{
				$bgcolor = "#FFFFFF";
			}
	?>
    <input type="hidden" name="txtCodigoGuia<?php echo $x;?>" id="txtCodigoGuia<?php echo $x;?>" value="<?php echo $dados_pesquisa['codigo'];?>" />
    <tr id="trDes<?php echo $x;?>">
    	<td bgcolor="<?php echo $bgcolor;?>" align="center"><?php echo $dados_pesquisa['codigo'];?></td>
        <td bgcolor="<?php echo $bgcolor;?>" align="left"><?php echo $dados_pesquisa['nome'];?></td>
     	<td bgcolor="<?php echo $bgcolor;?>" align="center"><?php echo DataPt($dados_pesquisa['data_gerado']);?></td>
        <td bgcolor="<?php echo $bgcolor;?>" align="center"><?php echo DataPt($dados_pesquisa['competencia']);?></td>
        <td bgcolor="<?php echo $bgcolor;?>" align="center"><?php echo $str_estado;?></td>
<td bgcolor="#FFFFFF" align="left" colspan="2">
        	<label title="Ver Detalhes">
        		<input name="btDetalhesDes" id="btLupa" type="button" class="botao" value="" 
            	onClick="VisualizarNovaLinha('<?php echo $dados_pesquisa['codigo'];?>','<?php echo"tddes".$x;?>',this,'inc/declaracoes/mei/declarar_vizualizar.ajax.php')">
            </label>
            
            <?php if($dados_pesquisa['estado'] != "C"){?>
            <label title="Cancelar Declara��o" id="lbCancelar<?php echo $x;?>">
            	<input name="btCancelarDes" id="btX" type="button" class="botao" value=""
                onClick="document.getElementById('hdPrimeiro').value=1; return cancelarDeclaracao('<?php echo $dados_pesquisa['codigo'];?>','<?php echo $dados_pesquisa['nome'];?>','inc/declaracoes/mei/declarar_pesquisa.ajax.php','frmDes','divDeclaracoesMei','hdCancelaDes');">
            </label>
            <?php }?>
        </td>
    </tr>
    <tr id="trDesOculta<?php echo $x;?>">
        <td id="<?php echo"tddes".$x; ?>" colspan="7" align="center"></td>
    </tr>
    <?php
			$x++;
		}//fim while
	?>
</table>
<input name="hdCodDelDes" id="hdCodDelDes" type="hidden">
<?php
}else{
	echo "<center><b>Não há resultados!</b></center>";
}
?>

