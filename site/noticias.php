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

session_start();

require_once '../autoload.php';
require_once 'inc/header.php';

?>

<body>

    <?php require_once 'inc/navbar.php'; ?>

    <div class="container">
        <div class="row align-items-start">
            <!-- MENU -->
            <div class="col-3">
                <?php require_once 'inc/menu.php' ?>
            </div>

            <!-- CONTEÚDO -->
            <div class="col-9">

                <!-- NFE LOGO -->
                <!-- <div class="row text-center">
                    <div class="col-12">
                        <img style="width: 80%;" src="../img/cabecalhos/noticias.jpg" class="img-fluid" alt="...">
                    </div>
                </div> -->

                <br>
                <h1>Notícias</h1>
                <h5 class="card-title">Fique por dentro das novidades sobre o e-Nota</h5>
                <hr><br>

                <!-- ITENS -->
                <div class="row text-center">

                    <div class="accordion" id="accordionExample">

                        <?php
                        // lista noticias
                        $sql = $PDO->query("SELECT codigo, titulo, texto, data FROM noticias WHERE sistema = 'nfe' ORDER BY codigo DESC LIMIT 0,10");
                        $first_loop = true;
                        while (list($codigo, $titulo, $texto, $data) = $sql->fetch()) {

                        ?>

                            <div class="accordion-item" style="text-align: justify;">
                                <h2 class="accordion-header" id="headingOne-<?php echo $codigo ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-<?php echo $codigo ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $codigo ?>">
                                        <?php
                                        echo substr($data, 8, 2) . "/" . substr($data, 5, 2) . "/" . substr($data, 0, 4) . ' - ' . $titulo;
                                        ?>
                                    </button>
                                </h2>
                                <div id="collapseOne-<?php echo $codigo ?>" class="accordion-collapse collapse" aria-labelledby="headingOne-<?php echo $codigo ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4><?php echo $titulo ?></h4>
                                        <p><?php echo $texto ?></p>
                                        <p>
                                            <?php

                                            $noticia_data_formatada = substr($data, 8, 2) . "/" . substr($data, 5, 2) . "/" . substr($data, 0, 4);
                                            echo 'PREFEITURA MUNICIPAL DE ' . $CONF_CIDADE . ' | ' . $noticia_data_formatada;

                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php
                        } // fim while
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'inc/footer.php' ?>