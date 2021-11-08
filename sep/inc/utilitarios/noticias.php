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

require_once __DIR__ . '/../../../autoload.php';

//recebimento de variaveis por post
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$titulo = $_POST["txtTitulo"];
$texto  = $_POST["txtText"];

if ($_POST["btInserir"] == "Inserir Nova") {
	$PDO->query("INSERT INTO noticias SET titulo = '$titulo', texto = '$texto', data = NOW(), sistema='nfe'");
	add_logs('Inseriu uma Notícia - ' . $titulo);
	$_SESSION['success'] = 'Notícia inserida com sucesso!';
	header('Location: ' . $actual_link);
	die;
}

if ($_POST["btExcluir"] == "excluir") {
	$cod_nt = $_POST['hdCodNt'];
	$sql_busca_nt = $PDO->query("SELECT texto FROM noticias WHERE codigo = '$cod_nt'");
	list($exc_nt) = $sql_busca_nt->fetch();
	$PDO->query("DELETE FROM noticias WHERE codigo ='$cod_nt'");
	add_logs('Excluiu uma Notícia');
	$_SESSION['error'] = 'Notícia excluida!';
	header('Location: ' . $actual_link);
	die;
}

?>


<div class="card">
	<div class="card-header">
		<h5 class="card-title">
			Utilitários - Notícias
		</h5>

	</div>
	<div class="card-body">
		<h5 class="card-title">
			Notícias
		</h5>
		<hr>

		<?php
		if (isset($_SESSION['error'])) {
			echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
			unset($_SESSION['error']);
		} elseif (isset($_SESSION['success'])) {
			echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
			unset($_SESSION['success']);
		}
		?>

		<form method="post" id="frmNoticias">
			<input name="include" id="include" type="hidden" value="<?php echo $_POST["include"]; ?>" />

			<div class="mb-3">
				<label for="txtTitulo" class="form-label">Título</label>
				<input type="text" class="form-control" id="txtTitulo" name="txtTitulo">
			</div>


			<div class="mb-3">
				<label for="txtText" class="form-label">Conteúdo</label>
				<textarea class="form-control" id="txtText" name="txtText" rows="3"></textarea>
			</div>

			<hr>

			<div class="row g-3">
				<div class="col-auto">
					<input type="submit" class="btn btn-primary mb-3" name="btInserir" value="Inserir Nova" onclick="return ValidaFormulario('txtTitulo|txtText','Os campos titulo e noticia devem ser preenchidos!')">
				</div>
				<div class="col-auto">
					<input type="button" class="btn btn-primary mb-3" name="btInserir" value="Mostrar Noticias" onclick="acessoAjax('inc/utilitarios/noticias_lista.ajax.php','frmNoticias','divnoticiaslista')">
				</div>
			</div>

			<div class="table-responsive" id="divnoticiaslista"></div>
		</form>

	</div>
</div>