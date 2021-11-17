<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Configuracao;
use Source\Models\Legislacao;
use Source\Models\Noticia;
use Source\Models\Reclamacao;
use Bissolli\ValidadorCpfCnpj;
use Bissolli\ValidadorCpfCnpj\CNPJ;
use Bissolli\ValidadorCpfCnpj\Documento;
use Source\Models\Cadastro;

class Site
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(dirBase('views'));
    }

    public function inicio($data)
    {
        $configuracoes = new Configuracao();

        $data = array(
            'title' => 'Início | ' . SITE,
            'configuracoes' => $configuracoes->findById(1)
        );

        echo $this->view->render('site/inicio', $data);
    }

    public function prestadores($data)
    {
        $configuracoes = new Configuracao();

        $data = array(
            'title' => 'Prestadores | ' . SITE,
            'configuracoes' => $configuracoes->findById(1)
        );

        echo $this->view->render('site/prestadores', $data);
    }

    public function contadores($data)
    {
        $configuracoes = new Configuracao();

        $data = array(
            'title' => 'Contadores | ' . SITE,
            'configuracoes' => $configuracoes->findById(1)
        );

        echo $this->view->render('site/contadores', $data);
    }

    public function tomadores($data)
    {
        $configuracoes = new Configuracao();

        $data = array(
            'title' => 'Tomadores | ' . SITE,
            'configuracoes' => $configuracoes->findById(1)
        );

        echo $this->view->render('site/tomadores', $data);
    }

    public function rps($data)
    {
        $configuracoes = new Configuracao();

        $data = array(
            'title' => 'RPS | ' . SITE,
            'configuracoes' => $configuracoes->findById(1)
        );

        echo $this->view->render('site/rps', $data);
    }

    public function beneficios($data)
    {
        $configuracoes = new Configuracao();

        $data = array(
            'title' => 'Benefícios | ' . SITE,
            'configuracoes' => $configuracoes->findById(1)
        );

        echo $this->view->render('site/beneficios', $data);
    }

    public function faq($data)
    {
        $configuracoes = new Configuracao();

        $data = array(
            'title' => 'Perguntas Frequentes | ' . SITE,
            'configuracoes' => $configuracoes->findById(1)
        );

        echo $this->view->render('site/faq', $data);
    }

    public function ouvidoria($_data)
    {
        $configuracoes = new Configuracao();

        $data = array(
            'title' => 'Ouvidoria | ' . SITE,
            'configuracoes' => $configuracoes->findById(1),
        );

        // verifica se o parâmetro passado após a rota ouvidoria .../ouvidoria/{opcao} corresponde a "cadastrar"
        if (isset($_data['opcao'])) {
            if ($_data['opcao'] == 'cadastrar') {

                // verifica se o formulario de cadastro foi enviado via post
                if (isset($_data['cadastrar'])) {

                    $validadorCnpjCpf = new Documento($_data['emissor_cnpj']);

                    // verifica se o CNPJ/CPF do emissor é valido
                    if ($validadorCnpjCpf->isValid()) {

                        $cadastro = (new Cadastro())->find("{$validadorCnpjCpf->getType()} = :cnpjcpf", "cnpjcpf={$_data['emissor_cnpj']}")->fetch(true);

                        // verifica se exeiste emissor com o CNPJ/CPF fornecido, caso exista, cadastra no banco de dados
                        if ($cadastro > 0) {

                            $reclamacao = new Reclamacao();
                            $reclamacao->assunto = 'Nota Fiscal Eletrônica de Serviços';
                            $reclamacao->descricao = $_data['descricao'];
                            $reclamacao->especificacao = $_data['especificacao'];
                            $reclamacao->tomador_cnpj = $_data['tomador_cnpj'];
                            $reclamacao->tomador_email = $_data['tomador_email'];
                            $reclamacao->rps_numero = $_data['rps_numero'];
                            $reclamacao->rps_data = $_data['rps_data'];
                            $reclamacao->rps_valor = $_data['rps_valor'];
                            $reclamacao->emissor_cnpj = $_data['emissor_cnpj'];
                            $reclamacao->data_reclamacao = date("Y-m-d");
                            // $reclamacao->data_atendimento = null;
                            $reclamacao->estado = "pendente";
                            // $reclamacao->responsavel = null

                            if ($reclamacao->save()) {
                                $data['result'] = array(
                                    'status' => 'success',
                                    'mensagem' => "Reclamação cadastrada com sucesso no CNPJ/CPF: {$reclamacao->tomador_cnpj}."
                                );
                            } else {
                                $data['result'] = array(
                                    'status' => 'error',
                                    'mensagem' => 'Erro! Não foi possível cadastrar a reclamação. Tente mais tarde!'
                                );
                            }
                        } else {


                            // caso emissor não seja cadastrado no banco de dados
                            $data['result'] = array(
                                'status' => 'error',
                                'mensagem' => "Prestador de serviços inexistente! Certifique-se de que o CPF/CNPJ do prestador de serviços está correto."
                            );

                        }
                    } else {

                        // caso o CNPJ/CPF do emissor seja invalido.
                        $data['result'] = array(
                            'status' => 'error',
                            'mensagem' => "O CNPJ/CPF: " . $_data['emissor_cnpj'] . " NÃO é inválido."
                        );

                    }
                }

                echo $this->view->render('site/ouvidoria-cadastrar', $data);
            } else {

                // caso o parâmetro passado após a rota ouvidoria .../ouvidoria/{opcao} não corresponde a "cadastrar"
                if (isset($_data['cpfcnpj_tomador'])) {
                    $tomador_cnpj = $_data['cpfcnpj_tomador'];
                    $reclamacoes = (new Reclamacao())->find("tomador_cnpj = :cnpj", "cnpj={$tomador_cnpj}")->fetch(true);

                    if ($reclamacoes != null) {
                        $data['reclamacoes'] = $reclamacoes;
                    } else {
                        $data['reclamacoes'] = 'error';
                    }
                }

                echo $this->view->render('site/ouvidoria-consultar', $data);
            }
        } else {

            // caso nenhum parâmetro foi passado após a rota ouvidoria .../ouvidoria/{opcao} então renderiza a página ouvidoria
            echo $this->view->render('site/ouvidoria', $data);
        }
    }

    public function noticias($data)
    {
        $configuracoes = new Configuracao();
        $noticias = new Noticia();

        $data = array(
            'title' => 'Notícias | ' . SITE,
            'configuracoes' => $configuracoes->findById(1),
            'noticias' => $noticias->find()->fetch(true)
        );

        echo $this->view->render('site/noticias', $data);
    }

    public function legislacao($data)
    {
        $configuracoes = new Configuracao();
        $legislacao = new Legislacao();

        $data = array(
            'title' => 'Legislação | ' . SITE,
            'configuracoes' => $configuracoes->findById(1),
            'legislacao' => $legislacao->find()->fetch(true)
        );

        echo $this->view->render('site/legislacao', $data);
    }
}
