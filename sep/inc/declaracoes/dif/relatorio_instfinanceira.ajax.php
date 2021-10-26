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
    require_once("../conect.php");
    require_once("../../funcoes/util.php");

    //recebe os dados
    $razaosocial=strip_tags(addslashes($_GET['txtInstFinanceiras']));
    $estado=$_GET['cmbEstado'];
    $municipio=$_GET['cmbMunicipio'];
    $uf=$_GET['cmbUf'];
    $cnpj=$_GET['txtCnpj'];

    // monta a query e exibe os dados com paginacao
    $query=("SELECT codigo,
             nome,
             cnpj,
             municipio,
             uf,
             estado
             FROM inst_financeiras
             WHERE razaosocial LIKE '$razaosocial%'
             AND estado LIKE '$estado%'
             AND municipio LIKE '$municipio%'
             AND uf LIKE '$uf%'
             AND cnpj LIKE '$cnpj%'");

    $sql_instfinanceiras=Paginacao($query,'frmRelatorio','detalhes_instfinanceiras',10);
    if($sql_instfinanceiras->rowCount()>0){
        ?>
            <table  width="100%" align="center">
                <tr align="center" bgcolor="999999">
                    <td>Nome</td>
                    <td>CNPJ</td>
                    <td>Municipio</td>
                    <td>UF</td>
                    <?php if(!$estado){?><td>Estado</td><?php } ?>
                </tr>
        <?php
            while($dados=$sql_instfinanceiras->fetch()){
                if($dados['estado']=="I"){
                    $dados['estado']="Inativo";
                }elseif($dados['estado']=="A"){
                    $dados['estado']="Ativo";
                }else{
                    $dados['estado']="Não Liberado";
                }
                echo "
                    <tr align=\"left\" bgcolor=\"FFFFFF\">
                        <td>".$dados['nome']."</td>
                        <td>".$dados['cnpj']."</td>
                        <td>".$dados['municipio']."</td>
                        <td>".$dados['uf']."</td>
                ";
                if(!$estado){
                    echo"<td>".$dados['estado']."</td>";
                }
                echo "</tr>";
            }
        ?>
            </table>
        <?php
    }else{
        echo "Nenhum resultado encontrado!";
    }
?>
