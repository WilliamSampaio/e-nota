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
$sql = $PDO->query("SELECT cidade, estado FROM configuracoes");
list($CIDADE, $UF) = $sql->fetch();
?>
<!-- Formulário de inserção de empresa -->

<table width="580" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td width="5%" height="10" bgcolor="#FFFFFF"></td>
		<td width="25%" align="center" bgcolor="#FFFFFF" rowspan="3">Cadastro de Contador</td>
		<td width="70%" bgcolor="#FFFFFF"></td>
	</tr>
	<tr>
		<td height="1" bgcolor="#CCCCCC"></td>
		<td bgcolor="#CCCCCC"></td>
	</tr>
	<tr>
		<td height="10" bgcolor="#FFFFFF"></td>
		<td bgcolor="#FFFFFF"></td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#CCCCCC"></td>
	</tr>
	<tr>
		<td height="60" colspan="3" bgcolor="#CCCCCC">

			<br />
			<br />
			<strong>Prezado Contador/Escritório de Contabilidade</strong><br /><br />
			A nossa Prefeitura Municipal vem empreendendo esforços para aprimorar continuamente a qualidade dos serviços oferecidos aos contribuintes. Neste sentido, a internet apresenta-se como um importante instrumento capaz de atende-los com agilidade e segurança.
			<br /><br />
			E por falar em segurança, o contribuinte deverá cadastrar uma senha individual que permitirá o acesso à área restrita, de seu exclusivo interesse, no endereço eletrônico da Prefeitura.
			<br /><br />
			A senha cadastrada é intransferível e configura a assinatura eletrônica da pessoa física ou jurídica que a cadastrou.
			<br /><br />
			<strong>ALERTAMOS QUE CABERÁ EXCLUSIVAMENTE AO CONTRIBUINTE TODA RESPONSABILIDADE DECORRENTE DO USO INDEVIDO DA SENHA, QUE DEVERÁ SER GUARDADA EM TOTAL SEGURANÇA.</strong>
			<br /><br />
			<!--action="inc/prestadores/inserir.php"-->
			<form action="inc/contadores/inserir.php" method="post" name="frmCadastroEmpresa" id="frmCadastroEmpresa">
				<table width="480" border="0" align="center" id="tblEmpresa">
					<tr>
						<td width="135" align="left">Nome<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="text" size="60" maxlength="100" name="txtInsNomeEmpresa" id="txtInsNomeEmpresa" class="texto"></td>
					</tr>
					<tr>
						<td width="135" align="left">Razão Social<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="text" size="60" maxlength="100" name="txtInsRazaoSocial" id="txtInsRazaoSocial" class="texto"></td>
					</tr>

					<!-- alterna input cpf/cnpj-->
					<tr>
						<td align="left">CNPJ/CPF<font color="#FF0000">*</font>
						</td>
						<td align="left">
							<input type="text" size="18" name="txtCNPJ" id="txtCNPJ" class="texto" onblur="ValidaCNPJ(this,'spancontador');desabilitaSN(this,'txtSimplesNacional','ftDesc')" /><span id="spancontador"></span>
						</td>
					</tr>
					<!-- alterna input cpf/cnpj FIM-->
					<tr>
						<td align="left">Logradouro<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="text" size="40" maxlength="100" name="txtLogradouro" id="txtLogradouro" class="texto" /></td>
					</tr>
					<tr>
						<td align="left">Número<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="text" size="10" maxlength="10" name="txtNumero" id="txtNumero" class="texto" /></td>
					</tr>
					<tr>
						<td align="left">Complemento</td>
						<td align="left"><input type="text" size="10" maxlength="10" name="txtComplemento" id="txtComplemento" class="texto" /></td>
					</tr>
					<tr>
						<td align="left">Bairro<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="text" size="30" maxlength="100" name="txtBairro" id="txtBairro" class="texto" /></td>
					</tr>
					<tr>
						<td align="left">CEP<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="text" size="10" maxlength="9" name="txtCEP" id="txtCEP" class="texto" /></td>
					</tr>
					<tr>
						<td align="left">Telefone Comercial<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="text" class="texto" size="20" maxlength="15" name="txtFoneComercial" id="txtFoneComercial" /></td>
					</tr>
					<tr>
						<td align="left">Telefone Celular</td>
						<td align="left"><input type="text" class="texto" size="20" maxlength="15" name="txtFoneCelular" /></td>
					</tr>
					<tr>
						<td align="left">UF<font color="#FF0000">*</font>
						</td>
						<td align="left">
							<select name="txtInsUfEmpresa" id="txtInsUfEmpresa" onchange="buscaCidades(this,'txtInsMunicipioEmpresa')">
								<option value=""></option>
								<?php
								$sql = $PDO->query("SELECT uf FROM municipios GROUP BY uf ORDER BY uf");
								while (list($uf_busca) = $sql->fetch()) {
									echo "<option value=\"$uf_busca\"";
									if ($uf_busca == $UF) {
										echo "selected=selected";
									}
									echo ">$uf_busca</option>";
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="left">Município<font color="#FF0000">*</font>
						</td>
						<td align="left">
							<div id="txtInsMunicipioEmpresa">
								<select name="txtInsMunicipioEmpresa" id="txtInsMunicipioEmpresa" class="combo">
									<?php
									$sql_municipio = $PDO->query("SELECT nome FROM municipios WHERE uf = '$UF'");
									while (list($nome) = $sql_municipio->fetch()) {
										echo "<option value=\"$nome\"";
										if (strtolower($nome) == strtolower($CIDADE)) {
											echo "selected=selected";
										}
										echo ">$nome</option>";
									} //fim while 
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td align="left">Insc. Municipal</td>
						<td align="left"><input type="text" size="20" maxlength="20" name="txtInsInscMunicipalEmpresa" id="txtInsInscMunicipalEmpresa" class="texto" /></td>
					</tr>
					<tr>
						<td align="left">Insc. Estadual</td>
						<td align="left"><input type="text" size="20" maxlength="20" name="txtInsInscEstadualEmpresa" id="txtInsInscEstadualEmpresa" class="texto" /></td>
					</tr>
					<tr>
						<td align="left">PIS/PASEP</td>
						<td align="left"><input type="text" size="20" maxlength="20" name="txtPispasep" id="txtPispasep" class="texto" /></td>
					</tr>
					<tr>
						<td align="left">Email<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="text" size="30" maxlength="100" name="txtInsEmailEmpresa" id="txtInsEmailEmpresa" class="email" autocomplete='off' /></td>
					</tr>
					<tr>
						<td align="left">Senha<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="password" size="18" maxlength="18" name="txtSenha" id="txtSenha" class="texto" autocomplete='off' onkeyup="verificaForca(this)" /></td>
					</tr>
					<tr>
						<td align="left">Confirma Senha<font color="#FF0000">*</font>
						</td>
						<td align="left"><input type="password" size="18" maxlength="18" name="txtSenhaConf" id="txtSenhaConf" class="texto" /></td>
					</tr>
					<tr>
						<td colspan="3" align="left">
							<br /><input type="checkbox" value="S" name="txtSimplesNacional" id="txtSimplesNacional" />
							<font size="-2" id="ftDesc">
								Esta empresa está enquadrada no Simples Nacional, conforme Lei Complementar nº 123/2006
							</font>
							<br /><br />
						</td>
					</tr>
					<tr>
						<td colspan="2" align="left"></td>
					</tr>
					<tr>
						<td colspan="2" align="left">
							<input type="button" value="Adicionar Responsável/Sócio" name="btAddSocio" class="botao" onclick="incluirSocio()" />
							<font color="#FF0000">*</font>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<table width="480" border="0" cellspacing="1" cellpadding="2">

								<?php require_once("inc/contadores/cadastro_socios.php") ?>
								<script>
									incluirSocio();
								</script>
							</table>

						</td>
					</tr>
					<tr>
						<td colspan="2" align="left"></td>
					</tr>
					<tr>
						<td colspan="2" align="left">
							<input type="button" value="Adicionar Serviços" name="btAddServicos" class="botao" onclick="incluirServico()" />
							<font color="#FF0000">*</font>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">


							<table width="480" border="0" cellspacing="1" cellpadding="2">

								<?php require_once("inc/contadores/cadastro_servicos.php") ?>
								<script>
									incluirServico();
								</script>
							</table>

						</td>
					</tr>
					<tr>
						<td align="left" height="15"></td>
						<td align="right"></td>
					</tr>
					<tr>
						<td align="left"><input type="submit" value="Cadastrar" name="btCadastrar" class="botao" onclick="return (ConfereCNPJ(this)) && (ValidaSenha('txtSenha','txtSenhaConf') && (ValidaFormulario('txtInsNomeEmpresa|txtInsRazaoSocial|txtCNPJ|txtLogradouro|txtNumero|txtBairro|txtCEP|txtFoneComercial|txtInsUfEmpresa|txtInsMunicipioEmpresa|txtInsEmailEmpresa|cmbCategoria1|txtNomeSocio1|txtCpfSocio1')))" /></td>
						<td></td>
					</tr>
					<tr>
						<td align="right" colspan="2">
							<font color="#FF0000">*</font> Campos Obrigatórios<br /> <strong>
								<font color="#FF0000">**</font> Você deve desligar o bloqueador de pop-ups para cadastrar
							</strong>
						</td>
					</tr>
				</table>
			</form>



		</td>
	</tr>
	<tr>
		<td height="1" colspan="3" bgcolor="#CCCCCC"></td>
	</tr>
</table>

<!-- Formulário de inserção de serviços Fim--->