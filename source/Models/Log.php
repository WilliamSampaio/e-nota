<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Log extends DataLayer
{
    public function __construct()
    {
        parent::__construct("logs", []);
    }

    public function addLog(int $cod_usuario, string $acao)
    {
        $this->cod_usuario = $cod_usuario;
        $this->ip = getenv("REMOTE_ADDR");
        $this->acao = $acao;
        return $this->save();
    }
}
