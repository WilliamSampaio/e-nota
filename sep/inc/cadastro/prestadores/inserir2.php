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
<form  method="post" name="frmCadastro" id="frmCadastro">
	<input type="hidden" name="include" id="include" value="<?php echo  $_POST['include'];?>" />
</form>		  

<?php 
// Pega as variaveis que vieram por POST
$nome               = strtoupper($_POST['txtInsNomeEmpresa']);
$razaosocial        = strtoupper($_POST['txtInsRazaoSocial']);
$cpfcnpj            = $_POST['txtInsCpfCnpjEmpresa'];
$logradouro         = strtoupper($_POST['txtInsEnderecoEmpresa']);
$numero             = $_POST['txtNumero'];
$inscricaomunicipal = strtoupper($_POST['txtInsInscMunicipalEmpresa']);

$email              = $_POST['txtInsEmailEmpresa'];
$tipopessoa         = $_POST['cmbTipoPessoaEmpresa'];
$municipio          = $_POST['txtInsMunicipioEmpresa'];
$login              = $_POST['txtInsCpfCnpjEmpresa'];
$CODCAT             = $_POST['txtMAXCODIGOCAT'];
$uf                 = $_POST['txtInsUfEmpresa'];
$senha              = rand(000000,999999);
$complemento        = strtoupper($_POST['txtComplemento']);
$bairro             = strtoupper($_POST['txtBairro']);
$cep                = $_POST['txtCEP'];
$fone               = $_POST['txtFoneComercial'];
$celular            = $_POST['txtFoneCelular'];
$pispasep           = $_POST['txtPISPASEP'];
$array_codtipo      = explode("|",$_POST['cmbCodtipo']);
$codtipodeclaracao  = $_POST['cmbTipoDec'];
$nfe 				=$_POST['txtNfe'];
/*inst e opr*/
$gerente            = strtoupper($_POST['txtGerente']);
$gerente_cpf        = $_POST['txtCPFGerente'];
$codbanco           = $_POST['cmbBanco'];
$agencia            = $_POST['txtAgenciaInst'];
/*cartorios*/
$adm_publica        = $_POST['cmbAdm'];
$nivel              = $_POST['cmbNivel'];
$diretor            = strtoupper($_POST['txtDiretor']);
$diretor_cpf        = $_POST['txtCPFDiretor'];
$datafim			= DataMysql($_POST['txtDataFim']);
$isentoIss          = $_POST['chkIsentoIss'];
$ultimaNota         = ($_POST['txtNfeNum']-1);

$isentoIss = (empty($isentoIss)) ? $isentoIss = "" :$isentoIss = ",isentoiss='$isentoIss'";

//Pega o codtipo que veio concatenado com o tipo
$codtipo = $array_codtipo[0];
$CODTIPO = $codtipo;

$include=$_POST['include'];



	// define se é ou nao contador
    $sql=$PDO->query("SELECT MAX(codigo) FROM servicos_categorias");
	list($maxcodigo)=$sql->fetch();
	$sql_categoria=$PDO->query("SELECT codigo FROM servicos_categorias WHERE nome = 'Cont�bil'");	
	list($codigocategoria)=$sql_categoria->fetch();
	$categoria=1;
	$servico=1;
	$tipo="empresa";
	while($servico<=5){
		$nomecategoria=explode("|",$_POST['cmbCategoria'.$servico]);
		if($nomecategoria[0]=="$codigocategoria"){
				$tipo="contador";					
		}
				
		while($categoria<=$maxcodigo){
			if($_POST['cmbCodigo'.$categoria.$servico]!=""){$cmbCodigo="qualquercoisa";}
			$categoria++;
		}	
		$servico++;	
	}
    if($tipo=="contador"){
        $sql=$PDO->query("SELECT codigo FROM tipo WHERE tipo='contador'");
		list($codtipo)=$sql->fetch();
    }

    // verifca se o valor da variavel cpfcnpj e valido como cpf ou cmpj
    if((strlen($cpfcnpj)!=14)&&(strlen($cpfcnpj)!=18)){
		Mensagem("O CPF/CNPJ informado não é válido");
		RedirecionaPost("?include={$include}");
		die();//die() para nao executar o restante do arquivo
    }

    //Verifica se não há nenhuma empresa cadastrada com o mesmo nome e/ou cnpj
    $campo=tipoPessoa($cpfcnpj);
	$teste_nome        = $PDO->query("SELECT codigo FROM cadastro WHERE nome = '$nome'");
	$teste_razaosocial = $PDO->query("SELECT codigo FROM cadastro WHERE razaosocial = '$razaosocial'");
	$teste_cnpj        = $PDO->query("SELECT codigo FROM cadastro WHERE $campo = '$cpfcnpj'");
	if($teste_nome->rowCount()>0){
		Mensagem("Já existe um prestador de serviços com este nome");
		RedirecionaPost("?include={$include}");
	}elseif($teste_razaosocial->rowCount()>0){
		Mensagem("Já existe um prestador de serviços com esta razão social");
		RedirecionaPost("?include={$include}");
	}elseif($teste_cnpj->rowCount()>0){
		Mensagem("Já existe um prestador de serviços com este CPF/CNPJ");
		RedirecionaPost("?include={$include}");
	}else{		
	   
		// insere a empresa no banco
        
		
		$sql = $PDO->query("
			INSERT INTO 
				cadastro
            SET 
				nome='$nome',
                senha = MD5('$senha'),
                razaosocial='$razaosocial',
                $campo= '$cpfcnpj',
                logradouro='$logradouro',
                numero='$numero',
                complemento='$complemento',
                bairro='$bairro',
                cep='$cep',
                inscrmunicipal='$inscricaomunicipal',
              
                municipio ='$municipio',
                estado='A',
                nfe = '$nfe',
                email='$email',
                uf='$uf',
                ultimanota= '$ultimaNota',
                fonecomercial = '$fone',
                fonecelular = '$celular',
                codtipo='$CODTIPO',
                codtipodeclaracao='$codtipodeclaracao', 
				pispasep = '$pispasep',
				datafim = '$datafim'
                $isentoIss
		");
			
		
		$sql_busca_cod = $PDO->query("SELECT codigo FROM cadastro WHERE $campo = '$cpfcnpj'");
		list($codigoempresa) = $sql_busca_cod->fetch();
							
							
	   //Pega os codtipo dos prestadores que tem informações extras
	   $codtipo_inst = codtipo('instituicao_financeira');
	   $codtipo_opr  = codtipo('operadora_credito');
	   $codtipo_cart = codtipo('cartorio');
	   
	   //testa se o prestador que está sendo editado tem alguma informação extra
	   if($codtipo == $codtipo_inst){
			$PDO->query("INSERT inst_financeiras SET agencia = '$agencia', codbanco = '$codbanco', codcadastro = '$codigoempresa'");
			$codcargo = codcargo("Gerente");
			add_logs('Inseriu uma Instituição Financeira');
			$PDO->query("INSERT cadastro_resp SET nome = '$gerente', cpf = '$gerente_cpf', codcargo = '$codcargo', codemissor = '$codigoempresa'");
	   }elseif($codtipo == $codtipo_opr){
			$PDO->query("INSERT operadoras_creditos SET agencia = '$agencia', codbanco = '$codbanco', codcadastro = '$codigoempresa'");
			$codcargo = codcargo("Gerente");
			add_logs('Inseriu uma Operadora de Crédito');
			$PDO->query("INSERT cadastro_resp SET nome = '$gerente', cpf = '$gerente_cpf', codcargo = '$codcargo', codemissor = '$codigoempresa'");
	   	}elseif($codtipo == $codtipo_cart){
			$PDO->query("INSERT cartorios SET admpublica = '$adm_publica', nivel = '$nivel', codcadastro = '$codigoempresa'");
			$codcargo = codcargo("Diretor");
			add_logs('Inseriu um Cartório');
			$PDO->query("INSERT cadastro_resp SET nome = '$diretor', cpf = '$diretor_cpf', codcargo = '$codcargo', codemissor = '$codigoempresa'");		
	   }
	   
	   
		
		
		
		//depois de cadastrada a empresa envia-se um passo a passo com  senha para a empresa cadastrada
		$sql_url_site = $PDO->query("SELECT site FROM configuracoes");
		list($LINK_ACESSO) = $sql_url_site->fetch();
		
	
		$msg = "O cadastro da empresa $nome foi efetuado com sucesso.<br>
		Dados da empresa:<br><br>
		Razão Social: $razaosocial<br>
		CPF/CNPJ: $cpfcnpj<br>
		Município: $municipio<br>
		Endereco: $logradouro, $numero<br><br>
		  
		Veja passo a passo como acessar o sistema:	<br><br>
		1- Acesse o site <a href=\"$LINK_ACESSO\"><b>NF-e</b></a><br>
		2- Clique no link do seu respectivo tipo(Prestador ou Contador)<br>
		3- Entre em acessar o sistema<br>
		4- Em login insira o cpf/cnpf da empresa<br>
		5- Sua senha é <b><font color=\"RED\">$senha</font></b><br>
		6- Insira o código de verificação que aparece ao lado<br>
		7- Depois de ter acessado o sistema, vá no link <b>Cadastro</b> e troque sua senha<br>";

        $assunto = "Acesso ao Sistema NF-e ($CONF_CIDADE).";
	
		$headers  = "MIME-Version: 1.0\r\n";
	
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
		$headers .= "From: $CONF_SECRETARIA de $CONF_CIDADE <$CONF_EMAIL>  \r\n";
	
		$headers .= "Cc: \r\n";
	
		$headers .= "Bcc: \r\n";
		
		mail("$email",$assunto,$msg,$headers);
		
		
			
		
		// busca empresa no banco --------------------------------------------------------------------------------------------------		
		$sql_empresa = $PDO->query("SELECT codigo FROM cadastro WHERE $campo = '$cpfcnpj'");
		list($CODEMPRESA) = $sql_empresa->fetch();
	
		
	
		// INSERCAO DE SERVICOS POR EMPRESA INICIO----------------------------------------------------------------------------------		
			$nroservicos = 5;
			//$vetor_servicos = array($cmbCodigo1,$cmbCodigo2,$cmbCodigo3,$cmbCodigo4,$cmbCodigo5);		
		//Insere os servicos no banco...		
			
			//vetores para adicionar servicos
			 $sql_categoria=$PDO->query("SELECT codigo,nome FROM servicos_categorias");
			 
			 $contpos=0;
			 while(list($codcategoria)=$sql_categoria->fetch()) {   
			   $conts=1;
			   for($conts=1;$conts<=5;$conts++) {    
					$vetor_insere_servico[$contpos]=$_POST['cmbCodigo'.$codcategoria.$conts];
					if($_POST['cmbCodigo'.$codcategoria.$conts]){
						$sql = $PDO->query("INSERT INTO cadastro_servicos
                                            SET codservico = '".$_POST['cmbCodigo'.$codcategoria.$conts]."',
                                            codemissor='$CODEMPRESA'");
					} 
					$contpos++;	
			   }		
			 }			
			
			
		// INSERCAO DE SERVICOS POR EMPRESA FIM
	
		// INSERCAO DE RESP/SOCIOS POR EMPRESA INICIO-------------------------------------------------------------------------------
		$contsocios = 0;
		$nrosocios = 10;
		
		$vetor_sociosnomes = array($txtNomeSocio1,$txtNomeSocio2,$txtNomeSocio3,$txtNomeSocio4,$txtNomeSocio5,$txtNomeSocio6,$txtNomeSocio7,$txtNomeSocio8,$txtNomeSocio9,$txtNomeSocio10);	
		$vetor_socioscpf = array($txtCpfSocio1,$txtCpfSocio2,$txtCpfSocio3,$txtCpfSocio4,$txtCpfSocio5,$txtCpfSocio6,$txtCpfSocio7,$txtCpfSocio8,$txtCpfSocio9,$txtCpfSocio10);	
	   //insere os socios no banco
		while($contsocios < $nrosocios) {   
			if($vetor_sociosnomes[$contsocios] != "") {
                if($contsocios==0){
                    $sql_cargo=$PDO->query("SELECT codigo FROM cargos WHERE cargo='Responsável'");
                }else{
                    $sql_cargo=$PDO->query("SELECT codigo FROM cargos WHERE cargo='Sócio'");
                }
                list($codcargo)=$sql_cargo->fetch();
				$vetor_sociosnomes[$contsocios] = strtoupper($vetor_sociosnomes[$contsocios]);
				$sql = $PDO->query("INSERT INTO cadastro_resp
                                    SET codemissor='$CODEMPRESA',
                                    nome = '$vetor_sociosnomes[$contsocios]',
                                    cpf = '$vetor_socioscpf[$contsocios]',
                                    codcargo = '$codcargo'");
			} // fim if	
			$contsocios++;
	   } // fim while   
		// INSERCAO DE RESP/SOCIOS POR EMPRESA FIM
   
   print "<script language=JavaScript> alert('Empresa Inserida Com Sucesso!!');document.getElementById('frmCadastro').submit();</script>";  
   
   
   }
?>