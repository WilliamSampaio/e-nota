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
<ul class="nav nav-pills flex-column">

	<?php

	$final_url_part = end(explode('/', $_SERVER['REQUEST_URI']));
	$final_url_part == '' ? $final_url_part = 'index.php' : '';

	$menus = array(
		'Início'       => 'index.php',
		'Prestadores'       => 'prestadores.php',
		'Contadores'       => 'contadores.php',
		'Tomadores'       => 'tomadores.php',
		'RPS'           => 'rps.php',
		'Benefícios'       => 'beneficios.php',
		'Perguntas e Respostas' => 'faq.php',
		'Reclamações'       => 'ouvidoria.php',
		'Notícias'        => 'noticias.php',
		'Legislação'      => 'legislacao.php'
	);

	$menus_ouvidoria = array(
		'- Cadastro'       => 'ouvidoria-cadastro.php',
		'- Consulta'       => 'ouvidoria-consulta.php'
	);

	foreach ($menus as $menu => $link) { ?>

		<li class="nav-item">
			<a class="nav-link <?php
				if ($link == $final_url_part) {
					echo 'active';
				}
				?>" aria-current="page" href="<?php echo $link ?>"><?php echo $menu ?>
			</a>
			<?php
			foreach ($menus_ouvidoria as $menu => $sub_link) {
				if ($final_url_part == $sub_link) { ?>
					<ul class="nav nav-pills flex-column" style="padding-left: 8px;">
						<li class="nav-item">
							<a class="nav-link <?php
								if ($sub_link == $final_url_part) {
									echo 'active';
								}
								?>" aria-current="page" href="<?php echo $sub_link ?>"><?php echo $menu ?>
							</a>
						</li>
					</ul>
			<?php }
			}
			?>
		</li>

	<?php } ?>

</ul>