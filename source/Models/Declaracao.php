<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Declaracao extends DataLayer
{
    public function __construct()
    {
        parent::__construct("declaracoes", []);
    }
}
