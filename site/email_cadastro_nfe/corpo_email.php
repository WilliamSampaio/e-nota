<?php
    require_once('../../funcoes/util.php');
    require_once('../../include/conect.php');

    $sql = $PDO->query("SELECT cidade,email,secretaria FROM configuracoes");
    list($cidade,$to,$secretaria) = $sql->fetch();

    foreach($_POST as $key =>$post){
        $_POST[$key] = trataString($_POST[$key]);
    }
    //echo "<pre>"; print_r($_POST); echo "</pre>";

    $message = "O prestador de serviços ".$_POST['txtInsNomeEmpresa']." solicita acesso ao sistema e-Nota da Prefeitura Municipal de ".$cidade.".";
    $message .= "<br />";
    $message .= "Os dados do prestador de serviços ".$_POST['txtInsNomeEmpresa']." seguem abaixo para avaliação:";
    $message .= "<br /><br />";
    $message .= "Prestador: ".$_POST['txtInsNomeEmpresa']."<br />";
    $message .= "Razão Social: ".$_POST['txtInsRazaoSocial']."<br />";
    $message .= "CNPJ/CPF: ".$_POST['txtCNPJ']."<br />";
    $message .= "Logradouro: ".$_POST['txtLogradouro']."<br />";
    $message .= "Número: ".$_POST['txtNumero']."<br />";
    if(!empty($_POST['txtComplemento'])){
        $message .= "Complemento: ".$_POST['txtComplemento']."<br />";
    }
    $message .= "Bairro: ".$_POST['txtBairro']."<br />";
    $message .= "CEP: ".$_POST['txtCEP']."<br />";
    $message .= "Telefone Comercial: ".$_POST['txtFoneComercial']."<br />";
    if(!empty($_POST['txtFoneCelular'])){
        $message .= "Telefone Celular: ".$_POST['txtFoneCelular']."<br />";
    }
    $message .= "Estado: ".$_POST['txtInsUfEmpresa']."<br />";
    $message .= "Município: ".$_POST['txtInsMunicipioEmpresa']."<br />";
    if(empty($_POST['txtPispasep'])){
        $_POST['txtPispasep'] = "Não Informado";
    }
    $message .= "PIS/PASEP: ".$_POST['txtPispasep']."<br />";
    $message .= "Email: ".$_POST['txtInsEmailEmpresa']."<br />";
    $message .= "Senha de Acesso Desejada: ".$_POST['txtSenha']."<br /><br />";
    if($_POST['txtSimplesNacional'] == 'S'){
        $message .= "Empresa optante pelo Simples Nacional<br /><br />";
    }
    $message .= "Sócios/Responsáveis:<br />";
    for($key = 1; $key <= 10; $key++){
        if(!empty($_POST['txtNomeSocio'.$key]) && !empty($_POST['txtCpfSocio'.$key])){
            $message .= "Nome: ".$_POST['txtNomeSocio'.$key]." CPF: ".$_POST['txtCpfSocio'.$key]."<br />";
        }
    }
    $message .= "<br />";
    $message .= "Serviços:<br>";
    for($key = 1; $key <= 5; $key++){
        if(!empty($_POST['cmbCategoria'.$key])){
            $cod = explode('|',$_POST['cmbCategoria'.$key]);
            $sqlCat = $PDO->query("SELECT nome FROM servicos_categorias WHERE codigo = '{$cod[0]}'");
            list($categoria) =$sqlCat->fetch();

            $cod = explode('|',$_POST['cmbCodigo1'.$key]);
            $sqlServ = $PDO->query("SELECT descricao FROM servicos WHERE codservico = '{$cod[0]}'");
            list($servico) =$sqlServ->fetch();

            $message .= "Serviço: ".$servico." - Categoria: ".$categoria."<br />";
        }
    }

    $message .= "<br />";
    
    $hora = date("H:i");
    $mes = date("m");
    switch($mes){
        case "01": $mes = "Janeiro"; break;
        case "02": $mes = "Fevereiro"; break;
        case "03": $mes = "Março"; break;
        case "04": $mes = "Abril"; break;
        case "05": $mes = "Maio"; break;
        case "06": $mes = "Junho"; break;
        case "07": $mes = "Julho"; break;
        case "08": $mes = "Agosto"; break;
        case "09": $mes = "Setembro"; break;
        case "10": $mes = "Outubro"; break;
        case "11": $mes = "Novembro"; break;
        case "12": $mes = "Dezembro"; break;
    }

    $message .= "Solicitação de cadastro efetuada as ".$hora." horas do dia ".date('d')." de ".$mes." de".date("Y");

    $subject = "Cadastro ao sistema e-Nota";
    $headers = "MIME-Version: 1.0 \r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1' \r\n";
    $headers .= "To: $secretaria <$to> \r\n";
    $headers .= "From: {$_POST['txtInsNomeEmpresa']} <{$_POST['txtInsEmailEmpresa']}> \r\n";

    mail($to,$subject,$message,$headers);
    Mensagem('Cadastro enviado');
    Redireciona('../prestadores.php');
