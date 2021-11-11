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
		$urlAtual = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$route = str_replace(URL_BASE, "", $urlAtual);

		if ($href == $route) {
			return 'active';
		}
	}

	?>

	<li class="nav-item">
		<a class="nav-link <? echo isActive('/site') ?>" aria-current="page" href="<? echo url('site') ?>">Início</a>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link <? echo isActive('/site/prestadores') ?>" aria-current="page" href="<? echo url('site/prestadores') ?>">Prestadores</a>
	</li>

	<li class="nav-item">
		<a class="nav-link <? echo isActive('contadores.php') ?>" aria-current="page" href="contadores.php">Contadores</a>
	</li>

	<li class="nav-item">
		<a class="nav-link <? echo isActive('tomadores.php') ?>" aria-current="page" href="tomadores.php">Tomadores</a>
	</li>

	<li class="nav-item">
		<a class="nav-link <? echo isActive('rps.php') ?>" aria-current="page" href="rps.php">RPS</a>
	</li>

	<li class="nav-item">
		<a class="nav-link <? echo isActive('beneficios.php') ?>" aria-current="page" href="beneficios.php">Benefícios</a>
	</li>

	<li class="nav-item">
		<a class="nav-link <? echo isActive('faq.php') ?>" aria-current="page" href="faq.php">Perguntas e Respostas</a>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link <? echo isActive('ouvidoria.php') ?>" aria-current="page" href="ouvidoria.php">Ouvidoria</a>
	</li>

	<li class="nav-item">
		<a class="nav-link <? echo isActive('noticias.php') ?>" aria-current="page" href="noticias.php">Notícias</a>
	</li>

	<li class="nav-item">
		<a class="nav-link <? echo isActive('legislacao.php') ?>" aria-current="page" href="legislacao.php">Legislação</a>
	</li>

</ul>