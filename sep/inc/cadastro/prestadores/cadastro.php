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
$sql_municipio=$PDO->query("SELECT cidade, estado FROM configuracoes");
$dados_municipio=$sql_municipio->fetch();

//Verifica se foi inserido alguma empresa nova, se for vai para o arquivo de inserção
 if(($_POST['btCadastrar'] =="Salvar")&&($_POST['hdAtualizar'] ==''))
 {   
   require_once("inserir.php");
 }
 if(($_POST['btCadastrar'] =="Salvar")&&($_POST['hdAtualizar']=='sim'))
 { 
 	require_once("editar.php"); 
 }
 if($_POST['btGerar'] == "Gerar senha"){
 	require_once("gera_senha.php");
 }
 if($_POST["btExcluir"]){
 	$CODIGO = $_POST['CODEMISSOR'];
	$PDO->query("UPDATE cadastro SET estado = 'I' WHERE codigo = '$CODIGO'");
	add_logs('Desativou um Prestador');
	Mensagem("Prestador desativado");
 }
?>
<script>
	function verificaRPA(obj,retorno){
		var nrocaracteres = obj.value.length;
		var elem = document.getElementById('cmbTipoDec');
		if(nrocaracteres == 14){
			document.getElementById('Simples Nacional').style.display = 'none';
			if(elem.options[elem.selectedIndex].value == "<?php echo codtipodeclaracao('Simples Nacional')?>"){
				elem.value = "";
			}
		}else{
			document.getElementById('Simples Nacional').style.display = 'block';
		}
	}
</script>
<!-- Formulário de inserção de empresa  -->
<style type="text/css">
<!--
#divBusca {
	position:absolute;
	left:30%;
	top:20%;
	width:298px;
	height:276px;
	z-index:1;
 visibility:<?php if(isset($btBuscarCliente)) { echo"visible"; }else{ echo"hidden"; }?>
}

/*Faz com que todos os inputs de texto so mostrem letras maiusculas*/
input[type*="text"]{
	text-transform:uppercase;
}
-->
</style>
<div id="divBusca"  >
	<?php require_once("inc/cadastro/prestadores/busca.php"); ?>
</div>
<?php	
	if(($_POST['CODEMISSOR'])){		   
		$codigo=$_POST['CODEMISSOR'];	
		$sql=$PDO->query("
						SELECT 
							codigo,
							codtipo,
							codtipodeclaracao,
							nome, 
							razaosocial,
							IF(cnpj <> '',cnpj,cpf) AS cnpjcpf,
							inscrmunicipal,
							inscrestadual,
							logradouro,
							numero, 
							complemento,
							bairro,
							fonecomercial,
							fonecelular,
							cep,
							municipio, 
							uf, 
							logo,
							email,
							ultimanota, 						
							notalimite,						
							estado, 
							codcontador,
							nfe,
							pispasep,
							datafim,
							datainicio,
                            isentoiss
						FROM 
							cadastro 					
						WHERE
							codigo='$codigo'
						");
		list($codigo,$codtipo,$codtipodec,$nome,$razaosocial,$cnpjcpf,$inscrmunicipal,$inscricaoestadual, $logradouro,$numero,$complemento,$bairro,$fone,$celular,$cep,$municipio,$uf,$logo,$email,$ultima,$notalimite,$estado,$codcontador,$nfe,$pispasep,$datafim,$datainicio,$isentoiss)= $sql->fetch();
		
		// verifica se o prestador é simples nacional
		$simples = coddeclaracao("Simples Nacional");
		if($simples == $codtipodec){
			$simples = true;
		}else{
			$simples = false;
		}
		
		//Busca os dados adcionais da tabela
		$codcargo_gerente = codcargo('Gerente');
		$codcargo_diretor = codcargo('Diretor');
		$sql_resp = $PDO->query("SELECT nome, cpf FROM cadastro_resp WHERE codemissor = '$codigo' AND 
		(codcargo = '$codcargo_gerente' OR codcargo = '$codcargo_diretor')");
		list($nome_responsavel,$cpf_responsavel) = $sql_resp->fetch();
		
		
		//Busca as informa��es que são extra para cada tipo de prestador
		$sql_info_instituicoes = $PDO->query("SELECT agencia, codbanco FROM inst_financeiras WHERE codcadastro = '$codigo'");
		list($agencia_inst,$codbanco_inst) = $sql_info_instituicoes->fetch();
		
		$sql_info_operadoras = $PDO->query("SELECT agencia, codbanco FROM operadoras_creditos WHERE codcadastro = '$codigo'");
		list($agencia_opr,$codbanco_opr) = $sql_info_operadoras->fetch();
		
		$sql_info_cartorios = $PDO->query("SELECT admpublica, nivel FROM cartorios WHERE codcadastro = '$codigo'");
		list($admpublica_cart,$nivel_cart) = $sql_info_cartorios->fetch();
		
	}

?>
<table border="0" cellspacing="0" cellpadding="0" class="form">
	<tr>
		<td width="18" align="left" background="img/form/cabecalho_fundo.jpg"><img src="img/form/cabecalho_icone.jpg" /></td>
		<td width="600" background="img/form/cabecalho_fundo.jpg" align="left" class="formCabecalho">Prestadores - Cadastro</td>
		<td width="19" align="right" valign="top" background="img/form/cabecalho_fundo.jpg"><a href=""><img src="img/form/cabecalho_btfechar.jpg" width="19" height="21" border="0" /></a></td>
	</tr>
	<tr>
	
	<td width="18" background="img/form/lateralesq.jpg"></td>
	<td align="center">
	
	<form  method="post" name="frmCadastroEmpresa" id="frmCadastroEmpresa">
		<input type="hidden" name="include" id="include" value="<?php echo $_POST['include'];?>" />
		<input type="hidden" name="hdAtualizar" id="hdAtualizar" value="<?php if($_POST['CODEMISSOR']){echo 'sim';}?>" />
		<?php if($_POST['CODEMISSOR']){?>
		<input type="hidden" name="CODEMISSOR" id="CODEMISSOR" value="<?php echo $_POST['CODEMISSOR']?>" />
		<?php }?>
		<fieldset>
		<legend>Prestadores Inserir</legend>
		<input type="hidden" name="btCadastrarEmpresa" value="Cadastrar" />
		<table border="0" align="center" id="tblEmpresa">
        	<? if($codigo){ ?>
                <tr>
                    <td align="left"  style="text-indent:5px">Cód Cadastro<font color="#FF0000">*</font></td>
                    <td colspan="3">
					  <input type="text" size="15" style="background-color:#CCCCCC;" maxlength="100" name="txtInsCodCadastro" id="txtInsCodCadastro" readonly="readonly" class="texto" value="<?php echo $codigo; ?>">		
                    </td>
                </tr>
            <?php
            }
			?>	
			<tr>
				<td align="left"  style="text-indent:5px">Tipo<font color="#FF0000">*</font></td>
				<td colspan="3">
					<select name="cmbCodtipo" id="cmbCodtipo" class="combo" onchange="alternaCampos('cmbCodtipo')">
						<option value=""></option>
						<?php
							$sql_codtipo = $PDO->query("SELECT codigo, tipo, nome FROM tipo WHERE (tipo = 'prestador' OR tipo = 'tomador' OR tipo = 'contador') ORDER BY nome");
							while(list($codigo_tipo,$tipo,$nome_tipo) = $sql_codtipo->fetch()){
								echo "<option value=\"$codigo_tipo|$tipo\"";if($codigo_tipo == $codtipo){ echo "selected = selected";}echo ">$nome_tipo</option>";
							}
						?>
					</select>
				</td>
			</tr>            
			<tr>
				<td align="left" style="text-indent:5px"> Nome<font color="#FF0000">*</font> </td>
				<td colspan="3" align="left">
					<input type="text" size="70" maxlength="100" name="txtInsNomeEmpresa" id="txtInsNomeEmpresa" class="texto" value="<?php echo $nome; ?>"
					 >				</td>
			</tr>
			<tr>
                            <td align="left" style="text-indent:5px"> Razão Social<font color="#FF0000">*</font> </td>
				<td colspan="3" align="left">
					<input type="text" size="70" maxlength="100" name="txtInsRazaoSocial" id="txtInsRazaoSocial" class="texto" value="<?php if(isset($razaosocial)){echo $razaosocial;} ?>"
					>				</td>
			</tr>
            <tr>
                <td align="left" style="text-indent:5px"> Inscr. Estadual</td>
				<td colspan="3" align="left">
					<input type="text" size="70" maxlength="100" name="txtInsInscEstadualEmpresa" id="txtInsInscEstadualEmpresa" class="texto" value="<?php if(isset($inscricaoestadual)){echo $inscricaoestadual;} ?>"
					>				</td>
			</tr>
			<!-- alterna input cpf/cnpj-->
			<tr>
				<td align="left" width="95" style="text-indent:5px"> CNPJ/CPF<font color="#FF0000">*</font> </td>
				<td align="left" width="150">
					<input  id="txtInsCpfCnpjEmpresa" type="text" size="20"  name="txtInsCpfCnpjEmpresa" class="texto" onkeydown="return NumbersOnly( event );" onkeyup="CNPJCPFMsk( this );" 
					value="<?php if(isset($cnpjcpf)){echo $cnpjcpf;} ?>" onblur="verificaRPA(this,'tdTipoDec')" />				</td>
			    <td align="left" width="120">Insc. Municipal</td>
			    <td align="left" width="150">
					<input type="text" size="23" maxlength="30" name="txtInsInscMunicipalEmpresa" class="texto" value="<?php if(isset($inscrmunicipal)){echo $inscrmunicipal;} ?>" 
					/>				</td>
			</tr>
			<!-- alterna input cpf/cnpj FIM-->
			<tr>
				<td align="left" style="text-indent:5px"> Logradouro<font color="#FF0000">*</font> </td>
				<td colspan="3" align="left">
					<input type="text" size="70" maxlength="90" name="txtInsEnderecoEmpresa" id="txtInsEnderecoEmpresa" class="texto" 
					value="<?php if(isset($logradouro)){echo $logradouro;} ?>" />				</td>
			</tr>
			<tr>
				<td align="left" style="text-indent:5px"> Numero<font color="#FF0000">*</font> </td>
				<td align="left">
					<input type="text" size="20" maxlength="20" name="txtNumero" id="txtNumero" class="texto" value="<?php if(isset($numero)){echo $numero;} ?>" /></td>
				<td align="left">Complemento:</td>
                
                <td align="left">
                    <input type="text" size="23" maxlength="100" name="txtComplemento" id="txtComplemento" class="texto" 
                    value="<?php if(isset($complemento)){echo $complemento;} ?>" />				
                </td>
                
			</tr>
            <tr>
                <td align="left" style="text-indent:5px">Bairro:<font color="#FF0000">*</font></td>
                <td align="left">
					<input type="text" size="20" maxlength="100" name="txtBairro" id="txtBairro" class="texto" value="<?php if(isset($bairro)){echo $bairro;} ?>"
					  /></td>
                
                <td align="left">CEP:<font color="#FF0000">*
                </font></td>
                <td align="left"><font color="#FF0000">
                  <input type="text" size="23" maxlength="9" name="txtCEP" id="txtCEP" class="texto" value="<?php if(isset($cep)){echo $cep;} ?>" />
                </font></td>
                
            </tr>
            <tr>
                <td align="left" style="text-indent:5px">Telefone <br />Comercial<font color="#FF0000">*</font></td>
                <td align="left">
					<input type="text" class="texto" size="20" maxlength="15" name="txtFoneComercial" id="txtFoneComercial"
				     value="<?php if(isset($fone)){echo $fone;} ?>"/></td>
                 <td align="left">Telefone Celular</td>
                <td align="left"><input type="text" class="texto" size="23" maxlength="15" name="txtFoneCelular" id="txtFoneCelular" value="<?php if(isset($celular)){echo $celular;} ?>" /></td>
            </tr>
            <tr>
            <td align="left" style="text-indent:5px">Data inicio<font color="#FF0000">*</font> </td>
             
             <td align="left">
					<input type="text" class="texto"size="12" maxlength="10" name="txtDtInicio" id="txtDtInicio"  value="<?php if(isset($datainicio)){echo DataPt($datainicio);} ?>" onkeyup="MaskData(this)" /></td>

                <td align="left" style="text-indent:5px">Data de<br />Encerramento</td>
                <td align="left"><input type="text" class="texto" size="12" maxlength="10" name="txtDataFim" id="txtDataFim" value="<?php if(isset($datafim)){echo DataPt($datafim);} ?>" onkeyup="MaskData(this)" /></td>
                
               
            </tr>
			<tr>
				<td colspan="4">
					
					<!-- Tabela institui��o e operadoras -->
					
					<table width="100%" border="0" cellspacing="1" cellpadding="2" align="left" id="tbl_inst_opr" style="display:none; margin:0px">
						<?php
							require_once("inc/cadastro/prestadores/cadastro/cadastro_inst_opr.php");
						?>
					</table>
					
					<!-- Tabela C�rtorios -->
					
					<table width="100%" border="0" cellspacing="1" cellpadding="2" align="left" id="tbl_cart" style="display:none; margin:0px">
						<?php
							require_once("inc/cadastro/prestadores/cadastro/cadastro_cart.php");
						?>
					</table>				
					
				</td>
			</tr>			
			<tr>
				<td align="left" style="text-indent:5px">UF<font color="#FF0000">*</font></td>
				<td align="left">
					<!--ESTE SELECT ESTA COM A NOMENCLATTURA DE UM TEXT PARA MANTER A COMPATIBILIDADE DO ARQUIVO INSERIR.PHP COM TODOS OS ARQUIVOS DE CADASTRO DE EMPRESAS-->
					<?php
						if(!$uf){
							$uf_teste = $dados_municipio['estado'];
						}else{
							$uf_teste = $uf;
						}
					?>
					<select name="txtInsUfEmpresa" id="txtInsUfEmpresa" onchange="buscaCidades(this,'txtInsMunicipioEmpresa')">
						<option value=""></option>
						<?php
							$sql=$PDO->query("SELECT uf FROM municipios GROUP BY uf ORDER BY uf");
							while(list($uf_busca)=$sql->fetch()){
								echo "<option value=\"$uf_busca\"";if($uf_busca == $uf_teste){ echo "selected=selected"; }echo ">$uf_busca</option>";
							}
						?>
					</select>
				</td>
				<td>PIS/PASEP</td>
				<td colspan="2"><input name="txtPISPASEP" class="texto" type="text" maxlength="20" value="<?php echo $pispasep;?>" /></td>
			</tr>
			<tr>
                            <td align="left" style="text-indent:5px">Município<font color="#FF0000">*</font></td>
				<td colspan="3" align="left">
					<div  id="txtInsMunicipioEmpresa">
						<select name="txtInsMunicipioEmpresa" id="txtInsMunicipioEmpresa" class="combo">
							<?php
								$sql_municipio = $PDO->query("SELECT nome FROM municipios WHERE uf = '$uf_teste'");
								if(!isset($municipio)){
									while(list($nome_municipio) = $sql_municipio->fetch()){
										echo "<option value=\"$nome_municipio\"";if((strtolower($nome_municipio) == strtolower($dados_municipio['cidade'])) || (strtolower($nome_municipio) == strtolower($municipio))){ echo "selected=selected";} echo ">$nome_municipio</option>";
									}//fim while
								}else{
									while(list($nome_municipio) = $sql_municipio->fetch()){
										echo "<option value=\"$nome_municipio\"";if( (strtolower($nome_municipio) == strtolower($municipio)) ){ echo "selected=selected";} echo ">$nome_municipio</option>";
									}//fim while
								}
							?>
						</select>
					</div>				</td>
			</tr>
			<tr>
				<td align="left" style="text-indent:5px"> Email<font color="#FF0000">*</font> </td>
				<td colspan="3" align="left">
					<input type="text" size="30" maxlength="100" name="txtInsEmailEmpresa" id="txtInsEmailEmpresa" class="texto" value="<?php if(isset($email)){echo $email;} ?>"
					 style="text-transform:none" />
					<em>Informar somente 01 (um) e-mail</em>
				</td>
			</tr>
			<?php if($_POST['CODEMISSOR']){?>
			<tr>
				<td align="left"></td>
				<td align="left" colspan="3">
					<input name="btGerar" value="Gerar senha" class="botao" type="submit" <?php if(!$email){ echo "disabled=\"disabled\"";}?> /><?php if(!$email){?><b>É necessario ter um e-mail para gerar a senha</b><?php }?>
				</td>
			</tr>
			<?php }?>
			<tr>
                            <td align="left" style="text-indent:5px">Tipo de <br />declaração<font color="#FF0000">*</font></td>
				<td align="left" id="tdTipoDec">
					<select name="cmbTipoDec" id="cmbTipoDec" class="combo">
						<option value=""></option>
						<?php
							$sql_tipodec = $PDO->query("SELECT codigo, declaracao FROM declaracoes");
							while(list($codigo_dec,$declaracoes) = $sql_tipodec->fetch()){
								echo "<option value=\"$codigo_dec\"";if($codigo_dec == $codtipodec){ echo "selected = selected";} echo " id=\"$declaracoes\">$declaracoes</option>";
							}
						?>
					</select>				
                </td>
                <td align="left">NFe Número</td>
                <td align="left">
                    <?php
                        $sqlValidaNumNota = $PDO->query("SELECT COUNT(codigo) FROM notas WHERE codemissor = '$codigo'");
                        list($validaNumNota) = $sqlValidaNumNota->fetch();
                        if($validaNumNota > 0){
                            $readOnly = "readonly='readonly'";
                        }else{
                            $readOnly = "";
                        }
                    ?>
                    <input type="text" class="texto" name="txtNfeNum" id="txtNfeNum" size="8" 
                    value="<?php echo ($ultima+1); ?>"S onkeydown="return NumbersOnly(event);" />
                </td>
			</tr>
			<tr>
				<td align="left" style="text-indent:5px">NFe</td>
				<td colspan="3" align="left">
                    <label for="txtNfe"><input type="checkbox" value="S"  name="txtNfe" id="txtNfe" <?php if(($nfe == 'S') || ($nfe == "s")){echo "checked=\"checked\"";} ?>/>
					<em>Esta empresa emite Nota Fiscal eletrônica</em></label>
                </td>
			</tr>
            <tr>
                <td align="left" style="text-indent:5px">Isento</td>
                <td colspan="3" align="left">
                    <label for="chkIsentoIss">
                        <input type="checkbox" value="S" name="chkIsentoIss" id="chkIsentoIss" <?php if(($isentoiss == 'S')||($isentoiss == 's')){echo "checked=\"checked\""; } ?> />
                        <i>Esta empresa é isenta de ISS</i>
                    </label>
                </td>
            </tr>
			<?php if($_POST['CODEMISSOR']){?>
			<tr>
				<td align="left" style="text-indent:5px">Estado</td>
				<td colspan="3" align="left">
					<input type="radio" name="rgEstado" value="A" id="rgEstado_0"  <?php if($estado =='A'){echo "checked=\"checked\"";} ?> />
					Ativo
					<input type="radio" name="rgEstado" value="I" id="rgEstado_1" <?php if($estado =='I'){echo "checked=\"checked\"";} ?>/>
					Inativo
                </td>
			</tr>
			<?php }?>
			<tr>
				<td colspan="4" align="left"></td>
			</tr>
			<tr>
				<td colspan="4" align="left">
				</td>
			</tr>
		</table>
		<table id="bigtable" width="100%">
			<tr>
				<td>
					<table width="500" border="0" cellspacing="1" cellpadding="2" align="left">
						<?php
				if(($_POST['CODEMISSOR'])){
					$COD = $_POST['CODEMISSOR'];	   	
					$sql=$PDO->query("SELECT codigo, nome, cpf FROM cadastro_resp WHERE codemissor = '$COD' AND codcargo <> '$codcargo_gerente' AND codcargo <> '$codcargo_diretor'");
					$contsocios = $sql->rowCount();
					$cont_aux_socios = $contsocios;	  
					print("<tr>
							  <td colspan=4 align=left>
							   <b>Responsável/Sócio</b>
							  </td>
							 </tr>
							");
					while(list($CodigoSocio,$nomesocio,$cpfsocio)=$sql->fetch())
					{
						print("	    
						<tr>
						   <td align=left colspan=4>
							<input type=hidden name=txtCodigoSocio$contsocios value=$CodigoSocio>
							Nome <input type=text name=txtnomesocio$contsocios value=\"$nomesocio\" size=40 maxlength=100 class=texto>
							CPF<input type=text name=txtcpfsocio$contsocios value='$cpfsocio' size=14 maxlength=14 class=texto 
							onkeyup=\"CNPJCPFMsk( this );\">");
							print("<input type=checkbox name=checkExcluiSocio$contsocios value=$CodigoSocio>Excluir"); 				
						print("</td>		   
						</tr> ");
						$contsocios--;		  
				  } 
				}	?>
					</table>				</td>
			</tr>
			<tr>
				<td colspan="4" align="left">
					<!-- bot�o que chama a função JS e mostra + um s�cio-->
					<input type="button" value="Adicionar Responsável/Sócio" name="btAddSocio" class="botao" onclick="incluirSocio()" />
					<font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td colspan="4" align="center">
					<!--CAMPO S�CIOS --------------------------------------------------------------------------->
					<table width="100%" border="0" cellspacing="1" cellpadding="2">
						<?php require_once("socios.php")?>
					</table>
					<!-- CAMPO S�CIOS FIM -->				</td>
			</tr>
			<tr>
				<td colspan="4" align="left">
				<?php if($_POST['CODEMISSOR'])		
			{ ?>
				<table width="100%" border="0" cellspacing="1" cellpadding="2" id="tblServicos">
					<tr>
						<td align="left" colspan="4">
                                                    <b>Serviços</b> <br />						</td>					
						<td></td>
					</tr>
					<!---------------- LISTAGEM DOS SERVICOS A SEREM EDITADOS ------------------------------------------------------->
					<?php
					  $COD = $_POST['CODEMISSOR'];
					  $sql_servicos=$PDO->query("
					  SELECT cadastro_servicos.codigo,servicos.codigo,servicos.codservico,servicos.descricao,servicos.aliquota, servicos.codcategoria 
					  FROM servicos
					  INNER JOIN cadastro_servicos ON servicos.codigo = cadastro_servicos.codservico
					  WHERE cadastro_servicos.codemissor = '$COD'");
					  
					 $contservicos = $sql_servicos->rowCount();
					 $cont_aux_servicos = $contservicos;
					 $numservicos = $contservicos;
					 ?>
					<?php while(list($codigo_empresas_servicos,$codigo,$codservico,$descricao,$aliquota,$CodCateg)=$sql_servicos->fetch())
					  {
						print("	 
						 <tr>	
						   <td align=left >
							 <input type=hidden value=$codigo_empresas_servicos name=servico$contservicos >	
							 <select name=cmbEditaServico$contservicos style=width:400px;>
							   <option value=$codigo>$codservico | $descricao | $aliquota</option>");	
							   	$sql_all_servicos=$PDO->query("SELECT codigo,codservico,descricao,aliquota FROM servicos WHERE estado= 'A' AND codcategoria = '$CodCateg'");
							  while(list($CODigo,$CODservico,$Descricao,$Aliquota)=$sql_all_servicos->fetch())			    
							  {
							   if ($codigo != $CODigo)
							   {
								print("<option value=$CODigo>$CODservico |$Descricao | $Aliquota</option>");
							   }
							  }	
						print("</select>");
							   print("<input type=checkbox name=checkExcluiServico$contservicos value=$codigo>Excluir");
					  print("</td>		  	  
						  </tr> ");
						$contservicos--;  
					  } ?>
				</table>
			<?php } ?>		</td></tr>
			
			<tr id="trBotao">
				<td colspan="4" align="left">
					<!-- bot�o que chama a função JS e mostra + um serviço-->
                                        <input type="button" value="Adicionar Serviços" name="btAddServicos" class="botao" onclick="incluirServico()" />
					<font color="#FF0000">*</font></td>
			</tr>
			<tr id="trCombos">
				<td colspan="4" align="center">
					<!--CAMPO SERVICOS -->
					<table width="100%" border="0" cellspacing="1" cellpadding="2">
						<?php require_once("servicos.php")?>
					</table>
					<!-- CAMPO SERVICOS FIM -->				</td>
			</tr>
            <tr>
                <td colspan="4" align="right"><strong><font color="#FF0000">*</font> Campos Obrigatórios</strong></td>
         	</tr>
		</table>
		</fieldset>
		<fieldset style="vertical-align:middle; text-align:left">
		<?php
			//O valor das variaveis mudam conforme a situacao, se for insercao sera onclick 1 que verifica responsavel e servicos se nao onclick 2
			$string_onclick1 = "return  (ValidaFormulario('txtInsNomeEmpresa|txtInsRazaoSocial|txtInsCpfCnpjEmpresa|txtInsEnderecoEmpresa|txtNumero|txtBairro|txtCEP|txtFoneComercial|txtInsUfEmpresa|txtInsMunicipioEmpresa|txtInsEmailEmpresa|cmbTipoDec|cmbCodtipo|txtNomeSocio1|txtCpfSocio1|cmbCategoria1'));";
			$string_onclick2 = "return  (ValidaFormulario('txtInsNomeEmpresa|txtInsRazaoSocial|txtInsCpfCnpjEmpresa|txtInsEnderecoEmpresa|txtNumero|txtBairro|txtCEP|txtFoneComercial|txtInsUfEmpresa|txtInsMunicipioEmpresa|txtInsEmailEmpresa|cmbTipoDec|cmbCodtipo'));";		
		?>
		<input type="button" value="Novo" name="btNovo" class="botao" onclick="LimpaCampos('frmCadastroEmpresa')"  />
		<input type="button" value="Pesquisar" name="btPesquisar" class="botao" onclick="document.getElementById('divBusca').style.visibility='visible'" />
		<input type="submit" value="Excluir" name="btExcluir" class="botao" onclick="return confirm('Deseja desativar este prestador?');" />
		<input type="submit" value="Salvar" name="btCadastrar" class="botao" id="btCadastrar" 
		onclick="<?php if(($_POST['CODEMISSOR'])){ echo $string_onclick2; }else{ echo $string_onclick1; } ?>" />
		<?php if($_POST['CODEMISSOR']){?>
        <input type="submit" value="Imprimir" name="btImprimir" class="botao"
            onclick="cancelaAction(this.form.id,'inc/cadastro/prestadores/imprime_cadastro.php','_blank')" />
        
        <?php
			}
		?>
        <!--<input type="button" class="botao" name="btImprimir" id="btImprimir" value="Imprimir" onclick="window.open('inc/cadastro/prestadores/imprime_cadastro.php')" />-->
		</fieldset>
		<input type="hidden" name="hdTemporario" id="hdTemporario" />
		<input type="hidden" name="hdPadrao_onclick" id="hdPadrao_onclick" value="<?php echo $string_onclick2; ?>" />
	</form>	</td>
	<td width="19" background="img/form/lateraldir.jpg"></td>
	</tr>
	<tr>
		<td align="left" background="img/form/rodape_fundo.jpg"><img src="img/form/rodape_cantoesq.jpg" /></td>
		<td background="img/form/rodape_fundo.jpg"></td>
		<td align="right" background="img/form/rodape_fundo.jpg"><img src="img/form/rodape_cantodir.jpg" /></td>
	</tr>
</table>
<!-- Formulário de inserção de serviços Fim-->
<script>
	if(document.getElementById('cmbCodtipo')){
		alternaCampos('cmbCodtipo');
	}	
</script>