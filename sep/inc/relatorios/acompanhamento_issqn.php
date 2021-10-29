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
<style type="text/css">
#divBusca {
	position:absolute;
	left:30%;
	top:20%;
	width:298px;
	height:276px;
	z-index:1;
 visibility:<?php if(isset($btBuscarCliente)) { echo"visible"; }else{ echo"hidden"; }?>
}
</style>
<div id="divBusca"  >
	<?php require_once("inc/relatorios/busca.php"); ?>
</div>
<?php 
	if(isset($_POST['CODEMISSOR'])){
		$sql_cad = "SELECT * FROM cadastro WHERE codigo = ".$_POST['CODEMISSOR'];
		$sql_res_cad = $PDO->query($sql_cad);
		$prestador = $sql_res_cad->fetch();
		$cod_prestador = $prestador['codigo'];
		
		if($prestador['nome'] != '')$nome_prestador = $prestador['nome'];
		else $nome_prestador = $prestador['razaosocial'];
	}
?>
<table border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCCC">
  <tr>
    <td width="18" align="left" background="img/form/cabecalho_fundo.jpg"><img src="img/form/cabecalho_icone.jpg" /></td>
    <td width="700" background="img/form/cabecalho_fundo.jpg" align="left" class="formCabecalho">Relatórios - Acompanhamento ISSQN</td>
    <td width="19" align="right" valign="top" background="img/form/cabecalho_fundo.jpg"><a href=""><img src="img/form/cabecalho_btfechar.jpg" width="19" height="21" border="0" /></a></td>
  </tr>
  <tr>
    <td width="18" background="img/form/lateralesq.jpg"></td>
    <td align="center">

<form id="frmMovimentacao" method="post" target="_blank" action="inc/relatorios/imprimir_acompanhamento_issqn.php" onsubmit="if(document.getElementById('cmbPrestador').value == ''){alert('Escolha um prestador');return false;}">
<fieldset>
<legend><strong>Pesquisa de Acompanhamento ISSQN</strong></legend>
<table align="left" width="50%">
<tbody>
    <tr>
        <td>
            Escolha o Período
        </td>
        <td>
			<select name="cmbPeriodo" id="cmbPeriodo">
            	<option value="24">Últimos 24 meses</option>
                <option value="12">Últimos 12 meses</option>
            </select>
         </td>
    </tr>
    <tr>
        <td>
            Escolha o Prestador
        </td>
        <td align="left" colspan="5">
            <input type="hidden" value="<?php echo $cod_prestador ?>" name="cmbPrestador" id="cmbPrestador" />
            <input type="text" value="<?php echo $nome_prestador ?>" name="nomePrestador" id="nomePrestador" readonly="readonly" size="50" />
            <input type="button" value="Pesquisar" name="btPesquisar" class="botao" onclick="document.getElementById('divBusca').style.visibility='visible'" />
        </td>
    </tr>
</tbody>
</table>
</fieldset>

<fieldset style="vertical-align:middle; text-align:left">
<input name="btPesquisar" type="submit" id="button1" class="botao" value="Buscar"   />
<label >
<input type="button" name="btLimpar" id="button2" value="Limpar Campos" class="botao" onclick="document.getElementById('nomePrestador').value = ''" />
<input type="hidden" name="hdContador" value="<?php echo $contservico; ?>"/>
</label>
</fieldset>
<div id="divRelatPrestadores"></div>
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

