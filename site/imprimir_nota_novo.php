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
require_once("../include/conect.php");
require_once("../include/util.php");

// variaveis globais vindas do conect.php
// $CODPREF,$PREFEITURA,$USUARIO,$SENHA,$BANCO,$TOPO,$FUNDO,$SECRETARIA,$LEI,$DECRETO,$CREDITO,$UF	

// descriptografa o codigo
$CODIGO = base64_decode($_GET['cod']);

// sql feito na nota
$sql = $PDO->query("
SELECT
  `notas`.`codigo`, 
  `notas`.`numero`, 
  `notas`.`codverificacao`,
  `notas`.`datahoraemissao`, 
  `notas`.`rps_numero`,
  `notas`.`rps_data`, 
  `notas`.`tomador_nome`, 
  `notas`.`tomador_cnpjcpf`,
  `notas`.`tomador_inscrmunicipal`, 
  `notas`.`tomador_endereco`,
  `notas`.`tomador_logradouro`,
  `notas`.`tomador_numero`,
  `notas`.`tomador_complemento`,
  `notas`.`tomador_cep`, 
  `notas`.`tomador_municipio`, 
  `notas`.`tomador_uf`,
  `notas`.`tomador_email`, 
  `notas`.`discriminacao`, 
  `notas`.`valortotal`,
  `notas`.`estado`, 
  `notas`.`credito`, 
  `notas`.`codservico`,
  `notas`.`valordeducoes`, 
  `notas`.`basecalculo`, 
  `notas`.`valoriss`,
  `notas`.`valorinss`,
  `notas`.`aliqinss`,
  `notas`.`valorirrf`,
  `notas`.`aliqirrf`,
  `notas`.`deducao_irrf`,
  `notas`.`total_retencao`,
  `cadastro`.`razaosocial`, 
  `cadastro`.`nome`, 
  `cadastro`.`cnpj`,
  `cadastro`.`cpf`,
  `cadastro`.`inscrmunicipal`, 
  `cadastro`.`logradouro`,
  `cadastro`.`numero`,
  `cadastro`.`municipio`, 
  `cadastro`.`uf`, 
  `cadastro`.`logo`,
  `servicos`.`codservico`, 
  `servicos`.`descricao`, 
  `servicos`.`aliquota`, 
  `notas`.`issretido`, 
  `cadastro`.`codtipo`,
  `cadastro`.`pispasep`
FROM
  `notas` 
INNER JOIN
  `cadastro` ON `notas`.`codemissor` = `cadastro`.`codigo`
INNER JOIN
  `servicos` ON `servicos`.`codigo` = `notas`.`codservico`
WHERE
  `notas`.`codigo` = '$CODIGO'
");
list(
  $codigo, $numero, $codverificacao, $datahoraemissao, $rps_numero, $rps_data,
  $tomador_nome, $tomador_cnpjcpf, $tomador_inscrmunicipal, $tomador_endereco,
  $tomador_logradouro, $tomador_numero, $tomador_complemento, $tomador_cep,
  $tomador_municipio, $tomador_uf, $tomador_email, $discriminacao, $valortotal,
  $estado, $credito, $codservico, $valordeducoes, $basecalculo, $valoriss,
  $valorinss, $aliqinss, $valorirrf, $aliqirrf, $deducao_irrf, $total_retencao,
  $empresa_razaosocial, $empresa_nome, $empresa_cnpj, $empresa_cpf,
  $empresa_inscrmunicipal, $empresa_endereco, $empresa_numero, $empresa_municipio,
  $empresa_uf, $empresa_logo, $servico_codservico, $servico_descricao,
  $servico_aliquota, $issretido, $codtipo, $pispasep
) = $sql->fetch();

$empresa_cnpjcpf = $empresa_cnpj . $empresa_cpf;

//nao tem soh endereco agora tem logradouro e numero com complemento
$tomador_endereco = "$tomador_logradouro, $tomador_numero";
//se tiver complemento, adiciona para a string de endere??o
if ($tomador_complemento) {
  $tomador_endereco .= ", $tomador_complemento";
}
//verifica o codtipo do simples nacional
$codtipoSN = codtipo('simples');

//Verifica na tabela configuracoes se os creditos estao ativos
$sql_verifica_creditos = $PDO->query("SELECT ativar_creditos FROM configuracoes");
list($ativar_creditos) = $sql_verifica_creditos->fetch();

if ($ativar_creditos == "n") {
  $display = "display:none";
  $colspan = "colspan=\"2\"";
} else {
  $display = "display:block";
  $colspan = "";
}

$sql_leidecreto = $PDO->query("SELECT lei, decreto FROM configuracoes");
list($lei, $decreto) = $sql_leidecreto->fetch();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>e-Nota [Imprimir Nota]</title>
  <link href="../css/imprimir_emissor.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
    table.gridview {
      width: 100%;
      font-size: 10px;
      font-family: Verdana, Arial, Helvetica, sans-serif;
      border: thick;
      border-collapse: collapse;
    }

    table.gridview tr td {
      border: 1px solid #000000;
    }

    table.gridview tr th {
      background-color: #CCCCCC;
      border: 1px solid #000000;
    }
  </style>
</head>

<body>
  <center>
    <table width="800" border="0" cellspacing="0" cellpadding="2" style="border:#000000 1px solid">
      <tr>
        <td colspan="4" rowspan="3" width="75%" style="border:#000000 solid" align="center">
          <!-- tabela prefeitura inicio -->
          <table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td rowspan="4" width="20%" align="center" valign="top">
                <?php if ($CONF_BRASAO && file_exists(dirname(__FILE__) . "/../img/brasoes/{$CONF_BRASAO}")) { ?>
                  <img src="../img/brasoes/<?php echo rawurlencode($CONF_BRASAO); ?>" width="100" height="100" />
                <?php } //fim if para mostrar a imagem somente se existir 
                ?>
                <br />
              </td>
              <td width="80%" class="cab01"><?php print "Prefeitura Municipal de " . strtoupper($CONF_CIDADE); ?></td>
            </tr>
            <tr>
              <td class="cab03"><?php print strtoupper($CONF_SECRETARIA); ?></td>
            </tr>
            <tr>
              <td class="cab02">NOTA FISCAL ELETR&Ocirc;NICA DE SERVI???OS - NF-e</td>
            </tr>
            <?php if ($rps_numero) { ?>
              <tr>
                <td>RPS N?? <?php print $rps_numero; ?>, emitido em <?php print(substr($rps_data, 8, 2) . "/" . substr($rps_data, 5, 2) . "/" . substr($rps_data, 0, 4)); ?>.</td>
              </tr>
            <?php } // fim if se tem rps 
            ?>
          </table>

          <!-- tabela prefeitura fim -->
        </td>
        <td width="25%" align="left" style="border:#000000 solid">N??mero da Nota<br />
          <div align="center">
            <font face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?php print $numero; ?></strong></font>
          </div>
        </td>
      </tr>
      <tr>
        <td align="left" style="border:#000000 solid">Data e Hora de Emiss??o<br />
          <div align="center">
            <font face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?php print(substr($datahoraemissao, 8, 2) . "/" . substr($datahoraemissao, 5, 2) . "/" . substr($datahoraemissao, 0, 4) . " " . substr($datahoraemissao, 11, 2) . ":" . substr($datahoraemissao, 14, 2)); ?></strong></font>
          </div>
        </td>
      </tr>
      <tr>
        <td align="left" style="border:#000000 solid">C??digo de Verifica????o<br />
          <div align="center">
            <font face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?php print $codverificacao; ?></strong></font>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="5" align="center" style="border:#000000 solid">

          <!-- tabela prestador -->
          <table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td colspan="3" class="cab03" align="center">PRESTADOR DE SERVI??OS</td>
            </tr>
            <tr>
              <td rowspan="6">
                <?php
                // verifica o logo
                if ($empresa_logo != "") {
                  echo "<img src=\"../img/logos/$empresa_logo\" width=\"100\" height=\"100\" >";
                }
                ?>
              </td>
              <td align="left">CNPJ/CPF: <strong><?php print $empresa_cnpjcpf; ?></strong></td>
              <td align="left">Inscri????o Municipal: <strong><?php print verificaCampo($empresa_inscrmunicipal); ?></strong></td>
            </tr>
            <tr>
              <td align="left">Nome: <strong><?php echo $empresa_nome; ?></strong></td>
              <td align="left">PIS/PASEP: <?php echo verificaCampo($pispasep); ?></td>
            </tr>
            <tr>
              <td align="left">Raz??o Social: <strong><?php print $empresa_razaosocial; ?></strong></td>
            </tr>
            <tr>
              <td colspan="2" align="left">Endere??o: <strong><?php print $empresa_endereco . ", " . $numero; ?></strong></td>
            </tr>
            <tr>
              <td align="left">Munic??pio: <strong><?php print $empresa_municipio; ?></strong></td>
              <td align="left">UF: <strong><?php print $empresa_uf; ?></strong></td>
            </tr>
          </table>


          <!-- tabela prestador -->
        </td>
      </tr>
      <tr>
        <td colspan="5" align="center" style="border:#000000 solid">
          <!-- tabela tomador inicio -->

          <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
            <tr>
              <td colspan="3" class="cab03" align="center">TOMADOR DE SERVI??OS</td>
            </tr>
            <tr>
              <td colspan="3" align="left">Nome/Raz??o Social: <strong><?php print verificaCampo($tomador_nome); ?></strong></td>
            </tr>
            <tr>
              <td align="left" width="450">CPF/CNPJ: <strong><?php print verificaCampo($tomador_cnpjcpf); ?></strong></td>
              <td colspan="2" align="left">Inscri????o Municipal: <strong><?php print verificaCampo($tomador_inscrmunicipal); ?></strong></td>
            </tr>
            <tr>
              <td align="left">Endere??o: <strong><?php print verificaCampo($tomador_logradouro); ?></strong></td>
              <td colspan="2" align="left">CEP: <strong><?php print verificaCampo($tomador_cep) ?></strong></td>
            </tr>
            <tr>
              <td align="left">Munic??pio: <strong><?php print verificaCampo($tomador_municipio); ?></strong></td>
              <td align="left">Uf: <strong><?php print verificaCampo($tomador_uf); ?></strong></td>
            </tr>
            <tr>
              <td align="left">E-mail: <strong><?php print verificaCampo($tomador_email); ?></strong></td>
            </tr>
          </table>

          <!-- tabela tomador fim -->
        </td>
      </tr>
      <tr>
        <td colspan="5" align="center" style="border:#000000 solid">

          <!-- tabela discrimacao dos servicos -->

          <table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td class="cab03" align="center">DISCRIMINA????O DE SERVI??OS E DEDU????ES</td>
            </tr>
            <tr>
              <td height="400" align="left" valign="top">
                <?php
                $discriminacao = nl2br($discriminacao);
                echo $discriminacao;
                ?>
                <br />
                <?php
                // verifica o estado da nfe
                if ($estado == "C") {
                  echo "<div align=center><font size=7 color=#FF0000><b>ATEN????O!!<BR>NFE CANCELADA</B></font></div>";
                } // fim if

                ?>
              </td>
            </tr>
          </table>


          <!-- tabela discrimacao dos servicos -->
        </td>
      </tr>
      <tr>
        <td colspan="5" class="cab03" align="center" style="border:#000000 solid">VALOR TOTAL DA NOTA = R$ <?php print DecToMoeda($valortotal); ?></td>
      </tr>
      <tr>
        <td colspan="5" align="left" style="border:#000000 solid">C??digo do Servi??o<br />
          <strong><?php print $servico_codservico . " - " . $servico_descricao; ?></strong>
        </td>
      </tr>
      <tr>
        <td style="border:#000000 solid">Valor Total das Dedu????es (R$)<br />
          <div align="right"><strong><?php print DecToMoeda($valordeducoes); ?></strong></div>
        </td>
        <td style="border:#000000 solid">Base de C??lculo (R$)<br />
          <div align="right"><strong><?php print DecToMoeda($basecalculo); ?></strong></div>
        </td>
        <td style="border:#000000 solid">
          Al??quota (%)
          <br />
          <div align="right">
            <strong>
              <?php
              if ($codtipo == $codtipoSN) {
                echo "----";
              } else {
                print DecToMoeda($servico_aliquota) . " %";
              } ?>
            </strong>
          </div>
        </td>
        <td style="border:#000000 solid" <?php echo $colspan; ?>>
          Valor do ISS (R$)
          <br />
          <div align="right">
            <strong>
              <?php
              if ($codtipo == $codtipoSN) {
                echo "----";
              } else {
                print DecToMoeda($valoriss);
              }  ?>
            </strong>
          </div>
        </td>

        <td style="border:#000000 solid; <?php echo $display; ?>">
          Cr??dito p/ Abatimento do IPTU
          <br />
          <div align="right">
            <strong>
              <?php
              if ($codtipo == $codtipoSN) {
                echo "----";
              } else {
                print DecToMoeda($credito);
              } ?>
            </strong>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="5" style="border:#000000 solid" class="cab03">OUTRAS INFORMA????ES</td>
      </tr>
      <tr>
        <td colspan="5" style="border:#000000 solid" align="left">
          - Esta NF-e foi emitida com respaldo na Lei n?? <?php print $lei; ?> e no Decreto n?? <?php print $decreto; ?><br />
          <?php
          if ($codtipo == $codtipoSN) {
            echo "- Esta NF-e n??o gera cr??ditos, pois a empresa prestadora de servi??os ?? optante pelo Simples Nacional<br> ";
          }
          if ($issretido != 0) {
            echo "- Esta NF-e possui reten????o de ISS no valor de R$ $issretido<br> ";
          }
          // verifica o estado do tomador
          if (($MUNICIPIO !== $tomador_municipio) && ($codtipo != $codtipoSN)) {
            if ($ativar_creditos == "s") {
              echo "- Esta NF-e n??o gera cr??dito, pois o Tomador de Servi??os est?? localizado fora do munic??pio de $MUNICIPIO<br>";
            }
          } // fim if	
          if ($rps_numero) {
          ?>
            - Esta NF-e substitui o RPS N?? <?php print $rps_numero; ?>, emitido em <?php print(substr($rps_data, 8, 2) . "/" . substr($rps_data, 5, 2) . "/" . substr($rps_data, 0, 4)); ?><br />
          <?php
          } //fim if rps
          //$valorinss,$aliqinss,$valorirrf,$aliqinss
          if ($valorinss > 0) { //soh mostra se tiver valor
            echo "- Reten????o de INSS " . DecToMoeda($aliqinss) . "% com valor de R$ " . DecToMoeda($valorinss) . " <br>";
          }
          if ($valorirrf > 0) { //soh mostra se tiver valor
            echo "- Reten????o de IRRF " . DecToMoeda($aliqirrf) . "% com valor de R$ " . DecToMoeda($valorirrf) . "";
            if ($deducao_irrf > 0) {
              echo ". Dedu??????o de R$ " . DecToMoeda($deducao_irrf);
            }
            echo "<br>";
          }
          if ($total_retencao > 0) {
            echo "- Total de renten????es da nota R$ " . DecToMoeda($total_retencao) . " <br>";
          }
          ?>
        </td>
      </tr>
    </table>
  </center>
</body>

</html>