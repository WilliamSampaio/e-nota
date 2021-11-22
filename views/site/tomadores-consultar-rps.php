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

<?php var_dump($post) ?>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= url('site') ?>">Início</a></li>
        <li class="breadcrumb-item"><a href="<?= url('site/tomadores') ?>">Tomadores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consulta RPS</li>
    </ol>
</nav>

<br>
<h1>Tomadores</h1>
<h5 class="card-title">Área destinada aos <strong>Tomadores de Serviços</strong> para consultas</h5>
<hr><br>

<h2>Consulta Recibo Provisório de Serviços (RPS)</h2>
<hr><br>

<form action="<?= url('site/tomadores/consultar-rps') ?>" method="post">

    <div class="mb-3 row">
        <label for="txtNumeroRps" class="col-sm-3 col-form-label">Número do RPS<strong style="color: red;">*</strong></label>
        <div class="col-auto">
            <input type="number" name="txtNumeroRps" id="txtNumeroRps" class="form-control" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="txtDataRps" class="col-sm-3 col-form-label">Data do RPS<strong style="color: red;">*</strong></label>
        <div class="col-auto">
            <input type="date" name="txtDataRps" id="txtDataRps" class="form-control" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="txtPrestCpfCnpj" class="col-sm-3 col-form-label">Prestador CPF/CNPJ<strong style="color: red;">*</strong></label>
        <div class="col-auto">
            <input type="text" name="txtPrestCpfCnpj" id="txtPrestCpfCnpj" class="form-control mascara-cpfcnpj" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="txtTomCpfCnpj" class="col-sm-3 col-form-label">Tomador CPF/CNPJ<strong style="color: red;">*</strong></label>
        <div class="col-auto">
            <input type="text" name="txtTomCpfCnpj" id="txtTomCpfCnpj" class="form-control mascara-cpfcnpj" required>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-auto">
            <input type="submit" name="consultar" id="consultar" value="Consultar" class="btn btn-primary">
        </div>
    </div>

    <hr>
    <div id="help" class="form-text"><span style="font-weight: bold; color: red;">*</span> : Campos com preenchimento obrigatório.</div>
</form>

<?php
if ($_POST['btConsulta']) {
    require_once('inc/tomadores/rps_consulta.php');
}
?>

<hr>
<a class="btn btn-primary" href="<?= url('site/tomadores') ?>">Voltar</a>