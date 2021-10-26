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

    <div class="container bg-light">
        <div class="row align-items-start">
            <!-- MENU -->
            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php require_once 'inc/menu.php' ?>
            </div>

            <!-- CONTEÚDO -->
            <div class="col-sm-12 col-md-9 col-lg-9">

                <br>
                <h1>Benefícios</h1>
                <h5 class="card-title">Conheça os benefícios para o emissor, tomador e Prefeitura Municipal.</h5>
                <hr><br>

                <!-- ITENS -->
                <div class="row">

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Prestador Emissor</h5>
                                <p class="card-text">Clique e veja o funcionamento da NF eletrônica de ISS.</p>
                            </div>
                            <div class="card-footer">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    Saiba mais!
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Prestador Emissor</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="text-align: center;">
                                                <img src="../img/beneficios/emissor_txt.jpg" class="img-fluid" alt="...">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tomador de Serviços</h5>
                                <p class="card-text">Veja o vídeo da campanha da NFeletrônica de ISS.</p>
                            </div>
                            <div class="card-footer">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    Saiba mais!
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tomador de Serviços</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="text-align: center;">
                                                <img src="../img/beneficios/tomador_txt.jpg" class="img-fluid" alt="...">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Prefeitura Municipal</h5>
                                <p class="card-text">Acesse e compare os números de aprovação da NFe de ISS.</p>
                            </div>
                            <div class="card-footer">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                    Saiba mais!
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Prefeitura Municipal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="text-align: center;">
                                                <img src="../img/beneficios/prefeitura_txt.jpg" class="img-fluid" alt="...">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                </div>

            </div>
        </div>
        <br>
        <br>
        <br>
    </div>

    <?php require_once 'inc/footer.php'; ?>