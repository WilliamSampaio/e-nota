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
// inicia a sessão verificando se jah esta com o usuario logado, se estiver entra na página admin
session_name("contador");
session_start();

require_once '../autoload.php';

if(!(isset($_SESSION["empresa"])))
{   
	echo "
		<script>
			alert('Acesso Negado!');
			window.location='login.php';
		</script>
	";
}else{
  require_once DIR_CONTADOR . 'include/header.php';
?>

<body>
  <?php require_once DIR_CONTADOR . 'include/navbar.php'; ?>
  <div id="content" class="container bg-light">
      <div class="row align-items-start">
          <!-- MENU -->
          <div class="col-md-3">
              <?php require_once("include/menu.php");?>
          </div>
          <div class="col-md">
              <br>
              <h1>Utilitários</h1>
              <hr>
              <?php require_once("inc/utilitarios_principal.php"); ?>
          </div>
      </div>
      <br>
  </div>
  <?php require_once("include/footer.php"); ?>
  <script src="../scripts/padrao.js" language="javascript" type="text/javascript"></script>
  <script src="../scripts/java_site.js" language="javascript" type="text/javascript"></script>
  <script src="../scripts/java_emissor_contador.js" language="javascript" type="text/javascript"></script>
</body>
<?php }?>
