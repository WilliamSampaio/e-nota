<?php
/**
 * classe para ler o arquivo de retorno enviado pelo banco
 * 
 * @author Jean Farias Roldao
 */
class ArquivoRetorno {
	function codigoGuiaPeloNossonumero($nossonumero){
		require_once '../../../autoload.php';
		$sql = $PDO->query("SELECT codigo FROM guia_pagamento WHERE nossonumero = '$nossonumero' AND pago <> 'S'");
		if ($sql->rowCount() == 0) {
			return false;
		}
		list($cod_guia) = $sql->fetch();
		return $cod_guia;
	}
	
	function registrarPagamentoGuia($codguia){
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
		
		while (list($cod_nota) = $sql_codguia->fetch()){
			//echo "$codguia - $cod_nota<br>";
			$PDO->query("UPDATE notas SET estado = 'E' WHERE codigo = '$cod_nota'");
			$sqlcredito = $PDO->query("SELECT codtomador,credito FROM notas WHERE codigo='$cod_nota'");
			$dadoscred= $sqlcredito->fetchObject();
			$PDO->query("UPDATE cadastro SET credito = credito+{$dadoscred->credito} WHERE codigo = '$dadoscred->codtomador'");
			
			
			
		}
		return $sql_codguia->rowCount();
	}
	
	function registrarPagamentoManual($nossonumero, $valor){
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
	
	function lerTxtRetorno($arquivo_txt_upload){
		$arquivo_txt = $_FILES[$arquivo_txt_upload];
		//pega o endereco da pasta para guardar o aruivo de retorno
		$target_path = dirname(__FILE__)."/arquivosretorno/";
		
		if (!is_dir($target_path)) {
			mkdir($target_path);
		}
		
		//monta o endereco onde vai ficar os arquivos de retorno
		$target_path = $target_path . basename( $arquivo_txt['name']); 
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
			$nossonumero = substr($lin,56,25);
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
}
