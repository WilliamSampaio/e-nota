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

require_once __DIR__.'/../autoload.php';
require_once DIR_SITE . 'include/header.php';

?>

<body>

    <?php require_once DIR_SITE . 'include/navbar.php' ?>

    <div class="container bg-light">
        <div class="row align-items-start">
            <!-- MENU -->
            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php require_once DIR_SITE . 'include/menu.php' ?>
            </div>

            <!-- CONTEÚDO -->
            <div class="col-sm-12 col-md-9 col-lg-9">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Legislação</li>
                    </ol>
                </nav>

                <br>
                <h1>Legislação</h1>
                <h5 class="card-title">Conheça o embasamento legal e jurídico</h5>
                <hr><br>

                <!-- ITENS -->
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <p>Você pode visualizar os manuais fazendo o download dos arquivos em formato PDF.</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <?php

                    $sql = $PDO->query("
                        SELECT titulo, texto, data, arquivo	
                        FROM legislacao
                        WHERE tipo = 'N' OR tipo = 'T' 
                        ORDER BY codigo");

                    if ($sql->rowCount() > 0) {

                    ?>

                        <div class="accordion" id="accordionExample">

                            <?php

                            $count = 1;
                            while (list($titulo, $texto, $data, $arquivo) = $sql->fetch()) {

                            ?>

                                <div class="accordion-item" style="text-align: justify;">
                                    <h2 class="accordion-header" id="headingOne-<?php echo $count ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-<?php echo $count ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $count ?>">
                                            <?php
                                            echo substr($data, 8, 2) . "/" . substr($data, 5, 2) . "/" . substr($data, 0, 4) . ' - ' . $titulo;
                                            ?>
                                        </button>
                                    </h2>
                                    <div id="collapseOne-<?php echo $count ?>" class="accordion-collapse collapse" aria-labelledby="headingOne-<?php echo $count ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <h4><?php echo $titulo ?></h4>
                                            <p><?php echo $texto ?></p>
                                            <p>
                                                <i class="fas fa-file-pdf fa-2x" style="color: darkred;"></i>
                                                <?php

                                                $data_formatada = substr($data, 8, 2) . "/" . substr($data, 5, 2) . "/" . substr($data, 0, 4);
                                                echo $data_formatada . ' | ';

                                                ?>
                                                <a href=" ../legislacao/<?php echo isTenancyAppBySubdomain() . "/" . $arquivo; ?>" target="_blank"> [Download] </a>

                                            </p>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                $count++;
                            } // fim while

                            ?>

                        </div>

                    <?php
                    } else {
                    ?>

                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <p>Não há nenhuma lei cadastrada.</p>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>

    <?php require_once DIR_SITE . 'include/footer.php'; ?>