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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Comprovante de Declaração de MEI</title>
<link href="../css/imprimir_descomprovantes.css" rel="stylesheet" type="text/css"></head>
<?php 
    session_start();    
	require_once("../inc/conect.php");
	require_once("../include/util.php");
	if($_GET['COD']){
		$CODDES = $_GET['COD'];
		$CODDES = base64_decode($CODDES);
		
		$cnpjcpf_empresa =$_SESSION['SESSAO_cnpj_emissor'];
		$sql=$PDO->query("
			SELECT
			  mei_des.codigo, 
			  cadastro.razaosocial, 
			  cadastro.cnpj,
			  cadastro.cpf,
			  cadastro.inscrmunicipal,
			  cadastro.logradouro, 
			  cadastro.numero, 
			  cadastro.complemento, 
			  DATE_FORMAT(mei_des.competencia,'%m/%Y'), 
			  mei_des.data_gerado,
			  mei_des.total, 
			  mei_des.codverificacao
			FROM
			  mei_des INNER JOIN
			  cadastro ON cadastro.codigo = mei_des.codemissor
			WHERE
			  mei_des.codigo = '$CODDES'
		");	
		list($codigo, $razaosocial, $cnpj, $cpf, $inscrmunicipal, $logradouro, $numero, $complemento, $competencia, $data_gerado, $total, $codverificacao)=$sql->fetch();
		$cnpjcpf = $cnpj . $cpf;
		$endereco = "$logradouro, $numero";
		if($complemento)
			$endereco .= ", $complemento";
	} 
	
?>
<body>
<table width="800" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td height="100" colspan="4">
	<table border="0" cellspacing="0" cellpadding="5" style="border: 0px;">
      <tr>
        <td width="150" style="border:0px;" align="left"><?php if($CONF_BRASAO){?><img src="../img/brasoes/<?php echo rawurlencode($CONF_BRASAO); ?>"><?php }?></td>
        <td width="520" style="border:0px;" align="left" valign="middle">
		<font class="prefeitura">Prefeitura Municipal de <?php echo $CONF_CIDADE; ?></font><br>
		<font class="secretaria"><?php echo $CONF_SECRETARIA; ?><br>
		Comprovante de Declaração Eletrônica de Serviços de ISS</font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="25%" height="30" align="center" bgcolor="#CCCCCC"><strong>Documento Nº.</strong></td>
    <td width="25%" align="center" bgcolor="#CCCCCC"><strong>Código de Verificação</strong></td>
    <td align="center" bgcolor="#CCCCCC"><strong>Data de Emissão </strong></td>
    <td align="center" bgcolor="#CCCCCC"><strong>Período</strong></td>
  </tr>
  <tr>
    <td height="30" align="center"><font class="prefeitura"><?php echo $codigo; ?></font></td>
    <td align="center"><font class="prefeitura"><?php echo $codverificacao; ?></font></td>
    <td align="center"><font class="prefeitura"><?php echo DataPt($data_gerado); ?></font></td>
    <td align="center"><font class="prefeitura"><?php echo $competencia; ?></font></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>IDENTIFICAÇÃO DO SUJEITO PASSIVO </strong></td>
  </tr>
  <tr>
    <td height="50" colspan="3" valign="top">Nome<br>
    <font class="prefeitura"><?php echo $razaosocial; ?></font></td>
    <td width="25%" valign="top">CNPJ/CPF<br>
    <font class="prefeitura"><?php echo $cnpjcpf; ?></font></td>
  </tr>
  <tr>
    <td height="75" colspan="4" valign="top">Endereço<br>
    <font class="prefeitura"><?php echo $endereco; ?></font></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>CERTIFICAÇÃO</strong></td>
  </tr>
  <tr>
    <td height="200" colspan="4" align="center" valign="middle"><span class="style1">A Prefeitura Municipal de <font class="prefeitura"><?php echo $CONF_CIDADE; ?></font> certifica que a empresa citada acima concluiu o processo de Declaração Eletrônica de Serviços de ISS, referente ao período <font class="prefeitura"><?php echo DataPt($competencia); ?></font>.</span>   </td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>OBSERVAÇÕES</strong></td>
  </tr>
  <tr>
    <td colspan="4"><p>- Fica assegurado ao Município a cobrança de qualquer débito que possa ser verificado posteriormente; </p>
    <p>- O presente documento somente tem validade:<br>
	a. Quando nao apresentar rasuras;<br>
    </p></td>
  </tr>
  <tr>
    <td height="50" colspan="4">A aceitação deste documento esta condicionada à verificação de sua validade, de forma exclusiva pela  Prefeitura Municipal de <font class="prefeitura"><?php echo $CONF_CIDADE; ?></font>.  </td>
  </tr>
</table>
</body>
</html>
