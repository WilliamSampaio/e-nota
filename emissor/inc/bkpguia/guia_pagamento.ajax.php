<?php
session_name('emissor');
session_start();
require_once("../conect.php");
require_once("../../funcoes/util.php");
require_once("../nocache.php");

$ano=$_GET["cmbAno"];
$mes=$_GET["cmbMes"];
if($mes<10){ $mes="0".$mes; }

$codcadastro=$_SESSION["codempresa"];
$hoje=date("Y-m-d");

try
{
	$sql=$PDO->query("
		SELECT codigo, valorisstotal, geracao, periodo, vencimento 
		FROM livro 
		WHERE SUBSTRING(periodo,1,4)='$ano' AND SUBSTRING(periodo,6,2)='$mes' AND valoriss > 0 AND codcadastro='$codcadastro' AND estado='N'");
}
catch(PDOException $e)
{
	echo 'Erro: ' . $e->getMessage();
}

if($sql->rowCount()>0){ ?>
<script>
function GeraGuia($codguia){
	var guia = document.getElementById('hdGuia').value;
	if (confirm('Deseja criar a guia de pagamento para esta competencia?')) {
		document.getElementById('hdCodGuia').value = guia;
		document.getElementById('frmGuia').submit();
	} else
		return false;
}
</script>

<form method="post" id="frmGuia">	
    <input type="hidden" name="btBuscar" value="Buscar" />
    <input type="hidden" name="cmbAno" id="cmbAno" value="<?php echo $ano; ?>" />
    <input type="hidden" name="cmbMes" id="cmbMes" value="<?php echo $mes; ?>" />
    <input type="hidden" name="txtEmissor" value="<?php echo $codcadastro;?>" />
			<table border="0" width="100%">
				<tr bgcolor="#999999">
					<td align="center">Data Declaração</td>
					<td align="center">Competêcia</td>
                    <td align="center">Vencimento</td>
                    <td align="center">Multa</td>
					<td align="center">Valor</td>															
					<td align="center" width="100">Ações</td>
			    </tr>
			    <?php
				while(list($codigo,$total,$data,$competencia,$vencimento)=$sql->fetch()){
				
				$dataInicio=DataPt($vencimento);
				$dataFim=DataPt($hoje);
				
				$dias = diasDecorridos($dataInicio, $dataFim);
				
				$multa = calculaMultaDes($dias, $total);				
					?>
                    	<input type="hidden" name="hdGuia" id="hdGuia" value="<?php echo $codigo; ?>" />
						<tr bgcolor="#FFFFEA">
							<td align="center"><?php echo DataPt($data); ?></td>
							<td align="center"><?php echo DataPt($competencia); ?></td>
                            <td align="center"><?php echo DataPt($vencimento); ?></td>
                            <td align="center"><?php echo DecToMoeda($multa); ?></td>
							<td align="center"><?php echo DecToMoeda($total); ?></td>
							<td align="center"><input type="hidden" class="texto" name="txtMultaJuros<?php echo $codigo ?>" id="txtMultaJuros<?php echo $codigo ?>" value="0" readonly="readonly" ><input type="submit" class="botao" value="Gerar Boleto" name="btBoleto" id="btBoleto" onClick="return GeraGuia(<?php echo $codigo; ?>);"/></td>
						</tr>
					<?php
				}//fim while
				?>
			</table>
		</form>	
		</td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#CCCCCC"></td>
	</tr>    
</table>
<?php
}else{
	echo "Nenhum Resultado Encontrado!";
}