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

// arquivo de conexão com o banco
require_once("../include/conect.php");

// arquivo com funcoes uteis
require_once("../include/util.php");
//print("<a href=index.php target=_parent><img src=../img/topos/$TOPO></a>");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>e-Nota</title>
	<script src="../scripts/java_site.js" language="javascript" type="text/javascript"></script>
	<script src="../scripts/padrao.js" language="javascript" type="text/javascript"></script>
	<link href="../css/padrao_site.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<table width="760" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td><?php require_once DIR_SITE . 'include/navbar.php' ?></td>
		</tr>
		<tr>
			<td bgcolor="#FFFFFF" height="400" valign="top" align="center">

				<table height="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left" background="../img/menus/menu_fundo.jpg" valign="top" width="170"><?php require_once("inc/menu.php"); ?></td>
						<td align="right" valign="top" width="590">

							<form method="post" name="frmRecuperarSenha" onsubmit="return (ValidaFormulario('txtCNPJ','cnpj') && ValidaFormulario('txtEmail','senha'));">
								<table border="0" cellspacing="1" cellpadding="0">
									<tr>
										<td width="10" height="10" bgcolor="#FFFFFF"></td>
										<td width="165" align="center" bgcolor="#FFFFFF" rowspan="3">Recuperar Senha</td>
										<td width="405" bgcolor="#FFFFFF"></td>
									</tr>
									<tr>
										<td height="1" bgcolor="#CCCCCC"></td>
										<td bgcolor="#CCCCCC"></td>
									</tr>
									<tr>
										<td height="10" bgcolor="#FFFFFF"></td>
										<td bgcolor="#FFFFFF"></td>
									</tr>
									<tr>
										<td colspan="3" height="1" bgcolor="#CCCCCC"></td>
									</tr>
									<tr>
										<td height="60" colspan="3" bgcolor="#CCCCCC">
											<table width="98%" height="100%" border="0" align="center" cellpadding="5" cellspacing="0">
												<tr>
													<td width="19%" align="left">CNPJ/CPF</td>
													<td width="81%" align="left" valign="middle"><em>
															<input class="texto" type="text" title="CNPJ" name="txtCNPJ" id="txtCNPJ" />
															Somente números</em></td>
												</tr>
												<tr>
													<td align="left">Email</td>
													<td align="left" valign="middle">
														<input class="texto" type="text" title="Email" name="txtEmail" id="txtEmail" />
													</td>
												</tr>
												<tr>
													<td align="center"></td>
													<td align="left" valign="middle"><input type="submit" value="Avançar" class="botao" /></td>
												</tr>
											</table>

										</td>
									</tr>
									<tr>
										<td height="1" colspan="3" bgcolor="#CCCCCC"></td>
									</tr>
								</table>
							</form>

						</td>
					</tr>
				</table>
				<?php
				if ($_POST) {
					$cnpj = $_POST['txtCNPJ'];
					$email_confirmacao = $_POST['txtEmail'];
					$sql = $PDO->query("SELECT nome, email FROM cadastro WHERE (cnpj='$cnpj' OR cpf='$cnpj')");
					if (!$sql->rowCount()) {
						Mensagem("CNPJ/CPF não cadastrado! Favor verificar");
						Redireciona("recuperarsenha.php");
					}

					list($nome, $email) = $sql->fetch();

					if ($email != $email_confirmacao) {
						Mensagem("Email não confere com o cadastrado!");
						Redireciona("recuperarsenha.php");
					} else {
						$senha = rand(000000, 999999);
						$PDO->query("UPDATE cadastro SET senha = '" . md5($senha) . "' WHERE (cnpj='$cnpj' OR cpf='$cnpj')");

						$corpo_email = "Ol� $nome,\nSua nova senha �: $senha\n\nEm caso de duvidas entrar em contato com a prefeitura.\nObrigado.";
						$headers  = "MIME-Version: 1.0\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
						$headers .= "From: $CONF_SECRETARIA de $CONF_CIDADE <$CONF_EMAIL>  \r\n";
						$headers .= "Cc: \r\n";
						$headers .= "Bcc: \r\n";

						mail($email, "Recupera��o de Senha do e-Nota", $corpo_email, $headers);
						Mensagem("A senha foi enviada para seu Email!");
						Redireciona("recuperarsenha.php");
					}
				}



				?>


			</td>
		</tr>
	</table>
	<?php require_once("inc/rodape.php"); ?>
	<?php require_once("inc/teclado.php"); ?>
</body>

</html>