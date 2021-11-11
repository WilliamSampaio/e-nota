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

include __DIR__ . '/../include/header.php';

?>

<body>

    <?php include __DIR__ . '/../include/navbar.php' ?>

    <div class="container bg-light">
        <div class="row align-items-start">
            <!-- MENU -->
            <div class="col-3 col-xl-3">
                <?php include __DIR__ . '/../include/menu.php' ?>
            </div>

            <!-- CONTEÚDO -->
            <div class="col-sm-12 col-xl-9">

                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Prestadores</li>
                    </ol>
                </nav>

                <br>
                <h1>Prestadores</h1>
                <h5 class="card-title">Área destinada aos <strong>Prestadores de Serviços</strong> para acesso ao
                    sistema de emissão e cadastro</h5>
                <hr><br>

                <!-- ITENS -->
                <div class="row">

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Acessar Sistema</h5>
                                <p class="card-text">Emitente de NF-e, acesse todas as funcionalidades do sistema.</p>
                            </div>
                            <div class="card-footer">
                                <img src="../img/box/web.png" width="14" height="14">
                                <a href="../emissor/index.php" target="_blank">Serviço online</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cadastro</h5>
                                <p class="card-text">Se você não possui acesso ao sistema, cadastre-se aqui.</p>
                            </div>
                            <div class="card-footer">
                                <img src="../img/box/web.png" width="14" height="14">
                                <a href="prestadores-cadastro.php">Serviço online</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Consulta</h5>
                                <p class="card-text">Consulte se o seu cadastro já foi liberado pela Prefeitura Municipal.</p>
                            </div>
                            <div class="card-footer">
                                <img src="../img/box/web.png" width="14" height="14">
                                <a href="prestadores-consulta.php">Serviço online</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <br>
        <br>
        <br>
    </div>

    <?php include __DIR__ . '/../include/footer.php'; ?>