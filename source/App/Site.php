<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Configuracao;
use Source\Models\Legislacao;
use Source\Models\Noticia;
use Source\Models\Reclamacao;
use Bissolli\ValidadorCpfCnpj\Documento;
use Source\Models\Cadastro;
use Source\Models\Nota;

class Site
{
    private $view;
    private $data;
    private $configuracoes;

    public function __construct()
    {
        $this->view = new Engine(dirBase('views'));
        $this->configuracoes = new Configuracao();
        $this->data = [];
    }

    public function inicio($data)
    {
        $this->data = array(
            'title' => 'Início | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1)
        );

        $total_cadastros = (new Cadastro())->find("estado = :estado", "estado=A")->count();
        $total_notas = (new Nota())->find()->count();

        $this->data['indicativos'] = [
            'cadastros' => $total_cadastros,
            'notas' => $total_notas
        ];

        echo $this->view->render('site/inicio', $this->data);
    }

    public function prestadores($data)
    {
        $this->data = array(
            'title' => 'Prestadores | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1)
        );

        echo $this->view->render('site/prestadores', $this->data);
    }

    public function contadores($data)
    {
        $this->data = array(
            'title' => 'Contadores | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1)
        );

        echo $this->view->render('site/contadores', $this->data);
    }

    public function tomadores($data)
    {
        $this->data = array(
            'title' => 'Tomadores | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1)
        );

        // verifica se o parâmetro passado após a rota tomadores .../tomadores/{opcao}
        if (isset($data['opcao'])) {

            if ($data['opcao'] == 'consultar-rps') {

                // verifica se o formulario de consulta foi enviado via post
                if (isset($data['consultar'])) {

                    $rps_numero = $data['txtNumeroRps'];
                    $rps_data = $data['txtDataRps'];
                    $prestador_cnpjcpf = $data['txtPrestCpfCnpj'];
                    $tomador_cnpjcpf = $data['txtTomCpfCnpj'];

                    $validadorCnpjCpf = new Documento($data['txtPrestCpfCnpj']);

                    // verifica se o CNPJ/CPF do emissor é valido
                    if ($validadorCnpjCpf->isValid()) {

                        $nota = (new Nota())->find("rps_numero = :rps_numero and rps_data = :rps_data", "rps_numero={$rps_numero}&rps_data={$rps_data}")->fetch();

                        // verifica se a nota existe
                        if (!is_null($nota)) {

                            $cod_nota = base64_encode($nota->cod_verificacao);
                            header('Location: ' . url('report/nota/' . $cod_nota));
                        } else {

                            // caso a nota não seja encontrada.
                            $this->data['result'] = array(
                                'status' => 'error',
                                'mensagem' => "Nota não localizada ou inexistente."
                            );
                        }
                    } else {

                        // caso o CNPJ/CPF do emissor seja invalido.
                        $this->data['result'] = array(
                            'status' => 'error',
                            'mensagem' => "O CNPJ/CPF: " . $data['txtPrestCpfCnpj'] . " NÃO é válido."
                        );
                    }
                }

                echo $this->view->render('site/tomadores-consultar-rps', $this->data);
            } elseif ($data['opcao'] == 'autenticar-nota') {

                echo $this->view->render('site/tomadores-autenticar-nota', $this->data);
            } else {

                echo $this->view->render('site/tomadores-gerar-guia', $this->data);
            }
        } else {

            echo $this->view->render('site/tomadores', $this->data);
        }
    }

    public function rps($data)
    {
        $this->data = array(
            'title' => 'RPS | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1)
        );

        echo $this->view->render('site/rps', $this->data);
    }

    public function beneficios($data)
    {
        $this->data = array(
            'title' => 'Benefícios | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1)
        );

        echo $this->view->render('site/beneficios', $this->data);
    }

    public function faq($data)
    {
        $this->data = array(
            'title' => 'Perguntas Frequentes | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1)
        );

        echo $this->view->render('site/faq', $this->data);
    }

    public function ouvidoria($data)
    {
        $this->data = array(
            'title' => 'Ouvidoria | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1),
        );

        // verifica se o parâmetro passado após a rota ouvidoria .../ouvidoria/{opcao} corresponde a "cadastrar"
        if (isset($data['opcao'])) {
            if ($data['opcao'] == 'cadastrar') {

                // verifica se o formulario de cadastro foi enviado via post
                if (isset($data['cadastrar'])) {

                    $validadorCnpjCpf = new Documento($data['emissor_cnpj']);

                    // verifica se o CNPJ/CPF do emissor é valido
                    if ($validadorCnpjCpf->isValid()) {

                        $cadastro = (new Cadastro())->find("{$validadorCnpjCpf->getType()} = :cnpjcpf", "cnpjcpf={$data['emissor_cnpj']}")->fetch(true);

                        // verifica se exeiste emissor com o CNPJ/CPF fornecido, caso exista, cadastra no banco de dados
                        if ($cadastro > 0) {

                            $reclamacao = new Reclamacao();
                            $reclamacao->assunto = 'Nota Fiscal Eletrônica de Serviços';
                            $reclamacao->descricao = $data['descricao'];
                            $reclamacao->especificacao = $data['especificacao'];
                            $reclamacao->tomador_cnpj = $data['tomador_cnpj'];
                            $reclamacao->tomador_email = $data['tomador_email'];
                            $reclamacao->rps_numero = $data['rps_numero'];
                            $reclamacao->rps_data = $data['rps_data'];
                            $reclamacao->rps_valor = $data['rps_valor'];
                            $reclamacao->emissor_cnpj = $data['emissor_cnpj'];
                            $reclamacao->data_reclamacao = date("Y-m-d");
                            // $reclamacao->data_atendimento = null;
                            $reclamacao->estado = "pendente";
                            // $reclamacao->responsavel = null

                            if ($reclamacao->save()) {
                                $this->data['result'] = array(
                                    'status' => 'success',
                                    'mensagem' => "Reclamação cadastrada com sucesso no CNPJ/CPF: {$reclamacao->tomador_cnpj}."
                                );
                            } else {
                                $this->data['result'] = array(
                                    'status' => 'error',
                                    'mensagem' => 'Erro! Não foi possível cadastrar a reclamação. Tente mais tarde!'
                                );
                            }
                        } else {


                            // caso emissor não seja cadastrado no banco de dados
                            $this->data['result'] = array(
                                'status' => 'error',
                                'mensagem' => "Prestador de serviços inexistente! Certifique-se de que o CPF/CNPJ do prestador de serviços está correto."
                            );
                        }
                    } else {

                        // caso o CNPJ/CPF do emissor seja invalido.
                        $this->data['result'] = array(
                            'status' => 'error',
                            'mensagem' => "O CNPJ/CPF: " . $data['emissor_cnpj'] . " NÃO é válido."
                        );
                    }
                }

                echo $this->view->render('site/ouvidoria-cadastrar', $this->data);
            } else {

                // caso o parâmetro passado após a rota ouvidoria .../ouvidoria/{opcao} não corresponde a "cadastrar"
                if (isset($data['cpfcnpj_tomador'])) {
                    $tomador_cnpj = $data['cpfcnpj_tomador'];
                    $reclamacoes = (new Reclamacao())->find("tomador_cnpj = :cnpj", "cnpj={$tomador_cnpj}")->fetch(true);

                    if ($reclamacoes != null) {
                        $this->data['reclamacoes'] = $reclamacoes;
                    } else {
                        $this->data['reclamacoes'] = 'error';
                    }
                }

                echo $this->view->render('site/ouvidoria-consultar', $this->data);
            }
        } else {

            // caso nenhum parâmetro foi passado após a rota ouvidoria .../ouvidoria/{opcao} então renderiza a página ouvidoria
            echo $this->view->render('site/ouvidoria', $this->data);
        }
    }

    public function noticias($data)
    {
        $noticias = new Noticia();

        $this->data = array(
            'title' => 'Notícias | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1),
            'noticias' => $noticias->find()->fetch(true)
        );

        echo $this->view->render('site/noticias', $this->data);
    }

    public function legislacao($data)
    {
        $legislacao = new Legislacao();

        $this->data = array(
            'title' => 'Legislação | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1),
            'legislacao' => $legislacao->find()->fetch(true)
        );

        echo $this->view->render('site/legislacao', $this->data);
    }
}
