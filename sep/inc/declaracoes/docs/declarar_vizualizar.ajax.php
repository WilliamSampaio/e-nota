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

//recebe o include que mantem a pagina
$include = $_GET['include'];
//conecta ao banco
require_once("../../conect.php");
require_once("../../../funcoes/util.php");
//recebe o codigo que veio por get
$codigo = $_GET['hdcod'];

//sql buscando informacoes sobre o usuario
$sql_info = $PDO->query("
	SELECT 
		cartorios_des.data_gerado,
		cartorios_des.competencia,
		cartorios_des.total,
		cartorios_des.iss_emo,
		cartorios_des.codverificacao,
		cartorios_des.estado,
		cartorios_des.total,
		cartorios.nome,
		cartorios.razaosocial,
		cartorios.cnpj,
		cartorios.logradouro,
		cartorios.numero,
		cartorios.municipio,
		cartorios.uf
	FROM 
		cartorios_des 
	INNER JOIN 
		cadastro as cartorios ON cartorios_des.codcartorio = cartorios.codigo
	WHERE 
		cartorios_des.codigo = '$codigo'");
	$info = $sql_info->fetch();
	$info['endereco'] = $info['logradouro'].', '.$info['numero'];
	
	//Altera o estado para seu valor por extenso
	switch($info['estado']){
		case "B": $str_estado = "Boleto";      break;
		case "N": $str_estado = "Normal";      break;
		case "C": $str_estado = "Cancelada";   break;
		case "E": $str_estado = "Escriturada"; break;		
	}
?>
<input type="hidden" name="hdCodUser" value="<?php echo $codigo;?>">
<table width="100%" style="text-indent:25px;" border="0">
	<tr bgcolor="#FFFFFF">
        <td width="25%" align="left">Nome: </td>			
        <td align="left" colspan="3"><?php echo $info['nome'];?></td>
	</tr>
  <tr bgcolor="#FFFFFF">
    <td align="left">CNPJ</td>
        <td width="16%" align="center"><?php echo $info['cnpj'];?></td>
        <td width="9%" align="right">Endereco</td>
    <td width="50%" align="left"><?php echo $info['endereco'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    	<td align="left">Municipio</td>
        <td align="left"><?php echo $info['municipio'];?></td>
        <td align="right">UF</td>
        <td align="left"><?php echo $info['uf'];?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
    	<td align="left">Data de gera????o</td>
        <td align="left"><?php echo DataPt($info['data']);?></td>
        <td align="right">Compet??ncia</td>
        <td align="left"><?php echo DataPt($info['competencia']);?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
    	<td align="left">Cod. Verifica????o</td>
        <td align="left"><?php echo $info['codverificacao'];?></td>
        <td align="right">ISS</td>
        <td align="left"><?php echo DecToMoeda($info['iss']);?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
    	<td align="left">Total</td>
        <td align="left"><?php echo DecToMoeda($info['total']);?></td>
        <td align="right">Estado</td>
        <td align="left"><?php echo $str_estado;?></td>
    </tr>
</table>