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
	require_once("../conect.php");
	require_once("../../funcoes/util.php");
	$cnpj=$_POST["hdCnpj"];
	// busca os dados do municipio
	$sql=$PDO->query("SELECT cidade, secretaria, logo FROM configuracoes");
	list($CIDADE,$SECRETARIA,$LOGO)=$sql->fetch();
	// busca os dados do orgao publico
	$sql_inst=$PDO->query("SELECT codigo, nome, razaosocial, endereco, cnpj FROM orgaospublicos WHERE cnpj='$cnpj'");
	list($codigo, $nome, $razaosocial,$endereco, $cnpj)=$sql_inst->fetch();
?>
<div id="imprimir">
	<input type="button" onClick="document.getElementById('imprimir').style.display='none'; print(); document.getElementById('imprimir').style.display='block';" value="Imprimir" />
</div>
<table width="800" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td height="100" colspan="4">
	<table align="center" width="800" border="0" cellspacing="0" cellpadding="5" style="border: 0px;">
      <tr>
        <td width="150" style="border:0px;" align="left"><img src="../../img/logos/<?php echo $LOGO; ?>"></td>
        <td width="520" style="border:0px;" align="left" valign="middle">
		<font class="prefeitura">Prefeitura Municipal de <?php echo $CIDADE; ?></font><br>
		<font class="secretaria"><?php echo $SECRETARIA; ?><br>
		Comprovante de Cadastro de Órgão Público </font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" width="50%" bgcolor="#CCCCCC" colspan="2"><strong>N&Uacute;MERO DO DOCUMENTO</strong></td>
    <td align="center" bgcolor="#CCCCCC" colspan="2"><strong>DATA DE EMISSÃO </strong></td>
  </tr>
  <tr>
    <td align="center" colspan="2" width="50%"><font class="prefeitura"><?php echo $codigo ?></font></td>
    <td align="center" colspan="2"><font class="prefeitura"><?php echo DataPtExt(); ?></font></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>IDENTIFICAÇÃO DO ÓRGÃO P&Uacute;BLICO </strong></td>
  </tr>
  </table>
  <table align="center" width="800" border="0" cellspacing="0" cellpadding="5" style="border: 0px;">
  <tr>
    <td height="50" colspan="3" valign="top">Nome<br>
    <font class="prefeitura"><?php echo $nome; ?></font></td>
  </tr>
  <tr>
    <td height="50" colspan="3" valign="top">Razão Social<br>
    <font class="prefeitura"><?php echo $razaosocial; ?></font></td>
  </tr>
  <tr>
    <td height="50" valign="top">CNPJ<br>
    <font class="prefeitura"><?php echo $cnpj; ?></font></td>
  </tr>
  <tr>
    <td height="50" colspan="4" valign="top">Endereço<br>
    <font class="prefeitura"><?php echo $endereco; ?></font></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>CERTIFICAÇÃO</strong></td>
  </tr>
  <tr>
    <td height="200" colspan="4" align="center" valign="middle"><span class="style1">A Prefeitura Municipal de <font class="prefeitura"><?php echo $CIDADE; ?></font> certifica que o Órgão Público citado acima foi devidamente cadastrado no sistema de ISSDigital do município<font class="prefeitura"><?php echo $CIDADE ?></font>.</span>   </td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#CCCCCC"><strong>OBSERVAÇÕES</strong></td>
  </tr>
  <tr>
    <td colspan="4"><p>- A senha de acesso do Órgão Público ao sistema de ISSDigital do município é de uso exclusivo e intransferível do Órgão Público, bem como a responsabilidade sobre o uso indevido da mesma.
    </p></td>
  </tr>
  <tr>
    <td height="50" colspan="4"><font class="prefeitura"><?php ?></font>.  </td>
  </tr>
</table>
