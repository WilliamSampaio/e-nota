<?php
	if($mes>=1 and $mes<=12) //Se algum mes tiver sido selecionado
		$where = "WHERE datahoraemissao LIKE '___%-$mes-%__'";
	else
		$where = "";
	//Seleciona os serviços das notas emitidas
	$query = ("
		SELECT 
			servicos.codigo,
			servicos.descricao
		FROM
			servicos
		INNER JOIN
			notas_servicos
		ON
			notas_servicos.codservico = servicos.codigo
		INNER JOIN
			notas
		ON
			notas_servicos.codnota = notas.codigo
		$where
		GROUP BY 
			servicos.codigo
		ORDER BY
			servicos.descricao
	");
	
	$sql_pesquisa = $PDO->query($query);
	$result = mysql_num_rows($sql_pesquisa);
	
	if($result){ //Se existir algum registro, mostra na tabela
?>

<!-- In�cio da Tabela -->
	<?php
	while($dados_pesquisa = $sql_pesquisa->fetch()){
		if(strlen($dados_pesquisa['descricao']) > 85)
			$desc = ResumeString($dados_pesquisa['descricao'],85);
		else
			$desc = $dados_pesquisa['descricao'];
		
		$codservico = ($dados_pesquisa['codigo']);
		//Seleciona os prestadores que prestaram os serviços que sairam na nota
		$query_prestador =("
			SELECT
				cadastro.nome,
				cadastro.municipio,
				cadastro.uf
			FROM 
				notas_servicos
			INNER JOIN
				notas
			ON
				notas_servicos.codnota = notas.codigo
			INNER JOIN
				cadastro
			ON
				notas.codemissor = cadastro.codigo
			WHERE 
				codservico=$codservico
			GROUP BY 
				notas.codemissor
		");
		$sql_prestador = $PDO->query($query_prestador);
		$result_prestador = mysql_num_rows($sql_prestador);
	?>
<table width="95%" class="tabela" border="1" cellspacing="0" align="center">
	<tr style="background-color:#999999">
		<?php
			if($result_prestador == 1)
				echo "<center><b>Foi encontrado $result_prestador  Resultado</b></center>";
			else
				echo "<center><b>Foram encontrados $result_prestador  Resultados</b></center>";
		?>
	</tr>
	
	<tr style="font-weight:bold;" align="center">
		<td colspan="3"><?php echo $desc; ?></td>
	</tr>
	<tr style="background-color:#999999;font-weight:bold;">
		<td width="500">Empresa</td>
		<td width="250">Município</td>
		<td>Uf</td>
	</tr>
	<?php
		while($dados_prestador = $sql_prestador->fetch()){ //enquanto receber prestadores, exibe seu nome
	?>
	<tr>
		<td><?php echo $dados_prestador['nome']; ?></td>
		<td><?php echo $dados_prestador['municipio']; ?></td>
		<td><?php echo $dados_prestador['uf']; ?></td>
	</tr>
	<?php
		}//Fim o while($dados_prestador = $sql_prestador))
	?>
</table>
<br />
	<?php
	}//Fim do while($dados_pesquisa = $sql_pesquisa))
?>
<!-- Fim da Tabela -->


<?php
}else{ //Se if(mysql_num_rows($sql_pesquisa)) der falso
?>
<table width="95%" class="tabela" border="1" cellspacing="0" align="center">
	<tr style="background-color:#999999;font-weight:bold;" align="center">
		<td>Não há resultados!</td>
	</tr>
</table>
<?php
}
?>
