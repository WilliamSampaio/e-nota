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
 if(isset($_POST['btCadastrar']))
 {   
   require_once("inserir.php");
 }?>
<fieldset style="margin-left:10px; margin-right:10px;">
	<legend>Cadastro de Serviços</legend>
	<form method="post" id="frmCadastro">
	<input type="hidden" name="include" id="include" value="<?php echo  $_POST['include'];?>" />
		<table width="100%" align="left">
			<tr>
				<td align="left">Categoria</td>
				<td align="left">
					<select name="cmbCategoria" id="cmbCategoria">
                    	<option />
						<?php
							$sql=$PDO->query("SELECT codigo,nome FROM servicos_categorias");
							while(list($codigo,$nome)=$sql->fetch())
								{
									echo "<option value=\"$codigo\">".ResumeString($nome,50)."</option>";
								}
						?>
					</select>				</td>
			</tr>
			<tr>
				<td align="left">Cód. Serviço</td>
				<td align="left"><input type="text" size="20" maxlength="20" name="txtInsCodServico" id="txtInsCodServico" class="texto"></tr>
			<td align="left"></tr>
			<tr>
				<td align="left">Descrição<font color="#FF0000"> *</font></td>
				<td align="left">
					<textarea cols="40" rows="5" name="txtInsDescServicos" id="txtInsDescServicos" class="texto" style="text-transform: uppercase; "></textarea>				</td>
			</tr>
			<tr>
				<td align="left">Tipo de Pessoa <font color="#FF0000">*</font></td>
				<td align="left"><select name="cmbInsTipoPessoa" id="cmbInsTipoPessoa" class="combo">
                	<option />
                  <option value="PJ">Pessoa Jurídica</option>
                  <option value="PF">Pessoa Física</option>
                  <option value="PJPF">Ambas</option>
                </select></td>
			</tr>
			<tr>
			  <td align="left">Aliquota<font color="#FF0000">*</font></td>
		      <td align="left"><input type="text" size="6" maxlength="5" name="txtInsAliquota" id="txtInsAliquota" class="texto" onkeyup="MaskPercent(this)" />
	          %Exemplo(0.00)<em>Para serviços em geral </em></td>
		  </tr>
			<tr>
				<td align="left">Retenção ISS <font color="#FF0000">*</font></td>
				<td align="left">
					<input name="txtInsAliquotaIR" type="text" class="texto" id="txtInsAliquotaIR" onkeyup="MaskPercent(this)" value="" size="5" maxlength="4">
					%Exemplo(0.00)<em>Para serviços com ISS Retido</em>				</td>
			</tr>
			<tr>
				<td align="left">Base de Cálculo</td>
				<td align="left"><input name="txtInsBaseCalculo" type="text" class="texto" id="txtInsBaseCalculo" onkeyup="MaskMoeda(this)" onkeydown="return NumbersOnly(event)" value="" size="10" maxlength="9" />
				</td>
			</tr>
			<tr>
			  <td align="left">Incidência <font color="#FF0000">*</font></td>
			  <td align="left"><select name="cmbInsIncidencia" id="cmbInsIncidencia" class="combo">
              <option />
			    <option value="mensal">Mensal</option>
			    <option value="anual">Anual</option>
                            </select></td>
		 	</tr>
			<tr>
			  <td align="left">Dia do Vencimento <font color="#FF0000">*</font></td>
			  <td align="left"><input name="txtInsDiaVencimento" type="text" class="texto" id="txtInsDiaVencimento" value="" size="3" maxlength="2" /></td>
		  </tr>
			<tr>
			  <td align="left">Documento Fiscal <font color="#FF0000">*</font></td>
			  <td align="left"><select name="cmbInsDocFiscal" id="cmbInsDocFiscal" class="combo">
              	<option />
			    <option value="NF">Nota Fiscal</option>
			    <option value="CF">Cupom Fiscal</option>
                            </select></td>
		  </tr>
			<tr>
			  <td align="left"></td>
			  <td align="left"><font color="#FF0000">*</font>Campos Obrigatórios</td>
		  </tr>
			<tr>
			  <td align="left"></td>
			  <td align="center"></td>
		  </tr>
		</table>
</form>
</fieldset>
<br>