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
	<input type="hidden" name="CODEMISSOR" id="CODEMISSOR" value="<?php echo  $_POST['CODEMISSOR'];?>" />
</form>
 
<?php 
//pega as variaveis que vieram do formulario
$editado = 0;
$nomeempresa        = $_POST['txtInsNomeEmpresa'];
$razaosocial        = $_POST['txtInsRazaoSocial'];
$cnpjcpfempresa     = $_POST['txtInsCpfCnpjEmpresa'];
$enderecoempresa    = $_POST['txtInsEnderecoEmpresa'];
$numero             = $_POST['txtNumero'];
$inscrmunicipal     = $_POST['txtInsInscMunicipalEmpresa'];
$municipio          = $_POST['txtInsMunicipioEmpresa'];
$uf                 = $_POST['txtInsUfEmpresa'];
$nfe                =$_POST['txtNfe'];
if(!$nfe)           {$nfe='N';}
$emailempresa       = $_POST['txtInsEmailEmpresa'];
$codigoempresa      = $_POST['CODEMISSOR'];
$estado             = $_POST['rgEstado'];
$complemento        = $_POST['txtComplemento'];
$bairro             = $_POST['txtBairro'];
$cep                = $_POST['txtCEP'];
$fone               = $_POST['txtFoneComercial'];
$celular            = $_POST['txtFoneCelular'];
$pispasep           = $_POST['txtPISPASEP'];
$array_codtipo      = explode("|",$_POST['cmbCodtipo']);
$codtipodeclaracao  = $_POST['cmbTipoDec'];
/*inst e opr*/
$gerente            = $_POST['txtGerente'];
$gerente_cpf        = $_POST['txtCPFGerente'];
$codbanco           = $_POST['cmbBanco'];
$agencia            = $_POST['txtAgenciaInst'];
/*cartorios*/
$adm_publica        = $_POST['cmbAdm'];
$nivel              = $_POST['cmbNivel'];
$diretor            = $_POST['txtDiretor'];
$diretor_cpf        = $_POST['txtCPFDiretor'];
$datainicio         = DataMysql($_POST['txtData']);
$datafim            = DataMysql($_POST['txtDataFim']);
$isentoIss          = $_POST['chkIsentoIss'];
$ultimaNota         = ($_POST['txtNfeNum']-1);

$isentoIss = (empty($isentoIss)) ? $isentoIss = "" : $isentoIss = ",isentoiss='$isentoIss'";

//Pega o codtipo que veio concatenado com o tipo
$codtipo_prestador = $array_codtipo[0];
	

	// define se é ou nao contador
    $sql=$PDO->query("SELECT MAX(codigo) FROM servicos_categorias");
	list($maxcodigo)=$sql->fetch();
	$sql_categoria=$PDO->query("SELECT codigo FROM servicos_categorias WHERE nome = 'Contábil'");	
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

	
	
//variaveis contadoras para servico

$contservicos = 0;
$numservicos = 5;

//variaveis contadoras para socios
$contsocios = 0;
$numsocios = 10;
//vetores para editar servicos
$vetor_editar_servicos = array($cmbEditaServico1,$cmbEditaServico2,$cmbEditaServico3,$cmbEditaServico4,$cmbEditaServico5);

$vetor_cod_servico= array($servico1,$servico2,$servico3,$servico4,$servico5);

$vetor_exluir_servicos = array($checkExcluiServico1,$checkExcluiServico2,$checkExcluiServico3,$checkExcluiServico4,$checkExcluiServico5);



//vetores para adicionar servicos
 $sql_categoria=$PDO->query("SELECT codigo,nome FROM servicos_categorias");
 
 $contpos=0;
 while(list($codcategoria)=$sql_categoria->fetch())
 {   
   $conts=1;
   for($conts=1;$conts<=5;$conts++)
   {    
		$vetor_insere_servico[$contpos]=$_POST['cmbCodigo'.$codcategoria.$conts];
		$contpos++;	
   }		
 }	
 





//vetores para editar sócio
$vetor_sociosnomes = array($txtnomesocio1,$txtnomesocio2,$txtnomesocio3,$txtnomesocio4,$txtnomesocio5,$txtnomesocio6,$txtnomesocio7,$txtnomesocio8,$txtnomesocio9,$txtnomesocio10);

$vetor_socioscpf = array($txtcpfsocio1,$txtcpfsocio2,$txtcpfsocio3,$txtcpfsocio4,$txtcpfsocio5,$txtcpfsocio6,$txtcpfsocio7,$txtcpfsocio8,$txtcpfsocio9,$txtcpfsocio10);

$vetor_codigo_socios= array($txtCodigoSocio1,$txtCodigoSocio2,$txtCodigoSocio3,$txtCodigoSocio4,$txtCodigoSocio5,$txtCodigoSocio6,$txtCodigoSocio7,$txtCodigoSocio8,$txtCodigoSocio9,$txtCodigoSocio10);

$vetor_excluir_socios = array($checkExcluiSocio1,$checkExcluiSocio2,$checkExcluiSocio3,$checkExcluiSocio4,$checkExcluiSocio5,
$checkExcluiSocio6,$checkExcluiSocio7,$checkExcluiSocio8,$checkExcluiSocio9,$checkExcluiSocio10);




//vetores para inserir sócio

$vetor_nome_socios = array($txtNomeSocio1,$txtNomeSocio2,$txtNomeSocio3,$txtNomeSocio4,$txtNomeSocio5,$txtNomeSocio6,
$txtNomeSocio7,$txtNomeSocio8,$txtNomeSocio9,$txtNomeSocio10);

$vetor_cpf_socios = array($txtCpfSocio1,$txtCpfSocio2,$txtCpfSocio3,$txtCpfSocio4,$txtCpfSocio5,$txtCpfSocio6,$txtCpfSocio7,
$txtCpfSocio8,$txtCpfSocio9,$txtCpfSocio10);

//lista os dados da empresa-------------------------------------------------------------------------------------------------------
$campo = tipoPessoa($cnpjcpfempresa);
$sql_dados_empresa=$PDO->query("SELECT nome,codtipo,codtipodeclaracao,razaosocial,$campo,inscrmunicipal,email,logradouro,numero,estado,nfe,pispasep, datainicio, datafim, cep, fonecomercial, fonecelular, municipio, complemento, bairro FROM cadastro
 WHERE codigo = '$codigoempresa'");
list(
	$Nempresa,$CodTipo,$CodTipoDec,$Rempresa,$CNCPempresa,$Iempresa,$ESempresa,$EMempresa,$ENempresa,$NMempresa,$OPestado,$Nfe,$Pispasep,
	$EMdatainicio,$EMdatafim, $EMcep, $EMfone, $FCcelular, $Mmunicipio, $Ccomplemento, $Bbairro)=$sql_dados_empresa->fetch(); 

    $campo=tipoPessoa($cnpjcpfempresa);
	$teste_nome        = $PDO->query("SELECT codigo FROM cadastro WHERE nome = '$nomeempresa' AND nome != '$Nempresa'");
	$teste_razaosocial = $PDO->query("SELECT codigo FROM cadastro WHERE razaosocial = '$razaosocial' AND razaosocial != '$Rempresa'");
	$teste_cnpj        = $PDO->query("SELECT codigo FROM cadastro WHERE $campo = '$cnpjcpfempresa' AND $campo != '$CNCPempresa'");
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


//Busca os dados adcionais da tabela
$codcargo_gerente = codcargo('Gerente');
$codcargo_diretor = codcargo('Diretor');					
$sql_resp = $PDO->query("SELECT nome, cpf FROM cadastro_resp WHERE codemissor = '$codigoempresa' AND 
(codcargo = '$codcargo_gerente' OR codcargo = '$codcargo_diretor')");
list($Nome_Responsavel,$Cpf_Responsavel) = $sql_resp->fetch();


//Busca as informações que são extra para cada tipo de prestador
$sql_info_instituicoes = $PDO->query("SELECT agencia, codbanco FROM inst_financeiras WHERE codcadastro = '$codigoempresa'");
list($Agencia_Inst,$Codbanco_Inst) = $sql_info_instituicoes->fetch();

$sql_info_operadoras = $PDO->query("SELECT agencia, codbanco FROM operadoras_creditos WHERE codcadastro = '$codigoempresa'");
list($Agencia_Opr,$Codbanco_Opr) = $sql_info_operadoras->fetch();

$sql_info_cartorios = $PDO->query("SELECT admpublica, nivel FROM cartorios WHERE codigo = '$codigoempresa'");
list($Admpublica_Cart,$Nivel_Cart) = $sql_info_cartorios->fetch();


//Atualiza dados da Empresa---------------------------------------------------------------------------------------------------------
if(($nomeempresa != $Nempresa) ||($razaosocial != $Rempresa)|| ($cnpjcpfempresa != $CNCPempresa) || ($enderecoempresa != $ENempresa) ||($inscrmunicipal != $Iempresa) || ($emailempresa != $EMempresa) || ($estado != $OPestado) || ($codtipodeclaracao != $CodTipoDec) || ($codtipo_prestador != $CodTipo) || ($codbanco != $Codbanco_Inst) || ($codbanco != $Codbanco_Opr) || ($agencia != $Agencia_Inst) || ($agencia != $Agencia_Opr) || ($adm_publica != $Admpublica_Cart) || ($nivel != $Nivel_Cart) || ($nfe != $Nfe) || ($pispasep != $Pispasep) || ($datainicio != $EMdatainicio) || ($datafim != $EMdatafim) || ($cep != $EMcep) || ($fone != $EMfone) || ($numero != $NMempresa) || ($celular != $FCcelular) || ($municipio != $Mmunicipio) || ($complemento != $Ccomplemento) || ($bairro != $Bbairro))
 {   
  
   /*$sql=$PDO->query("
   UPDATE usuarios SET nome = '$nomeempresa',login = '$cnpjcpfempresa'
   WHERE nome = '$Nempresa'");*/
   
   
   $sql=$PDO->query("
       UPDATE cadastro
           SET nome = '$nomeempresa',
           razaosocial = '$razaosocial',
           $campo = '$cnpjcpfempresa',
           inscrmunicipal = '$inscrmunicipal',
           email= '$emailempresa',
           logradouro = '$enderecoempresa',
           numero = '$numero',
           estado = '$estado',
           uf='$uf',
           municipio='$municipio',
           nfe='$nfe',
           complemento = '$complemento',
           bairro='$bairro',
           cep='$cep',
           fonecomercial = '$fone',
           fonecelular = '$celular',
           codtipodeclaracao='$codtipodeclaracao',
           codtipo = '$codtipo_prestador',
           pispasep = '$pispasep',
           datainicio='$datainicio',
           datafim='$datafim',
           ultimanota = '$ultimaNota'
           $isentoIss
           WHERE codigo = '$codigoempresa'
   ");
      
	//Verifica se foi mudado o estado da empresa, caso tenha sido mudado envia um e-mail para a empresa informando
	if($estado != $OPestado){
	
		if($estado == "I"){
			
			$msg = "
				$nomeempresa,<br>
				<br>
				Por meio deste e-mail, estamos informando-lhe que o estado de sua empresa<br>
				foi alterado para inativo no Sistema Eletrônico da Prefeitura (SEP).<br>
				Assim sua empresa não podera efetuar login no sistema de NF-e.<br>
				<br>
				Para mais informações, entrar em contato com a prefeitura.
			";
			
		}else{
		
			$msg = "
				$nomeempresa,<br>
				<br>
				Por meio deste e-mail, estamos informando-lhe que o estado de sua empresa<br>
				foi alterado para Ativo no Sistema Eletrônico da Prefeitura (SEP).<br>
				Assim sua empresa podera efetuar login no sistema de NF-e.<br>
				<br>
				Para mais informações, entrar em contato com a prefeitura.
			";
					
		}
				
		$assunto = "Acesso ao Sistema NF-e ($CONF_CIDADE).";
		
		$headers = "MIME-Version: 1.0\r\n";
		
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
		$headers .= "From: $CONF_SECRETARIA de $CONF_CIDADE <$CONF_EMAIL>  \r\n";
		
		$headers .= "Cc: \r\n";
		
		$headers .= "Bcc: \r\n";
		
		mail($emailempresa,$assunto,$msg,$headers);
		
	}
	  
	  
	  
   //Pega os codtipo dos prestadores que tem informações extras
   $codtipo_inst = codtipo('instituicao_financeira');
   $codtipo_opr  = codtipo('operadora_credito');
   $codtipo_cart = codtipo('cartorio');
   
   //testa se o prestador que está sendo editado tem alguma informação extra
   if($codtipo_prestador == $codtipo_inst){
   		$PDO->query("UPDATE inst_financeiras SET agencia = '$agencia', codbanco = '$codbanco' WHERE codcadastro = '$codigoempresa'");
		$codcargo = codcargo("Gerente");
		$PDO->query("UPDATE cadastro_resp SET nome = '$gerente', cpf = '$gerente_cpf' WHERE codemissor = '$codigoempresa' AND codcargo = '$codcargo'");
   }
   if($codtipo_prestador == $codtipo_opr){
   		$PDO->query("UPDATE operadoras_creditos SET agencia = '$agencia', codbanco = '$codbanco' WHERE codcadastro = '$codigoempresa'");
		$codcargo = codcargo("Gerente");
		$PDO->query("UPDATE cadastro_resp SET nome = '$gerente', cpf = '$gerente_cpf' WHERE codemissor = '$codigoempresa' AND codcargo = '$codcargo'");
   }
   if($codtipo_prestador == $codtipo_cart){
   		$PDO->query("UPDATE cartorios SET admpublica = '$adm_publica', nivel = '$nivel' WHERE codcadastro = '$codigoempresa'");
		$codcargo = codcargo("Diretor");
		$PDO->query("UPDATE cadastro_resp SET nome = '$diretor', cpf = '$diretor_cpf', codcargo = '$codcargo' WHERE codemissor = '$codigoempresa' AND codcargo = '$codcargo'");
   }
        
   add_logs('Atualizou dados da empresa'); 
   
   /*print "<script language=JavaScript>alert('Empresa atualizada com sucesso');document.getElementById('frmCadastro').submit();</script>";*/
   $editado = 1; //recebe valor se algo foi editado
   
   
 }else{
	/*print "<script>document.getElementById('frmCadastro').submit();</script>";*/
	$editado = 0;
 }



//edita servicos--------------------------------------------------------------------------------------------------------------------
  $sql_seleciona_servicos=$PDO->query("SELECT codservico FROM cadastro_servicos WHERE codigo = '$vetor_cod_servico[$contservicos]'");  

  while($contservicos < $contpos) 
        {  		
		      
		      $sql_seleciona_servicos=$PDO->query("SELECT codservico FROM cadastro_servicos WHERE codigo = '$vetor_cod_servico[$contservicos]'"); 
			  
			  list($codigo_servico)=$sql_seleciona_servicos->fetch();
			  
			  if($vetor_editar_servicos[$contservicos] != $codigo_servico)
			   { 				  			
				$sql=$PDO->query("UPDATE cadastro_servicos SET codservico = '$vetor_editar_servicos[$contservicos]'
				WHERE codigo = '$vetor_cod_servico[$contservicos]'"); 
				$a="teste"; 
				add_logs('Atualizou servico da empresa');
				$editado = 1; //recebe valor se algo foi editado
               }
		     
			   if($vetor_exluir_servicos[$contservicos] != "")
			   {
			     $sql_deleta_servico=$PDO->query("DELETE FROM cadastro_servicos WHERE codigo = '$vetor_cod_servico[$contservicos]'");	
				  add_logs('Excluiu servico da empresa');	
				  $editado = 1; //recebe valor se algo foi editado
	           }
			   
			  if($vetor_insere_servico[$contservicos] != "")
			   { 				  			
				$sql=$PDO->query("INSERT INTO cadastro_servicos SET codservico= '$vetor_insere_servico[$contservicos]',
				codemissor= '$codigoempresa'");	
				add_logs('Inseriu servico na empresa');		
				$editado = 1; //recebe valor se algo foi editado	
               }
			   
		 $contservicos++;	 
	    }		
		
		
		
//edita socios------------------------------------------------------------------------------------------------------------------- 
  while($contsocios < $numsocios) 
        {  	  
		
		      $sql_seleciona_servicos=$PDO->query("SELECT nome, cpf FROM cadastro_resp 
			  WHERE codigo = '$vetor_codigo_socios[$contsocios]'");
			  
			  list($nome_socios, $CPF_socios)=$sql_seleciona_servicos->fetch();
			  
			  $sql_cargo_socio = $PDO->query("SELECT codigo FROM cargos WHERE cargo = 'Sócio'");
			  list($cod_cargo_socio) = $sql_cargo_socio->fetch();
			  
			  
			  		 
			  if(($vetor_sociosnomes[$contsocios] != $nome_socios)&&($vetor_sociosnomes[$contsocios] != ""))
			   { 	 			   		  			
				$sql=$PDO->query("UPDATE cadastro_resp SET nome = '$vetor_sociosnomes[$contsocios]',
				cpf = '$vetor_socioscpf[$contsocios]'
				WHERE codigo = '$vetor_codigo_socios[$contsocios]'");	
				add_logs('Inseriu socio na empresa');		
				$editado = 1; //recebe valor se algo foi editado				
               }
			   
			    if(($vetor_socioscpf[$contsocios] != $CPF_socios)&&($vetor_socioscpf[$contsocios] != ""))
			   { 	 			   		  			
				$sql=$PDO->query("UPDATE cadastro_resp SET nome = '$vetor_sociosnomes[$contsocios]',
				cpf = '$vetor_socioscpf[$contsocios]'
				WHERE codigo = '$vetor_codigo_socios[$contsocios]'");	
				add_logs('Inseriu socio na empresa');		
				$editado = 1; //recebe valor se algo foi editado				
               }
			   
			   if($vetor_excluir_socios[$contsocios] != "")
			   {			    
			    $sql_deleta_socios=$PDO->query("DELETE FROM cadastro_resp WHERE codigo ='$vetor_excluir_socios[$contsocios]'");
				add_logs('Inseriu socio na empresa');		
				$editado = 1; //recebe valor se algo foi editado				
			   } 
	 
			  if($vetor_nome_socios[$contsocios] != "")
			   { 				  			
				$sql=$PDO->query("INSERT INTO cadastro_resp SET nome='$vetor_nome_socios[$contsocios]',
				cpf = '$vetor_cpf_socios[$contsocios]', codcargo = '$cod_cargo_socio',codemissor= '$codigoempresa'");
				add_logs('Inseriu socio na empresa');	
				$editado = 1; //recebe valor se algo foi editado				
               }
			   
		 $contsocios++;	 
	  
	    }				
		
		if($editado == 1){
			print "<script language=JavaScript>alert('Empresa atualizada com sucesso');document.getElementById('frmCadastro').submit();</script>";
		}else{
			print "<script>document.getElementById('frmCadastro').submit();</script>";
		}
		
	}//fim else teste para nao haver duplicacao na tabela cadastro			 
?>