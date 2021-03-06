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
?><title>Relatório de Serviços</title>

<table border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCCC">
<tr>
	<td width="18" align="left" background="img/form/cabecalho_fundo.jpg">
		<img src="img/form/cabecalho_icone.jpg" />
	</td>
	<td width="600" background="img/form/cabecalho_fundo.jpg" align="left" class="formCabecalho">
		Relatórios - Serviços
	</td>
	<td width="19" align="right" valign="top" background="img/form/cabecalho_fundo.jpg">
		<a href=""><img src="img/form/cabecalho_btfechar.jpg" width="19" height="21" border="0" /></a>
	</td>
</tr>
<tr>
    <td width="18" background="img/form/lateralesq.jpg"></td>
    <td align="center">
		<form id="frmRelatorios" method="post" target="_blank" action="inc/relatorios/imprimirServicos.php">
		<fieldset>
		<legend>
			<strong>Relatórios de Serviços</strong>
		</legend>
		<table align="left" width="100%">
			<tr>
				<td width="94">
					Gerar:
				</td>
				<td>
					<label><input type="radio" name="rdbServicos" value="lista" checked >Lista de Serviços </label>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<label><input type="radio" name="rdbServicos" value="vinculadas" >Empresas vinculadas por atividade</label>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<label><input type="radio" name="rdbServicos" value="media" >Comparativo por Média de Todas as Atividades</label>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<label><input type="radio" name="rdbServicos" value="municipio" >Atividades Adquiridas de Empresas de Fora do Município</label>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<label><input type="radio" name="rdbServicos" value="resumo" >Resumo das Atividades Efetuadas</label>
				</td>
			</tr>
			<tr>
				<td>
					Mês:
				</td>
				<td>
					<select name="cmbMes">
						<option>Selecione!</option>
						<option value="01">Janeiro</option>
						<option value="02">Fevereiro</option>
						<option value="03">Março</option>
						<option value="04">Abril</option>
						<option value="05">Maio</option>
						<option value="06">Junho</option>
						<option value="07">Julho</option>
						<option value="08">Agosto</option>
						<option value="09">Setembro</option>
						<option value="10">Outubro</option>
						<option value="11">Novembro</option>
						<option value="12">Dezembro</option>
					</select>
				</td>
			</tr>
       	</table>
    	</fieldset>
		
		<fieldset style="vertical-align:middle; text-align:left">
			<input name="btPesquisar" type="submit" id="btPesquisar" class="botao" value="Buscar"/>
		</fieldset>
		
		</form>
	</td>
	<td width="19" background="img/form/lateraldir.jpg"></td>
</tr>
<tr>
    <td align="left" background="img/form/rodape_fundo.jpg">
		<img src="img/form/rodape_cantoesq.jpg" />
	</td>
    <td background="img/form/rodape_fundo.jpg"></td>
    <td align="right" background="img/form/rodape_fundo.jpg">
		<img src="img/form/rodape_cantodir.jpg" />
	</td>
</tr>
</table>