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
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<?php
ini_set("default_charset","UTF-8");
session_name("emissor");
session_start();
if(!(isset($_SESSION["empresa"]))){   
	echo "
		<script>
		alert('Acesso Negado!');
		window.location='login.php';
		</script>
	";
}else{
	$botao = $_POST['btImportarXML'];  
	$arquivo_xml = $_POST['txtArquivoNome'];
	if($botao == "Importar Arquivo"){
		include("../include/conect.php");
		include("../funcoes/util.php");
		include("inc/funcao_logs.php");
		$sql=$PDO->query("SELECT ultimanota FROM cadastro WHERE codigo = '$CODIGO_DA_EMPRESA'");
		list($UltimaNota)=$sql->fetch();  
		
		$sql=$PDO->query("SELECT codigo FROM cadastro WHERE codigo = '$CODIGO_DA_EMPRESA'"); 
		list($codigoEmpresa)=$sql->fetch();  
		
		$xml = simplexml_load_file("importar/$arquivo_xml"); // lê o arquivo XML 
		$cont = 0; 
		$inserir_tomador = "N";
		foreach($xml->children() as $elemento => $valor){   
					
			$tomador_cnpjcpf = $xml->nota[$cont]->tomador_cnpjcpf;
			$sql_verifica_tomador = $PDO->query("
				SELECT
					cpf,
					codtipo,
					cnpj, 
					nome,
					inscrmunicipal,
					logradouro,
					numero,
					complemento,
					bairro,
					cep,
					municipio,
					uf,
					email
				FROM 
					cadastro 
				WHERE 
					(cpf = '$tomador_cnpjcpf' OR cnpj = '$tomador_cnpjcpf')
			");
			if($sql_verifica_tomador->rowCount()){
				$dadosTomador = $sql_verifica_tomador->fetch();
				$tomador_inscrmunicipal =  $dadosTomador['inscrmunicipal'] == utf8_decode($xml->nota[$cont]->tomador_inscrmunicipal)
					? $dadosTomador['inscrimunicipal']
					: utf8_decode($xml->nota[$cont]->tomador_inscrmunicipal);
				
				$tomador_nome           =  $dadosTomador['nome'] == utf8_decode($xml->nota[$cont]->tomador_nome)
					? $dadosTomador['nome']
					: utf8_decode($xml->nota[$cont]->tomador_nome);
					
				$tomador_logradouro     =  $dadosTomador['logradouro'] == utf8_decode($xml->nota[$cont]->tomador_logradouro)
					? $dadosTomador['logradouro']
					: utf8_decode($xml->nota[$cont]->tomador_logradouro);
					
				$tomador_numero         =  $dadosTomador['numero'] == $xml->nota[$cont]->tomador_numero
					? $dadosTomador['numero']
					: $xml->nota[$cont]->tomador_numero;
					
				$tomador_complemento    =  $dadosTomador['complemento'] == utf8_decode($xml->nota[$cont]->tomador_complemento)
					? $dadosTomador['complemento']
					: utf8_decode($xml->nota[$cont]->tomador_complemento);
					
				$tomador_bairro         =  $dadosTomador['bairro'] == utf8_decode($xml->nota[$cont]->tomador_bairro)
					? $dadosTomador['bairro']
					: utf8_decode($xml->nota[$cont]->tomador_bairro);
					
				$tomador_cep            =  $dadosTomador['cep'] == $xml->nota[$cont]->tomador_cep
					? $dadosTomador['cep']
					: $xml->nota[$cont]->tomador_cep;
					
				$tomador_municipio      =  $dadosTomador['municipio'] == utf8_decode($xml->nota[$cont]->tomador_municipio)
					? $dadosTomador['municipio']
					: utf8_decode($xml->nota[$cont]->tomador_municipio);
					
				$tomador_uf             =  $dadosTomador['uf'] == $xml->nota[$cont]->tomador_uf
					? $dadosTomador['uf']
					: $xml->nota[$cont]->tomador_uf;
					
				$tomador_email          =  $dadosTomador['email'] == $xml->nota[$cont]->tomador_email
					? $dadosTomador['email']
					: $xml->nota[$cont]->tomador_email;
			}else{
				$tomador_inscrmunicipal = utf8_decode($xml->nota[$cont]->tomador_inscrmunicipal);
				$tomador_nome           = utf8_decode($xml->nota[$cont]->tomador_nome);
				$tomador_logradouro		= utf8_decode($xml->nota[$cont]->tomador_logradouro);
				$tomador_numero         = trim($xml->nota[$cont]->tomador_numero);
				$tomador_bairro			= utf8_decode($xml->nota[$cont]->tomador_bairro);
				$tomador_complemento    = utf8_decode($xml->nota[$cont]->tomador_complemento);					
				$tomador_cep            = $xml->nota[$cont]->tomador_cep;
				$tomador_municipio      = utf8_decode($xml->nota[$cont]->tomador_municipio);
				$tomador_uf             = $xml->nota[$cont]->tomador_uf;
				$tomador_email          = $xml->nota[$cont]->tomador_email;
				$inserir_tomador        = "S";
			}
		$discriminacao  =  utf8_decode($xml->nota[$cont]->discriminacao);
		$observacoes    =  utf8_decode($xml->nota[$cont]->observacoes);
		$deducoes  		= $xml->nota[$cont]->deducoes;
		$estado         = $xml->nota[$cont]->estado;
		$cofins		    = $xml->nota[$cont]->cofins;
		$pispasep	    = $xml->nota[$cont]->pispasep;
		$csocial	    = $xml->nota[$cont]->contribuicaosocial;
		$valortotal     = $xml->nota[$cont]->valortotal;
		$inss		    = $xml->nota[$cont]->inss;
		$irrf	    	= $xml->nota[$cont]->irrf;
		$basecalc	    = $xml->nota[$cont]->basecalculo;
		$iss		    = $xml->nota[$cont]->valoriss;
		$issretido	    = $xml->nota[$cont]->issretido;
		$observacao	    = $xml->nota[$cont]->observacao;
		$codservico     = $xml->nota[$cont]->codservico;
		$aliqpercentual = $xml->nota[$cont]->aliqpercentual;
		$totalretencoes = $xml->nota[$cont]->totalretencoes;
		$acrescimo		= $xml->nota[$cont]->acrescimo;
		$motivocancel	= utf8_decode($xml->nota[$cont]->motivocancelamento);
		$rps_numero		= $xml->nota[$cont]->rps_numero;
		$rps_data		= $xml->nota[$cont]->rps_data;
			
			$sql_verifica_rps = $PDO->query("SELECT codigo FROM notas WHERE rps_numero = '$rps_numero' AND codemissor = '$CODIGO_DA_EMPRESA'");
			if($sql_verifica_rps->rowCount()){
				Mensagem("A nota com o número de RPS $rps_numero, já foi emitida!");
				exit;
			}
			
			switch(strtolower($estado)){
				case "normal":
					$estado = "N";
				  break;
				case "escriturado":
					$estado = "E";
				  break;
				case "cancelado":
					$estado = "C";
				  break;
				case "boleto":
					$estado = "B";
				  break;
			}
			
			//GERA O CÓDIGO DE VERIFICAÇÃO
			$CaracteresAceitos = 'ABCDEFGHIJKLMNOPQRXTUVWXYZ';	
			$max = strlen($CaracteresAceitos)-1;
			$password = null;
			for($i=0; $i < 8; $i++){
				$password .= $CaracteresAceitos[mt_rand(0, $max)]; 
				$carac = strlen($password); 
				if($carac ==4){ 
					$password .= "-";
				} 
			}
			
			$campo = tipoPessoa($tomador_cnpjcpf);
			$codTipoTomador = codtipo('tomador');
			$codTipoDec = coddeclaracao('DES Consolidada');
			if($inserir_tomador == "S"){				
				$datainicio = date("Y-m-d");
				try
				{
					$PDO->query("
						INSERT INTO
							cadastro
						SET
							nome              = '$tomador_nome',
							codtipo           = '$codTipoTomador',
							codtipodeclaracao = '$codTipoDec',
							razaosocial       = '$tomador_nome',
							$campo            = '$tomador_cnpjcpf',
							inscrmunicipal    = '$tomador_inscrmunicipal',
							logradouro        = '$tomador_logradouro',
							numero            = '$tomador_numero',
							bairro			  = '$tomador_bairro',
							complemento       = '$tomador_complemento',
							cep               = '$tomador_cep',
							uf                = '$tomador_uf',
							email             = '$tomador_email',
							municipio         = '$tomador_municipio',
							estado            = 'A',
							datainicio        = '$datainicio'
					");
				}
				catch (PDOException $e)
				{
					echo 'Erro: ' . $e->getMessage();
				}
			}else{
				if($dadosTomador['codtipo'] == $codTipoTomador){
					try
					{
						$PDO->query("
							UPDATE 
								cadastro
							SET
								nome              = '$tomador_nome',
								codtipo           = '$codTipoTomador',
								codtipodeclaracao = '$codTipoDec',
								razaosocial       = '$tomador_nome',
								inscrmunicipal    = '$tomador_inscrmunicipal',
								logradouro        = '$tomador_logradouro',
								numero            = '$tomador_numero',
								bairro			  = '$tomador_bairro',
								complemento       = '$tomador_complemento',
								cep               = '$tomador_cep',
								uf                = '$tomador_uf',
								email             = '$tomador_email',
								municipio         = '$tomador_municipio',
								estado            = 'A'
							WHERE 
								$campo = '$tomador_cnpjcpf'	
						");
					}
					catch (PDOException $e)
					{
						echo 'Erro: ' . $e->getMessage();
					}
				}	
			}
			//Pega a data e a hora da emissao
			$dataAtual = date("Y-m-d");
			$horaAtual = date("H:i:s");
			
			//Pega o numero da ultima nota
			$sql_numero = $PDO->query("SELECT ultimanota FROM cadastro WHERE codigo = '$CODIGO_DA_EMPRESA'");
			list($max_numero) = $sql_numero->fetch();
			$max_numero++;
			
			//Insere os dados no banco
			try
			{
				$PDO->query("
					INSERT INTO 
						notas 
					SET 
						numero = '$max_numero', 
						codverificacao = '$password', 
						codemissor = '$CODIGO_DA_EMPRESA', 
						rps_numero = '$rps_numero', 
						rps_data = '$rps_data',
						tomador_nome = '$tomador_nome', 
						tomador_cnpjcpf = '$tomador_cnpjcpf',
						tomador_inscrmunicipal = '$tomador_inscrmunicipal',		
						tomador_logradouro = '$tomador_logradouro',
						tomador_numero = '$tomador_numero',
						tomador_bairro = '$tomador_bairro',
						tomador_complemento = '$tomador_complemento', 
						tomador_cep = '$tomador_cep', 
						tomador_municipio = '$tomador_municipio',
						tomador_uf = '$tomador_uf',
						tomador_email = '$tomador_email', 
						discriminacao = '$discriminacao',
						valortotal = '$valortotal', 
						valordeducoes = '$valordeducoes', 
						basecalculo = '$basecalc',
						valoriss = '$iss',  
						estado = '$estado',
						datahoraemissao = '$dataAtual $horaAtual', 
						issretido = '$issretido', 
						valorinss = '$inss', 
						valorirrf = '$irrf', 
						observacao = '$observacoes',
						tipoemissao = 'importada',
						pispasep = '$pispasep',
						cofins = '$cofins',
						contribuicaosocial = '$csocial',
						aliq_percentual = '$aliqpercentual',
						motivo_cancelamento = '$motivocancel',
						total_retencao = '$totalretencoes',
						valoracrescimos = '$acrescimo'
				");
			}
			catch (PDOException $e)
			{
				echo 'Erro: ' . $e->getMessage();
			}
			//Pega o codigo da ultima nota inserida no banco
			$codUltimaNota = $PDO->lastInsertId();
			
			$sqlIsento = $PDO->query("SELECT isentoiss FROM cadastro WHERE codigo = '$CODIGO_DA_EMPRESA'");
			list($isento) = $sqlIsento->fetch();
			if($isento == 'S'){
				$iss       = 0;
				$issretido = 0;
			}

			try
			{
				$PDO->query("
					INSERT INTO
						notas_servicos
					SET
						codnota       = '$codUltimaNota',
						codservico    = '$codservico',
						basecalculo   = '$basecalculo',
						issretido     = '$issretido',
						iss           = '$iss',
						discriminacao = '$discriminacao'
				");
			}
			catch (PDOException $e)
			{
				echo 'Erro: ' . $e->getMessage();
			}
					
			//Testa em quais modalidades de credito o tomador se encaixa
			if (strlen($tomador_cnpjcpf) == 14){
				if($totalISSRetido > 0){
					$tipo_pessoa = "PF";
					$iss_retido = "S";
				}
				else{
					$tipo_pessoa = "PF";
					$iss_retido = "N";
				} // fim else
			} // fim if
			elseif(strlen($tomador_cnpjcpf) == 18){
				if($totalISSRetido > 0){
					$tipo_pessoa = "PJ";
					$iss_retido = "S";
				}
				else{
					$tipo_pessoa = "PJ";
					$iss_retido = "N";
				}
			} // fim else if
			
			if($iss > 0){
				$value = $iss;
			}elseif($issretido > 0){
				$value = $issretido;
			}
			$sql_credito = $PDO->query("
				SELECT 
					credito 
				FROM 
					nfe_creditos 
				WHERE 
					estado = 'A' AND 
					tipopessoa LIKE '%$tipo_pessoa%' AND 
					issretido = '$iss_retido' AND
					valor <= '$value'
			");
			if($sql_credito->rowCount() > 0){
				list($creditoPercent) = $sql_credito->fetch();
				if($iss > 0){
					$credito = $iss*$creditoPercent/100;
				}elseif($issretido > 0){
					$credito = $issretido*$creditoPercent/100;
				}
				$credito = number_format($credito,2,'.','');
				try 
				{
					$PDO->query("UPDATE notas SET credito = '$credito' WHERE codigo = '$codUltimaNota'");
				}
				catch (PDOException $e)
				{
					echo 'Erro: ' . $e->getMessage();
				}
			}
			
			//Atualiza a ultima nota
			$sql = $PDO->query("SELECT ultimanota FROM cadastro WHERE codigo = '$CODIGO_DA_EMPRESA'");
			list($ultimaNota) = $sql->fetch();
			$notificacao = notificaTomador($CODIGO_DA_EMPRESA,$ultimaNota);
			
			$ultimaNota += 1;
			
			try 
			{
				$sql = $PDO->query("UPDATE cadastro SET ultimanota = '$ultimaNota' WHERE codigo = '$CODIGO_DA_EMPRESA'");
			}
			catch (PDOException $e)
			{
				echo 'Erro: ' . $e->getMessage();
			}
			
			try 
			{
				$PDO->query("UPDATE rps_controle SET ultimorps = '$rps_numero' WHERE codcadastro = '$CODIGO_DA_EMPRESA'");
			}
			catch (PDOException $e)
			{
				echo 'Erro: ' . $e->getMessage();
			}
			
			$cont++;
		}// foreach
		unlink("importar/$arquivo_xml");
		add_logs('Importou Arquivo');
		print("<script language=JavaScript>alert('Importação efetuada com sucesso !');window.close();</script>");
	}else{
		print("Acesso Negado!!");
	}	
}?>