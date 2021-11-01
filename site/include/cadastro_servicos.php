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

$nroservicos = 5;
$contservico = 1;

while ($contservico <= $nroservicos) {

?>

	<!------------------- SERVICO <?php print $contservico ?> ------------------->
	<tbody id="linha01servico<?php echo $contservico ?>" style="display:none"></tbody>
	<tbody id="camposservico<?php echo $contservico ?>" style="display:none">

		<?php

		$sql_maxcodcat = $PDO->query("SELECT MAX(codigo) FROM servicos_categorias");
		list($maxcodcat) = $sql_maxcodcat->fetch();

		?>

		<tr>
			<td>
				<div class="form-floating mb-3">

					<select class="form-select" name="cmbCategoria<?php echo $contservico ?>" id="cmbCategoria<?php echo $contservico ?>" onchange="ServicosCategorias(this);">
						<option value=""></option>
						<?php
						$sql_categoria = $PDO->query("SELECT codigo, nome FROM servicos_categorias");
						while (list($codcat, $nomecat) = $sql_categoria->fetch()) {
							print("<option value=\"$codcat|$contservico|$maxcodcat\">$nomecat</option>");
						}
						?>
					</select>
					<label for="cmbCategoria<?php echo $contservico ?>"><?php print(($cont < 10 ? '0' . $cont : $cont) . ' - Serviço') ?></label>

				</div>
			</td>

			<td>
				<div class="form-floating mb-3">
					<?php if ($contservico > 1) { ?>
						<input class="btn btn-danger" type="button" name="btexcluiServico<?php echo "|" . $maxcodcat . "|" . $contservico ?>" value="X" onclick="excluirServico(this);">
					<?php } else { ?>
						<input class="btn btn-danger" type="button" name="btexcluiServico<?php echo "|" . $maxcodcat . "|" . $contservico ?>" value="X" onclick="excluirServico(this);" disabled>
					<?php } ?>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<?php
				$sql_categoria = $PDO->query("SELECT codigo,nome FROM servicos_categorias");
				while (list($codcategoria) = $sql_categoria->fetch()) {
				?>

					<div class="form-floating mb-3" id="div<?php echo $codcategoria . $contservico ?>" style="display:none">
						<?php
						$sql_servicos = $PDO->query("
							SELECT 
								codigo,
								codservico,
								descricao,
								aliquota,
								estado
							FROM 
								servicos
							WHERE 
								estado = 'A' AND codcategoria = '$codcategoria' 
							ORDER BY 
								codservico
							");
						?>
						<select class="form-select" name="cmbCodigo<?php echo $codcategoria . $contservico ?>" id="cmbCodigo<?php echo $codcategoria . $contservico ?>">
							<option value="">Código | Descrição | Aliquota %</option>
							<?php
							// laco para display das opcoes no combo
							while (list($codigo, $codservico, $descricao, $aliquota, $estado) = $sql_servicos->fetch()) {
								print("<option value=$codigo>$codservico | " . substr($descricao, 0, 70) . "... | $aliquota</option>");
							} // fecha while
							?>
						</select>
						<label for="cmbCodigo<?php echo $codcategoria . $contservico ?>">Aliquota</label>
					</div>

				<?php } ?>
			</td>
		</tr>
		<input type="hidden" value="<?php print $maxcodcat ?>" name="txtMAXCODIGOCAT" />
		<input type="hidden" value="<?php print $nroservicos ?>" name="txtNumeroServicos" />
		<input type="hidden" value="<?php print $contservico ?>" name="txtContServicos" />
	</tbody>
	<tbody id="linha02socio<?php echo $contservico ?>" style="display:none"></tbody>

<?php
	$contservico++;
}

?>