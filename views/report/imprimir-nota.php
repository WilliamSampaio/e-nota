<?php

function verificaCampo($campo)
{
	return $campo == "" ? "NÃO INFORMADO" : $campo;
}

function formataEndereco($cadastro)
{
	$endereco = '';
	$endereco .= $cadastro->logradouro != '' ? $cadastro->logradouro : '';
	$endereco .= $cadastro->numero != '' ? ', ' . $cadastro->numero : '';
	$endereco .= $cadastro->complemento != '' ? ', ' . $cadastro->complemento : '';
	$endereco .= $cadastro->bairro != '' ? ' - ' . $cadastro->bairro : '';
	return $endereco;
}

function formataValor($valor)
{
	return number_format($valor, 2, ',', '.');
}

if ($configuracoes->ativar_creditos == "n") {
	$display = "display:none";
	$colspan = "colspan=\"2\"";
} else {
	$display = "display:block";
	$colspan = "";
}

?>

<input style="margin-left: auto; margin-right: auto;" name="btImprimir" id="btImprimir" type="button" class="botao" value="Imprimir" onClick="document.getElementById('btImprimir').style.display = 'none';print();document.getElementById('btImprimir').style.display = 'block';">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>e-Nota [Imprimir Nota]</title>
	<link href="../../../contrachequedigital/prefeitura/css/imprimir_emissor.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		html {
			font-family: sans-serif;
			font-size: 1px;
		}

		table.gridview {
			width: 100%;
			font-size: 10px;
			font-family: Verdana, Arial, Helvetica, sans-serif;
			border-bottom-width: thick;
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

<body style="text-align: center;">

	<table width="800" cellspacing="0" cellpadding="2" style="font-size: 10pt; margin-left: auto; margin-right: auto; border:#000000 1px solid;border-collapse:collapse">
		<tr>
			<td colspan="4" rowspan="3" width="75%" style="border:#000000 1px solid; text-align: center;">
				<!-- tabela prefeitura inicio -->
				<table width="100%" cellspacing="0" cellpadding="2">
					<tr>
						<td rowspan="4" width="20%" valign="top" style="text-align: center;">
							<img src="<?= url('assets/pref_' . strtolower(str_replace(' ', '_', $configuracoes->cidade)) . "/img/{$configuracoes->brasao_nfe}") ?>" alt="" width="64" height="64" class="d-inline-block align-text-top">
							<br />
						</td>
						<td width="80%" class="cab01"><?= strtoupper("Prefeitura Municipal de ") . $configuracoes->cidade ?></td>
					</tr>
					<tr>
						<td class="cab03"><?= $configuracoes->secretaria ?></td>
					</tr>
					<tr>
						<td class="cab02">NOTA FISCAL ELETRÔNICA DE SERVIÇOS - NF-e</td>
					</tr>
					<?php if ($nota->rps_numero) : ?>
						<tr>
							<td>RPS Nº <?= $nota->rps_numero ?>, emitido em <?= date("d/m/Y", strtotime($nota->rps_data)) ?>.</td>
						</tr>
					<?php endif ?>
				</table>

				<!-- tabela prefeitura fim -->
			</td>
			<td width="25%" colspan="2" style="border:#000000 1px solid; text-align: left;">Número da Nota<br />
				<div style="text-align: center;">
					<span face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?= $nota->numero ?></strong></span>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border:#000000 1px solid; text-align: left;">Data e Hora de Emissão<br />
				<div style="text-align: center;">
					<span face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?= date("d/m/Y H:i:s", strtotime($nota->created_at)) ?></strong></span>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border:#000000 1px solid; text-align: left;">Código de Verificação<br />
				<div style="text-align: center;">
					<span face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong><?= $nota->cod_verificacao ?></strong></span>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="6" style="border:#000000 1px solid; text-align: center;">
				<!-- tabela prestador -->
				<table width="100%" cellspacing="0" cellpadding="2" style="font-size: 10pt;">
					<tr>
						<td colspan="3" style="text-align: center;" class="cab03">PRESTADOR DE SERVIÇOS</td>
					</tr>
					<tr>
						<td rowspan="6">
							<?php if ($prestador->logo != "") : ?>
								<img src="<?= url('assets/pref_' . strtolower(str_replace(' ', '_', $configuracoes->cidade)) . "/img/empresa/{$prestador->logo}") ?>" width="64" height="64">
							<?php endif ?>
						</td>
						<td style="text-align: left;">CNPJ/CPF: <strong><?= $prestador->cnpj . $prestador->cpf ?></strong></td>
						<td style="text-align: left;">Inscrição Municipal: <strong><?= verificaCampo($prestador->inscrmunicipal) ?></strong></td>
					</tr>
					<tr>
						<td style="text-align: left;">Nome: <strong><?= $prestador->nome ?></strong></td>
						<td style="text-align: left;">Inscrição Estadual: <strong><?= verificaCampo($prestador->inscrestadual) ?></strong></td>
					</tr>
					<tr>
						<td style="text-align: left;">Razão Social: <strong><?= $prestador->razaosocial ?></strong></td>
						<td style="text-align: left;">PIS/PASEP: <strong><?= verificaCampo($prestador->pispasep) ?></strong></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: left;">Endereço: <strong><?= formataEndereco($prestador) ?></strong></td>
					</tr>
					<tr>
						<td style="text-align: left;">Município: <strong><?= $prestador->municipio ?></strong></td>
						<td style="text-align: left;">UF: <strong><?= $prestador->uf ?></strong></td>
					</tr>
				</table>

				<!-- tabela prestador -->
			</td>
		</tr>
		<tr>
			<td colspan="6" style="border:#000000 1px solid; text-align: center;">
				<!-- tabela tomador inicio -->

				<table width="100%" cellspacing="0" cellpadding="2" style="font-size: 10pt;">
					<tr>
						<td colspan="3" class="cab03" style="text-align: center;">TOMADOR DE SERVIÇOS</td>
					</tr>
					<tr>
						<td style="text-align: left;">Nome/Razão Social: <strong><?= verificaCampo($tomador->nome) ?></strong></td>
						<td style="text-align: left;">Inscrição Estadual: <strong><?= verificaCampo($tomador->inscrestadual) ?></strong></td>
					</tr>
					<tr>
						<td style="text-align: left;" width="450">CPF/CNPJ: <strong><?= verificaCampo($tomador->cnpj . $tomador->cpf) ?></strong></td>
						<td style="text-align: left;">Inscrição Municipal: <strong><?= verificaCampo($tomador->inscrmunicipal) ?></strong></td>
					</tr>
					<tr>
						<td style="text-align: left;">Endereço: <strong><?= formataEndereco($tomador) ?></strong></td>
						<td style="text-align: left;">CEP: <strong><?= verificaCampo($tomador->cep) ?></strong></td>
					</tr>
					<tr>
						<td style="text-align: left;">Município: <strong><?= verificaCampo($tomador->municipio) ?></strong></td>
						<td style="text-align: left;">UF: <strong><?= verificaCampo($tomador->uf) ?></strong></td>
					</tr>
					<tr>
						<td style="text-align: left;">E-mail: <strong><?= verificaCampo($tomador->email) ?></strong></td>
					</tr>
				</table>

				<!-- tabela tomador fim -->
			</td>
		</tr>
		<tr>
			<td colspan="6" style="border:#000000 1px solid; text-align: center;">

				<!-- tabela discrimacao dos servicos -->

				<table width="100%" cellspacing="0" cellpadding="2" style="font-size: 10pt;">
					<tr>
						<td class="cab03" style="text-align: center;">DISCRIMINAÇÃO DE SERVIÇOS E DEDUÇÕES</td>
					</tr>
					<tr>
						<td height="400" style="text-align: left;" valign="top">
							<br />
							<table class="gridview" style="text-align: center;">
								<tr>
									<th style="text-align: center;">Código</th>
									<th style="text-align: center;">Serviço</th>
									<th style="text-align: center;">Alíquota (%)</th>
									<th style="text-align: center;">Base de Calculo (R$)</th>
									<th style="text-align: center;">Iss retido (R$)</th>
									<th style="text-align: center;">Iss (R$)</th>
								</tr>
								<?php

								$totalALiquota = 0;
								foreach ($servicos as $servico) :

								?>
									<tr>
										<td style="text-align: center;" <?= !$servico->id ? "title='Não possui codigo de serviço'" : '' ?>>
											<?= $servico->id ? $servico->id : "N/P" ?>
										</td>
										<td style="text-align: left;"><?= $servico->descricao ?></td>
										<td style="text-align: right;"><?= formataValor($servico->aliquota) ?></td>
										<td style="text-align: right;"><?= formataValor($servico->base_calculo) ?></td>
										<td style="text-align: right;"><?= formataValor($servico->iss_retido) ?></td>
										<td style="text-align: right;"><?= formataValor($servico->iss) ?></td>
									</tr>
									<tr>
										<th colspan="6" style="text-align: center;"><strong>Discriminação</strong></th>
									</tr>
									<tr>
										<td height="30" style="text-align: left;" colspan="6">
											<?= $servico->discriminacao ? $servico->discriminacao : "Não foi informado" ?>
										</td>
									</tr>
								<?php

									$totalALiquota += $servico->aliquota;
								endforeach;

								?>
							</table>
							<br />
							<?php if ($nota->estado == "C") : ?>
								<div style="text-align: center;">
									<span size=7 color=#FF0000><b>ATENÇÃO!!<br>NFE CANCELADA</span><br>
									<span size=5 color=#FF0000>Motivo do cancelamento:<br><?= $nota->motivo_cancelamento ?></b></span>
								</div>
							<?php endif ?>
						</td>
					</tr>
				</table>

				<!-- tabela discrimacao dos servicos -->
			</td>
		</tr>
		<?php

		if ($nota->discriminacao) :
			$nota->discriminacao = nl2br($nota->discriminacao);

		?>
			<tr>
				<td colspan="6" style="border:#000000 1px solid; text-align: center;">
					<table width="100%" style="font-size: 10pt;">
						<tr>
							<td class="cab03" style="text-align: center;">DISCRIMINAÇÃO DA NOTA</td>
						</tr>
						<tr>
							<td style="text-align: left;">
								<?= $nota->discriminacao ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php endif ?>

		<?php

		if ($nota->observacao) :

		?>
			<tr>
				<td colspan="6" style="border:#000000 1px solid; text-align: center;">
					<table width="100%" style="font-size: 10pt;">
						<tr>
							<td class="cab03" style="text-align: center;">OBSERVAÇÕES DA NOTA</td>
						</tr>
						<tr>
							<td style="text-align: left;">
								<?= $nota->observacao ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php endif ?>

		<tr>
			<td colspan="6" class="cab03" style="border:#000000 1px solid; text-align: center;">VALOR TOTAL DA NOTA = R$ <?= formataValor($nota->valor_total) ?></td>
		</tr>
		<tr>
			<?php

			if ($nota->valor_acrescimos > 0) :

			?>
				<td style="border:#000000 1px solid">Deduções (R$)<br />
					<div style="text-align: right;"><strong><?= formataValor($nota->valor_deducoes) ?></strong></div>
				</td>
				<td style="border:#000000 1px solid">Acréscimos (R$)<br />
					<div style="text-align: right;"><strong><?= formataValor($nota->valor_acrescimos) ?></strong></div>
				</td>
			<?php

			else :
				if ($configuracoes->ativar_creditos == "n") :
					$colspan = "colspan=\"3\"";
				endif;

			?>

				<td style="border:#000000 1px solid">Valor Total das Deduções (R$)<br />
					<div style="text-align: right;"><strong><?= formataValor($nota->valor_deducoes) ?></strong></div>
				</td>

			<?php endif ?>

			<td style="border:#000000 1px solid" colspan="2">Base de Cálculo (R$)<br />
				<div style="text-align: right;"><strong><?= formataValor($nota->base_calculo) ?></strong></div>
			</td>

			<td style="border:#000000 1px solid; display:none">
				Aliquota (%)
				<br>
				<div style="text-align: right;">
					<strong>
						<?php

						if ($simples_nacional) {
							echo "----";
						} else {
							echo formataValor($totalALiquota) . " %";
						}

						?>
					</strong>
				</div>
			</td>

			<td style="border:#000000 1px solid; text-align: center;" <?= $colspan ?>>
				Valor do ISS (R$)
				<br />
				<div style="text-align: right;">
					<strong>
						<?php

						if ($simples_nacional) :
							echo "----";
						else :
							echo formataValor($nota->valor_iss);
						endif

						?>
					</strong>
				</div>
			</td>

			<td style="border:#000000 1px solid; <?= $display ?>">
				Crédito
				<br />
				<div style="text-align: right;">
					<strong>
						<?php

						if ($simples_nacional) :
							echo "----";
						else :
							echo formataValor($nota->credito);
						endif

						?>
					</strong>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="6" style="border:#000000 1px solid" class="cab03">OUTRAS INFORMAÇÕES</td>
		</tr>
		<tr>
			<td colspan="6" style="border:#000000 1px solid; text-align: left;">
				- Esta NF-e foi emitida com respaldo na Lei nº <?= $configuracoes->lei ?> e no Decreto nº <?= $configuracoes->decreto ?><br />
				<?php

				if ($simples_nacional) :
					echo "- Esta NF-e não gera créditos, pois a empresa prestadora de serviços é optante pelo Simples Nacional<br> ";
				endif;

				if ($nota->iss_retido != 0) :
					echo "- Esta NF-e possui retenção de ISS no valor de R$ " . formataValor($nota->iss_retido) . "<br> ";
				endif;

				if ($nota->pispasep > 0) :
					echo "- Está NF-e possui PIS/PASEP no valor de R$ " . formataValor($nota->pispasep) . "<br />";
				endif;

				if ($nota->cofins > 0) :
					echo "- Está NF-e possui COFINS no valor de R$ " . formataValor($nota->cofins) . "<br />";
				endif;

				if ($nota->contribuicao_social > 0) :
					echo "- Está NF-e possui Contribuição Social no valor de R$ " . formataValor($nota->contribuicao_social) . "<br />";
				endif;

				// verifica o estado do tomador
				if (($configuracoes->cidade != $tomador->municipio) && (!$simples_nacional)) :
					if ($configuracoes->ativar_creditos == "s") :
						echo "- Esta NF-e não gera crédito, pois o Tomador de Serviços está localizado fora do município de $CONF_CIDADE<br>";
					endif;
				endif;

				if ($nota->rps_numero) :

				?>

					- Esta NF-e substitui o RPS Nº <?= $nota->rps_numero ?>, emitido em <?= date("d/m/Y", strtotime($nota->rps_data)) ?><br />

				<?php

				endif;

				//$valorinss,$aliqinss,$valorirrf,$aliqinss
				if ($nota->valor_inss > 0) : //soh mostra se tiver valor
					if ($nota->aliq_inss > 0) :
						echo "- Retenção de INSS " . formataValor($nota->aliq_inss) . "% com valor de R$ " . formataValor($nota->valor_inss) . " <br>";
					else :
						echo "- Retenção de INSS com valor de R$ " . formataValor($nota->valor_inss) . " <br>";
					endif;
				endif;

				if ($nota->valor_irrf > 0) : //soh mostra se tiver valor
					if ($nota->aliq_irrf > 0) :
						echo "- Retenção de IRRF " . formataValor($nota->aliq_irrf) . "% com valor de R$ " . formataValor($nota->valor_irrf) . "";
						if ($nota->deducao_irrf > 0) :
							echo ". Dedução de R$ " . formataValor($nota->deducao_irrf);
						endif;
						echo "<br>";
					else :
						echo "- Retenção de IRRF com valor de R$ " . formataValor($nota->valor_irrf) . "";
						if ($nota->deducao_irrf > 0) :
							echo ". Dedução de R$ " . formataValor($nota->deducao_irrf);
						endif;
						echo "<br>";
					endif;
				endif;

				if ($nota->total_retencao > 0) :
					echo "- Total de retenções da nota R$ " . formataValor($nota->total_retencao) . " <br>";
				endif;

				?>
			</td>
		</tr>

		<?php

		if ($nota->created_at >= '2011-08-01 12:23:00') :
			echo "<tr><td><p>Créditos com validade apartir do dia 01/08/2011</p></td></tr>";
		endif;

		?>

	</table>
	<br><br>
</body>

</html>