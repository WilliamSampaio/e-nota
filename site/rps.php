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
                <h1>Recibo Provisório de serviço (RPS)</h1>
                <h5 class="card-title">RPS é o documento que deverá ser usado por emitentes da NF-e no eventual impedimento da emissão "online da NFe"</h5>
                <hr><br>

                <h3>Como funciona?</h3>
                <hr>

                <p>Também poderá ser utilizado pelos prestadores sujeitos à emissão de grande quantidade de NF-e (exemplo: estacionamentos). Nesse caso, o prestador emitirá o RPS para cada transação e providenciará sua conversão em NF-e mediante o envio de arquivos (processamento em lote).</p>
                <p>Para maior esclarecimento ou solucionar possíveis dúvidas acesse o link Perguntas e Respostas, <a href="faq.php">clique aqui</a>.
                </p>

                <h3>Modelo de RPS</h3>
                <hr>

                <p>Se você, ou sua empresa, não possui sistema que emita documento que possa ser utilizado como RPS, é possível baixar o modelo e utilizar como RPS da sua prestação de serviços.</p>
                <p>
                    <!-- <a href="rps/modelo.pdf" target="_blank"><img src="../img/pdf.jpg" title="Download do pdf" /></a> -->Basta aces sar o perfil do prestador de serviço e o menu "RPS".
                </p>

            </div>
        </div>
    </div>

    <?php require_once 'inc/footer.php'; ?>