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

        <title>Imprimir créditos gerados</title>


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
                     <p>RELATÓRIO DE <b>CRÉDITOS GERADOS</b> </p>
                     <p>PREFEITURA MUNICIPAL DE <?php print strtoupper($CONF_CIDADE); ?></p>
                     <p><?php print strtoupper($CONF_SECRETARIA); ?> </p>
                  </center>
              </span>
            </td>
          </tr>
        </table>
        <?php


            //Recebe as variaveis enviadas pelo form por post
            $Prestador = $_POST["txtcpfcnpj"];
            $ano          = $_POST["cmbAno"];
            $mes          = $_POST["cmbMes"];
            $nomeMes      = $meses[$mes];
            if(!empty($mes)){
                while(strlen($mes) < 2){
                    $mes = "0".$mes;
                }
            }

            $where = "";
            if(empty($ano) && empty($mes)){
                $where = "";
                $sqlPeriodo = $PDO->query("
                    SELECT DATE_FORMAT(MAX(datahoraemissao),'%m/%Y') AS final,
                    DATE_FORMAT(MIN(datahoraemissao),'%m/%Y') AS inicio
                    FROM notas
                ");
                $historico = $sqlPeriodo->fetchObject();
                $periodo = "<b>Período:</b> {$historico->inicio} até {$historico->final}";
            }elseif(!empty($ano) && empty($mes)){
                $where = "WHERE DATE_FORMAT(notas.datahoraemissao,'%Y') = '$ano'";
                $periodo = "<b>Período:</b> 01/$ano até 12/$ano";
            }elseif(empty($ano) && !empty($mes)){
                $where = "WHERE DATE_FORMAT(notas.datahoraemissao,'%m') = '$mes'";
                $periodo = "<b>Período:</b> Histórico do mês de $nomeMes";
            }elseif(!empty($ano) && !empty($mes)){
                $where = "WHERE DATE_FORMAT(notas.datahoraemissao,'%Y-%m') = '$ano-$mes'";
                $periodo = "<b>Período:</b> $mes/$ano";
            }

            if(empty($where) && !empty($Prestador)){
                $where = "WHERE (cadastro.cpf = '$Prestador' OR cadastro.cnpj = '$Prestador')";
            }elseif(!empty($where) && !empty($Prestador)){
                $where .= " AND (cadastro.cpf = '$Prestador' OR cadastro.cnpj = '$Prestador')";
            }

            if(empty($where)){
                $where = "WHERE notas.estado <> 'C'";
            }else{
                $where .= " AND notas.estado <> 'C'";
            }

            $where .= " AND cadastro.nfe = 'S' AND notas.credito <> 0.00";
            $sqlValores = $PDO->query("
               SELECT
                   SUM(notas.credito) AS credito
               FROM notas INNER JOIN cadastro ON notas.codemissor = cadastro.codigo
               $where
           ");
           $valores = $sqlValores->fetchObject();
        ?>
        <table width="95%" border="1" cellspacing="0" class="tabelameio"  >
            <tr>
                <td width="32%" >
                   <?php echo $periodo; ?>
                </td>
                <td valign="top">
                   <?php
                       echo "<b>Total créditos gerados:</b> R$ ".DecToMoeda($valores->credito);
                   ?>
                </td>
            </tr>
        </table>
        <?php
            //Sql buscando as informa��es que o usuario pediu e com o limit estipulado pela função
            $varcont= $_POST['hdContador'];
			
			$cor = 'style="background-color:#FF9"';						
			if(isset($_GET['v']) && $_GET['v'] == 'data'){
				$orderby = "ORDER BY datahoraemissao DESC";
			}
			else{
				$orderby = "ORDER BY nome ASC";
			}

            $query = ("
                SELECT
                    cadastro.nome AS nome,
                    IF(cadastro.cpf<>'',cadastro.cpf,cadastro.cnpj) AS doc,
					notas.datahoraemissao AS datahoraemissao,
					DATE_FORMAT(notas.datahoraemissao, '%d/%m/%Y') AS data,
                    notas.credito AS credito,
					notas.numero AS numero
                FROM notas
                INNER JOIN cadastro ON notas.codemissor = cadastro.codigo 
                $where 
				$orderby
            ");
			//echo $query;
            $sql = $PDO->query($query);
            $result = $sql->rowCount();
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
                      <td align="center" <?php if($_GET['v'] == 'nome' || !isset($_GET['v']))echo $cor; ?>>
                      	<strong><?php if($Prestador == '' && $ano == '' && $mes == ''){ ?><a href="?v=nome">Prestador</a><?php } else{ ?>Prestador<?php } ?></strong>
                      </td>
                      <td align="center"><strong>CNPJ ou CPF</strong></td>
                      <td align="center"><strong>Número da nota</strong></td>
                      <td align="center" <?php if($_GET['v'] == 'data')echo $cor; ?>>
                      	<strong><?php if($Prestador == '' && $ano == '' && $mes == ''){ ?><a href="?v=data">Data emissão</a><?php } else{ ?>Data emissão<?php } ?></strong>
                      </td>
                      <td align="center"><strong>Crédito</strong></td>

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
                <td bgcolor="white" align="center" title="<?php echo $dados_pesquisa['nome'];?>"><?php echo $descricao; ?></td>
                <td bgcolor="white" align="center"><?php echo $dados_pesquisa['doc']; ?></td>
                <td bgcolor="white" align="center"><?php echo $dados_pesquisa['numero']; ?></td>
                <td bgcolor="white" align="center"><?php echo $dados_pesquisa['data']; ?></td>
                <td bgcolor="white" align="center">R$ <?php echo DecToMoeda($dados_pesquisa['credito']);?></td>

           </tr>
           <?php
                $x++;
            }//fim while
            ?>
        </table>
        </center>
    </body>
</html>