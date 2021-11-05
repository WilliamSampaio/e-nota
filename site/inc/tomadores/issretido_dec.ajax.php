 <br />
 <?php

	require_once '../../../autoload.php';

	$cnpj = $_GET['cnpj'];
	$ano  = $_GET['cmbAno'];
	$mes  = $_GET['cmbMes'];

	$sql = $PDO->query("
        SELECT 
 			cadastro.nome,
            cadastro.cpf,
            cadastro.cnpj,
			notas.codigo,
            notas.numero,
            notas.valortotal,
            notas.issretido,
			notas.codemissor,
			notas.estado
        FROM
            notas
        INNER JOIN
            cadastro ON cadastro.codigo = notas.codemissor
        WHERE
            notas.tomador_cnpjcpf = '$cnpj' AND 
			notas.issretido > 0 AND 
			notas.estado != 'E' AND
			MONTH(notas.datahoraemissao) = '$mes' AND 
			YEAR(notas.datahoraemissao) = '$ano'
    ");

	if ($sql->rowCount()) {

	?>

 	<table class="table">
 		<thead>
 			<tr>
 				<th colspan="5" style="text-align: center;">Dados dos Emissores</th>
 			</tr>
 			<tr>
 				<th style="text-align: left;"> Emissor </th>
 				<th style="text-align: center;"> Número Nota </th>
 				<th style="text-align: center;"> Valor Nota </th>
 				<th style="text-align: center;"> ISS Retido </th>
 				<td style="text-align: center;"></td>
 			</tr>
 		</thead>
 		<tbody>
 			<?php

				while (list($cad_nome, $cad_cpf, $cad_cnpj, $codigo, $numero, $valortotal, $issretido, $codemissor, $estadonota) = $sql->fetch()) {

					$cad_cnpjcpf = $cad_cpf . $cad_cnpj;

					$excluida_cancelada = ($estadonota == "E") || ($estadonota == "C");
					
					if ($excluida_cancelada) {
						$class = "class='alert-danger'";
						$display_btn = "style='display: none;'";
					} else {
						$class = "";
						$display_btn = "";
					}

				?>

 				<tr style="vertical-align: middle;" <?php echo $class ?>>
 					<td style="text-align: left;"><?php echo $cad_cnpjcpf . ' - ' . strtoupper($cad_nome) ?></td>
 					<td style="text-align: center;"><?php echo $numero ?></td>
 					<td style="text-align: center;"><?php echo DecToMoeda($valortotal) ?></td>
 					<td style="text-align: center;"><?php echo DecToMoeda($issretido) ?></td>
 					<td style="text-align: center;"><input name="btGerarGuia" type="submit" value="Guia" class="btn btn-success" onclick="document.getElementById('hdCodigoGuia').value='<?php echo $codigo ?>'" <?php echo $display_btn ?>></td>
 				</tr>

 			<?php } ?>

 		</tbody>
 		<input name="hdCodigoGuia" id="hdCodigoGuia" type="hidden" />
 	</table>
 <?php
	} else {
		echo "<div class='alert alert-danger'><p>Não há declarações de serviços tomados!</p></div>";
	}
	?>
 </br>
 </br>