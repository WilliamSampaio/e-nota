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

<form method="post" id='form-opcao'>
	<input name='opcao' id='opcao' type='hidden' value=''>
	<input type="submit" value="submit" style="display: none;">
</form>

<ul class="nav nav-pills">

	<?php

	$sql_menus = $PDO->query("SELECT codigo, menu, link FROM menus_prefeitura ORDER BY ordem");
	while (list($codmenu, $menu, $link) = $sql_menus->fetch()) {

		if ($_SESSION['nivel_de_acesso'] == "M") {
			$string = " AND menus_prefeitura_submenus.nivel <> 'A'";
		} elseif ($_SESSION['nivel_de_acesso'] == "B") {
			$string = " AND menus_prefeitura_submenus.nivel = 'B'";
		}

		$sql_submenus = "SELECT
				menus_prefeitura.link, submenus_prefeitura.menu, submenus_prefeitura.link
				FROM
				menus_prefeitura 
				INNER JOIN
				menus_prefeitura_submenus ON menus_prefeitura.codigo = menus_prefeitura_submenus.codmenu 
				INNER JOIN
				submenus_prefeitura ON submenus_prefeitura.codigo = menus_prefeitura_submenus.codsubmenu
				WHERE
				menus_prefeitura.codigo = $codmenu AND menus_prefeitura_submenus.visivel='S' AND nfe = 'S' $string
				ORDER BY
				menus_prefeitura_submenus.ordem";

		$sql_submenus = $PDO->query($sql_submenus);

		if ($sql_submenus->rowCount() > 0) { ?>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $menu ?></a>
				<ul class="dropdown-menu">

					<?php while (list($menulink, $submenu, $submenulink) = $sql_submenus->fetch()) { ?>

						<li>
							<a class="dropdown-item" href="#" onclick="document.getElementById('opcao').value='<?php echo $menulink . '/' . $submenulink ?>';document.getElementById('form-opcao').submit();"><?php echo $submenu ?></a>
						</li>

					<?php } ?>
				</ul>
			</li>

		<?php } ?>

	<?php } ?>
	<li class="nav-item">
		<a class="nav-link" aria-current="page" href="logout.php">Sair</a>
	</li>
</ul>