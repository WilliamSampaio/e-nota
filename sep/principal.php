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

$_SESSION['autenticacao'] = rand(10000, 99999);
if (isset($_SESSION["logado"])) {
	require_once DIR_SEP . "include/header.php";

?>

	<body>

		<?php require_once DIR_SEP . 'include/navbar.php' ?>
		<?php require_once DIR_SEP . 'include/menu.php' ?>

		<div class="container" style="background-color: lightgray;">

			<div class="row align-items-start">

				<!-- CONTEÚDO -->
				<div class="col-sm-12 col-md-12 col-lg-12">
					<br>
					
					<?php

					if (isset($_GET['opcao'])) {
						include __DIR__ . '/../sep/inc/' . $_GET['opcao'];
					}

					?>

				</div>
			</div>
			<br>
			<br>
			<br>
		</div>

	<?php require_once DIR_SEP . "include/footer.php";
} ?>