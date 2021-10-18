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

// arquivo de conex�o com o banco
include("../include/conect.php");

// arquivo com funcoes uteis
include("../funcoes/util.php");
//print("<a href=index.php target=_parent><img src=../img/topos/$TOPO></a>");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>e-Nota</title>

  <script src="../scripts/java_site.js" language="javascript" type="text/javascript"></script>

  <script type="text/javascript" src="../scripts/lightbox/prototype.js"></script>
  <script type="text/javascript" src="../scripts/lightbox/scriptaculous.js?load=effects,builder"></script>
  <script type="text/javascript" src="../scripts/lightbox/lightbox.js"></script>
  <link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />

  <link href="../css/padrao_site.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
    <!--
    #apDiv1 {
      position: absolute;
      left: 40%;
      top: 45%;
      width: 400px;
      height: 160px;
      z-index: 1;
      background-image: url(../img/index/indicativos.jpg);
    }

    .style1 {
      font-size: 12pt;
      color: #FF0000;
      font-weight: bold;
    }
    -->
  </style>
</head>

<body>
  <div id="apDiv1" style="visibility:hidden" onclick="javascript:changeProp('apDiv1','','visibility','hidden','DIV')"><br />
    <br />
    <br />
    <br />
    <br />
    <br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    $sql = $PDO->query("SELECT COUNT(codigo) FROM emissores WHERE estado = 'A'");
    list($empresas_ativas) = $sql->fetch();
    echo "<font color=#FF0000 size=4><strong>$empresas_ativas</strong></font>";

    ?>
    <br />
    <br />
    <br />

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    $sql = $PDO->query("SELECT COUNT(codigo) FROM notas");
    list($notas_emitidas) = $sql->fetch();
    echo "<font color=#FF0000 size=4><strong>$notas_emitidas</strong></font>";

    ?>
  </div>
  <table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td><?php include("inc/topo.php"); ?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" valign="top" align="center">

        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="170" rowspan="2" align="left" valign="top" background="../img/menus/menu_fundo.jpg"><?php include("inc/menu.php"); ?></td>
            <td align="right" valign="top" width="590"><img src="../img/cabecalhos/rps.jpg" width="590" height="100" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">


              <table border="0" cellspacing="5" cellpadding="0">
                <tr>
                  <td align="center" valign="top">
                    <!-- quadro da esquerda acima -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="3" bgcolor="#CCCCCC"></td>
                      </tr>
                      <tr>
                        <td height="10" bgcolor="#999999"></td>
                      </tr>
                      <tr>
                        <td height="120" align="left" valign="top" bgcolor="#CCCCCC" style="padding:5px;">
                          <font class="boxTitulo">Como funciona?</font><br />
                          <br />
                          Tamb&eacute;m poder&aacute; ser utilizado pelos prestadores sujeitos &agrave; emiss&atilde;o de grande quantidade de NF-e (exemplo: estacionamentos). Nesse caso, o prestador emitir&aacute; o RPS para cada transa&ccedil;&atilde;o e providenciar&aacute; sua convers&atilde;o em NF-e mediante o envio de arquivos (processamento em lote).<br />
                          <br />
                          Para maior esclarecimento ou solucionar poss&iacute;veis d&uacute;vidas acesse o link Perguntas e Respostas, <a href="faq.php">clique aqui</a>.<br />
                          <br />
                          <br />
                          <br />
                          <br />
                        </td>
                      </tr>
                      <tr>
                        <td height="1"></td>
                      </tr>
                      <tr>
                        <td height="5" align="left" bgcolor="#859CAD"></td>
                      </tr>
                    </table>

                    <!-- Quadro do meio acima -->
                  </td>
                  <td width="190" align="center" valign="top">

                    <!-- quadro direita acima -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="3" bgcolor="#CCCCCC"></td>
                      </tr>
                      <tr>
                        <td height="10" bgcolor="#999999"></td>
                      </tr>
                      <tr>
                        <td height="120" align="left" valign="top" bgcolor="#CCCCCC" style="padding:5px;">
                          <font class="boxTitulo"> Modelo de RPS</font>
                          <br />
                          <br />
                          Se voc&ecirc;, ou sua empresa, n&atilde;o possui sistema que emita documento que possa ser utilizado como RPS, &eacute; poss&iacute;vel baixar o modelo e utilizar como RPS da sua presta&ccedil;&atilde;o de servi&ccedil;os.<br />
                          <br />
                          <a href="rps/modelo.pdf" target="_blank"></a>Basta acessar o perfil do prestador de servi&ccedil;o e o menu &quot;RPS&quot; <br />
                          <br />
                          <div align="center"></div>
                        </td>
                      </tr>
                      <tr>
                        <td height="1"></td>
                      </tr>
                      <tr>
                        <td height="5" align="left" bgcolor="#859CAD"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>







            </td>
          </tr>
        </table>



      </td>
    </tr>
  </table>
  <?php include("inc/rodape.php"); ?>

</body>

</html>