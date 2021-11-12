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
// inicia a sess�o verificando se jah esta com o usuario logado, se estiver entra na p�gina admin
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
	
	require_once "include/header.php";
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
                <h1>Importar RPS</h1>
                <h5>Baixar o modelo e utilizar como RPS</h5>
                <hr>
				<table border="0" align="center" cellpadding="0" cellspacing="1">
					<tr>
						<td width="10" height="10" bgcolor="#FFFFFF"></td>
						<td width="200" align="center" bgcolor="#FFFFFF" rowspan="3">Defina o Emissor do Arquivo RPS</td>
						<td width="400" bgcolor="#FFFFFF"></td>
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
						<td colspan="3" height="1" bgcolor="#CCCCCC">
							<?php // $sql_lista_empresas = mysql_$PDO -> query("SELECT codigo, razaosocial, cnpj, cpf FROM cadastro WHERE codcontador = '$CODIGO_DA_EMPRESA' AND contadorrps = 'S'");			
								$sql_logado = $PDO -> query("
									SELECT 
										codigo,
										razaosocial,
										cnpj,
										cpf
									FROM
										cadastro
									WHERE
										codigo = '$CODIGO_DA_EMPRESA'
								");
								$empresa = $sql_logado->fetchObject();
								$cnpjcpf = $empresa->cnpj.$empresa->cpf;
							?>
							<select name="cmbEmissor" class="combo" style="width:270px;">
							<option value="<?php echo $empresa->codigo;?>">
								<?php echo $empresa->razaosocial." - ".$cnpjcpf;?>
							</option>
							<?php $sql_lista_empresas->$PDO -> query("SELECT codigo, razaosocial, cnpj, cpf FROM cadastro WHERE codcontador = '$CODIGO_DA_EMPRESA' AND contadorrps = 'S'");
									while($listaEmpresa = $sql_lista_empresas->fetch()){
										$cnpjcpf = $listaEmpresa->cnpj.$listaEmpresa->cpf;
										echo "<option value=\"{$listaEmpresa->codigo}\">{$listaEmpresa->razaosocial} - {$cnpjcpf}</option>";
									}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td height="60" colspan="3" bgcolor="#CCCCCC">
							<table width="100%">
								<tr>
									<td align="left">Selecione o emissor: 
										&nbsp;
									<input name="btOK" type="submit" class="botao" value="Selecionar" />						
									</td>
								</tr>
								<tr>
									<td><font color="#FF0000"><strong></strong></font>
										<?php
										if($_POST['btOK']){
											$codEmpresaDefinida = $_POST['cmbEmissor'];
											$sql_empresa_definida -> $PDO -> query("SELECT razaosocial FROM cadastro WHERE codigo = '$codEmpresaDefinida'");
											list($razaosocial) = $sql_empresa_definida->fetch();
											echo "Empresa definida: <font color=\"#FF0000\"><strong>$razaosocial</strong></font>";
										}
										?>						
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td height="1" colspan="3" bgcolor="#CCCCCC"></td>
					</tr>
				</table>
				<?php 
					if($_POST['btOK'] == "Selecionar"){
						include("inc/importar_principal.php"); 
					}
				?>	
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



<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>e-Nota</title><script src="../scripts/padrao.js" language="javascript" type="text/javascript"></script>
<script src="../scripts/java_emissor_contador.js" language="javascript" type="text/javascript"></script>
<!-- <?php // include("scripts/java.php")?> -->
<!-- <link href="../css/padrao_emissor.css" rel="stylesheet" type="text/css" />
</head> --> -->

