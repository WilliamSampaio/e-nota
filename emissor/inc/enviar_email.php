<?php
	require_once("conect.php");
	require_once("../../funcoes/util.php");

	$codnota = $_POST['txtNotaEmail'];
	$sql = $PDO->query("
		SELECT
			notas.numero,
			notas.codemissor
		FROM
			notas
		WHERE
			codigo = '$codnota'		
	");
	$dados = $sql->fetch();
	
	if(notificaTomador($dados['codemissor'],$dados['numero'])){
		Mensagem("Nota enviada ao tomador");
	}else{
		Mensagem("Erro ao enviar a nota ao tomador");
	}
?>
<script>window.close();</script>