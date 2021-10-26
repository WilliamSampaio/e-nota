<?php

    if(!isset($_SESSION['empresaCliente'])){
        $codcadastro = $_POST['txtCodCadastro'];
    }else{
        $codcadastro = $_POST['cmbEmpresaCliente'];
    }
	$cnpjcpf=$_POST['txtCnpjLivro'];
	$mes= $_POST['cmbMes'];
	$ano= $_POST['cmbAno'];
	if ($mes==date("m") && $ano==date("Y")){
                Mensagem("O livro só pode ser gerado ao m�s anterior do atual!");
        }else{
            $dataemissao    = date("Y-m-d");
            $data           = explode("-",$dataemissao);
            $vencimento = UltDiaUtil($data[1],$data[0]);

            $obs = $_POST['txtObs'];
            $mes <=9 ? $mes='0'.$mes:NULL;
            $periodo= $ano.'-'.$mes;
            $periodomysql=$ano."-".$mes;

            $basecalculo=0;
            $reducaobc=0;
            $valoriss=0;
            $valorissretido=0;
            $valorisstotal=0;

            $sql=$PDO->query("SELECT * FROM livro WHERE codcadastro='$codcadastro' AND periodo='$periodo' AND estado <> 'C'");
            if($sql->rowCount()==0)
            {

            $sql_notas=$PDO->query("SELECT codigo,tomador_cnpjcpf,basecalculo,valoriss,issretido,estado FROM notas WHERE (codemissor='$codcadastro') AND datahoraemissao LIKE '$periodomysql%'");
                    $sql_notas_tomadas = $PDO->query("SELECT codigo,valortotal AS total,valoriss AS iss,issretido,estado FROM notas WHERE (codtomador = '$codcadastro') AND DATE(datahoraemissao) LIKE '$periodomysql%'");

                    if($sql_notas->rowCount()>0){

                    $PDO->query("INSERT INTO livro (codcadastro,periodo,vencimento,geracao,obs) VALUES('$codcadastro','$periodo','$vencimento',NOW(),'$obs')");

                    $sql=$PDO->query("SELECT MAX(codigo) as codigo FROM livro WHERE codcadastro='$codcadastro'");

                    $livro=$sql->fetchObject();

                    while($nota=$sql_notas->fetchObject()){

                            if($nota->estado!='C')
                            {
                                    $basecalculo+=$nota->basecalculo;
                                    $valoriss+=$nota->valoriss;
                                    $valorisstotal+=$nota->valoriss;
                                    $valorissretido+=$nota->issretido;
                                    $PDO->query("INSERT INTO livro_notas (codnota,codlivro,tipo,nfe) VALUES('{$nota->codigo}','{$livro->codigo}','E','S')");
                            }
                    }
                    while($nota_tomada=$sql_notas_tomadas->fetchObject()){

                            if($nota_tomada->estado!='C')
                            {
                                    $basecalculo+=$nota_tomada->total;
                                    $valoriss+=$nota_tomada->iss;
                                    $valorissretido+=$nota_tomada->issretido;
                                    $valorisstotal+=$nota_tomada->issretido;
                                    $PDO->query("INSERT INTO livro_notas (codnota,codlivro,tipo,nfe) VALUES('{$nota_tomada->codigo}','{$livro->codigo}','T','S')");
                            }
                    }
                    //$valorisstotal=$valoriss;
                    //$basecalculo-=$valorissretido;
					$valorisstotal = $valoriss + $valorissretido;
                    // {$livro->codigo}
                    $PDO->query("UPDATE livro SET basecalculo='$basecalculo' , valoriss='$valoriss',  valorissretido='$valorissretido' ,valorisstotal='$valorisstotal'
                    WHERE codigo={$livro->codigo}");
                    $codlivro=base64_encode($livro->codigo);
                    Mensagem("Livro gerado com sucesso!");

                    NovaJanela("../livro/imprimirlivrogeral.php?livro=$codlivro");
                    }else{
                            Mensagem("Para gerar o livro, é preciso ter notas tomadas ou emitidas. A competencia selecionada nao possui nenhuma nota.");
                    }
            }else{
                    Mensagem("Livro deste contribuinte neste per�odo já foi gerado anteriormente. Informe outro contribuinte ou outro per�odo");
            }
        }
?>