<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class NotaServico extends DataLayer
{
    public function __construct()
    {
        parent::__construct("notas_servicos", []);
    }
}
