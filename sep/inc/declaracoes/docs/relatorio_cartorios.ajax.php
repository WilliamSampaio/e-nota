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
    $nome=strip_tags(addslashes($_GET['txtNome']));
    $cnpj=$_GET['txtCNPJ'];
    $estado=$_GET['cmbEstado'];

    //monta a query
    $query=("SELECT nome,
             cnpj,
             responsavel_nome AS responsavel,
             diretor_nome AS diretor,
             estado
             FROM cartorios
             WHERE nome LIKE '$nome%'
             AND razaosocial LIKE '$nome%'
             AND cnpj LIKE '$cnpj%'
             AND estado LIKE '$estado%'
             ORDER BY nome");

    //chama o resultado paginado, via ajax
    $sql_cartorios=Paginacao($query,'frmRelatorio','detalhes_cartorios',10);

    //caso encontre resultados, exibe. caso contrario retorna uma mensagem pro usuario
    if($sql_cartorios->rowCount()>0){
        ?>
        <table width="100%">
            <tr bgcolor="999999" align="center">
                <td>Nome</td>
                <td>CNPJ</td>
                <td>Diretor</td>
                <td>Responsável</td>
                <td>Estado</td>
            </tr>
            <?php
                while($dados = $sql_cartorios->fetch()){
                    if($dados['estado']=="A"){
                        $dados['estado']="Ativo";
                    }elseif($dados['estado']=="I"){
                        $dados['estado']="Inativo";
                    }else{
                        $dados['estado']="Não Liberado";
                    }
                    echo "
                        <tr bgcolor=\"FFFFFF\">
                            <td>".$dados['nome']."</td>
                            <td>".$dados['cnpj']."</td>
                            <td>".$dados['diretor']."</td>
                            <td>".$dados['responsavel']."</td>
                            <td>".$dados['estado']."</td>
                        </tr>
                    ";
                }
            ?>
        </table>
        <?php
    }else{
        echo "Nenhum Resultado encontrado";
    }
?>