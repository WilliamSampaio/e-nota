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
        <li class="breadcrumb-item active" aria-current="page">Ouvidoria</li>
    </ol>
</nav>

<br>
<h1>Ouvidoria</h1>
<h5 class="card-title">Tomador, se houver discrepâncias em sua NFe entre em contato com a Prefeitura Municipal</h5>
<hr><br>

<!-- ITENS -->
<div class="row">

    <div class="col-sm-12 col-md-6" style="height: 100%;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Reclamações</h5>
                <p class="card-text">Se o seu prestador não efetuou a conversão de RPS em NF-e, ou o valor da NFe não confere.</p>
            </div>
            <div class="card-footer">
                <img src="../img/box/web.png" width="14" height="14">
                <a href="<?= url('site/ouvidoria/cadastrar') ?>">Serviço online</a>
            </div>
        </div>
        <br>
    </div>

    <div class="col-sm-12 col-md-6" style="height: 100%;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Consulta</h5>
                <p class="card-text">Consulte o andamento da reclamação feita junto a Prefeitura Municipal.</p>
            </div>
            <div class="card-footer">
                <img src="../img/box/web.png" alt="" width="14" height="14">
                <a href="<?= url('site/ouvidoria/consultar') ?>">Serviço online</a>
            </div>
        </div>
        <br>
    </div>
</div>