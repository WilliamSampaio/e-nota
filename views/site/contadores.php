<?php $this->layout('site-tema') ?>

<?php $this->start('header') ?>
<?php $this->insert('include/header', ['title' => $title, 'configuracoes' => $configuracoes]) ?>
<?php $this->end() ?>

<?php $this->start('navbar') ?>
<?php $this->insert('include/navbar', ['configuracoes' => $configuracoes]) ?>
<?php $this->end() ?>

<?php $this->start('menu') ?>
<?php $this->insert('include/menu') ?>
<?php $this->end() ?>

<?php $this->start('footer') ?>
<?php $this->insert('include/footer') ?>
<?php $this->end() ?>

<?php $this->start('scripts') ?>
<?php $this->insert('include/scripts') ?>
<?php $this->end() ?>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= url('site') ?>">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contadores</li>
    </ol>
</nav>

<br>
<h1>Contadores</h1>
<h5 class="card-title">Área destinada aos <strong>Contadores</strong> para acesso ao sistema de emissão e cadastro</h5>
<hr><br>

<!-- ITENS -->
<div class="row">

    <div class="col-4">
        <div class="card">
            <!-- <img src="../img/index/iconeemitirnf.jpg" class="img-fluid" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">Acessar Sistema</h5>
                <p class="card-text">Contador emissor de NFe, ou prestador de serviço.</p>
            </div>
            <div class="card-footer">
                <img src="../img/box/web.png" width="14" height="14">
                <a href="<?= BASE_URL ?>contador/index.php" target="_blank">Serviço online</a>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <!-- <img src="../img/index/iconeemitirnf.jpg" class="img-fluid" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">Cadastro</h5>
                <p class="card-text">Se você não possui acesso ao sistema, cadastre-se aqui.</p>
            </div>
            <div class="card-footer">
                <img src="../img/box/web.png" width="14" height="14">
                <a href="contadores-cadastro.php">Serviço online</a>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <!-- <img src="../img/index/iconeemitirnf.jpg" class="img-fluid" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">Consulta</h5>
                <p class="card-text">Consulte se o seu cadastro já foi liberado pela Prefeitura Municipal.</p>
            </div>
            <div class="card-footer">
                <img src="../img/box/web.png" width="14" height="14">
                <a href="contadores-consulta.php">Serviço online</a>
            </div>
        </div>
    </div>

</div>