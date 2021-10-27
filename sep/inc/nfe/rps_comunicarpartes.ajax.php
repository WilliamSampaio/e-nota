<?php
	require_once("../conect.php");
	require_once("../../funcoes/util.php");
	
	$codSolicitacao = $_GET['codRPS'];
		
	$sql_dados_emissor = $PDO->query("
		SELECT 
			cadastro.nome,
			cadastro.razaosocial,
			cadastro.email,
			rps_solicitacoes.estado
		FROM
			cadastro
		INNER JOIN
			rps_solicitacoes ON rps_solicitacoes.codcadastro = cadastro.codigo
		WHERE
			rps_solicitacoes.codigo = '$codSolicitacao'
	");
	list($nome,$razaoSocial,$email,$estadoRPS) = $sql_dados_emissor->fetch();
	
	switch($estadoRPS){
		case "A":
			$str_estado = "está em analise";
		  break;
		case "L":
			$str_estado = "foi liberada pela prefeitura";
		  break;
		case "R":
			$str_estado = "foi recusada pela prefeitura";
		  break;
	}
	
	if(!$razaoSocial){
		$razaoSocial = $nome;
	}
	
	$msg = "
		".$razaoSocial.",<br />
		<br />
		Esta é uma notifica��o, informando que sua solicitação de aumento do limite de RPS, ".$str_estado.".<br />
		<br />
		para maiores detalhes favor entrar em contato com a prefeitura.
	";
	
	$retorno = envia_email($email,"Solicita��o de RPS",$msg);
	if($retorno == 1){
		$PDO->query("UPDATE rps_solicitacoes SET comunicado = 'S' WHERE codigo = '$codSolicitacao'");
	}
	echo $retorno;
		
	
?>