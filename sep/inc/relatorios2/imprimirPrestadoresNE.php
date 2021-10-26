<?php
	if($mes>=1 and $mes<=12) //Se algum mes tiver sido selecionado
		$where = "WHERE datahoraemissao LIKE '___%-$mes-%__'";
	else
		$where = "";
		
	$query = ("
		SELECT
			cadastro.razaosocial,
			cadastro.cnpj,
			cadastro.cpf,
			cadastro.municipio,
			cadastro.uf,
			cadastro.nome,
			cadastro.codigo,
			cadastro.codtipo,
			cadastro.codtipodeclaracao,
			cadastro.isentoiss,
			cadastro.codtipodeclaracao,
			notas.codemissor,
			notas.datahoraemissao,
			declaracoes.declaracao,
			COUNT(codemissor) as totalnotasemitidas
		FROM 
			cadastro
		LEFT JOIN 
			declaracoes 
		ON
			declaracoes.codigo = cadastro.codtipodeclaracao
		INNER JOIN 
			notas 
		ON
			cadastro.codigo = notas.codemissor
		$where
		GROUP BY
			codemissor
		ORDER BY 
			totalnotasemitidas DESC
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
				echo "<center><b>Foram encontrados 10  Resultados</b></center>";
			else
				echo "<center><b>Foram encontrados $result  Resultados</b></center>";
		?>
	</tr>
	
	<tr style="background-color:#999999; font-weight:bold" align="center">
		<td>Razão Social</td>
		<td>CPF/CNPJ</td>
		<td>Declaração</td>
		<td>Isento</td>
		<td>Município</td>
	</tr>


<?php
$x = 0;
while($dados_pesquisa = $sql_pesquisa->fetch() and $x<10){
	if($dados_pesquisa['isentoiss'] == "S")
		$dados_pesquisa['isentoiss'] = "Sim";
	else
		$dados_pesquisa['isentoiss'] = "Não";
?>
	<tr>
		<td><?php echo $dados_pesquisa['razaosocial'];?></td>
		<td><?php echo $dados_pesquisa['cnpj'].$dados_pesquisa['cpf'];?></td>
		<td><?php echo $dados_pesquisa['declaracao'];?></td>
		<td><?php echo $dados_pesquisa['isentoiss'];?></td>
		<td><?php echo $dados_pesquisa['municipio']."/".$dados_pesquisa['uf'];?></td>
	</tr>
<?php
$x++;
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