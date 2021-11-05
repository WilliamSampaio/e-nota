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

require_once __DIR__ . '/../../../autoload.php';
require_once __DIR__ . '/../../../vendor/autoload.php';

// use OpenBoleto\Banco\BancoDoBrasil;
// use OpenBoleto\Agente;

/*if($_POST){
	
	$cod_guia=base64_encode($_POST['hdCodigoGuia']);

	/*
	
	if($_POST['hdCnpjComTomador']!=""){//des com discriminacao de tomador
		include 'gerarguia_comtomador.php';
	}
	if($_POST['hdCNPJ']!=""){//des sem tomador e o cnpj do emissor nao cadastrado
		include 'gerarguia_semtom_cnpjnaocad.php';
	}
	if($_POST['hdCNPJsemTomador']!=""){//des sem tomador e emissor cadastrado
		include 'gerarguia_semtomador.php';
	}
	if($_POST['hdTotalInputs']!=""){//declaracao de iss retido
		include 'gerarguia_issretido.php';
	}
	
	//Mensagem("Serviço(s) declarado(s)!");
	//Redireciona("../../tomadores.php");
	Redireciona("../../../boleto/pagamento/boleto_bb.php?COD=$cod_guia");
}*/

$codnota		= $_POST["hdCodigoGuia"];
$codemissor		= $_POST["txtEmissor"];
$hoje           = date("Y-m-d");
$dataem         = explode("-", $hoje);

$sql = $PDO->query("SELECT codemissor, issretido, DATE(datahoraemissao) AS data FROM notas WHERE codigo = '$codnota'");
$dados_notas = $sql->fetch();

/*$dataem = explode("-", $dados_notas['data']);

if($dataem[1] < 12){
	$aux = $dataem[1]+1;
	if(($aux < 10) && (strlen($aux) < 2)){
		$aux = "0".$aux;
	}
}else{
	$aux = 01;
	$dataem[2] = $dataem[2] + 1;
}
$vencimento = $dataem[0]."-". $aux ."-".$dataem[2];
*/

$vencimento = UltDiaUtil($dataem[1], $dataem[0], true);
$dataInicio = DataPt($vencimento);
$dataFim = DataPt($hoje);
$dias = diasDecorridos($dataInicio, $dataFim);
if ($dias < 0) {
	$dias = 0;
}
$multa = calculaMultaDes($dias, $dados_notas['issretido']);

$sql_banco = $PDO->query("SELECT bancos.codigo, bancos.boleto FROM bancos INNER JOIN boleto ON bancos.codigo = boleto.codbanco");
list($codbanco, $boleto) = $sql_banco->fetch();

$insere_guia = ("
	INSERT INTO 
		guia_pagamento
	SET	
		valor = '{$dados_notas['issretido']}',
		valormulta = '$multa',
		dataemissao = '$hoje',
		datavencimento = '$vencimento',
		pago = 'N', 
		estado = 'N',
		codnota = '$codnota'
");


if ($PDO->query($insere_guia)) {
	$sqlguia = $PDO->query("SELECT MAX(codigo) FROM guia_pagamento");
	list($codguiapag) = $sqlguia->fetch();
	$nossonumero = gerar_nossonumero($dados_notas['codemissor'], $vencimento);
	$chavecontroledoc = gerar_chavecontrole($dados_notas["codemissor"], $codguiapag);
	$PDO->query("UPDATE guia_pagamento SET nossonumero='$nossonumero', chavecontroledoc='$chavecontroledoc' WHERE codigo='$codguiapag'");

	$sql_boleto = $PDO->query("SELECT MAX(codigo) FROM guia_pagamento");
	list($codigoboleto) = $sql_boleto->fetch();
	$crypto = base64_encode($codigoboleto);
	Mensagem("Boleto gerado com sucesso");
	//imprimirGuia($codigoboleto);
	print("<script>window.location = '../../../boleto/recebimento/index.php?COD=$crypto';</script>");
	//Redireciona("pagamento.php");	

	// $sql_sacado = $PDO->query("SELECT c.cnpj, c.cpf, c.nome, c.logradouro, c.cep, c.municipio, c.uf FROM cadastro c WHERE c.codigo in (SELECT n.codtomador from notas n where n.codigo = '$codnota')");
	// $sql_sacado = $sql_sacado->fetchObject();

	// $sql_cedente = $PDO->query("SELECT c.cnpj, c.cpf, c.nome, c.logradouro, c.cep, c.municipio, c.uf FROM cadastro c WHERE c.codigo in (SELECT n.codemissor from notas n where n.codigo = '$codnota')");
	// $sql_cedente = $sql_cedente->fetchObject();

	// $sacado = new Agente(strtoupper($sql_sacado->nome), ($sql_sacado->cnpj . $sql_sacado->cpf), $sql_sacado->logradouro, $sql_sacado->cep, $sql_sacado->municipio, $sql_sacado->uf);

	// $cedente = new Agente(strtoupper($sql_cedente->nome), ($sql_cedente->cnpj . $sql_cedente->cpf), $sql_cedente->logradouro, $sql_cedente->cep, $sql_cedente->municipio, $sql_cedente->uf);

	// $boleto = new BancoDoBrasil(array(
	// 	// Parâmetros obrigatórios
	// 	'dataVencimento' => new DateTime($vencimento),
	// 	'valor' => $dados_notas['issretido'],
	// 	'sequencial' => 1234567, // Para gerar o nosso número
	// 	'sacado' => $sacado,
	// 	'cedente' => $cedente,
	// 	'agencia' => 1724, // Até 4 dígitos
	// 	'carteira' => 18,
	// 	'conta' => 10403005, // Até 8 dígitos
	// 	'convenio' => 1234, // 4, 6 ou 7 dígitos
	// ));

	// echo $boleto->getOutput();
} else {
	Mensagem("Erro ao inserir guia de pagamento. Contate a prefeitura");
}
?>