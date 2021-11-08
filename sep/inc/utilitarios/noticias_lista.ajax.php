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

<br>
<h5 class="card-title">
    Notícias Inseridas
</h5>
<hr>

<?php

// Conexao ao banco MySQL e consulta
require_once __DIR__ . '/../../../autoload.php';

//sql buscando as noticias do banco
$query = ("SELECT codigo,titulo,texto,data FROM noticias WHERE sistema = 'nfe' ORDER BY data DESC");
$sql = Paginacao($query, 'frmNoticias', 'divnoticiaslista', 10);

if ($sql->rowCount() > 0) {
?>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Notícia</th>
                <th>Data</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $x = 0;
            while (list($codigo, $titulo, $texto, $data) = $sql->fetch()) {
                //pega somente 60 caracteres do texto original
                $textreduzido = substr($texto, 0, 60);
                //testa se tiver mais de 30 caracteres acrescenta reticencias a string
                if (strlen($textreduzido) > 45) {
                    $textreduzido .= "...";
                } //fim if
            ?>

                <tr>
                    <td><?php echo $titulo ?></td>
                    <td><?php echo $textreduzido ?></td>
                    <td><?php echo DataPt($data) ?></td>
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#textoModal<?php echo $codigo ?>" name="btVer" title="Ver Conteúdo completo"><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluirNoticia<?php echo $codigo ?>" name="btExcluir" title="Excluir notícia"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>

                <!-- Modal texto completo: <?php echo $codigo ?> -->
                <div class="modal fade" id="textoModal<?php echo $codigo ?>" tabindex="-1" aria-labelledby="textoModalLabel<?php echo $codigo ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="textoModalLabel<?php echo $codigo ?>">Texto:</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><?php echo $texto ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal excluir noticia: <?php echo $codigo ?> -->
                <div class="modal fade" id="excluirNoticia<?php echo $codigo ?>" tabindex="-1" aria-labelledby="excluirNoticiaLabel<?php echo $codigo ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="excluirNoticiaLabel<?php echo $codigo ?>">Confirmar exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Deseja realmente excluir esta notícia?<br>
                                    <strong><?php echo $titulo ?></strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger" onclick="document.getElementById('hdCodNt').value=<?php echo $codigo ?>;" name="btExcluir" value="excluir">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                $x++;
            } //fim while
            ?>

            <input name="hdCodNt" id="hdCodNt" type="hidden" />
        </tbody>
    </table>

<?php
} //fim if
?>