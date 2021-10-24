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
<!-- box de conteúdos -->
<form name="frmOuvidoriaBox" method="post" action="ouvidoria.php" id="frmOuvidoriaBox">
    
    <input type="hidden" name="txtMenu" id="txtMenu" />
    <input type="hidden" name="txtCNPJ" id="txtCNPJ" />

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Reclamações</h5>
            <p class="card-text">Se o seu prestador não efetuou a conversão de RPS em NF-e, ou o valor da NFe não confere.</p>
        </div>
        <div class="card-footer">
            <img src="../img/box/web.png" width="14" height="14">
            <a onclick="document.getElementById('txtMenu').value='cadastro';frmOuvidoriaBox.submit();" href="#" class="box">Serviço online</a>
        </div>
    </div>
    <br>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Consulta</h5>
            <p class="card-text">Consulte o andamento da reclamação feita junto a Prefeitura Municipal.</p>
        </div>
        <div class="card-footer">
            <img src="../img/box/web.png" alt="" width="14" height="14">
            <a onclick="document.getElementById('txtMenu').value='consulta';frmOuvidoriaBox.submit();" href="#" class="box">Serviço online</a>
        </div>
    </div>

</form>