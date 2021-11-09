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
//require_once "../../autoload.php";

	if($btSolicitar!="")
		{
			$codigoempresa = $_POST['cmbEmpresa'];
			$notaempresa=$PDO->query("SELECT ultimanota, notalimite FROM cadastro WHERE codigo = '$codigoempresa'");
			list($ultimanota,$notalimite)=$notaempresa->fetch();
			$sql_aidfe=$PDO->query("SELECT codigo FROM aidfe_solicitacoes WHERE solicitante = '$codigoempresa'");
			$numero_de_solicitacoes = $sql_aidfe->rowCount();
			if($numero_de_solicitacoes>0){
				Mensagem('Sua solicitação já foi enviada a prefeitura.');
				Redireciona('aidf.php');
			}else{
				if($notalimite==0){
					$PDO->query("INSERT INTO aidfe_solicitacoes SET solicitante = '$codigoempresa'");
					Mensagem('Uma solicitaç&aring;o de aumento de AIDF foi enviada à prefeitura!');
					add_logs('Solicitou um aumento no AIDF');
					Redireciona('aidf.php');
				}else{
					Mensagem('Uma solicitaç&aring;o de aumento de AIDF foi enviada à prefeitura!');
					Redireciona('aidf.php');	
				}
			}
		}
	$sql=$PDO->query("SELECT ultimanota, notalimite, razaosocial FROM cadastro WHERE codigo = '$CODIGO_DA_EMPRESA'");
	list($ultimanota,$notalimite,$razaocontador)=$sql->fetch();
	if($notalimite==0){$notalimite="Liberado";}
	$sqlempresas=$PDO->query("SELECT ultimanota, notalimite, razaosocial FROM cadastro WHERE codcontador = '$CODIGO_DA_EMPRESA'");
?>

<form method="post">
        <div align="left" width="100%">
        	<div>
            	<td colspan="2">
                <?php echo "Razão Social: ".$razaocontador; ?>
                </td>
			</div>
            <div align="left" >
                <td width="50%">Número da última nota emitida:</td>
                <td width="50%"><?php echo $ultimanota; ?></td>
			</div>
            <div align="left" >
                <td>Nota limite / AIDF:</td>
                <td><?php echo $notalimite; ?></td>
			</div>
		</div>
        <?php
		if($sqlempresas->rowCount()>0){
			while(list($ultimanotaemp,$notalimiteemp,$razaocontadoremp)=$sqlempresas->fetch()){
				if($notalimiteemp==0){
					$notalimiteemp="Liberado";
				}
				?>
					<div align="left" width="100%">
						<div>
							<td colspan="2">
							<?php echo "Razão Social: ".$razaocontador; ?>
							</td>
						</div>
						<div align="left" >
							<td width="50%">Número da última nota emitida:</td>
							<td width="50%"><?php echo $ultimanota; ?></td>
						</div>	
						<div align="left" >
							<td>Nota limite / AIDF:</td>
							<td><?php echo $notalimite; ?></td>
						</div>
					</div>
				<?php
			}
		}
	        if($notalimite != "Liberado"){
    	    $sqlcontadores=$PDO->query("SELECT codigo, razaosocial,contadornfe FROM cadastro WHERE codcontador='$CODIGO_DA_EMPRESA' AND contadornfe = 'S'");?>	
        		<table align="center" width="100%">
					<tr>
                        <td align="left" width="25%">Solicitante de Aidf-e:</td>
                        <td align="left">
                            <select name="cmbEmpresa" id="cmbEmpresa">
                                <option value="<?php echo $CODIGO_DA_EMPRESA; ?>"><?php echo $razaocontador; ?></option>
									<?php
                                        if($sqlcontadores->rowCount()>0){
                                            while(list($codigo,$razaosocial,$Nfe)= $sqlcontadores->fetch()){
                                                echo "<option value=\"$codigo\">$razaosocial </option>";
                                            }
                                        }
                                    ?>
                            </select>
                        </td>
					</tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btSolicitar" value="Solicitar mais notas" class="botao" 
                        </td>
					</tr>
        		</table>
        <?php } ?>
		</td>
	</tr>

	<tr>
    	<td height="1" colspan="3" ></td>
	</tr>
</table>   
</form>	

