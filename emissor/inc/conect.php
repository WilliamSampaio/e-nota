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
require_once dirname(__FILE__).'/../../include/config.php';

// Conectar ao banco de dados das prefeituras
// $conectar_pref = mysql_connect($HOST,$USUARIO, $SENHA); 
// if (!$conectar_pref) { die('N&atilde;o foi poss&iacute;vel conectar: ' . mysql_error()); } 

// Seleciona o banco de dados
// $db_selected_pref = mysql_select_db($BANCO, $conectar_pref);
// if (!$db_selected_pref) {die ('N&atilde;o foi poss&iacute;vel acessar a base: ' . mysql_error());}
/*
if($dadospref!=true){
	//mysql_close($conectar);
}
*/
//SELECIONA O CODIGO DA EMPRESA

  try {
    $PDO = new PDO('mysql:host=' . $DB_HOST . ';dbname=' . $DB_DATABASE, $DB_USERNAME, $DB_PASSWORD);
  } catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
  }

 if($_SESSION['login'] != "")
 {
  $NOME = $_SESSION['nome'];
  $CODIGO = $_SESSION['codempresa'];
  $sql_codigo_empresa = $PDO->query("SELECT codigo, ultimanota,municipio,uf,logradouro,numero FROM cadastro WHERE nome = '$NOME' AND codigo = '$CODIGO'");
  list($CODIGO_DA_EMPRESA,$ULTIMA_NOTA,$MUNICIPIO_DA_EMPRESA,$ESTADO_DA_EMPRESA,$ENDERECO_DA_EMPRESA,$NUMERO_DA_EMPRESA) = $sql_codigo_empresa->fetch();
  
  $sql_dadosprefeitura = $PDO->query("SELECT cidade, estado, cnpj, endereco, topo_nfe, brasao_nfe, secretaria, codintegracao FROM configuracoes");
  list($NOME_MUNICIPIO,$UF_MUNICIPIO,$CNPJ_MUNICIPIO,$ENDERECO_DA_PREFEITURA,$TOPO,$BRASAO,$SECRETARIA,$CODINTEGRACAO)=$sql_dadosprefeitura->fetch();
  
  if($CODINTEGRACAO!=0){
  	$sql_integracao=$PDO->query("SELECT empresa,diretorio FROM integracao WHERE codigo=$CODINTEGRACAO");
	list($EMPRESAINTEGRACAO,$DIRETORIOINTEGRACAO)=$sql_integracao->fetch();
  }
  
 }



?>
