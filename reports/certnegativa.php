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
  <title>Certidão Negativa de Débitos de ISS</title>
  <link href="../css/imprimir_certidoes.css" rel="stylesheet" type="text/css">
</head>
<?php
session_start();
require_once("../include/conect.php");
require_once("../include/util.php");

if (!$_GET['CODV']) {
  Mensagem(" COD Inv�lido");
  Redireciona("../site/certidoes.php");
}
if (!$_SESSION['SESSAO_cnpj_emissor']) {
  Mensagem(" CNPJ Inv�lido");
  Redireciona("../site/certidoes.php");
}

$cnpjcpf_empresa = $_SESSION['SESSAO_cnpj_emissor'];
$codverif = base64_decode($_GET['CODV']);

$sql = $PDO->query("
	SELECT certidoes_negativas.codigo,
		   certidoes_negativas.codverificacao,
		   certidoes_negativas.dataemissao,
		   certidoes_negativas.datavalidade,
		   emissores.nome,
		   emissores.cnpjcpf,
		   emissores.endereco
	FROM certidoes_negativas
	INNER JOIN emissores ON certidoes_negativas.codemissor=emissores.codigo
	WHERE emissores.cnpjcpf='$cnpjcpf_empresa' AND
		   certidoes_negativas.codigo = '$codverif'");
list($nrodoc, $codverificacao, $dataemissao, $val, $nomeempresa, $cnpjcpf, $endereco) = $sql->fetch();




?>

<body>
  <table width="800" border="0" cellspacing="0" cellpadding="5" align="center">
    <tr>
      <td height="100" colspan="4">
        <table border="0" cellspacing="0" cellpadding="5" style="border: 0px;">
          <tr>
            <td width="150" style="border:0px;" align="left"><?php if ($CONF_BRASAO) { ?><img src="../img/brasoes/<?php echo rawurlencode($CONF_BRASAO); ?>" width="100" height="100"><?php } ?></td>
            <td width="520" style="border:0px;" align="left" valign="middle">
              <font class="prefeitura">Prefeitura Municipal de <?php echo $CONF_CIDADE; ?></font><br>
              <font class="secretaria"><?php echo $CONF_SECRETARIA; ?><br>
                Certid�o Negativa de Débitos de ISS</font>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="25%" height="30" align="center" bgcolor="#CCCCCC"><strong>Documento Nº.</strong></td>
      <td width="25%" align="center" bgcolor="#CCCCCC"><strong>Código de Verificação </strong></td>
      <td width="25%" align="center" bgcolor="#CCCCCC"><strong>Data de Emissão </strong></td>
      <td width="25%" align="center" bgcolor="#CCCCCC"><strong>Data de Validade</strong></td>
    </tr>
    <tr>
      <td height="30" align="center">
        <font class="prefeitura"><?php echo $nrodoc; ?></font>
      </td>
      <td align="center">
        <font class="prefeitura"><?php echo $codverificacao; ?></font>
      </td>
      <td align="center">
        <font class="prefeitura"><?php echo DataPt($dataemissao); ?></font>
      </td>
      <td align="center">
        <font class="prefeitura"><?php echo DataPt($val); ?></font>
      </td>
    </tr>
    <tr>
      <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>IDENTIFICAÇÃO DO SUJEITO PASSIVO </strong></td>
    </tr>
    <tr>
      <td height="50" colspan="3" valign="top">Nome<br>
        <font class="prefeitura"><?php echo $nomeempresa; ?></font>
      </td>
      <td valign="top">CNPJ/CPF<br>
        <font class="prefeitura"><?php echo $cnpjcpf; ?></font>
      </td>
    </tr>
    <tr>
      <td height="75" colspan="4" valign="top">Endereço<br>
        <font class="prefeitura"><?php echo $endereco; ?></font>
      </td>
    </tr>
    <tr>
      <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>CERTIFICAÇÃO</strong></td>
    </tr>
    <tr>
      <td height="200" colspan="4" align="center" valign="middle"><span class="style1">A Prefeitura Municipal de <font class="prefeitura"><?php echo $CONF_CIDADE; ?></font> certifica que até a presente data não constam débitos para o contribuinte citado acima.</span> </td>
    </tr>
    <tr>
      <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>OBSERVAÇÕES</strong></td>
    </tr>
    <tr>
      <td colspan="4">
        <p>- Fica assegurado ao Município a cobrança de qualquer débito que possa ser verificado posteriormente; </p>
        <p>- O presente documento somente tem validade:<br>
          a. Quando nao apresentar rasuras;<br>
          b. Até a data de validade exposta acima;</p>
      </td>
    </tr>
    <tr>
      <td height="50" colspan="4">A aceitação deste documento esta condicionada à verificação de sua validade, de forma exclusiva pelo aceitante junto à Prefeitura Municipal de <font class="prefeitura"><?php echo $CONF_CIDADE; ?></font>. </td>
    </tr>
  </table>
</body>

</html>