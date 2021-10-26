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
<form name="frmTomadoresBox" method="post" action="tomadores.php" id="frmTomadoresBox">
    <input type="hidden" name="txtMenu" id="txtMenu" />
    <input type="hidden" name="txtCNPJ" id="txtCNPJ" />

    <!-- ITENS -->
    <div class="row">

        <div class="col-6">
            <div class="card">
                <!-- <img src="../img/index/iconeemitirnf.jpg" class="img-fluid" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Consulta RPS</h5>
                    <p class="card-text">Permite que o tomador de serviços que recebeu um Recibo Provisório de Serviços - RPS consulte a sua conversão em NFe.</p>
                </div>
                <div class="card-footer">
                    <img src="../img/box/web.png" width="14" height="14">
                    <a onclick="document.getElementById('txtMenu').value='rps';frmTomadoresBox.submit();" href="#" class="box">Serviço online</a><a href="../contador/index.php" target="_blank"></a>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card" style="height: 100%;">
                <!-- <img src="../img/index/iconeemitirnf.jpg" class="img-fluid" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Autenticidade de NFe</h5>
                    <p class="card-text">Acesse e compare os números de aprovação da NFe de ISS.</p>
                </div>
                <div class="card-footer">
                    <img src="../img/box/web.png" width="14" height="14">
                    <a onclick="document.getElementById('txtMenu').value='autenticidade';frmTomadoresBox.submit();" href="#" class="box">Serviço online</a>
                </div>
            </div>
        </div>

    </div>
    <br>

    <!-- ITENS -->
    <div class="row">

        <div class="col-6">
            <div class="card">
                <!-- <img src="../img/index/iconeemitirnf.jpg" class="img-fluid" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Tomadores: Gerar guia</h5>
                    <p class="card-text">Gerar guia de declarações com ISS retido.</p>
                </div>
                <div class="card-footer">
                    <img src="../img/box/web.png" width="14" height="14">
                    <a onclick="document.getElementById('txtMenu').value='issretido';frmTomadoresBox.submit();" href="#" class="box"><img src="../img/box/web.png" alt="ISS Retido" width="14" height="14" /> Serviço online</a>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card" style="height: 100%;">
                <!-- <img src="../img/index/iconeemitirnf.jpg" class="img-fluid" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Consulta Créditos</h5>
                    <p class="card-text">Veja o vídeo da campanha da NFeletrônica de ISS.</p>
                </div>
                <div class="card-footer">
                    <img src="../img/box/web.png" width="14" height="14">
                    <a onclick="document.getElementById('txtMenu').value='creditos';frmTomadoresBox.submit();" href="#" class="box">Serviço online</a>
                </div>
            </div>
        </div>

    </div>
        
</form>