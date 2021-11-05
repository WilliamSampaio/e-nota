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
	//query que verifica todos os cadastrados, ativos, inativos e nao liberados
	$sql = $PDO->query("
		SELECT COUNT(codigo) FROM operadoras_creditos
		UNION ALL
		SELECT COUNT(codigo) FROM operadoras_creditos WHERE estado = 'A'
		UNION ALL
		SELECT COUNT(codigo) FROM operadoras_creditos WHERE estado = 'I'
		UNION ALL
		SELECT COUNT(codigo) FROM operadoras_creditos WHERE estado = 'NL'
	");
	
	//mysql_result pega um unico resultado da linha solicitada
	$cadastradas=$sql->fetchColumn(0);
	$ativas=$sql->fetchColumn(1);
	$inativas=$sql->fetchColumn(2);
	$nl=$sql->fetchColumn(3);
	
?>
<fieldset><legend>Informações sobre Operadoras de créditos</legend>
<table width="100%" border="0" cellpadding="0">
    <tr>
        <td width="15%" align="left">Cadastradas:</td>
      <td align="left"><?php if($cadastradas != 0){ echo $cadastradas;}else{ echo "Não há operadoras de créditos cadastradas";}?></td>
    </tr>
    <tr>
        <td align="left">Ativas:</td>
        <td align="left"><?php if($ativas > 0){ echo $ativas;}else{ echo "Não há operadoras de créditos ativas";}?></td>
    </tr>
    <tr>
        <td align="left">Inativas:</td>
        <td align="left"><?php if($inativas > 0){ echo $inativas;}else{ echo "Não há operadoras de créditos inativas";}?></td>
    </tr>
    <tr>
        <td align="left">Não Liberadas:</td>
        <td width="85%" align="left"><?php if($nl > 0){ echo $nl;}else{ echo "Não há operadoras de créditos não liberadas";}?></td>
  </tr>
</table>
</fieldset>
<fieldset>
<legend>Relatórios de Operadoras de créditos</legend>
	<table align="left" border="0" cellpadding="0">
		<tr>
			<td>Nome:</td>
			<td colspan="3"><input type="text" name="txtNome" class="texto" size="30" maxlength="100"></td>
		</tr>
		<tr>
			<td>CNPJ:</td>
			<td><input type="text" name="txtCNPJ" class="texto" maxlength="18" onkeyup="MaskCNPJ(this);"  /></td>
			<td>Estado:</td>
			<td>
				<select name="cmbEstado" class="combo">
					<option value=""></option>
					<option value="A">Ativos</option>
					<option value="I">Inativos</option>
					<option value="NL">Não Liberados</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Município:</td>
			<td><input type="text" name="txtCidade" class="texto" /></td>
			<td>UF:</td>
			<td><input type="text" name="txtUF" class="texto" maxlength="2" size="2" /></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="btConsultar" value="Consultar" class="botao" 
				onclick="acessoAjax('inc/operadorascreditos/relatorios/busca_resultado_opcreditos.ajax.php','frmRelatorio','divBuscar');" />
			</td>
		</tr>
	</table>
</fieldset>
<div id="divBuscar"></div>
