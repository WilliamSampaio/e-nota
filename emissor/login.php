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

session_name("emissor");
session_start();

require_once '../autoload.php';
require_once '../site/inc/header.php';
require_once 'inc/cod_verificacao.php';

if (!(isset($_SESSION["empresa"]))) {

	$_SESSION['autenticacao'] = rand(10000, 99999);

?>

	<body>

		<?php require_once '../site/inc/navbar.php'; ?>

		<div class="container bg-light">
			<div class="row align-items-center" style="padding-top: 128px; padding-bottom: 128px;">

				<div class="col-sm-12 col-md-2 col-lg-3"></div>
				<div class="col-sm-12 col-md-8 col-lg-6">

					<?php if (isset($_SESSION['error'])) { ?>
						<div class="alert alert-danger">
							<?php echo $_SESSION['error'];
							unset($_SESSION['error']); ?>
						</div>
					<?php } ?>

					<!-- formulario de login -->
					<form action="inc/verifica.php" method="post" onsubmit="return verificaCnpjCpfCodigo();ValidaLogin('txtSenha|codseguranca');">

						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Acesso Restrito</h5>
								<div class="card-body">
									<!-- CPF ou CNPJ -->
									<div class="form-floating mb-3">
										<input class="form-control" type="text" name="txtLogin" id="txtLogin" size="30" onkeyup="CNPJCPFMsk( this )" onkeydown="return NumbersOnly(event); " required>
										<label for="txtLogin">CPF/CNPJ</label>
									</div>
									<!-- SENHA -->
									<div class="form-floating mb-3">
										<input class="form-control" type="password" name="txtSenha" id="txtSenha" size="30" required>
										<label for="txtSenha">Senha</label>
									</div>
									<hr>
									<div class="row g-2">

										<div class="col-md">
											<div class="form-floating">
												<input class="form-control" type="text" name="codseguranca" id="codseguranca" size="6">
												<label for="codseguranca">Cód. Verificação</label>
											</div>
										</div>

										<div class="col-md">
											<div class="form-group mb-3" style="height: 100%;">
												<input style="text-align: center; height: 100%;" class="form-control" type="text" id="cod" value="<?php echo generateCodVerification($_SESSION['autenticacao']) ?>" disabled>
												<!-- <label for="cod">Senha</label> -->
											</div>
										</div>

									</div>
									<br>
									<div class="text-center">
										<input class="btn btn-primary large" type="submit" name="btEntrar" size="30" value="Entrar">
									</div>
								</div>
							</div>
						</div>

						<br>
						<div class="text-center">
							<a href="../site/recuperarsenha.php">Recuperar Senha</a>
						</div>

						<!--<tr> 
							<td align="left">Código</td>
							<td>	   	   
							<input type="text" name="txtCodigo" id="txtCodigo" size="30" class="texto" onkeydown="return NumbersOnly(event);" />
							</td>
						</tr>-->

					</form>
					<!-- formulario de login Fim -->
				</div>
			</div>
		</div>
	<?php
	} else {
		header('Location: ' . BASE_URL . 'emissor/aplic.php');
	}
	?>