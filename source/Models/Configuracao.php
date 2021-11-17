<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Configuracao extends DataLayer
{
    public function __construct()
    {
        parent::__construct("configuracoes", [], "codigo", false);
    }
}
