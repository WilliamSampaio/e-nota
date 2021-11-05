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

require_once __DIR__ . '/../autoload.php';
require_once '../sep/include/header.php';

if (!(isset($_SESSION["logado"]))) {

    $_SESSION['autenticacao'] = rand(10000, 99999);

?>

    <body>

        <?php require_once __DIR__ . '/../sep/include/navbar.php'; ?>

        <div class="container bg-light">
            <div class="row align-items-center" style="padding-top: 96px; padding-bottom: 96px;">

                <div class="col-sm-12 col-md-2 col-lg-3"></div>
                <div class="col-sm-12 col-md-8 col-lg-6">

                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php } ?>

                    <form name="frmLogin" action="../sep/inc/verifica.php" method="post">

                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title text-center"><i class="fas fa-globe-americas fa-3x" style="color: darkblue;">SEP</i><br><span>Sistema Eletrônico de Prefeitura</span></h5>
                            </div>

                            <div class="card-body">
                                <!-- CPF ou CNPJ -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="txtLogin" id="txtLogin" required>
                                    <label for="txtLogin">Usuário</label>
                                </div>
                                <!-- SENHA -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="password" name="txtSenha" id="txtSenha" required>
                                    <label for="txtSenha">Senha</label>
                                </div>
                                <hr>
                                <div class="row g-2">

                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input class="form-control" type="text" name="codseguranca" id="codseguranca">
                                            <label for="codseguranca">Cód. Verificação</label>
                                        </div>
                                    </div>

                                    <div class="col-md">
                                        <div class="form-group mb-3" style="height: 100%;">
                                            <input style="text-align: center; height: 100%;" class="form-control" type="text" id="cod" value="<?php echo generateCodVerification($_SESSION['autenticacao']) ?>" disabled>
                                        </div>
                                    </div>

                                </div>
                                <br>
                            </div>

                            <div class="card-footer">
                                <div class="text-center">
                                    <input class="btn btn-primary btn-lg" type="submit" name="btEntrar" value="Entrar">
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
                <div class="col-sm-12 col-md-2 col-lg-3"></div>

            </div>
        </div>

    <?php

    require_once __DIR__ . '/../sep/include/footer.php';
} else {
    header('Location: principal.php');
}

    ?>