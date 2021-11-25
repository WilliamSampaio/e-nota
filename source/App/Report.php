<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Configuracao;
use Source\Models\Declaracao;
use Source\Models\Nota;

class Report
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

    public function imprimirNota($data)
    {
        $this->data = array(
            'title' => 'Imprimir Nota | ' . SITE,
            'configuracoes' => $this->configuracoes->findById(1)
        );

        $cod_verificacao = base64_decode($data['nota']);
        $nota = (new Nota())->find('cod_verificacao = :cod', "cod={$cod_verificacao}")->fetch();
        
        $this->data['nota'] = $nota->data();
        $this->data['prestador'] = $nota->getPrestador()->data();
        $this->data['tomador'] = $nota->getTomador()->data();
        $this->data['servicos'] = $nota->getServicos();
        $this->data['simples_nacional'] = $nota->getPrestador()->data()->codtipodeclaracao == (new Declaracao())->find('declaracao = :dec', "dec=Simples Nacional")->fetch()->id;
		
        echo $this->view->render('report/imprimir-nota', $this->data);
    }
}
