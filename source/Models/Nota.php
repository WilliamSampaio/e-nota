<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Nota extends DataLayer
{
    public function __construct()
    {
        parent::__construct("notas", [], "codigo", false);
    }
}
