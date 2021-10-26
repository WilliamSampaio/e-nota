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
<!-- Formulário de insercao de tomadores  --> 
<style type="text/css">
<!--
#divBuscaOrgaos {
	position:absolute;
	left:40%;
	top:20%;
	width:298px;
	height:276px;
	z-index:1;
	visibility:<?php if(isset($btBuscarCliente)){ echo"visible";}else{ echo"hidden";} ?>
}
-->
</style>
<div id="divBuscaOrgaos" ><?php require_once("inc/orgaospublicos/visualizar.php"); ?></div>
<?php
		// busca a cidade e o estado do banco
		$sqlestadocidade=$PDO->query("SELECT cidade, estado FROM configuracoes");
		list($CIDADE,$ESTADO)=$sqlestadocidade->fetch();
			
		if($_POST["CODORGAOPUBLICO"])
			{
				$codigo=$_POST["CODORGAOPUBLICO"];
				
				$sqlorgao=$PDO->query("SELECT nome, razaosocial, cnpj, endereco, municipio, uf, email, telefone, telefone_adicional, responsavel_nome, responsavel_cpf, diretor_nome, diretor_cpf, admpublica, nivel, estado FROM orgaospublicos WHERE codigo=$codigo");
				
				list($nome, $razaosocial, $cnpj, $endereco, $municipio, $uf,  $email, $telefone, $telefone_adicional, $responsavel_nome,  
				$responsavel_cpf, $diretor_nome, $diretor_cpf, $admpublica, $nivel, $estado) = $sqlorgao->fetch();
				
				switch($admpublica){
				case "D": $admpublica ="Direta"; break;
				case "I": $admpublica ="Indireta"; break;
				}
				
				switch($nivel){
				case "M": $nivel ="Municipal"; break;
				case "E": $nivel ="Estadual"; break;
				case "F": $nivel ="Federal"; break;
				}
			}
?>
<table border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCCC">
  <tr>
    <td width="18" align="left" background="img/form/cabecalho_fundo.jpg"><img src="img/form/cabecalho_icone.jpg" /></td>
    <td width="750" background="img/form/cabecalho_fundo.jpg" align="left" class="formCabecalho">Órgãos Públicos - Cadastro</td>  
    <td width="19" align="right" valign="top" background="img/form/cabecalho_fundo.jpg"><a href=""><img src="img/form/cabecalho_btfechar.jpg" width="19" height="21" border="0" /></a></td>
  </tr>
  <tr>
    <td width="18" background="img/form/lateralesq.jpg"></td>
    <td align="left">
			<form method="post" name="frmCadastroOrgao" id="frmCadastroOrgao">
			<input type="hidden" name="include" id="include" value="<?php echo  $_POST['include'];?>" />
				<fieldset><legend>Dados do Órgão Público</legend>
					<table width="100%">
						<tr>
							<td align="left" width="150"><font color="#FF0000">*</font> Nome</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtNome" id="txtNome" type="text" class="texto" size="60" maxlength="60"  value="<?php echo $nome; ?>"></td>
						</tr>
						<tr>
							<td align="left"><font color="#FF0000">*</font>Razão Social </td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtRazaoSocial" id="txtRazaoSocial" type="text" class="texto" size="60" maxlength="60"  value="<?php echo $razaosocial; ?>"></td>
						</tr>
						<tr>
							<td align="left"><font color="#FF0000">*</font>CNPJ </td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtCnpj" id="txtCnpj" type="text" onkeydown="return NumbersOnly( event );" onkeyup="CNPJCPFMsk( this );" class="texto" size="18" maxlength="18"  value="<?php echo $cnpj; ?>"></td>
						</tr>
						<tr>
							<td align="left"><font color="#FF0000">*</font> Endereço</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtEndereco" id="txtEndereco" type="text" class="texto" size="40" maxlength="40"  value="<?php echo $endereco; ?>"></td>
						</tr>
						<tr>
							<td align="left"><font color="#FF0000">*</font> Telefone Comercial</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> type="text" class="texto" size="20" maxlength="15" name="txtFoneComercial"  value="<?php echo $telefone; ?>" /></td>
						</tr>
						<tr>
							<td align="left">Telefone Adicional</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> type="text" class="texto" size="20" maxlength="15" name="txtFoneAdicional"  value="<?php echo $telefone_adicional; ?>" /></td>
						</tr>
								<tr align="left">
									<td><font color="#FF0000">*</font> Munic�pio:</td><td></td>
									<td colspan="2"><input type="text" class="texto" size="40" name="txtInsMunicipioOrgao" <?php if($codigo){ echo "value=\"$municipio\" readonly=\"true\"";} else { echo "value=\"$CIDADE\"";}?>/></td>
								</tr>
								<tr align="left">
									<td><font color="#FF0000">*</font> UF:</td><td></td>
									<td colspan="2"><input type="text" class="texto" size="40" name="txtUfOrgao" <?php if($codigo){ echo "value=\"$uf\" readonly=\"true\"";} else { echo "value=\"$ESTADO\"";}?>/></td>
								</tr>
						<tr>
							<td><font color="#FF0000">*</font> Administra��o P�blica</td><td></td>
							<td>
								<?php if ($codigo) echo "<input type=\"text\" readonly=\"true\" class=\"texto\" size=\"40\" maxlength=\"15\" value=\"$admpublica\" />";?>
								<select <?php if($codigo) echo "style=\"visibility:hidden\"" ?> name="cmbAdmPublica" id="cmbAdmPublica">
									<option value="D">Direta</option>
									<option value="I">Indireta</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><font color="#FF0000">*</font> N�vel</td><td></td>
							<td>
								<?php if ($codigo) echo "<input type=\"text\" readonly=\"true\" class=\"texto\" size=\"40\" maxlength=\"15\" value=\"$nivel\" />";?>
								<select <?php if($codigo) echo "style=\"visibility:hidden\"" ?> name="cmbNivel" id="cmbNivel">
									<option value="E">Estadual</option>
									<option value="F">Federal</option>									
									<option value="M">Municipal</option>
								</select>
							</td>
						</tr>
						<tr>
							<td align="left"><font color="#FF0000">*</font> E-mail</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtEmail" type="text" class="texto" size="30" maxlength="100"  value="<?php echo $email; ?>"><em> Informar somente 01(um) e-mail</em></td>
						</tr>
					</table>
				</fieldset>
				<fieldset><legend>Dados do Diretor</legend>
				<table width="100%">
						<tr>
							<td align="left" width="150"><font color="#FF0000">*</font> Nome</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtNomeDiretor" id="txtNomeDiretor" type="text" class="texto" size="40" maxlength="40" value="<?php echo $diretor_nome; ?>"></td>
						</tr>
						<tr>
							<td align="left"><font color="#FF0000">*</font> Cpf</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtCpfDiretor" id="txtCpfDiretor" type="text" onkeydown="return NumbersOnly( event );" onkeyup="CNPJCPFMsk( this );" class="texto" size="18" maxlength="18" value="<?php echo $diretor_cpf; ?>"></td>
						</tr>
				</table>
				</fieldset>
				<fieldset><legend>Dados do Responsável</legend>
				<table width="100%">
						<tr>
							<td align="left" width="150"><font color="#FF0000">*</font> Nome</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtNomeResponsavel" id="txtNomeResponsavel" type="text" class="texto" size="40" maxlength="40" value="<?php echo $responsavel_nome; ?>"></td>
						</tr>
						<tr>
							<td align="left"><font color="#FF0000">*</font> Cpf</td><td></td>
							<td align="left"><input <?php if($codigo) echo "readonly=\"true\""; ?> name="txtCpfResponsavel" id="txtCpfResponsavel" type="text" onkeydown="return NumbersOnly( event );" onkeyup="CNPJCPFMsk( this );" class="texto" size="18" maxlength="18" value="<?php echo $responsavel_cpf; ?>"></td>
						</tr>
						<tr align="right"><td colspan="3"><font color="#FF0000">* Campos Obrigat�rios</font></td></tr>
			
                </table>
				</fieldset>
					                
				<fieldset><legend>Ações</legend>
				<table>
				<tr>
				<td>
				<input type="button" value="Buscar" name="btAcao" class="botao" onclick="document.getElementById('divBuscaOrgaos').style.visibility='visible'" />
				<?php if ($codigo) echo "<input type=\"submit\" class=\"botao\" value=\"Voltar\" onclick=\"LimpaCampos('frmCadastroInst');Redireciona('cadastro.php');\" />";
				if($codigo){
				echo "<input type=\"hidden\" name=\"hdDesativar\" id=\"hdDesativar\" value=\"$codigo\"/>";
					if($estado == "A"){
						echo "<input type=\"submit\" class=\"botao\" name=\"btDesativar\" id=\"btDesativar\" value=\"Desativar �rg�o\" />";
					}
					elseif($estado == "I"){
					echo "<input type=\"submit\" class=\"botao\" name=\"btAtivar\" id=\"btAtivar\" value=\"Ativar �rg�o\" />";
					}
				}
				?>
				</td>
				<td>			
				<?php
				if ($codigo) echo "<input type=\"submit\" class=\"botao\" name=\"btExcluir\" id=\"btExcluir\" value=\"Excluir �rg�o\" onclick=\"return Confirma('Deseja Excluir �rg�o P�blico?');\" />";
				?>
				</td>
				<td>
				<input <?php if($codigo) echo "style=\"visibility:hidden\""; ?> type="submit" value="Cadastrar"  name="btCadastrar" class="botao">
				</td>
				</tr>
				</table>
                </form>
                <table>
                <tr>
                <td>
 				<?php
				if ($codigo) { echo "<form id=\"frmComprovante\" target=\"_blank\" action=\"inc/orgaospublicos/comprovante.php\" method=\"post\">
					<input type=\"hidden\" name=\"hdCnpj\" id=\"hdCnpj\" value=\"$cnpj\" />
					<input type=\"submit\" name=\"btComprovante\" value=\"Comprovante\" class=\"botao\"/>
				</form>";}?>
                </td>
                </tr>
                </table>
				</fieldset>
                
				<div id="divOrgaos"></div>
			</form>										
	</td>
	<td width="19" background="img/form/lateraldir.jpg"></td>
  </tr>
  <tr>
    <td align="left" background="img/form/rodape_fundo.jpg"><img src="img/form/rodape_cantoesq.jpg" /></td>
    <td background="img/form/rodape_fundo.jpg"></td>
    <td align="right" background="img/form/rodape_fundo.jpg"><img src="img/form/rodape_cantodir.jpg" /></td>
  </tr>
</table>

			<?php
	 			if($_POST["btCadastrar"] == "Cadastrar"){
				if(($txtNome == "") || ($txtRazaoSocial == "") || ($txtCnpj == "") || ($txtEndereco == "") ||  ($txtFoneComercial == "") || ($txtUfOrgao == "") || ($txtInsMunicipioOrgao == "") || ($cmbAdmPublica == "") || ($cmbNivel == "") || ($txtEmail == "") || ($txtNomeDiretor == "") || ($txtCpfDiretor == "") || ($txtNomeResponsavel == "") || ($txtCpfResponsavel == ""))
				{
					Mensagem('Preencher Todos os Dados que Possuem *');
				}
				else
				{
				require_once("inc/orgaospublicos/inserir.php");
				}		
				}
				
				if($_POST['btDesativar'])
				{
				 $codigo=$_POST['hdDesativar'];
				 $PDO->query("UPDATE orgaospublicos SET estado = 'I' WHERE codigo=$codigo");
				 Mensagem("�rg�o P�blico desativado!");
				 ?><script>LimpaCampos('frmCadastroOrgao');</script><?php
				}
				
				if($_POST['btAtivar'])
				{
				 $codigo=$_POST['hdDesativar'];
				 $PDO->query("UPDATE orgaospublicos SET estado = 'A' WHERE codigo='$codigo'");
				 Mensagem("�rg�o P�blico ativado!");
				 ?><script>LimpaCampos('frmCadastroOrgao');</script><?php
				}
				
				if($_POST['btExcluir'])
				{
			 	 $codigo=$_POST["hdDesativar"];
				 $PDO->query("DELETE FROM orgaospublicos WHERE codigo=$codigo");
				 Mensagem("�rg�o P�blico exclu�do com sucesso!");
				 ?><script>LimpaCampos('frmCadastroOrgao');</script><?php
				}
			?>
