<?php

namespace Source\App;

use Directory;
use League\Plates\Engine;
use Source\Models\Configuracoes;
use SplFileInfo;

class Site
{
    private $view;
    private $configuracoes;

    public function __construct()
    {
        $this->view = new Engine();

        $this->view->setFileExtension('tpl');

        //$this->view->addFolder('site',)

        $this->configuracoes = new Configuracoes();
    }

    public function inicio($data)
    {
        $data = array(
            'configuracoes' => $this->configuracoes->getAll()
        );

        var_dump(scandir(dirBase('/scripts')));

        //echo $this->view->render('site-inicio', $data);
    }

    public function prestadores($data)
    {
        $data = array(
            'title' => 'Prestadores | ' . SITE,
            'configuracoes' => $this->configuracoes->getAll()
        );

        echo $this->view->render('site/prestadores', $data);
    }
}
