<?php

class ArquivoRetorno
{

	function codigoGuiaPeloNossonumero($nossonumero)
	{
		require_once '../../../autoload.php';
		$sql = $PDO->query("SELECT codigo FROM guia_pagamento WHERE nossonumero = '$nossonumero' AND pago <> 'S'");
		if ($sql->rowCount() == 0) {
			return false;
		}
		list($cod_guia) = $sql->fetch();
		return $cod_guia;
	}

	function registrarPagamentoGuia($codguia)
	{
		require_once '../../../autoload.php';

		$PDO->query("UPDATE guia_pagamento SET pago = 'S' WHERE codigo = '$codguia'");
		$sql_codguia = $PDO->query("
			SELECT 
				n.codnota 
			FROM 
				guia_pagamento as gp 
			INNER JOIN 
			    livro as l ON gp.codlivro=l.codigo
			INNER JOIN livro_notas as n on n.codlivro=l.codigo		
			WHERE 
				gp.codigo = '$codguia' 
		");

		while (list($cod_nota) = $sql_codguia->fetch()) {
			//echo "$codguia - $cod_nota<br>";
			$PDO->query("UPDATE notas SET estado = 'E' WHERE codigo = '$cod_nota'");
			$sqlcredito = $PDO->query("SELECT codtomador,credito FROM notas WHERE codigo='$cod_nota'");
			$dadoscred = $sqlcredito->fetchObject();
			$PDO->query("UPDATE cadastro SET credito = credito+{$dadoscred->credito} WHERE codigo = '$dadoscred->codtomador'");
		}
		return $sql_codguia->rowCount();
	}

	function registrarPagamentoManual($nossonumero, $valor)
	{
		require_once '../../../autoload.php';

		$valor = MoedaToDec($valor);
		$sql = $PDO->query("SELECT codigo FROM guia_pagamento WHERE nossonumero = '$nossonumero' AND valor = $valor");
		if ($sql->rowCount() == 0) {
			return false;
		} else {
			list($cod_guia) = $sql->fetch();
			return $this->registrarPagamentoGuia($cod_guia);
		}
	}

	function lerTxtRetorno($arquivo_txt_upload)
	{
		$arquivo_txt = $_FILES[$arquivo_txt_upload];
		//pega o endereco da pasta para guardar o aruivo de retorno
		$target_path = dirname(__FILE__) . "/arquivosretorno/";

		if (!is_dir($target_path)) {
			mkdir($target_path);
		}

		//monta o endereco onde vai ficar os arquivos de retorno
		$target_path = $target_path . basename($arquivo_txt['name']);
		$arquivo = $target_path;

		if (move_uploaded_file($arquivo_txt['tmp_name'], $target_path)) {
			//echo "The file ".  basename( $arquivo_txt['name']). " has been uploaded";
			//echo "Sucesso!";
		} else {
			echo "Ocorreu um erro durante o upload, favor tentar novamente!";
			//se ocorrer um erro para o script
			return;
		}

		//le o arquivo em forma de array
		$arq_array = file($target_path);

		//tira a primeira linha que é a identificacao do banco
		$dados_banco = array_shift($arq_array);

		//tira a ultima que nao sei para que serve
		$dados_foot = array_pop($arq_array);

		$total_guias = count($arq_array);

		$cont_guias = 0;

		$cont_notas = 0;

		foreach ($arq_array as $lin) if ($lin) {
			//o nosso numero esta na posisao 56 e tem 25 caracteres de tamanho
			$nossonumero = substr($lin, 56, 25);
			$cod_guia = $this->codigoGuiaPeloNossonumero($nossonumero);

			//conta as guias atualizadas com sucesso
			$reg_guias = $this->registrarPagamentoGuia($cod_guia);

			if ($reg_guias > 0) {
				$cont_guias++;
			}

			$cont_notas += $reg_guias;
		}
		//echo "<br>{$cont_guias}/{$total_guias} guias pagas <br>{$cont_notas} notas escrituradas";

		//retorna um resumo da operacao de leitura do arquivo
		return array(
			'guias' 		=> $cont_guias,
			'total_guias'	=> $total_guias,
			'notas'		=> $cont_notas
		);
	}

	/**
	 * Funcao para leitura de arquivo de retorno do banco referente ao simples nacional
	 */
	function lerTxtRetornoDAF607($arquivo_txt_upload, $periodo)
	{
		$arquivo_txt = $_FILES[$arquivo_txt_upload];
		//pega o endereco da pasta para guardar o aruivo de retorno
		$target_path = dirname(__FILE__) . "/arquivosretornoSN/";

		if (!is_dir($target_path)) {
			mkdir($target_path);
		}

		//monta o endereco onde vai ficar os arquivos de retorno
		$target_path = $target_path . basename($arquivo_txt['name']);
		$arquivo = $target_path;

		if (!move_uploaded_file($arquivo_txt['tmp_name'], $target_path)) {
			echo "Ocorreu um erro durante o upload, favor tentar novamente!";
			return;
		}

		//le o arquivo em forma de array
		$arq_array = file($target_path);

		//remove a linha HEADER
		$dados_banco = array_shift($arq_array);

		//remove a linha TRAILER
		$dados_foot = array_pop($arq_array);

		$total_guias = count($arq_array);

		$cont_guias = 0;

		$cont_notas = 0;

		//Registra o diretorio do arquivo no banco de dados
		$cod_arquivo = $this->registraArquivo(basename($arquivo_txt['name']), NULL);

		$competencia = null;
		
		foreach ($arq_array as $lin) if ($lin) {
			//Busca no arquivo os dados para a escrituracao
			$cnpj = substr($lin, 74, 14);
			$competencia = substr($lin, 100, 6);
			$reais = substr($lin, 107, 14);
			$moeda = substr($lin, 121, 2);
			$valor = (int) $reais . "." . $moeda;

			if ($periodo == $competencia) {
				$cod_livro = $this->retornaCodGuiaDAF607($cnpj, $competencia, $valor);

				//conta as guias atualizadas com sucesso
				$reg_guias = $this->registrarPagamentoDAF607($cod_livro);

				if ($reg_guias > 0) {
					$this->registraLivroArquivo($cod_livro, $cod_arquivo);
					$cont_guias++;
				}

				$cont_notas += $reg_guias;
			} else {
				Mensagem_onload("O período selecionado não confere com o período das guias no arquivo DAF607!");
				return;
			}
		}

		//Atualiza o registro do arquivo no banco
		$this->registraArquivo(basename($arquivo_txt['name']), $competencia);

		//retorna um resumo da operacao de leitura do arquivo
		return array(
			'guias' 		=> $cont_guias,
			'total_guias'	=> $total_guias,
			'notas'		=> $cont_notas
		);
	}

	function retornaCodGuiaDAF607($cnpj, $competencia, $valor)
	{
		require_once '../../../autoload.php';

		//Busca o codigo do contribuinte
		$cnpj_tratado = mascaraCpf($cnpj);
		$data_tratada = mascaraCompetencia($competencia);
		$sql_cadastro = $PDO->query("SELECT codigo FROM cadastro WHERE cnpj = '$cnpj_tratado'");
		list($cod_cadastro) = $sql_cadastro->fetch();

		//Busca o codigo do livro pelo codigo do contribuinte e competencia
		$sql_livro = $PDO->query("SELECT codigo FROM livro WHERE codcadastro = '$cod_cadastro' AND periodo = '$data_tratada' AND valoriss = '$valor'");
		if ($sql_livro->rowCount() == 0) {
			return false;
		}
		list($cod_livro) = $sql_livro->fetch();

		//Busca o codigo da guia referente ao codigo do livro
		/*$sql_guia = $PDO->query("SELECT codigo FROM guia_pagamento WHERE codlivro = '$cod_livro'");
		list($cod_guia) = $sql_livro);*/

		return $cod_livro;
	}

	function registrarPagamentoDAF607($cod_livro)
	{
		require_once '../../../autoload.php';

		//$PDO->query("UPDATE guia_pagamento SET pago = 'S' WHERE codigo = '$codguia'");

		$sql_notas = $PDO->query("
			SELECT 
				codnota 
			FROM 
				livro_notas	
			INNER JOIN
				notas ON livro_notas.codnota = notas.codigo
			WHERE 
				codlivro = '$cod_livro' AND notas.estado <> 'E'
		");

		while (list($cod_nota) = $sql_notas->fetch()) {
			//echo "$codguia - $cod_nota<br>";
			$PDO->query("UPDATE notas SET estado = 'E' WHERE codigo = '$cod_nota'");
			$sqlcredito = $PDO->query("SELECT codtomador, credito FROM notas WHERE codigo = '$cod_nota'");
			$dadoscred = $sqlcredito->fetchObject();
			$PDO->query("UPDATE cadastro SET credito = credito+{$dadoscred->credito} WHERE codigo = '$dadoscred->codtomador'");
		}
		return $sql_notas->rowCount();
	}

	//Funcao que registra o arquivo no banco
	function registraArquivo($endereco_arquivo, $competencia = NULL)
	{
		require_once '../../../autoload.php';

		if ($competencia) {
			$competencia = mascaraCompetencia($competencia);
		}
		$sql_arquivo_busca = ("SELECT codigo FROM notas_arquivos WHERE arquivo = '$endereco_arquivo'");
		$query = $PDO->query($sql_arquivo_busca);

		if ($query->rowCount() > 0) {
			list($cod_arquivo) = $query->fetch();
			$sql_arquivo_atualizar = ("UPDATE notas_arquivos SET arquivo = '$endereco_arquivo', competencia = '$competencia' WHERE codigo = '$cod_arquivo'");
			$PDO->query($sql_arquivo_atualizar);
		} else {
			$sql_arquivo_inserir = ("INSERT INTO notas_arquivos SET arquivo = '$endereco_arquivo', competencia = '$competencia'");
			$PDO->query($sql_arquivo_inserir);
			$cod_arquivo = $PDO->lastInsertId();
		}

		return $cod_arquivo;
	}

	//Funcao que registra o relacionamento entre os livros escriturados e o arquivo upado
	function registraLivroArquivo($cod_livro, $cod_arquivo)
	{
		require_once '../../../autoload.php';
		$sql_busca_arquivo_livro = $PDO->query("SELECT codigo FROM notas_arquivo_livro WHERE codarquivo = '$cod_arquivo' AND codlivro = '$cod_livro'");
		if (!$sql_busca_arquivo_livro->rowCount()) {
			$sql_arquivo_livro = $PDO->query("INSERT INTO notas_arquivo_livro SET codarquivo = '$cod_arquivo', codlivro = '$cod_livro'");
		}
	}
}
