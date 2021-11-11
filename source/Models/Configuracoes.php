<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Configuracoes extends DataLayer
{
    public function __construct()
    {
        parent::__construct("configuracoes", [], "codigo", false);
    }

    public function getAll()
    {
        return $this->find()->fetch(true)[0];
    }
}