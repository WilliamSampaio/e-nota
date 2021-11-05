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
require_once __DIR__.'/../autoload.php';
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
						<li class="breadcrumb-item active" aria-current="page">Gerar guia</li>
					</ol>
				</nav>

				<br>
				<h1>Tomadores</h1>
				<h5 class="card-title">Área destinada aos <strong>Tomadores de Serviços</strong> para consultas</h5>
				<hr><br>

				<h2>Gerar guia (Serviços tomados)</h2>
				<hr><br>

				<?php

				// exibe possiveis erros
				if (isset($_SESSION['resultado'])) {
					echo $_SESSION['resultado'];
					unset($_SESSION['resultado']);
				}

				// caso não tenha sido requisitado via post
				if (!$_POST['txtCNPJ'] && !$_POST['txtInscMunicipal']) {
					$_SESSION['autenticacao'] = rand(10000, 99999);

					if (
						$_POST['txtMenu'] == 'semtomador' ||
						$_POST['txtMenu'] == 'comtomador' ||
						$_POST['txtMenu'] == 'segundavia_prestador' ||
						$_POST['txtMenu'] == 'guia_pagamento' ||
						$_POST['txtMenu'] == 'prestadores_cancelardes' ||
						$_POST['txtMenu'] == 'guia_pagamento_issretido'
					) {
						$login_seguro = true;
					}

				?>

					<form method="post" name="frmCNPJ">

						<input type="hidden" value="<?php echo $_POST['txtMenu'] ?>" name="txtMenu">

						<div class="mb-3">
							<label for="txtCNPJ">CNPJ/CPF</label>
							<input type="text" maxlength="18" name="txtCNPJ" id="txtCNPJ" class="form-control" onblur="ValidaCNPJ(this,'spanprestador');desabilitaSN(this,'txtSimplesNacional','ftDesc')">
						</div>

						<?php if ($login_seguro) { ?>
						<?php //if (true) { ?>

							<div class="mb-3">
								<label for="txtSenha">Senha</label>
								<input type="password" maxlength="18" name="txtSenha" id="txtSenha" class="form-control">
							</div>

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
									</div>
								</div>
							</div>
							<br>

						<?php } else { ?>

							<div class="mb-3"><strong>OU</strong></div>

							<div class="mb-3">
								<label for="txtInsInscMunicipalEmpresa">Insc. Municipal</label>
								<input type="text" maxlength="20" name="txtInscMunicipal" id="txtInscMunicipal" class="form-control">
							</div>

						<?php } ?>
						<div class="mb-3">
							<input type="submit" value="Avançar" class="btn btn-primary" onclick="return verificaCnpjCpfIm();" tabindex="5" />
						</div>
					</form>

				<?php

				} else {

					if ($_POST['txtInscMunicipal']) {
						$tomador_IM = $_POST['txtInscMunicipal'];
						$sql_IM_tomador = $PDO->query("
						SELECT cnpj,cpf 
						FROM cadastro 
						WHERE inscrmunicipal='$tomador_IM'");

						if (!$sql_IM_tomador->rowCount()) {
							$_SESSION['resultado'] = "<div class='alert alert-danger'><p>Inscrição Municipal não encontrada, verifique os dados ou tente pelo CNPJ/CPF.</p></div>";
							header('Location: ' . BASE_URL . 'site/tomadores-issretido.php');
						} else {
							list($tomador_CNPJ, $tomador_CPF) = $sql_IM_tomador->fetch();
							$tomador_CNPJ = $tomador_CNPJ . $tomador_CPF;
						}
					}

					if ($_POST['txtCNPJ']) {
						$tomador_CNPJ = $_POST['txtCNPJ'];
					}

					$sql_emissor = $PDO->query("SELECT codigo, cnpj,cpf, razaosocial, email, inscrmunicipal, logradouro,numero,complemento,bairro,cep FROM cadastro WHERE cnpj='$tomador_CNPJ' OR cpf='$tomador_CNPJ'");
					if ($sql_emissor->rowCount()) {
						list(
							$cod_emissor, $cnpj_emissor, $cpf_emissor, $nome_emissor, $email_emissor, $inscrmunicipal_emissor, $logradouro_emissor,
							$numero_emissor, $complemento_emissor, $bairro_emissor, $cep_emissor
						) = $sql_emissor->fetch();
					}
					$sql_tomador = $PDO->query("SELECT codigo, codtipo, cnpj,cpf, nome, email FROM cadastro WHERE cnpj='$tomador_CNPJ' OR cpf='$tomador_CNPJ'");

					if (!$sql_tomador->rowCount()) {
						$tipopessoa = strlen($tomador_CNPJ) == 18 ? 'cnpj' : 'cpf';
						$codtipo = codtipo('tomador');
						$codtipodec = coddeclaracao('DES Simplificada');
						$PDO->query("INSERT INTO cadastro SET $tipopessoa = '$tomador_CNPJ', codtipo = '$codtipo', codtipodeclaracao = '$codtipodec'");

						$sql_tomador = $PDO->query("SELECT codigo, codtipo, cnpj, cpf, nome, email FROM cadastro WHERE cnpj='$tomador_CNPJ' OR cpf='$tomador_CNPJ'");
					}

					list($cod_tomador, $codtipo_tomador, $cnpj, $cpf, $TomadorNome, $TomadorEmail) = $sql_tomador->fetch();
					$cnpj = $cnpj . $cpf;
					listaRegrasMultaDes();

					$codtipo = codtipo('tomador');
					if ($codtipo != $codtipo_tomador) {
						Mensagem("Somente constribuintes com o perfil de tomadores podem acessar!");
						Redireciona("tomadores.php");
					}

				?>

					<form method="post" name="frmDesSemTomador" action="inc/tomadores/gerarguia.php" target="_blank" onsubmit="document.getElementById('hdTotalInputs').value=totalemissores_des;return confirm('Confira seus dados antes de continuar');">

						<input type="hidden" name="hdTotalInputs" id="hdTotalInputs" />

						<table class="table">
							<tr>
								<div class="alert alert-warning">
									<p>Declarações atrasadas entre em contato com a prefeitura.</p>
								</div>
							</tr>
							<tr>
								<td style="text-align: left;" valign="middle">CNPJ/CPF:</td>
								<td style="text-align: left;" valign="middle">
									<b><?php echo $_POST['txtCNPJ'] ?></b>
									<input type="hidden" value="<?php echo $_POST['txtCNPJ'] ?>" name="txtCNPJ">
								</td>
							</tr>
							<tr>
								<td style="text-align: left;" valign="middle">Razão Social/Nome:</td>
								<td style="text-align: left;" valign="middle">
									<b><?php echo $TomadorNome ?></b>
									<input type="hidden" value="<?php echo $TomadorNome ?>" name="txtRazaoNome" id="txtRazaoNome">
								</td>
							</tr>
							<tr>
								<td style="text-align: left;" valign="middle">
									Competência/Período:
								</td>
								<td style="text-align: left;">

									<?php

									$meses = array("1" => "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
									$mes = date("n");
									$ano = date("Y");

									if ($DEC_ATRAZADAS == 'n') { //var que vem do conect.php
										echo "<b>{$meses[$mes]}/{$ano}</b><br>";
									} else {

									?>

										<div class="row g-2">

											<div class="col-md">

												<select name="cmbMes" id="cmbMes" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="CalculaMultaDes();">
													<?php
													for ($ind = 1; $ind <= 12; $ind++) {
														echo "<option value='$ind'>{$meses[$ind]}</option>";
													}
													?>
												</select>
											</div>
											<div class="col-md">

												<select name="cmbAno" id="cmbAno" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="CalculaMultaDes();">
													<?php
													$year = date("Y");
													for ($h = 0; $h < 5; $h++) {
														$y = $year - $h;
														echo "<option value=\"$y\">$y</option>";
													}
													?>
												</select>

											</div>
										</div>
									<?php
									} //else se é permitudo declarações atrazadas
									?>

								</td>
							</tr>
							<tr>
								<td style="text-align: left;" valign="middle">
									<input type="hidden" name="cmbMes" id="cmbMes" value="<?php echo $mes ?>" />
									<input type="hidden" name="cmbAno" id="cmbAno" value="<?php echo $ano ?>" />
								</td>
								<td style="text-align: left;" valign="middle">
									<input name="btBuscar" type="button" class="btn btn-primary" value="Buscar" onclick="buscaGuiasIssRetido('<?php echo $_POST['txtCNPJ'] ?>','cmbMes','cmbAno','tdConteudo')">
								</td>
							</tr>
						</table>
						<div style="text-align: left;" valign="middle" id="tdConteudo"></div>
					</form>

				<?php } ?>

				<hr>
				<a class="btn btn-primary" href="tomadores.php">Voltar</a>
			</div>
		</div>
		<br>
		<br>
		<br>
	</div>

	<?php require_once DIR_SITE . 'include/footer.php' ?>

	<script type="text/javascript">
		function buscaGuiasIssRetido(cnpj, cmbMes, cmbAno, retorno) {
			var mes = document.getElementById(cmbMes).value;
			var ano = document.getElementById(cmbAno).value;

			ajax({
				url: 'inc/tomadores/issretido_dec.ajax.php?cnpj=' + cnpj + '&cmbAno=' + ano + '&cmbMes=' + mes + '&a=a',
				espera: function() {
					document.getElementById(retorno).innerHTML = 'Verificando...';
				},
				sucesso: function() {
					document.getElementById(retorno).innerHTML = respostaAjax;
				}
			});
		}
	</script>