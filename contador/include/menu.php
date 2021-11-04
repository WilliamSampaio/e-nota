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

<br>
<ul class="nav nav-pills flex-column bg-light">
	<?php

	function isActive($href)
	{
		$final_url_part = end(explode('/', $_SERVER['REQUEST_URI']));
		$final_url_part == '' ? $final_url_part = '../index.php' : '';

		if ($href == $final_url_part) {
			return 'active';
		}
	}

	$codDaSessao = $_SESSION['codempresa'];

	if (!empty($_POST['cmbCliente'])) {
		$codCliente = $_POST['cmbCliente'];
		$_SESSION['codCliente'] = $_POST['cmbCliente'];
	} else {
		$codCliente = null;
		$_SESSION['codCliente'] = null;
	}

	$sql_tipo_declaracao = $PDO->query("SELECT codtipodeclaracao, isentoiss FROM cadastro WHERE codigo = '$codDaSessao'");
	list($codtipodeclaracao, $isentoiss) = $sql_tipo_declaracao->fetch();
	$codtipodec = coddeclaracao('Simples Nacional');

	?>
		<li class="nav-item">
			<a class="nav-link <? echo isActive('empresas.php') ?>" aria-current="page" href="empresas.php">Cadastro</a>
		</li>

		<li class="nav-item">
			<a class="nav-link <? echo isActive('aidf.php') ?>" aria-current="page" href="aidf.php">AIDF Eletrônico</a>
		</li>

		<li class="nav-item">
			<a class="nav-link <? echo isActive('notas.php') ?>" aria-current="page" href="notas.php">Notas Eletrônicas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link <? echo isActive('livro.php') ?>" aria-current="page" href="livro.php">Livro Digital</a>
		</li>

		<li class="nav-item">
			<a class="nav-link <? echo isActive('importar.php') ?>" aria-current="page" href="importar.php">RPS</a>
		</li>

		<li class="nav-item">
			<a class="nav-link <? echo isActive('exportar.php') ?>" aria-current="page" href="exportar.php">Exportar Notas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link <? echo isActive('reclamacoes.php') ?>" aria-current="page" href="reclamacoes.php">Ouvidoria</a>
		</li>

		<li class="nav-item">
			<a class="nav-link <? echo isActive('utilitarios.php') ?>" aria-current="page" href="utilitarios.php">Utilitários</a>
		</li>

		<li class="nav-item">
			<a class="nav-link <? echo isActive('logout.php') ?>" aria-current="page" href="logout.php">Sair</a>
		</li>
</ul>
