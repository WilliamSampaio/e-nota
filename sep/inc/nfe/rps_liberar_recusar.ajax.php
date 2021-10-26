<?php
	require_once("../conect.php");
	require_once("../../funcoes/util.php");
	
	$tipo = $_GET['tipo'];
	$codSolicitacao = $_GET['codigo'];
	$novoLimite = $_GET['novoLimite'];
	
	if($tipo == "L"){
	
		$sql_busca_solicitante = $PDO->query("
			SELECT 
				cadastro.codigo 
			FROM 
				cadastro
			INNER JOIN
				rps_solicitacoes ON rps_solicitacoes.codcadastro = cadastro.codigo
			WHERE 
				rps_solicitacoes.codigo = '$codSolicitacao'
		");
		list($codCadastro) = $sql_busca_solicitante->fetch();	
		
		$PDO->query("UPDATE rps_solicitacoes SET estado = 'L' WHERE codigo = '$codSolicitacao'");
		
		$sql_testa = $PDO->query("SELECT codigo,limite FROM rps_controle WHERE codcadastro = '$codCadastro'");
		if($sql_testa->rowCount()){			
			$dadosrps=$sql_testa->fetchObject();
			$PDO->query("UPDATE rps_controle SET limite = '$novoLimite',ultimo_limite='{$dadosrps->limite}' WHERE codcadastro = '$codCadastro' ");
		}else{
			$PDO->query("INSERT INTO rps_controle SET codcadastro = '$codCadastro', limite = '$novoLimite'");
		}
		
	}elseif($tipo == "R"){
	
		$PDO->query("UPDATE rps_solicitacoes SET estado = 'R' WHERE codigo = '$codSolicitacao'");
		
	}
?>