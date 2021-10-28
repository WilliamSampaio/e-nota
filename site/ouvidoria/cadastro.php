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

				<br>
				<h1>Ouvidoria</h1>
				<h5 class="card-title">Tomador, se houver discrepâncias em sua NFe entre em contato com a Prefeitura Municipal</h5>
				<hr><br>

				<h2>Cadastro de Reclamações</h2>
				<hr><br>

				<?php
				$cpfcnpj_tomador   = $_POST['txtCpfCnpjTomador'];
				$numero_rps        = $_POST['txtRpsNumero'];
				$data_rps          = $_POST['txtDataRps'];
				$valor_rps         = $_POST['txtValorRps'];
				$cpfcnpj_prestador = $_POST['txtCpfCnpjPrestador'];
				$email_tomador     = $_POST['txtEmailtomador'];
				$especificacao     = $_POST['cmbEspecificacao'];
				$descricao		   = $_POST['txtDescricao'];

				if ($_POST['btCadastrar'] == "Cadastrar") {

					$valor = explode(",", $valor_rps);
					$valor_rps = str_replace(".", "", $valor[0]) . "." . $valor[1];

					if ((strlen($cpfcnpj_prestador) == 18) || (strlen($cpfcnpj_prestador) == 14)) {
						$campo = tipoPessoa($cpfcnpj_prestador);
						$sql_verifica_prestador = $PDO->query("SELECT codigo FROM cadastro WHERE $campo = '$cpfcnpj_prestador'");
						if ($sql_verifica_prestador->rowCount() > 0) {
							$data = DataMysql($data_rps);
							$PDO->query("INSERT INTO reclamacoes SET assunto = 'Nota Fiscal Eletrônica de Serviços ', descricao='$descricao', especificacao = '$especificacao',
			tomador_cnpj = '$cpfcnpj_tomador', rps_numero = '$numero_rps', rps_data = '$data', rps_valor = '$valor_rps',
			emissor_cnpjcpf = '$cpfcnpj_prestador', estado = 'pendente', datareclamacao = NOW(),tomador_email = '$email_tomador'");
							$_SESSION['cad_result'] = 'Sua reclamação foi enviada com sucesso';
							header('Location: ' . BASE_URL . 'site/ouvidoria.php');
						} else {
							Mensagem("Prestador de serviços inexistente! Certifique-se de que o CPF/CNPJ do prestador de serviços está correto");
						}
					} else {
						Mensagem("Digite um CPF/CNPJ de prestador vestálido!");
					}
				}
				?>

				<form method="post">

					<input type="hidden" name="txtMenu" value="<?php echo $_POST['txtMenu']; ?>">

					<div class="mb-3">
						<p>Assunto: Nota Fiscal Eletrônica de Serviços</p>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="especificacao">Especificação</span>
						<select name="cmbEspecificacao" id="cmbEspecificacao" class="form-select" aria-label="Default select example">
							<option value="Conversão de NFE">Não conversão de RPS</option>
							<option value="Diferença de valores RPS/NFE">Diferença de valores RPS/NFE</option>
							<option value="Nota Cancelada">Nota Cancelada</option>
						</select>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text">Descrição<span style="font-weight: bold; color: red;">*</span></span>
						<textarea name="txtDescricao" id="txtDescricao" class="form-control" aria-label="With textarea" required></textarea>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">CPF/CNPJ do Tomador de serviços<span style="font-weight: bold; color: red;">*</span></span>
						<input name="txtCpfCnpjTomador" id="txtCpfCnpjTomador" type="text" class="form-control" onkeydown="stopMsk( event ); return NumbersOnly( event );" onkeyup="CNPJCPFMsk( this );" required>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Tomador e-mail<span style="font-weight: bold; color: red;">*</span></span>
						<input name="txtEmailtomador" id="txtEmailtomador" type="email" class="form-control" required>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Número do RPS ou NFe<span style="font-weight: bold; color: red;">*</span></span>
						<input name="txtRpsNumero" id="txtRpsNumero" type="text" class="form-control" required>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Data de Emissão do RPS ou NFe<span style="font-weight: bold; color: red;">*</span></span>
						<input name="txtDataRps" id="txtDataRps" maxlength="10" type="text" class="form-control" required>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Valor do RPS ou NFe<span style="font-weight: bold; color: red;">*</span></span>
						<input name="txtValorRps" id="txtValorRps" type="text" class="form-control" required>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">CPF/CNPJ do Prestador de serviços<span style="font-weight: bold; color: red;">*</span></span>
						<input name="txtCpfCnpjPrestador" id="txtCpfCnpjPrestador" onkeydown="stopMsk( event );" onkeypress="return NumbersOnly( event );" type="text" class="form-control" required>
					</div>

					<br>

					<div class="input-group mb-3">
						<button type="submit" class="btn btn-primary" name="btCadastrar" value="Cadastrar" onclick="return ValidaFormulario('cmbEspecificacao|txtCpfCnpjTomador|txtEmailtomador|txtRpsNumero|txtDataRps|txtValorRps|txtCpfCnpjPrestador|txtDescricao')">Cadastrar</button>
					</div>

					<hr>
					<div id="help" class="form-text"><span style="font-weight: bold; color: red;">*</span> : Campos com preenchimento obrigatório.</div>

				</form>

			</div>
		</div>
	</div>

	<?php include_once 'inc/footer.php' ?>