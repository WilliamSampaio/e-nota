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
require_once '../autoload.php';
require_once DIR_SITE . 'include/header.php';

?>

<body>

	<?php require_once DIR_SITE . 'include/navbar.php' ?>

	<div class="container bg-light">
		<div class="row align-items-start">
			<!-- MENU -->
			<div class="col-sm-12 col-md-3 col-lg-3">
				<?php require_once DIR_SITE . 'include/menu.php' ?>
			</div>

			<!-- CONTEÚDO -->
			<div class="col-sm-12 col-md-9 col-lg-9">

				<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Início</a></li>
						<li class="breadcrumb-item"><a href="tomadores.php">Tomadores</a></li>
						<li class="breadcrumb-item active" aria-current="page">Autenticidade de NFe</li>
					</ol>
				</nav>

				<br>
				<h1>Tomadores</h1>
				<h5 class="card-title">Área destinada aos <strong>Tomadores de Serviços</strong> para consultas</h5>
				<hr><br>

				<h2>Consulta de Autenticidade de NFe</h2>
				<hr><br>

				<?php

				if (isset($_SESSION['resultado'])) {
					echo $_SESSION['resultado'];
					unset($_SESSION['resultado']);
				}

				?>

				<form method="post">
					<div class="mb-3 row">
						<label for="txtNFe" class="col-sm-3 col-form-label">Número da NFe<strong style="color: red;">*</strong></label>
						<div class="col-auto">
							<input class="form-control" type="text" name="txtNFe" id="txtNFe" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="txtCPFCNPJ" class="col-sm-3 col-form-label">Prestador CNPJ/CPF<strong style="color: red;">*</strong></label>
						<div class="col-auto">
							<input class="form-control" type="text" name="txtCPFCNPJ" id="txtCPFCNPJ" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="txtCodigo" class="col-sm-3 col-form-label">Código de Verificação<strong style="color: red;">*</strong></label>
						<div class="col-auto">
							<input class="form-control" type="text" name="txtCodigo" id="txtCodigo" required>
						</div>
					</div>
					<br>

					<div class="mb-3 row">
						<div class="col-auto">
							<input type="submit" name="btAutenticidade" value="Consultar" class="btn btn-primary">
						</div>
					</div>

					<hr>
					<div id="help" class="form-text"><span style="font-weight: bold; color: red;">*</span> : Campos com preenchimento obrigatório.</div>
				</form>

				<?php

				if ($_POST['btAutenticidade']) {
					$campo = tipoPessoa($_POST['txtCPFCNPJ']);
					if ($campo) {
						$sql = $PDO->query("
						SELECT notas.codigo 
						FROM notas INNER JOIN cadastro ON notas.codemissor = cadastro.codigo 
						WHERE notas.codverificacao='" . $_POST['txtCodigo'] . "' AND notas.numero='" . $_POST['txtNFe'] . "' AND cadastro.$campo ='" . $_POST['txtCPFCNPJ'] . "'");
						$registros = $sql->rowCount();
						if ($registros > 0) {
							list($cod_nota) = $sql->fetch();
							$codigo = base64_encode($cod_nota);

							$_SESSION['resultado'] = '<div class="alert alert-success"><p>Nota autêntica.</p><a class="btn btn-success" target="_blank" href="../reports/nfe_imprimir.php?CODIGO=' . $codigo . '&TIPO=T">VISUALZAR NOTA</a></div>';
							header('Location: ' . BASE_URL . 'site/tomadores-autenticidade.php');
							// print("<script language=\"javascript\">window.open('../reports/nfe_imprimir.php?CODIGO=$codigo&TIPO=T');</script>");
						} else {
							$_SESSION['resultado'] = '<div class="alert alert-danger"><p>Nota não autêntica.</p></div>';
							header('Location: ' . BASE_URL . 'site/tomadores-autenticidade.php');
							// echo "<script language=JavaScript>parent.location='tomadores-autenticidade.php';</script>";
							// print("<script language=JavaScript>alert('Nota não autêntica');parent.location='tomadores.php';</script>");
						}
					} else {
						$_SESSION['resultado'] = '<div class="alert alert-danger"><p>Não existe nota cadastrada com estes dados!</p></div>';
						header('Location: ' . BASE_URL . 'site/tomadores-autenticidade.php');
						// print("<script language=JavaScript>alert('Não existe nota cadastrada com estes dados!');parent.location='tomadores.php';</script>");
					}
				}

				?>

				<hr>
				<a class="btn btn-primary" href="tomadores.php">Voltar</a>
			</div>
		</div>
		<br>
	</div>

	<?php require_once DIR_SITE . 'include/footer.php'; ?>