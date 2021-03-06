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

$CODIGO = $_POST['CODIGO'];
// faz a consulta sql
$sql = die("
SELECT
  `reclamacoes`.`codigo`,
  `reclamacoes`.`assunto`,
  `reclamacoes`.`especificacao`, 
  `reclamacoes`.`tomador_cnpj`,  
  `reclamacoes`.`tomador_email`,
  `reclamacoes`.`rps_numero`, 
  `reclamacoes`.`rps_data`,
  `reclamacoes`.`rps_valor`, 
  `emissores`.`nome`,
  `emissores`.`cnpjcpf`,   
  `reclamacoes`.`datareclamacao`,
  `reclamacoes`.`estado`, 
  `reclamacoes`.`responsavel`,
  `reclamacoes`.`dataatendimento`
FROM
  `reclamacoes` INNER JOIN  
  `emissores` ON `reclamacoes`.`emissor_cnpjcpf` = `emissores`.`cnpjcpf`
WHERE
  `reclamacoes`.`codigo` = '$CODIGO';");
  

list($codigo, $assunto, $especificacao, $tomador_cnpj, $tomador_email, $rps_numero, $rps_data, $rps_valor, $empresas_nome, $empresas_cnpjcpf, $datareclamacao, $estado, $responsavel, $dataatendimento) = $sql->fetch();

?>


<!-- cabe�alho da pesquisa-----> 

			<fieldset style="width:730;"><legend>Cadastro de Reclamação</legend>      
			<form name="frmCadastroReclamcao" method="post">
			<input type="hidden" name="include" id="include" value="<?php echo $_POST['include'];?>">
			<input name="txtCodigo" type="hidden" value="<?php echo $CODIGO; ?>" />
			<table width="99%" border="0" cellspacing="2" cellpadding="2">
			  <tr>
				<td width="30%" align="left">Assunto</td>
				<td width="70%" align="left"><input value="<?php echo $assunto; ?>" class="texto" size="55" readonly="yes" /></td>
			  </tr>
			  <tr>
				<td align="left">Especificação</td>
				<td align="left"><input value="<?php echo $especificacao; ?>" class="texto" size="55" readonly="yes" /></td>
			  </tr>
			  <tr>
				<td align="left">Tomador</td>
				<td align="left"><input value="<?php echo $tomador_cnpj; ?>" class="texto" size="55" readonly="yes" /></td>
			  </tr>
			  <tr>
				<td align="left">RPS - Número</td>
				<td align="left"><input value="<?php echo $rps_numero; ?>" class="texto" size="20" readonly="yes" /></td>
			  </tr>
			  <tr>
				<td align="left">RPS - Data</td>
				<td align="left"><input value="<?php echo substr($rps_data,8,2)."/".substr($rps_data,5,2)."/".substr($rps_data,0,4); ?>" class="texto" size="20" readonly="yes" /></td>
			  </tr>
			  <tr>
				<td align="left">RPS - Valor</td>
				<td align="left"><input value="R$ <?php echo $rps_valor; ?>" class="texto" size="20" readonly="yes" /></td>
			  </tr>
			  <tr>
				<td align="left">Prestador</td>
				<td align="left"><input value="<?php echo $empresas_nome." - ".$empresas_cnpjcpf; ?>" class="texto" size="55" readonly="yes" /></td>
			  </tr>
			  <tr>
				<td align="left">Data Reclamação</td>
				<td align="left"><input value="<?php echo substr($datareclamacao,8,2)."/".substr($datareclamacao,5,2)."/".substr($datareclamacao,0,4); ?>" class="texto" size="20" readonly="yes" /></td>
			  </tr>
			  <tr>
				<td align="left">Estado<font color="#FF0000">*</font></td>
				<td align="left">
				<label><input type="radio" name="rgEstado" value="atendida" <?php if($estado == "atendida") { echo " checked=checked"; }; ?> />Atendida</label>
				<label><input type="radio" name="rgEstado" value="pendente" <?php if($estado == "pendente") { echo " checked=checked"; }; ?> />Pendente</label>
				</td>
			  </tr>
			  <tr>
				<td align="left">Responsável <font color="#FF0000">*</font></td>
				<td align="left"><input name="txtResponsavel" value="<?php echo $responsavel; ?>" width="30" class="texto" /></td>
			  </tr>
			  <tr>
				<td align="left">Data Atendimento <font color="#FF0000">*</font></td>
				<td align="left">
				<?php $dataatendimentoF = implode("/", array_reverse(explode("-",$dataatendimento)));?>
				<input name="txtDataAtendimento" value="<?php echo $dataatendimentoF; ?>" class="texto" size="20" onkeypress="formatar(this,'00/00/0000')" maxlength="10" /> <em>formato (29/02/2010)</em></td>
			  </tr>
			  <tr>
				<td></td>
				<td align="right"><font color="#FF0000">*</font> Campos com permiss�o de alteração!</td>
			  </tr>
			  <tr>
				<td><input name="btSalvar" type="submit" value="Salvar" class="botao" style="width:120px;" /></td>
				<td></td>
			  </tr>
			  <tr>
				<td>
				<!-- <input name="btComunicar" type="submit" value="Comunicar Partes" class="botao" style="width:120px;" /> -->
				<?php
				// mascara o codigo com cripto base64 
				$crypto = base64_encode($CODIGO);
				echo ("<input type=\"button\" class=\"botao\" value=\"Comunicar Partes\" onclick=\"window.open('inc/reclamacoes_email.php?CODIGO=$crypto');\"></a>");
				?>
				</td>
				<td></td>
			  </tr>
			  <tr>
				<td></td>
				<td></td>
			  </tr>
			</table>			
			</form>
			</fieldset> 
			

 
 
 
 
 
 