<?php $this->layout('sep-tema') ?>

<?php $this->start('header') ?>
<?php $this->insert('include/header', ['title' => $title, 'configuracoes' => $configuracoes]) ?>
<?php $this->end() ?>

<?php $this->start('navbar') ?>
<?php $this->insert('include/navbar', ['configuracoes' => $configuracoes]) ?>
<?php $this->end() ?>

<?php $this->start('scripts') ?>
<?php $this->insert('include/scripts') ?>
<?php $this->end() ?>

<div class="col-sm-12 col-md-2 col-lg-3"></div>
<div class="col-sm-12 col-md-8 col-lg-6">

    <?php
    if (isset($result) && $result['status'] == 'error') {
        echo "<div class='alert alert-danger' role='alert'><p>" . $result['mensagem'] . "</p></div>";
        unset($result);
    } elseif (isset($result) && $result['status'] == 'success') {
        echo "<div class='alert alert-success' role='alert'><p>" . $result['mensagem'] . "</p></div>";
        unset($result);
    }
    ?>

    <form name="frmLogin" action="<?= url('sep/login') ?>" method="post">

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
                        <div class="form-floating text-center">
                            <img class="img-thumbnail" src="<?= $captcha->getImg() ?>" style="height: 56px;">
                        </div>
                    </div>

                </div>
                <br>
            </div>

            <div class="card-footer">
                <div class="text-center">
                    <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Entrar">
                </div>
            </div>

        </div>

    </form>

</div>
<div class="col-sm-12 col-md-2 col-lg-3"></div>