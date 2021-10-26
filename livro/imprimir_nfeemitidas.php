<?php
$sql_cabecalho = $PDO->query(" 
				 SELECT
  				 cadastro.razaosocial, 
				 cadastro.cnpj, 
				 cadastro.cpf,
  				 cadastro.inscrmunicipal, 
				 cadastro.logo,
				 livro.periodo,
			     livro.obs, 
				 DATE_FORMAT(livro.geracao, '%d/%m/%Y') as geracao
				 FROM cadastro			 
				 INNER JOIN livro ON livro.codcadastro = cadastro.codigo
				 WHERE livro.codigo = $livro"); 

$cabecalho = $sql_cabecalho->fetchObject();

$sql_notas = $PDO->query("
	SELECT 
  	`livro`.`codigo`, DATE_FORMAT(`notas`.`datahoraemissao`, '%d/%m/%Y') as datahoraemissao, `notas`.`numero`, `notas`.`codigo`,`notas`.`estado`, `notas`.`tomador_cnpjcpf`, 
  	`notas`.`tomador_inscrmunicipal`,`servicos`.`codservico`, `notas`.`basecalculo`, `notas`.`valortotal`,`notas`.`valoriss`, 
  	`notas`.`issretido`
	 FROM
	 		`notas` 
	 INNER JOIN 
	 		 notas_servicos ON notas.codigo = notas_servicos.codnota
	 INNER JOIN
	 		`livro_notas` ON `notas`.`codigo` = `livro_notas`.`codnota` INNER JOIN `livro` ON `livro_notas`.`codlivro` = `livro`.`codigo`
	 INNER JOIN
  	`servicos` ON `servicos`.`codigo` = `notas_servicos`.`codservico`
	 WHERE`livro`.`codigo` = $livro and livro_notas.tipo = 'E' GROUP BY notas.codigo
	 ORDER BY `notas`.`datahoraemissao`
");	

?>

<style type="text/css">
<!--

#divCabecalhoEmitidas {
	margin-top:2px;
	margin-bottom:1px;
}
#divPrincipalEmitidas {
	page-break-before:always;
	margin-bottom:100px;

}
-->
</style>
</head>

<body>
<div id="divPrincipalEmitidas" style="page-break-after:always;page-break-before:always;">
	<div id="divCabecalhoEmitidas">
<table border="0" cellpadding="5" cellspacing="0" style="margin: 0 auto;">
  <tr>
    <td width="150" rowspan="4" align="center"><?php echo $livro->codcadastro;?> <?php if($cabecalho->logo==NULL) {echo 'sem imagem';} else {echo "<img src=\"../img/logos/$cabecalho->logo\" width=\"120\" height=\"120\" />";}; ?> </td>
	
    <td width="800" colspan="4" align="center" class="titulo1">REGISTRO E APURAÇÃO DO ISS </td>
    <td width="150" rowspan="4" align="center"><?php if($CONF_BRASAO ==NULL) {echo 'sem imagem';} else {echo "<img src=\"../img/brasoes/$CONF_BRASAO\" width=\"120\" height=\"120\"/>";}; ?>   </td>
  </tr>
  <tr>
    <td width="150" class="field1">Contribuinte:</td>
    <td colspan="3" class="field1"><?php echo $cabecalho->razaosocial; ?></td>
    </tr>
  <tr>
    <td class="field1">CNPJ/CPF:</td>
    <td width="250"><?php echo $cabecalho->cnpj.$cabecalho->cpf; ?></td>
    <td width="150" class="field1">Período:</td>
    <td width="250">
			<?php
			$periodof = substr($cabecalho->periodo,5,2); 
			$periodof = $periodof."/".substr($cabecalho->periodo,0,4);
			echo $periodof; ?>
	</td>
    </tr>
  <tr>
    <td class="field1">Inscr. Municipal: </td>
    <td colspan="3" class="field1"><?php echo $cabecalho->inscrmunicipal; ?> </td>
    </tr>
  <tr>
    <td class="field1">Observações:</td>
    <td colspan="5"><?php echo $cabecalho->obs; ?></td>
    </tr>
  <tr>
    <td class="field1">Data da Geração: </td>
    <td colspan="5"><?php echo $cabecalho->geracao; ?></td>
    </tr>
</table>
	
	
	
	</div>
	<?php
    if($sql_notas->rowCount()>0){
    ?>
	<div id="divIssEmitidas">
<table width="1100" border="0" cellpadding="5" cellspacing="0" style="margin: 0 auto;">
  <tr>
    <td colspan="12" align="center" class="titulo1">NOTAS FISCAIS ELETR&Ocirc;NICAS EMITIDAS </td>
    </tr>
  <tr>
    <td colspan="3" align="center" class="field2">NFEletrônica</td>
    <td colspan="2" align="center" class="field2">Tomador</td>
    <td colspan="3" align="center" class="field2">Serviços</td>
    <td colspan="2" align="center" class="field2">Imposto Próprio </td>
    <td colspan="2" align="center" class="field2">Imposto Retido </td>
  </tr>
  <tr align="center">
    <td width="5%">Data</td>
    <td width="3%">Número</td>
    <td width="3%">Estado</td>
    <td width="12%">CNPJ/CPF</td>
    <td width="12%">Inscr. Municipal </td>
    <td width="6%">Cód. Serviço </td>
    <td width="6%">Valor Serviços </td>
    <td width="6%">Valor Líquido </td>
    <td width="10%">Base Cálculo </td>
    <td width="6%">Valor ISS </td>
    <td width="12%">Base Cálculo </td>
    <td width="17%">Valor ISS </td>
  </tr>
<?php while($notas = $sql_notas->fetchObject()) { ?>
  <tr>
    <td class="field3" align="center"><?php echo $notas->datahoraemissao; ?> </td>
    <td class="field3" align="center"><?php echo $notas->numero; ?></td>
    <td class="field3" align="center"><?php if($notas->estado == 'N') {echo 'Normal';} 
								elseif($notas->estado=='E') {echo 'Escriturada';}
								elseif($notas->estado == 'B' ){echo 'Boleto';} 
									elseif($notas->estado=='C'){echo 'Cancelada';} 
										else{echo 'Erro';} ;?></td>
    <td class="field3" align="center"><?php echo $notas->tomador_cnpjcpf; ?></td>
    <td class="field3" align="center"><?php echo $notas->tomador_inscrmunicipal; ?></td>
    <td class="field3" align="center"><?php echo $notas->codservico ;?></td>
    <td class="field3" align="center"><?php echo DecToMoeda($notas->basecalculo); ?></td>
    <td class="field3" align="center"><?php echo DecToMoeda($notas->valortotal); ?> </td>
    <td class="field3" align="center"><?php echo DecToMoeda($notas->basecalculo); ?></td>
    <td class="field3" align="center"><?php echo DecToMoeda($notas->valoriss); ?></td>
    <td class="field3" align="center"><?php echo DecToMoeda($notas->basecalculo); ?></td>
    <td class="field3" align="center"><?php echo DecToMoeda($notas->issretido); ?></td>
  </tr>
<?php } // fecha while 


$sql_totais = $PDO->query("
SELECT
  `livro`.`codigo`, 
  Sum(`notas`.`basecalculo`) as basecalculo,
  Sum(`notas`.`valoriss`) as valoriss,
  Sum(`notas`.`issretido`) as issretido
FROM
  `notas` INNER JOIN
  `livro_notas` ON `notas`.`codigo` = `livro_notas`.`codnota` INNER JOIN
  `livro` ON `livro_notas`.`codlivro` = `livro`.`codigo`
WHERE
  `livro`.`codigo` = '$livro' AND
  `livro_notas`.`tipo` = 'E'
			  ");
			 	
		 
$totais= $sql_totais->fetchObject();


?> 
 
  
  <tr>
    <td colspan="8" align="right" class="field4">Total Geral </td>
    <td class="field4" align="center"><?php echo $totais->basecalculo; ?></td>
    <td class="field4" align="center"><?php echo $totais->valoriss; ?></td>
    <td class="field4" align="center"><?php echo $totais->basecalculo; ?></td>
    <td class="field4" align="center"><?php echo $totais->issretido; ?></td>
  </tr>
</table>
	
  </div>

<?php
}else{
	echo "<div id=\"divIssEmitidas\"><table width=\"1100\" style=\"margin:0 auto;\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\"><tr><td colspan=\"12\" align=\"center\" class=\"titulo1\">NENHUMA NOTA FISCAL ELETR&Ocirc;NICA EMITIDA </td></tr></table></div>";	
}
?>

</div>


