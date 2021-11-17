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
        <li class="breadcrumb-item"><a href="<?= url('site/ouvidoria') ?>">Ouvidoria</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consulta de Reclamações</li>
    </ol>
</nav>

<br>
<h1>Ouvidoria</h1>
<h5 class="card-title">Tomador, se houver discrepâncias em sua NFe entre em contato com a Prefeitura Municipal</h5>
<hr><br>

<h2>Consulta de Reclamações</h2>
<hr><br>

<form action="<?= url('site/ouvidoria/consultar') ?>" method="post">

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="cpfcnpj_tomador" class="col-form-label">CPF/CNPJ do Tomador</label>
        </div>
        <div class="col-auto">
            <input class="form-control mascara-cpfcnpj" type="text" name="cpfcnpj_tomador" id="cpfcnpj_tomador" onkeydown="stopMsk( event );" onkeypress="return NumbersOnly( event );" onkeyup="CNPJCPFMsk( this );" required>
        </div>
        <div class="col-auto">
            <input type="submit" value="Consultar" class="btn btn-primary">
        </div>
    </div>

</form>

<?php if ($reclamacoes > 0) : ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número RPS</th>
                <th scope="col">Data da reclamação</th>
                <th scope="col">Estado da reclamação</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($reclamacoes as $reclamacao) : ?>

                <tr>
                    <td><?= $reclamacao->rps_numero ?></td>
                    <td><?= date("d/m/Y", strtotime($reclamacao->datareclamacao)) ?></td>
                    <td><?= strtoupper($reclamacao->estado) ?></td>
                </tr>

            <?php endforeach ?>

        </tbody>
    </table>

<?php elseif ($reclamacoes == 'error') : ?>

    <br>
    <div class="alert alert-danger" role="alert">
        <p>Reclamações não encontradas! Verifique os dados.</p>
    </div>

<?php endif ?>

<hr>
<a class="btn btn-primary" href="<?= url('site/ouvidoria') ?>">Voltar</a>