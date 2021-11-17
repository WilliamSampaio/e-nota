<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Noticia extends DataLayer
{
    public function __construct()
    {
        parent::__construct("noticias", []);
    }
}
