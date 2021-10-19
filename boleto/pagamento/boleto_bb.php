	<?php
session_start();
include("../../include/conect.php");
$sql=$PDO->query("SELECT agencia,contacorrente,convenio,contrato,carteira FROM boleto");
list($agencia,$contacorrente,$convenio,$contrato,$carteira)=$sql->fetch(); 
if($_GET['COD']) 
{
    $codigoboleto=base64_decode($_GET['COD']);   
    
	$guiap = $PDO->query("SELECT c.razaosocial,c.logradouro,c.numero,c.bairro,if(cpf,cpf,cnpj) as cnpjcpf,gp.codigo, DATE_FORMAT(gp.datavencimento,'%d/%m/%Y')as
						  vencimento,gp.nossonumero,gp.valor FROM guia_pagamento as gp
						  INNER JOIN livro as l ON l.codigo=gp.codlivro 
						  INNER JOIN cadastro as c on c.codigo=l.codcadastro
						  WHERE gp.codigo= $codigoboleto");
	$dados = $guiap->fetchObject();	
	$nossoN= $dados->codigo;
	
	while(strlen($nossoN) < 5){
		$nossoN = '0'.$nossoN;
	}

	$PDO->query("UPDATE guia_pagamento SET nossonumero='$nossoN' WHERE codigo= $codigoboleto");
}		

$valor= str_replace('.',',',$valor);

// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 0;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado = $dados->valor; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = $nossoN;
$dadosboleto["numero_documento"] = $nossoN;	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $dados->vencimento; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $dados->razaosocial;
$dadosboleto["endereco1"] = $dados->logradouro.' , '.$dados->numero.' '.$dados->bairro;
$dadosboleto["endereco2"] = $dados->cnpjcpf;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento referente a declara��o eletr�nica de servi�os";
$dadosboleto["demonstrativo2"] = //"Mensalidade referente a nonon nonooon nononon<br>Taxa banc�ria - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "";

// INSTRU��ES PARA O CAIXA
$dadosboleto["instrucoes1"] = " ";
$dadosboleto["instrucoes2"] = " ";
$dadosboleto["instrucoes3"] = " ";
$dadosboleto["instrucoes4"] = " ";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "N";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "RC";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - BANCO DO BRASIL
$dadosboleto["agencia"] = $agencia; // Num da agencia, sem digito
$dadosboleto["conta"] = $contacorrente; 	// Num da conta, sem digito

// DADOS PERSONALIZADOS - BANCO DO BRASIL
$dadosboleto["convenio"] = $convenio;  // Num do conv�nio - REGRA: 6 ou 7 ou 8 d�gitos
$dadosboleto["contrato"] = $contrato; // Num do seu contrato
$dadosboleto["carteira"] = $carteira;
$dadosboleto["variacao_carteira"] = "-019";  // Varia��o da Carteira, com tra�o (opcional)

// TIPO DO BOLETO
$dadosboleto["formatacao_convenio"] = "6"; // REGRA: 8 p/ Conv�nio c/ 8 d�gitos, 7 p/ Conv�nio c/ 7 d�gitos, ou 6 se Conv�nio c/ 6 d�gitos
$dadosboleto["formatacao_nosso_numero"] = "2"; // REGRA: Usado apenas p/ Conv�nio c/ 6 d�gitos: informe 1 se for NossoN�mero de at� 5 d�gitos ou 2 para op��o de at� 17 d�gitos

/*
#################################################
DESENVOLVIDO PARA CARTEIRA 18

- Carteira 18 com Convenio de 8 digitos
  Nosso n�mero: pode ser at� 9 d�gitos

- Carteira 18 com Convenio de 7 digitos
  Nosso n�mero: pode ser at� 10 d�gitos

- Carteira 18 com Convenio de 6 digitos
  Nosso n�mero:
  de 1 a 99999 para op��o de at� 5 d�gitos
  de 1 a 99999999999999999 para op��o de at� 17 d�gitos

#################################################
*/


// SEUS DADOS
$dadosboleto["identificacao"] = "";
$dadosboleto["cpf_cnpj"] = "$CONF_CNPJ";
$dadosboleto["endereco"] = "$CONF_ENDERECO";
$dadosboleto["cidade_uf"] = "$CONF_CIDADE / $CONF_ESTADO";
$dadosboleto["cedente"] = "Prefeitura Municipal de $CONF_CIDADE";

// N�O ALTERAR!
include("include/funcoes_bb.php"); 
include("include/layout_bb.php");
?>
