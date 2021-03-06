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

    require_once("../../inc/conect.php");
    require_once("../../funcoes/util.php");
    // variaveis vindas do conect.php
    // $CODPREF,$PREFEITURA,$USUARIO,$SENHA,$BANCO,$TOPO,$FUNDO,$SECRETARIA,$LEI,$DECRETO,$CREDITO,$UF

    $sql_brasao = $PDO->query("SELECT brasao_nfe FROM configuracoes");
    //preenche a variavel com os valores vindos do banco
    list($BRASAO) = $sql_brasao->fetch();

    $meses = array(
        1  => "Janeiro",
        2  => "Fevereiro",
        3  => "Março",
        4  => "Abril",
        5  => "Maio",
        6  => "Junho",
        7  => "Julho",
        8  => "Agosto",
        9  => "Setembro",
        10 => "Outubro",
        11 => "Novembro",
        12 => "Dezembro"
    );
    ?>

        <title>Imprimir Acompanhamento ISSQN</title>


        <style type="text/css"  media="screen">
        .style1 {
			font-family: Georgia, "Times New Roman", Times, serif;
			font-size:15px;
		}

        .tabela {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
            border-collapse:collapse;
            border: 1px solid #000000;
        }
        .tabelameio {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
            border-collapse:collapse;
            border: 1px solid #000000;
        }
        .tabela tr td{
            border: 1px solid #000000;
        }
        .fonte{
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        </style>

        <style type="text/css"  media="print">
            #DivImprimir{
                display: none;
            }
        </style>
    </head>

    <body>

        <div id="DivImprimir"><input type="button" onClick="print();" value="Imprimir" /></div>
        <br />
        <center>

        <table width="95%" border="2" cellspacing="0" class="tabela">
          <tr>
            <td width="106">
                <center>
                    <img src="../../img/brasoes/<?php print $BRASAO; ?>" width="96" height="105"   />
                </center>
            </td>
            <td width="584" height="33" colspan="2">
              <span class="style1">
                  <center>
                     <p>RELATÓRIO DE <b>ACOMPANHAMENTO DE ISSQN</b> </p>
                     <p>PREFEITURA MUNICIPAL DE <?php print strtoupper($CONF_CIDADE); ?> </p>
                     <p><?php print strtoupper($CONF_SECRETARIA); ?> </p>
                  </center>
              </span>
            </td>
          </tr>
        </table>
        <?php


            //Recebe as variaveis enviadas pelo form por post
            $codPrestador = $_POST["cmbPrestador"];
            $nromeses     = $_POST["cmbPeriodo"];
            $nomeMes      = $meses[$mes];

           
            $sqlValores1 = $PDO->query("
               SELECT  					
					SUM(g.valor) AS valor,
					SUM(l.valorisstotal) AS totaliss
				FROM guia_pagamento g INNER JOIN livro l ON(g.codlivro = l.codigo) 
				INNER JOIN cadastro c ON(l.codcadastro = c.codigo)
				WHERE 
					g.datavencimento BETWEEN DATE_SUB(NOW(), INTERVAL $nromeses MONTH) AND NOW() 
				AND l.codcadastro = $codPrestador AND g.pago = 'N' 
				GROUP BY l.codcadastro
           ");
           $valores1 = mysql_fetch_object($sqlValores1);
		   
		   $sqlValores2 = $PDO->query("
               SELECT  					
					SUM(g.valor) AS valor,
					SUM(l.valorisstotal) AS totaliss
				FROM guia_pagamento g INNER JOIN livro l ON(g.codlivro = l.codigo) 
				INNER JOIN cadastro c ON(l.codcadastro = c.codigo)
				WHERE 
					g.datavencimento BETWEEN DATE_SUB(NOW(), INTERVAL $nromeses MONTH) AND NOW() 
				AND l.codcadastro = $codPrestador AND g.pago = 'S' 
				GROUP BY l.codcadastro
           ");
           $valores2 = mysql_fetch_object($sqlValores2);
        ?>
        <table width="95%" border="1" cellspacing="0" class="tabelameio"  >
            <tr>
                <td width="32%">
                   <?php if(mysql_num_rows($sqlValores1) > 0)echo "<b>Período:</b> ".date("d/m/Y",strtotime("-$nromeses month"))." - ".date("d/m/Y")." ($nromeses meses)"; ?>
                </td>
                <td>
                    <?php
                       echo "<b>Total de ISS não pago:</b> R$ ".DecToMoeda($valores1->totaliss);
                    ?>
                </td>
                <td>
                    <?php
                       echo "<b>Total de ISS pago:</b> R$ ".DecToMoeda($valores2->totaliss);
                    ?>
                </td>
            </tr>
        </table>
        <?php
            //Sql buscando as informa��es que o usuario pediu e com o limit estipulado pela função
            $varcont= $_POST['hdContador'];

            $query = ("
                SELECT  
					c.nome AS nome,
					IF(c.cpf<>'',c.cpf,c.cnpj) AS doc,
					l.periodo AS periodo,
					g.pago AS pago,
					l.valorisstotal AS totaliss
				FROM guia_pagamento g INNER JOIN livro l ON(g.codlivro = l.codigo) 
				INNER JOIN cadastro c ON(l.codcadastro = c.codigo)
				WHERE g.datavencimento BETWEEN DATE_SUB(NOW(), INTERVAL $nromeses MONTH) AND NOW() 
				AND l.codcadastro = $codPrestador
            ");
            $sql = $PDO->query($query);
            $result = mysql_num_rows($sql);
            $x = 0;
            if($result == 1){
                echo "<b>Foi encontrado $result  Resultado</b>";
            }elseif($result > 1){
                echo "<b>Foram encontrados $result  Resultados</b>";
            }elseif($result < 1){
                echo "<b>Nenhum Resultado encontrado</b>";
            }
            if($result > 0){
            ?>
                <table width="95%" class="tabela" border="1" cellspacing="0">
                    <tr style="background-color:#999999">
                      <td align="center"><strong>Prestador</strong></td>
                      <td align="center"><strong>CPF / CNPJ</strong></td>
                      <td align="center"><strong>Pago</strong></td>
                      <td align="center"><strong>Período</strong></td>
                      <td align="center"><strong>ISS</strong></td>

                  </tr>
                <?php
            }
            $cont = 0;
            while($dados_pesquisa = $sql->fetch()){
                if(strlen($dados_pesquisa['nome']) > 40){
                    $descricao = ResumeString($dados_pesquisa['nome'],40);
                }else{
                    $descricao = $dados_pesquisa['nome'];
                }
         ?>
            <tr id="trDecc<?php echo $x;?>">
                <td bgcolor="white" align="center" title="<?php echo $dados_pesquisa['nome'];?>"><?php echo $descricao;?></td>
                <td bgcolor="white" align="center"><?php echo $dados_pesquisa['doc'];?></td>
                <td bgcolor="white" align="center"><?php if($dados_pesquisa['pago'] == 'N')echo 'Não'; else echo 'Sim'; ?></td>
                <td bgcolor="white" align="center"><?php echo implode("/",array_reverse(explode("-",$dados_pesquisa['periodo']))); ?></td>
                <td bgcolor="white" align="center">R$ <?php echo DecToMoeda($dados_pesquisa['totaliss']);?></td>

           </tr>
           <?php
                $x++;
            }//fim while
            ?>
        </table>
        </center>
    </body>
</html>