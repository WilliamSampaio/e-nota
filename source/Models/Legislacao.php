<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Legislacao extends DataLayer
{
    public function __construct()
    {
        parent::__construct("legislacao", []);
    }
}
