<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Cadastro extends DataLayer
{
    public function __construct()
    {
        parent::__construct("cadastro", [], "codigo", false);
    }
}
