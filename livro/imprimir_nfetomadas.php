<?php
// busca livro
$sql_topo = $PDO->query("
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

$topo = $sql_topo->fetchObject();

$sql_notas = $PDO->query("
			 SELECT
				 DATE_FORMAT(`notas_tomadas`.`data`, '%d/%m/%Y') as datahoraemissao, 
				`notas_tomadas`.`numero`, `notas_tomadas`.`estado`, `cadastro`.`razaosocial`, `cadastro`.`cnpj`,
				`cadastro`.`cpf`, `cadastro`.`inscrmunicipal`, `servicos`.`descricao`, `notas_tomadas`.`total`,
				`notas_tomadas`.`iss`, `notas_tomadas`.`issretido`, `livro_notas`.`tipo`
				 FROM			 
				`cadastro` 
			
			
			INNER JOIN
  				`livro` ON `cadastro`.`codigo` = `livro`.`codcadastro`
				
			INNER JOIN
  				`livro_notas` ON `livro`.`codigo` = `livro_notas`.`codlivro` 	
			
				
			INNER JOIN
  				`notas_tomadas` ON `notas_tomadas`.`codigo` = `livro_notas`.`codnota` 
				
			INNER JOIN 
	 		 	notas_tomadas_servicos ON notas_tomadas.codigo = notas_tomadas_servicos.codnota_tomada	
				
			INNER JOIN
  				`servicos` ON `servicos`.`codigo` = `notas_tomadas_servicos`.`codservico`
				
			WHERE
  			`livro`.`codigo` = $livro AND
  			`livro_notas`.`tipo` = 'T' 
			
			
			 ");		






?>

<style type="text/css">

#divPrincipalTomadas {
		margin-bottom:100px;
	
}
</style>

<div id="divPrincipalTomadas" >
	<div id="divCabecalhoTomadas">
<table border="0" cellpadding="5" cellspacing="0" style="margin:0 auto;">
  <tr>
    <td width="150" rowspan="4" align="center"><?php echo $livro->codcadastro; ?><?php if(!$topo->topo){echo 'sem imagem';} else{echo "<img src=../img/logos/$topo->logo width=\"120\" height=\"120\"/>";}; ?></td>
    <td width="800" colspan="4" align="center" class="titulo1">REGISTRO E APURAÇÃO DO ISS </td>
    <td width="150" rowspan="4" align="center"><?php if($CONF_BRASAO ==NULL) {echo 'sem imagem';} else {echo "<img src=../img/brasoes/$CONF_BRASAO width=\"120\" height=\"120\"/>";} ?></td>
  </tr>
  <tr>
    <td width="150" class="field1">Contribuinte:</td>
    <td colspan="3" class="field1"><?php echo $topo->razaosocial; ?></td>
    </tr>
  <tr>
    <td class="field1">CNPJ/CPF:</td>
    <td width="250"><?php echo $topo->cnpj.$topo->cpf; ?></td>
    <td width="150" class="field1">Período:</td>
    <td width="250"><?php
			$periodof = substr($topo->periodo,5,2); 
			$periodof = $periodof."/".substr($topo->periodo,0,4);
			echo $periodof; ?></td>
    </tr>
  <tr>
    <td class="field1">Inscr. Municipal: </td>
    <td colspan="3" class="field1"><?php echo $topo->inscrmunicipal; ?></td>
    </tr>
  <tr>
    <td class="field1">Observações:</td>
    <td colspan="5"><?php echo $topo->obs; ?></td>
    </tr>
  <tr>
    <td class="field1">Data da Geração: </td>
    <td colspan="5"><?php echo $topo->geracao; ?></td>
    </tr>
</table>
	
	
	
	</div>
	<?php
    if($sql_notas->rowCount()>0){
    ?>    
	<div id="divIssTomadas">
<table width="1100" border="0" cellpadding="5" cellspacing="0" style="margin:0 auto;">
  <tr>
    <td colspan="11" align="center" class="titulo1">NOTAS FISCAIS ELETR&Ocirc;NICAS TOMADAS </td>
    </tr>
  <tr>
    <td colspan="3"  width="30%" align="center" class="field2">NFEletrônica</td>
    <td colspan="3" width="20%" align="center" class="field2">Prestador Emissor </td>
    <td colspan="5" align="center" class="field2">Serviços</td>
    </tr>
  <tr align="center">
    <td width="4%">Data</td>
    <td width="6%">Número</td>
    <td width="8%">Canc.</td>
    <td width="7%">CNPJ/CPF</td>
    <td width="15%">Inscr. Municipal </td>
    <td width="15%">Nome</td>
    <td width="20%" colspan="2">Atividade Operacional </td>
    <td>Valor Serviços </td>
    <td width="15%">ISS Próprio </td>
    <td width="10%">ISS Retido </td>
  </tr>
<?php while($notas = $sql_notas->fetchObject()) { ?>
  <tr>
    <td align="center" class="field3"><?php echo $notas->datahoraemissao; ?> </td>   
    <td align="center" class="field3"><?php echo $notas->numero; ?> </td>
    <td align="center" class="field3"><?php if($notas->estado == 'N'){echo 'Normal';}
										elseif($notas->estado=='E') {echo 'Escriturada';}
										elseif($notas->estado == 'B' ){echo 'Boleto';} 
										elseif($notas->estado=='C'){echo 'Cancelada';} 
										else{echo 'Erro';} ;?> </td>
    <td align="center" class="field3"><?php echo $notas->cnpj; ?></td>
    <td align="center" class="field3"><?php echo $notas->inscrmunicipal; ?> </td>
    <td align="center" class="field3"><?php echo $notas->razaosocial; ?> </td>
    <td colspan="2" align="center" class="field3"><?php echo $notas->descricao; ?> </td>
    <td align="center" class="field3"><?php echo $notas->total; ?></td>
    <td align="center" class="field3"><?php echo $notas->iss; ?></td>
	<td align="center" class="field3"><?php echo $notas->issretido; ?></td>   
</tr>
 
<?php } // fecha while 

$sql_totais = $PDO->query("
SELECT
 `livro`.`codigo`, 
  Sum(`notas_tomadas`.`total`) as basecalculo,
  Sum(`notas_tomadas`.`iss`) as valoriss,
  Sum(`notas_tomadas`.`issretido`) as issretido
FROM
  `notas_tomadas` INNER JOIN
  `livro_notas` ON `notas_tomadas`.`codigo` = `livro_notas`.`codnota` INNER JOIN
  `livro` ON `livro_notas`.`codlivro` = `livro`.`codigo`
WHERE
  `livro`.`codigo` = '$livro' AND
  `livro_notas`.`tipo` = 'T'
			  ");
			 	
		 
$totais= $sql_totais->fetchObject(); 


?> 
  
  <tr>
    <td colspan="8" align="right" class="field4"><strong>Total Geral</strong></td>
	<td width="20%" align="center" class="field4"><?php echo $totais->basecalculo; ?></td>
	<td class="field4" align="center"><?php echo $totais->valoriss;?></td>
	<td class="field4" align="center"><?php echo $totais->issretido; ?></td>
  </tr>
</table>
	
  </div>
<?php
}else{
	echo "<div id=\"divIssTomadas\"><table style=\"margin:0 auto;\" width=\"1100\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\"><tr><td colspan=\"12\" align=\"center\" class=\"titulo1\">NENHUMA NOTA FISCAL ELETR&Ocirc;NICA TOMADA </td></tr></table></div>";	
}
?>

</div>


