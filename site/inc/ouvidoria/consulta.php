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

<h2>Consulta de Reclamações</h2>
<hr><br>

<form method="post">

	<input type="hidden" name="txtMenu" value="<?php echo $_POST['txtMenu']; ?>">

	<div class="row g-3 align-items-center">
		<div class="col-auto">
			<label for="txtCpfCnpjTomador" class="col-form-label">CPF/CNPJ do Tomador</label>
		</div>
		<div class="col-auto">
			<input class="form-control" type="text" name="txtCpfCnpjTomador" id="txtCpfCnpjTomador" onkeydown="stopMsk( event );" onkeypress="return NumbersOnly( event );" onkeyup="CNPJCPFMsk( this );" class="texto">
		</div>
		<div class="col-auto">
			<input type="submit" name="btConsultar" value="Consultar" class="btn btn-primary">
		</div>
	</div>

</form>
<br>

<?php 

if ($_POST['btConsultar'] != "") {
	$sql = $PDO->query("SELECT rps_numero,datareclamacao,estado FROM reclamacoes WHERE  tomador_cnpj='" . $_POST['txtCpfCnpjTomador'] . "'");
	$verifica = $sql->rowCount();

	if ($verifica > 0) {

?>

<table class="table">
	<thead>
		<tr>
			<th scope="col">Número RPS</th>
			<th scope="col">Data da reclamação</th>
			<th scope="col">Estado da reclamação</th>
		</tr>
	</thead>
  	<tbody>

  	<?php
	  	
	while (list($numerorps, $data, $estado) = $sql->fetch()) {
		$data = implode("/", array_reverse(explode("-", $data))); 
		
	?>

		<tr>
			<td><?php echo $numerorps; ?></td>
			<td><?php echo $data; ?></td>
			<td><?php echo $estado; ?></td>
		</tr>
	
	<?php
		}
	?>

  	</tbody>
</table>

<?php
	} else { 
?>

<div class="alert alert-danger" role="alert">
	<p>Reclamações não encontradas! Verifique os dados.</p>
</div>

<?php
		}
	}
?>