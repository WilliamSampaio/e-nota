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

	<body class='bg-light'>

		<?php require_once DIR_SEP . 'include/navbar.php' ?>
		<?php require_once DIR_SEP . 'include/menu.php' ?>

		<div class="container bg-light">
			<div class="row align-items-start">

				<!-- CONTEÚDO -->
				<div class="col-sm-12 col-md-12 col-lg-12">

					<tr>

						<td align="left" valign="top">
							<?php
							if ($_GET['d']) {
								if (substr($_GET['d'], 0, 6) == 'janela') {
									include_janela(substr($_GET['d'], 8), 'JANELA', substr($_GET['d'], 6, 1));
									//Mensagem(substr('janela1:a',7,1));
								} else {
									include $_GET['d'];
								}
							} else if ($_GET['j']) {
								if ($btDetalhesPrestadorVisualizar) {
									$_POST['include'] = str_replace('tomadores', 'prestadores', $_POST['include']);
									$_POST['CODEMISSOR']  = $_POST['CODTOMADOR'];
								}
								include_janela($_POST['include']);
							} else
    if ($_POST['include']) {
								if ($btDetalhesPrestadorVisualizar) {
									$_POST['include'] = str_replace('tomadores', 'prestadores', $_POST['include']);
									$_POST['CODEMISSOR']  = $_POST['CODTOMADOR'];
								}

								require_once($_POST['include']);
							}
							?>
						</td>
					</tr>
					</table>

				<?php

				require_once DIR_SEP . "include/footer.php";
			} else {
				require_once("funcoes/util.php");
				Mensagem('Sem permissão de acesso!!!');
				print("<script language=JavaScript>parent.location='login.php';</script>");
			}

				?>