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

require_once __DIR__.'/../autoload.php';

$codigo = base64_decode($_GET["COD"]);

// busca os dados do municipio
$sql = $PDO->query("SELECT cidade, secretaria, brasao FROM configuracoes");
list($CIDADE, $SECRETARIA, $BRASAO) = $sql->fetch();

// busca os dados da inst. financeira
$sql_inst = $PDO->query("SELECT IF(cpf IS NULL,cnpj,cpf) AS 'cnpj', razaosocial, logradouro, numero, municipio, uf FROM cadastro WHERE codigo='$codigo'");
list($cnpj, $razaosocial, $logradouro, $numero, $municipio, $uf) = $sql_inst->fetch();

?>
<title>Comprovante de Cadastro</title>
<div id="imprimir" style="text-align: center;">
    <input type="button" onclick="document.getElementById('imprimir').style.display='none'; print(); document.getElementById('imprimir').style.display='block';" value="Imprimir" />
</div>
<table width="800" cellspacing="0" cellpadding="5" style="align-items: center; margin-left: auto; margin-right: auto; border-style: dashed;">
    <tr>
        <td height="100" colspan="4">
            <table cellspacing="0" cellpadding="5" style="border: 0px;">
                <tr>
                    <td width="150" style="border:0px; text-align: left;"><?php if ($CONF_BRASAO) { ?><img src="../img/brasoes/<?php echo isTenancyAppBySubdomain() .  rawurlencode($CONF_BRASAO) ?>" width="100" height="100"><?php } ?></td>
                    <td width="520" style="border:0px; text-align: left;" valign="middle">
                        <span class="prefeitura"><?php echo strtoupper('Prefeitura Municipal de ' . $CONF_CIDADE) ?></span><br>
                        <span class="secretaria"><?php echo $CONF_SECRETARIA ?><br>
                            Comprovante de Cadastro de Empresa </span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center; background-color: #CCCCCC; border: 1px solid black;" width="50%" colspan="2"><strong>NÚMERO DO DOCUMENTO</strong></td>
        <td style="text-align: center; background-color: #CCCCCC; border: 1px solid black;" colspan="2"><strong>DATA DE EMISSÃO </strong></td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black;" colspan="2" width="50%">
            <span class="prefeitura"><?php echo $codigo ?></span>
        </td>
        <td style="text-align: center; border: 1px solid black;" colspan="2">
            <span class="prefeitura"><?php echo DataPtExt() ?></span>
        </td>
    </tr>
    <tr>
        <td height="30" colspan="4" style="text-align: center; background-color: #CCCCCC; border: 1px solid black;"><strong>IDENTIFICAÇÃO DO SUJEITO PASSIVO </strong></td>
    </tr>
    <tr>
        <td height="50" colspan="3" valign="top">Razão Social:<br>
            <span class="prefeitura"><?php echo strtoupper($razaosocial) ?></span>
        </td>
        <td width="25%" valign="top">CNPJ/CPF<br>
            <span class="prefeitura"><?php echo $cnpj ?></span>
        </td>
    </tr>
    <tr>
        <td height="75" colspan="4" valign="top">Endereço<br>
            <span class="prefeitura"><?php echo strtoupper("$logradouro, $numero, $municipio, $uf") ?></span>
        </td>
    </tr>
    <tr>
        <td height="30" colspan="4" style="text-align: center; background-color: #CCCCCC; border: 1px solid black;"><strong>CERTIFICAÇÃO</strong></td>
    </tr>
    <tr>
        <td height="200" colspan="4" style="text-align: center;" valign="middle">
            <div class="style1">
                <blockquote>A Prefeitura Municipal de <span class="prefeitura"><?php echo $CONF_CIDADE ?></span> certifica que a Empresa citada acima foi devidamente cadastrada no sistema de NF-e do município.</blockquote>
            </div>
        </td>
    </tr>
    <tr>
        <td height="30" colspan="4" style="text-align: center; background-color: #CCCCCC; border: 1px solid black;"><strong>OBSERVAÇÕES</strong></td>
    </tr>
    <tr>
        <td colspan="4">
            <p style="font-weight: 700;">* A senha de acesso da Empresa ao sistema de NF-e do município é de uso exclusivo e intransferível da Empresa, bem como a responsabilidade sobre o uso indevido da mesma.
            </p>
        </td>
    </tr>
    <tr>
        <td height="50" colspan="4">
            <span class="prefeitura"><?php ?></span>.
        </td>
    </tr>
</table>