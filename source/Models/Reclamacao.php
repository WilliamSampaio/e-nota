<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Reclamacao extends DataLayer
{
    public function __construct()
    {
        parent::__construct("reclamacoes", []);
    }
}
