	<?php

	require_once '../../autoload.php';

	function esquerda($entra,$comp){
		return substr($entra,0,$comp);
	}
	
	function direita($entra,$comp){
		return substr($entra,strlen($entra)-$comp,$comp);
	}

	function modulo_10($num)
	{
		$numtotal10 = 0;
		$fator = 2;

		// Separacao dos numeros
		for ($i = strlen($num); $i > 0; $i--) {
			// pega cada numero isoladamente
			$numeros[$i] = substr($num, $i - 1, 1);
			// Efetua multiplicacao do numero pelo (valor 10)
			// 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Itaú
			$temp = floatval($numeros[$i]) * $fator;
			$temp0 = 0;
			foreach (preg_split('//', $temp, -1, PREG_SPLIT_NO_EMPTY) as $k => $v) {
				$temp0 += $v;
			}
			$parcial10[$i] = $temp0; //$numeros[$i] * $fator;
			// monta sequencia para soma dos digitos no (modulo 10)
			$numtotal10 += $parcial10[$i];
			if ($fator == 2) {
				$fator = 1;
			} else {
				$fator = 2; // intercala fator de multiplicacao (modulo 10)
			}
		}

		// várias linhas removidas, vide função original
		// Calculo do modulo 10
		$resto = $numtotal10 % 10;
		$digito = 10 - $resto;
		if ($resto == 0) {
			$digito = 0;
		}

		return $digito;
	}


	function formata_numero($numero, $loop, $insert, $tipo = "geral")
	{
		if ($tipo == "geral") {
			$numero = str_replace(",", "", $numero);
			while (strlen($numero) < $loop) {
				$numero = $insert . $numero;
			}
		}
		if ($tipo == "valor") {
			/*
		retira as virgulas
		formata o numero
		preenche com zeros
		*/
			$numero = str_replace(",", "", $numero);
			while (strlen($numero) < $loop) {
				$numero = $insert . $numero;
			}
		}
		if ($tipo == "convenio") {
			while (strlen($numero) < $loop) {
				$numero = $numero . $insert;
			}
		}
		return $numero;
	}

	function geraCodigoDeBarras($valor){
$fino = 1 ;
$largo = 3 ;
$altura = 50 ;
  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){ 
    for($f2=9;$f2>=0;$f2--){  
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){ 
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }
//Desenho da barra
//Guarda inicial
?>
    <img src=img/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
	src=img/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
	src=img/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
	src=img/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
<?php

$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=img/p.gif width=<?=$f1?> height=<?=$altura?> border=0><img 
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=img/b.gif width=<?=$f2?> height=<?=$altura?> border=0><img 
<?
  }
}

// Draw guarda final
?>
src=img/p.gif width=<?=$largo?> height=<?=$altura?> border=0><img 
src=img/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=img/p.gif width=<?=1?> height=<?=$altura?> border=0> 
  <?
} //Fim da função

	$sql = $PDO->query("SELECT agencia, contacorrente, convenio, contrato, carteira FROM boleto");
	list($agencia, $contacorrente, $convenio, $contrato, $carteira) = $sql->fetch();
	$codigoboleto = base64_decode($_GET['COD']);
	// $codigoboleto=589;
	if ($codigoboleto) {
		$sqlguiapagamento = $PDO->query("SELECT codlivro, codnota FROM guia_pagamento WHERE guia_pagamento.codigo = '$codigoboleto'");
		$dados = $sqlguiapagamento->fetch();
		if ($dados['codlivro'] != NULL) {
			$sql_tipo_guia = $PDO->query("
			SELECT
				cadastro.codigo,
				cadastro.codtipo,
				cadastro.cnpj,
				cadastro.cpf,
				cadastro.razaosocial,
				cadastro.logradouro,
				cadastro.numero,
				livro.codcadastro, 
				livro.periodo,
				livro.basecalculo,
				DATE_FORMAT(guia_pagamento.dataemissao,'%d/%m/%Y'), 
				guia_pagamento.valor, 
				guia_pagamento.valormulta, 
				guia_pagamento.nossonumero, 
				DATE_FORMAT(guia_pagamento.datavencimento,'%d/%m/%Y')
			FROM 
				guia_pagamento 
			INNER JOIN 
				livro ON livro.codigo = guia_pagamento.codlivro
			INNER JOIN
				cadastro ON cadastro.codigo = livro.codcadastro
			WHERE 
				guia_pagamento.codigo = '$codigoboleto'
			");
		} else {
			$sql_tipo_guia = $PDO->query("
			SELECT
				cadastro.codigo,
				cadastro.codtipo,
				cadastro.cnpj,
				cadastro.cpf,
				cadastro.razaosocial,
				cadastro.logradouro,
				cadastro.numero,
				notas.codemissor, 
				DATE_FORMAT(notas.datahoraemissao, '%Y-%m'),
				notas.valortotal,
				DATE_FORMAT(guia_pagamento.dataemissao,'%d/%m/%Y'), 
				guia_pagamento.valor, 
				guia_pagamento.valormulta, 
				guia_pagamento.nossonumero, 
				DATE_FORMAT(guia_pagamento.datavencimento,'%d/%m/%Y')
			FROM 
				guia_pagamento 
			INNER JOIN 
				notas ON notas.codigo = guia_pagamento.codnota
			INNER JOIN
				cadastro ON cadastro.codigo = notas.codemissor
			WHERE 
				guia_pagamento.codigo = '$codigoboleto'
			");
		}


		list(
			$CodigoEmpresa, $CodTipo, $Cnpj, $cpf, $RazaoSocial, $EndSacado, $Numero, $codrel, $Competencia, $Receita, $emissao, $valorbl, $valormulta,
			$nossonumero, $vencimento
		) = $sql_tipo_guia->fetch();

		if ($dados['codlivro'] != NULL) {
			$queryatividades = $PDO->query("SELECT servicos.descricao FROM cadastro_servicos INNER JOIN servicos ON cadastro_servicos.codservico=servicos.codigo WHERE cadastro_servicos.codemissor = '$CodigoEmpresa'");
		} else {
			$codigotipo = codtipo('tomador');
			if ($codigotipo == $CodTipo) {
				$nometomador = $PDO->query("SELECT tomador_nome, issretido FROM notas WHERE codigo = '{$dados['codnota']}'");
				list($TomadorNome, $IssRetido) = $nometomador->fetch();
				$RazaoSocial = $TomadorNome;
				$valorbl = $IssRetido;
				$valormulta = 0;
			}
			$queryatividades = $PDO->query("
			SELECT servicos.descricao 
			FROM servicos 
			INNER JOIN notas_servicos ON notas_servicos.codservico = servicos.codigo 
			WHERE notas_servicos.codnota = '{$dados['codnota']}'");
		}

		$taxa_boleto = 0;

		//DEFINE OS 3 PRIMEIROS CARACTERES DA LINHA DIGITAVEL
		$tipoProduto = "8"; // para definir como arrecadação
		$tipoSegmento = "1"; //para definir como prefeitura
		$tipoValor = "6"; // Define o modulo de geração do digito verificador


		//$CONF_CNPJ
		//$CONF_ENDERECO
		//$CONF_CIDADE
		//$CONF_ESTADO


		//FORMATA O VALOR DO BOLETO

		$valorbl += $valormulta;
		$valor = $valorbl; //variavel do banco;	
		$valor = str_replace(",", ".", $valor);
		$valor_boleto = number_format($valor + $taxa_boleto, 2, ',', '');
		$valor = formata_numero($valor_boleto, 11, 0, "valor");

		// FORMATA O CNPJ DEIXANDO-O SOMENTE COM NUMEROS
		$sqlfebraban = $PDO->query("SELECT codfebraban FROM boleto");
		$febraban = $sqlfebraban->fetchObject();
		$identificacao = $febraban->codfebraban;



		//$nossonumero=$nossonumero; // convenio + zeros + codguia	

		//GERA O DIGITO VERIFICADOR 
		$dv = modulo_10($tipoProduto . $tipoSegmento . $tipoValor . $valor . $identificacao . $nossonumero);

		//echo '----- '.$dv.' -----';
		//MONTA A LINHA DIGITAVEL
		$linha = $tipoProduto . $tipoSegmento . $tipoValor . $dv . $valor . $identificacao . $nossonumero;

		//print($linha);


		//MOSTRA O CODIGO DE BARRAS
		$linha01 = substr($linha, 0, 11);
		$dv01 = modulo_10($linha01);

		$linha02 = substr($linha, 11, 11);
		$dv02 = modulo_10($linha02);

		$linha03 = substr($linha, 22, 11);
		$dv03 = modulo_10($linha03);


		$linha04 = substr($linha, 33, 11);
		$dv04 = modulo_10($linha04);

		$linhad = $linha01 . '-' . $dv01 . ' ' . $linha02 . '-' . $dv02 . ' ' . $linha03 . '-' . $dv03 . ' ' . $linha04 . '-' . $dv04 . "<br>";

		//echo$nossonumero."<br>";
		//echo strlen($nossonumero)."<br>";
		//geraCodigoDeBarras($linha);
		$sql_instrucoes_boleto = $PDO->query("SELECT instrucoes FROM boleto");
		list($Instrucoes_boleto) = $sql_instrucoes_boleto->fetch();

		// INCLUDE DO LAYOUT	
		require_once("layout.php");
	}
	?>