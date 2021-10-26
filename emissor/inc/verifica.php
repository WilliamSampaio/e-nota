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

session_name("emissor");
session_start();

require_once 'funcao_logs.php';
require_once '../../autoload.php';

// recebe a variavel que contem o número de verificação e a variavel que contém o número que o usuário digitou.
$autenticacao  = $_SESSION['autenticacao'];
$cod_seguranca = $_POST['codseguranca'];
$txtSenha = $_POST['txtSenha'];

if ($cod_seguranca == $_SESSION['autenticacao'] && $cod_seguranca) {

	if ($_POST['txtLogin'] != "") {
		$campologin = $_POST['txtLogin'];
		$campo = tipoPessoa($campologin);
		$sql = $PDO->query("SELECT * FROM cadastro WHERE cnpj = '$campologin'");
	}

	/*if($_POST['txtCodigo']!=""){
		$campologin = $_POST['txtCodigo'];
		$sql = $PDO->query("SELECT * FROM cadastro WHERE codigo = '$campologin'");
	}*/

	if ($sql->rowCount() > 0) {
		$dados = $sql->fetch();

		/*if($_POST['txtCodigo']!=""){
			if($dados['cnpj']!=""){
				$login = $dados['cnpj'];
			}else{
				$login = $dados['cpf'];
			}
		}*/

		if ($_POST['txtLogin']) {
			$login = $dados[$campo];
		}

		$estado = $dados['estado'];

		if ($estado == "A") {

			//verifica se a senha digitada confere com a que está armazenada no banco	
			if (md5($txtSenha) == $dados['senha']) {

				if ($dados['codtipo'] == 1) {

					if (strtoupper($dados['nfe']) == "S") {
						// inicia a sessão e direciona para index.		
						$_SESSION['codempresa'] = $dados['codigo'];
						$_SESSION['empresa'] = $dados['senha'];
						$_SESSION['login'] = $login;
						$_SESSION['nome'] = $dados['nome'];
						$nome = $dados['nome'];
						header('Location: ' . BASE_URL . 'emissor/login.php');
					} else {
						$_SESSION['error'] = 'O prestador referido não está apto a emitir nfe, por favor verifique juntamente com a prefeitura a liberação de nfe!';
						header('Location: ' . BASE_URL . 'emissor/login.php');
					}
				} else {
					$_SESSION['error'] = 'Somente prestadores podem se logar no sistema.';
					header('Location: ' . BASE_URL . 'emissor/login.php');
				}
			} else {
				$_SESSION['error'] = 'Senha não confere com a cadastrada no sistema! Favor verificar a senha.';
				header('Location: ' . BASE_URL . 'emissor/login.php');
			}
		} else {
			$_SESSION['error'] = 'Empresa desativada! Contate a Prefeitura.';
			header('Location: ' . BASE_URL . 'emissor/login.php');
		}
	} else {
		$_SESSION['error'] = 'CPF/CNPJ ou Código não cadastrado no sistema! Favor verificar usuário.';
		header('Location: ' . BASE_URL . 'emissor/login.php');
	}
} else {
	$_SESSION['error'] = 'Favor verificar código de segurança!';
	header('Location: ' . BASE_URL . 'emissor/login.php');
}
?>