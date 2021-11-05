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
			<div class="col-sm-12 col-md-3 col-lg-3">
				<?php require_once DIR_SITE . 'include/menu.php' ?>
			</div>

			<!-- CONTEÚDO -->
			<div class="col-sm-12 col-md-9 col-lg-9">
				<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Início</a></li>
						<li class="breadcrumb-item active" aria-current="page">Tomadores</li>
					</ol>
				</nav>

				<br>
				<h1>Tomadores</h1>
				<h5 class="card-title">Área destinada aos <strong>Tomadores de Serviços</strong> para consultas</h5>
				<hr><br>

				<!-- ITENS -->
				<div class="row">

					<div class="col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 16px;">
						<div class="card" style="height: 100%;">
							<div class="card-body">
								<h5 class="card-title">Consulta RPS</h5>
								<p class="card-text">Permite que o tomador de serviços que recebeu um Recibo Provisório de Serviços - RPS consulte a sua conversão em NFe.</p>
							</div>
							<div class="card-footer">
								<img src="../img/box/web.png" width="14" height="14">
								<a href="<?php echo BASE_URL . 'site/tomadores-rps.php' ?>">Serviço online</a>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 16px;">
						<div class="card" style="height: 100%;">
							<div class="card-body">
								<h5 class="card-title">Autenticidade de NFe</h5>
								<p class="card-text">Acesse e compare os números de aprovação da NFe de ISS.</p>
							</div>
							<div class="card-footer">
								<img src="../img/box/web.png" width="14" height="14">
								<a href="<?php echo BASE_URL . 'site/tomadores-autenticidade.php' ?>">Serviço online</a>
							</div>
						</div>
						<br>
					</div>

					<!-- </div>
				<br> -->

					<!-- ITENS -->
					<!-- <div class="row"> -->

					<div class="col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 16px;">
						<div class="card" style="height: 100%;">
							<div class="card-body">
								<h5 class="card-title">Gerar guia</h5>
								<p class="card-text">Gerar guia de declarações com ISS retido.</p>
							</div>
							<div class="card-footer">
								<img src="../img/box/web.png" width="14" height="14">
								<a href="<?php echo BASE_URL . 'site/tomadores-issretido.php' ?>">Serviço online</a>
							</div>
						</div>
						<br>
					</div>

					<!-- <div class="col-6">
						<div class="card" style="height: 100%;">
							<div class="card-body">
								<h5 class="card-title">Consulta Créditos</h5>
								<p class="card-text">Veja o vídeo da campanha da NFeletrônica de ISS.</p>
							</div>
							<div class="card-footer">
								<img src="../img/box/web.png" width="14" height="14">
								<a onclick="document.getElementById('txtMenu').value='creditos';frmTomadoresBox.submit();" href="#" class="box">Serviço online</a>
							</div>
						</div>
					</div> -->

				</div>

			</div>
		</div>
		<br>
		<br>
		<br>
	</div>

	<?php require_once DIR_SITE . 'include/footer.php'; ?>