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
        <li class="breadcrumb-item active" aria-current="page">Cadastro de Reclamações</li>
    </ol>
</nav>

<br>
<h1>Ouvidoria</h1>
<h5 class="card-title">Tomador, se houver discrepâncias em sua NFe entre em contato com a Prefeitura Municipal</h5>
<hr><br>

<h2>Cadastro de Reclamações</h2>
<hr><br>

<?php

if (isset($result) && $result['status'] == 'error') {
    echo "<div class='alert alert-danger' role='alert'><p>" . $result['mensagem'] . "</p></div>";
    unset($result);
} elseif (isset($result) && $result['status'] == 'success') {
    echo "<div class='alert alert-success' role='alert'><p>" . $result['mensagem'] . "</p></div>";
    unset($result);
}

if ($_POST['btCadastrar'] == "Cadastrar") {

    // if ((strlen($cpfcnpj_prestador) == 18) || (strlen($cpfcnpj_prestador) == 14)) {
    /*$campo = tipoPessoa($cpfcnpj_prestador);
    $sql_verifica_prestador = $PDO->query("SELECT codigo FROM cadastro WHERE $campo = '$cpfcnpj_prestador'");
    if ($sql_verifica_prestador->rowCount() > 0) {
        $data = DataMysql($data_rps);
        $PDO->query("INSERT INTO reclamacoes SET assunto = 'Nota Fiscal Eletrônica de Serviços ', descricao='$descricao', especificacao = '$especificacao',
			tomador_cnpj = '$cpfcnpj_tomador', rps_numero = '$numero_rps', rps_data = '$data', rps_valor = '$valor_rps',
			emissor_cnpjcpf = '$cpfcnpj_prestador', estado = 'pendente', datareclamacao = NOW(),tomador_email = '$email_tomador'");
        $_SESSION['cad_result'] = 'Sua reclamação foi enviada com sucesso';
        header('Location: ' . BASE_URL . 'site/ouvidoria-cadastro.php');
    } else {
        $_SESSION['error_result'] = "Prestador de serviços inexistente! Certifique-se de que o CPF/CNPJ do prestador de serviços está correto";
        header('Location: ' . BASE_URL . 'site/ouvidoria-cadastro.php');
    }*/
    // } else {
    //     $_SESSION['error_result'] = "Digite um CPF/CNPJ de prestador vestálido!";
    //     header('Location: ' . BASE_URL . 'site/ouvidoria-cadastro.php');
    // }
}

?>

<form action="<?= url('site/ouvidoria/cadastrar') ?>" method="post">

    <div class="mb-3">
        <p>Assunto: Nota Fiscal Eletrônica de Serviços</p>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Especificação</span>
        <select name="especificacao" id="especificacao" class="form-select" aria-label="Default select example">
            <option value="Conversão de NFE">Não conversão de RPS</option>
            <option value="Diferença de valores RPS/NFE">Diferença de valores RPS/NFE</option>
            <option value="Nota Cancelada">Nota Cancelada</option>
        </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Descrição<span style="font-weight: bold; color: red;">*</span></span>
        <textarea name="descricao" id="descricao" class="form-control" aria-label="With textarea" required></textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">CPF/CNPJ do Tomador de serviços<span style="font-weight: bold; color: red;">*</span></span>
        <input name="tomador_cnpj" id="tomador_cnpj" type="text" class="form-control mascara-cpfcnpj" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Tomador e-mail<span style="font-weight: bold; color: red;">*</span></span>
        <input name="tomador_email" id="tomador_email" type="email" class="form-control" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Número do RPS ou NFe<span style="font-weight: bold; color: red;">*</span></span>
        <input name="rps_numero" id="rps_numero" type="text" class="form-control" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Data de Emissão do RPS ou NFe<span style="font-weight: bold; color: red;">*</span></span>
        <input name="rps_data" id="rps_data" maxlength="10" type="date" class="form-control" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Valor do RPS ou NFe<span style="font-weight: bold; color: red;">*</span></span>
        <input name="rps_valor" id="rps_valor" type="text" class="form-control mascara-moeda" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">CPF/CNPJ do Prestador de serviços<span style="font-weight: bold; color: red;">*</span></span>
        <input name="emissor_cnpj" id="emissor_cnpj" type="text" class="form-control mascara-cpfcnpj" required>
    </div>

    <br>

    <div class="input-group mb-3">
        <button type="submit" class="btn btn-primary" name="cadastrar" value="Cadastrar">Cadastrar</button>
    </div>

    <hr>
    <div id="help" class="form-text"><span style="font-weight: bold; color: red;">*</span> : Campos com preenchimento obrigatório.</div>

</form>
<hr>
<a class="btn btn-primary" href="<?= url('site/ouvidoria') ?>">Voltar</a>