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

require_once '../autoload.php';
require_once 'inc/header.php';

?>

<body>

    <?php require_once 'inc/navbar.php'; ?>

    <div class="container">
        <div class="row align-items-start">
            <!-- MENU -->
            <div class="col-3 col-xl-3">
                <?php require_once 'inc/menu.php' ?>
            </div>

            <!-- CONTEÚDO -->
            <div class="col-sm-12 col-xl-9">

                <!-- NFE LOGO -->
                <!-- <div class="row text-center">
                    <div class="col-12">
                        <img style="width: 80%;" src="../img/cabecalhos/noticias.jpg" class="img-fluid" alt="...">
                    </div>
                </div> -->

                <br>
                <h1>Prestadores</h1>
                <h5 class="card-title">Área destinada aos <strong>Prestadores de Serviços</strong> para acesso ao
                    sistema de emissão e cadastro</h5>
                <hr><br>

                <!-- box de conteudos -->
                <?php

                if ($_POST["txtMenu"]) {
                    require_once("inc/prestadores/" . $_POST["txtMenu"] . ".php");
                } else {
                    require_once("inc/prestadores/links.php");
                } // fim else

                ?>

            </div>
        </div>
    </div>

    <?php include_once 'inc/footer.php' ?>