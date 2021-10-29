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
//rawurlencode($CONF_BRASAO);
?>

<nav class="navbar navbar-light bg-dark">
    <div class="container" style='height: 96px;'>
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td width="15%" valign="middle">
                    <a class="navbar-brand" href="index.php">
                        <img src="
                            <?php
                            if ($CONF_BRASAO) {
                                echo "../img/brasoes/" . isTenancyAppBySubdomain() . rawurlencode($CONF_BRASAO);
                            }
                            ?>" alt="" width="64" height="64" class="d-inline-block align-text-top">
                    </a>
                </td>
                <td width="85%">
                    <p class="prefeituraTitulo" style="margin-top: auto; margin-bottom: auto; color: white; font-size: medium;">
                        <b style="font-size: small;"><?php echo strtoupper("Prefeitura Municipal de ") . $CONF_CIDADE; ?></b><br>
                        <b style="font-size: medium;"><?php echo $CONF_SECRETARIA; ?></b>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</nav>