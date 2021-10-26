<?php
	if($mes>=1 and $mes<=12) //Se algum mes tiver sido selecionado
		$where = "WHERE datahoraemissao LIKE '___%-$mes-%__'";
	else
		$where = "";
		
	$query =("
		SELECT
			cadastro.nome,
			cadastro.cpf,
			cadastro.cnpj,
			COUNT(codemissor) as totalnotas,
			SUM(issretido) as issretido,
			SUM(valoriss) as issarrecadado
		FROM 
			notas
		INNER JOIN 
			cadastro 
		ON
			cadastro.codigo = notas.codemissor
		$where
		GROUP BY
			codemissor
	");
	
	$sql_pesquisa = $PDO->query($query);
	$result = mysql_num_rows($sql_pesquisa); //Pega quantos resultados voltaram
	
	if($result){ //Se existir algum registro, mostra na tabela
?>
			
<!-- Início da Tabela -->
<table width="95%" class="tabela" border="1" cellspacing="0" style="page-break-after: always" align="center">
	<tr style="background-color:#999999">
		<?php
			if($result <= 1)
				echo "<center><b>Foi encontrado $result  Resultado</b></center>";
			else if($result >= 10)
				echo "<center><b>Foram encontrados $result  Resultados</b></center>";
			else
				echo "<center><b>Foram encontrados $result  Resultados</b></center>";
		?>
	</tr>
	
	<tr style="background-color:#999999; font-weight:bold" align="center">
		<td>Prestador</td>
		<td>CPF/CNPJ</td>
		<td>Nº de Notas</td>
		<td>Iss Retido</td>
		<td>Iss Arrecadado</td>
	</tr>


<?php
while($dados_pesquisa = $sql_pesquisa->fetch()){
?>
	<tr>
		<td><?php echo $dados_pesquisa['nome'];?></td>
		<td width="140" align="center"><?php echo $dados_pesquisa['cnpj'].$dados_pesquisa['cpf'];?></td>
		<td width="100" align="center"><?php echo $dados_pesquisa['totalnotas'];?></td>
		<td width="100" align="center"><?php echo 'R$ '.$dados_pesquisa['issretido'];?></td>
		<td width="120" align="center"><?php echo 'R$ '.$dados_pesquisa['issarrecadado'];?></td>
	</tr>
<?php
}//Fim do while($dados_pesquisa = $sql_pesquisa))
?>
</table>
<!-- Fim da Tabela -->

<?php
}else{ //Se if(mysql_num_rows($sql_pesquisa)) der falso
?>
<table width="95%" class="tabela" border="1" cellspacing="0" style="page-break-after: always" align="center">
	<tr style="background-color:#999999;font-weight:bold;" align="center">
		<td>Não há resultados!</td>
	</tr>
</table>
<?php
}
?>