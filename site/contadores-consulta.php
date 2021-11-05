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
require_once DIR_SITE . 'include/header.php';

?>

<body>

    <?php require_once DIR_SITE . 'include/navbar.php' ?>

    <div class="container bg-light">
        <div class="row align-items-start">
            <!-- MENU -->
            <div class="col-3 col-xl-3">
                <?php require_once DIR_SITE . 'include/menu.php' ?>
            </div>

            <!-- CONTEÚDO -->
            <div class="col-sm-12 col-xl-9">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                        <li class="breadcrumb-item"><a href="contadores.php">Contadores</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                    </ol>
                </nav>

                <br>
                <h1>Contadores</h1>
                <h5 class="card-title">Área destinada aos <strong>Contadores</strong> para acesso ao sistema de emissão e cadastro</h5>
                <hr><br>

                <h2>Consulta de Contador</h2>
                <hr><br>

                <form method="post">

                    <input type="hidden" value="<?php echo $_POST['txtMenu'] ?>" name="txtMenu">

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="txtCNPJ" class="col-form-label">CPF/CNPJ</label>
                        </div>

                        <div class="col-auto">
                            <input class="form-control" type="text" title="CNPJ" name="txtCNPJ" id="txtCNPJ" required>
                        </div>

                        <div class="col-auto">
                            <input name="btAvancar" type="submit" value="Avançar" class="btn btn-primary" onclick="return verificaCnpjCpfIm();">
                        </div>
                    </div>

                </form>

                <?php

                if (isset($_POST['txtCNPJ'])) {

                    echo '<hr>';

                    $cnpj = $_POST["txtCNPJ"];

                    $resp = codcargo('responsavel');
                    $diretor = codcargo('diretor');

                    $campo = tipoPessoa($cnpj);

                    if (!$campo) { //se digitou o campo em um formato incorreto
                        echo '<div class="alert alert-danger"><p>Este CNPJ/CPF não está cadastrado no sistema.</p></div>';
                        // Mensagem("Este CNPJ não está cadastrado no sistema");
                        // RedirecionaPost($_SERVER['PHP_SELF'] . "?txtMenu=" . $_POST['txtMenu']);
                        //volta para a pagina de consulta com o post txtMenu necessario
                    } else {
                        $sql = $PDO->query("SELECT codigo FROM tipo WHERE tipo = 'contador'");
                        list($codtipo) = $sql->fetch();

                        $sql = $PDO->query("
                        SELECT 
                            cadastro.codigo,
                            cadastro.nome, 
                            cadastro.razaosocial,
                            cadastro.logradouro,
                            cadastro.bairro,
                            cadastro.numero,
                            cadastro.municipio, 
                            cadastro.uf, 
                            cadastro.cep,
                            cadastro.fonecomercial,
                            cadastro.fonecelular, 
                            cadastro.email,
                            cadastro.estado 
                        FROM 
                            cadastro 
                        WHERE 
                            cadastro.$campo = '$cnpj' 
                        AND 
                            cadastro.codtipo = '$codtipo'");

                        //se verifica se tem o cnpj no banco
                        if ($sql->rowCount() == 0) {
                            echo '<div class="alert alert-danger"><p>Este CNPJ/CPF não está cadastrado no sistema.</p></div>';
                            // Mensagem("Este CNPJ/CPF não está cadastrado no sistema");
                            // RedirecionaPost($_SERVER['PHP_SELF'] . "?txtMenu=" . $_POST['txtMenu']);
                        } else { //fim if se existe o cnpj no banco
                            list(
                                $codigo, $nome, $razaosocial, $logradouro, $bairro, $numero, $municipio, $uf, $cep,
                                $telefone, $telefone2, $email, $estado
                            ) = $sql->fetch();
                            switch ($estado) {
                                case "NL":
                                    $estado = '<b>Aguarde a liberação da prefeitura</b>';
                                    break;
                                case "A":
                                    $estado = '<span style="color: green;"><b>Cadastro liberado</b></span>';
                                    break;
                                case "I":
                                    $estado = '<span style="color: red;"><b>Contador inativo, entre em contato com a prefeitura.</b></span>';
                                    break;
                            } //fim switch estado

                            //seleciona os responsaveis, socios e gerentes e mostra apenas o primeiro de cada
                            $resp = codcargo('responsavel');
                            $sql_resp = $PDO->query("SELECT nome, cpf FROM cadastro_resp WHERE codemissor = '$codigo' AND codcargo = '$resp'");

                            $socio = codcargo('socio');
                            $sql_socio = $PDO->query("SELECT nome, cpf FROM cadastro_resp WHERE codemissor = '$codigo' AND codcargo = '$socio'");

                ?>

                            <h3>Informações</h3>
                            <hr>

                            <table class="table">

                                <tr>
                                    <th scope="col">Nome Completo:</th>
                                    <td scope="col"><?php echo $nome ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Razão Social:</th>
                                    <td scope="col"><?php echo $razaosocial ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">CNPJ/CPF:</th>
                                    <td scope="col"><?php echo $cnpj ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Endereço:</th>
                                    <td scope="col"><?php echo "$logradouro, nº $numero" ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Situacão:</th>
                                    <td scope="col"><?php echo $estado ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Email:</th>
                                    <td scope="col"><?php echo $email ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Bairro:</th>
                                    <td scope="col"><?php echo $bairro ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">CEP:</th>
                                    <td scope="col"><?php echo $cep ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Municipio:</th>
                                    <td scope="col"><?php echo $municipio ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Estado (UF):</th>
                                    <td scope="col"><?php echo $uf ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Telefone:</th>
                                    <td scope="col"><?php echo $telefone ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Telefone Adicional:</th>
                                    <td scope="col"><?php echo verificaCampo($telefone2) ?></td>
                                </tr>
                            </table>

                            <h3>Responsaveis</h3>
                            <hr>

                            <table class="table">

                                <?php

                                if ($sql_resp->rowCount() > 0 || $sql_socio->rowCount() > 0) {

                                    while (list($nome_resp, $cpf_resp) = $sql_resp->fetch()) { ?>

                                        <tr>
                                            <th scope="col">Responsável:</th>
                                            <td scope="col"><?php echo verificaCampo($nome_resp) ?></td>
                                            <th scope="col">CPF:</th>
                                            <td scope="col"><?php echo verificaCampo($cpf_resp) ?></td>
                                        </tr>

                                    <?php
                                    } //fim while responsaveis

                                    while (list($nome_socio, $cpf_socio) = $sql_socio->fetch()) { ?>

                                        <tr>
                                            <th scope="col">Sócio:</th>
                                            <td scope="col"><?php echo verificaCampo($nome_socio) ?></td>
                                            <th scope="col">CPF:</th>
                                            <td scope="col"><?php echo verificaCampo($cpf_socio) ?></td>
                                        </tr>

                                <?php
                                    } //fim while socios 
                                } else {
                                    echo '<div class="alert alert-danger"><p>Responsaveis não cadastrados.</p></div>';
                                }
                                ?>

                            </table>

                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <hr>
                <a class="btn btn-primary" href="contadores.php">Voltar</a>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>

    <?php require_once DIR_SITE . 'include/footer.php'; ?>