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
$sql_test = $PDO->query("SELECT nome, logradouro FROM cadastro WHERE cnpj='$txtCNPJ' OR cpf='$txtCNPJ'");
list($nome_test,$endereco_test) = $sql_test->fetch();
if(!$endereco_test){
	$PDO->query("UPDATE cadastro SET nome='$txtRazaoNome' WHERE cnpj='$txtCNPJ' OR cpf='$txtCNPJ'");
}
$sql=$PDO->query("SELECT codigo FROM cadastro WHERE cnpj='$txtCNPJ' OR cpf='$txtCNPJ'");
list($CodTomador)=$sql->fetch();

$codverificacao = gera_codverificacao();

$totaliss       = MoedaToDec($_POST['txtImpostoTotal']);
$codemissor     = $CodTomador;

$inputs         = $_POST['hdTotalInputs'];  
$total          = MoedaToDec($_POST['txtTotalPagar']);  
$multa          = MoedaToDec($_POST['txtMultaJuros']);  
$cnpfcpf        = $_POST['txtCNPJ'];  
$razaonome      = $_POST['txtRazaoNome'];
$mes            = $_POST['cmbMes'];
$ano            = $_POST['cmbAno'];
$competencia    = $ano."-".$mes."-01";
$dataemissao    = date("Y-m-d");
$data           = explode("-",$dataemissao);
/*$datavencimento = mktime(24*5,0,0,$data[1],$data[2],$data[0]);
$datavencimento = date("Y-m-d",$datavencimento);*/
$datavencimento = UltDiaUtil($data[1],$data[0]);


$PDO->query("
	INSERT INTO des_issretido 
	SET valor='$total',
		iss='$total',
		multa='$multa',
	 	codcadastro='$CodTomador',
	 	competencia='$competencia', 
	 	data_gerado=NOW(),
	 	codverificacao='$codverificacao',
	 	estado='B'
");
$sql=$PDO->query("SELECT MAX(codigo) FROM des_issretido");
list($CodDes)=$sql->fetch();

$sql=$PDO->query("SELECT valor, multa FROM des_issretido WHERE codigo='$CodDes'");
list($ValorGuia,$ValorMulta)=$sql->fetch();

$TotalDeclaracao = 0.00;
for($cont=1;$cont<=$inputs;$cont++) {
	$CnpjCpf = $_POST['txtcnpjcpf'.$cont];
	$sqlCodEmissor=$PDO->query("SELECT codigo FROM cadastro WHERE cnpj='$CnpjCpf' OR cpf='$CnpjCpf'");
	list($codEmissor)=$sqlCodEmissor->fetch(); 
	
	$NroNota = $_POST['txtNroNota'.$cont];
	$ValIss = MoedaToDec($_POST['txtValIssRetido'.$cont]);
	$ValNota = MoedaToDec($_POST['txtValNota'.$cont]); 
	//Mensagem("ISS:$ValIss VALOR:$ValNota");
	$PDO->query("
		INSERT INTO des_issretido_notas 
		SET coddes_issretido='$CodDes', 
			valor_nota='$ValNota', 
			codemissor='$codEmissor',	
			issretido='$ValIss',
			nota_nro='$NroNota'
	");
	$TotalDeclaracao += $ValNota;
}
$PDO->query("
	UPDATE des_issretido
	SET total = '$TotalDeclaracao'
	WHERE codigo='$CodDes'
");

/* --- Separacao da insercao da des com issretido para a emissao de guia --- */

// busca o codigo do banco e o arquivo q gera o boleto
$sql=$PDO->query("SELECT bancos.codigo, bancos.boleto FROM bancos INNER JOIN boleto ON bancos.codigo=boleto.codbanco");
list($codbanco,$boleto)=$sql->fetch();

// inseri a guia de pagamento no db

$PDO->query("
	INSERT INTO 
		guia_pagamento 
	SET 
		valor='$ValorGuia', 
		valormulta='$ValorMulta', 
		dataemissao='$dataemissao',
		datavencimento='$datavencimento', 
		pago='N', 
		estado='N'
");

// busca o codigo da guia de pagamento recem inserida
$sql=$PDO->query("SELECT MAX(codigo) FROM guia_pagamento");
list($codguia)=$sql->fetch();

$PDO->query("
	INSERT INTO 
		guias_declaracoes 
	SET 
		codguia='$codguia',
		codrelacionamento='$CodDes',
		relacionamento='des_issretido'
");
$PDO->query("UPDATE des_issretido SET estado='B' WHERE codigo='$CodDes'");

// retorna o codigo do ultimo relacionamento
$sql=$PDO->query("SELECT MAX(codigo) FROM guias_declaracoes");
list($codrelacionamento)=$sql->fetch();

// gera o nossonumero e chavecontroledoc
$nossonumero = gerar_nossonumero($codguia);
$chavecontroledoc = gerar_chavecontrole($codrelacionamento,$codguia);

// seta o nossonumero e a chavecontroledoc no banco
$PDO->query("UPDATE guia_pagamento SET nossonumero='$nossonumero', chavecontroledoc='$chavecontroledoc' WHERE codigo='$codguia'");

// gera o boleto
Mensagem("Boleto gerado com sucesso");
imprimirGuia($codguia);


$cod_des = base64_encode($CodDes);
NovaJanela("reports/des_prestadores_comprovante.php?CODI=$cod_des");

//-------------------------------------------------------------------------------------------------------------------------------------------------


?>