<?php

namespace Source\Models;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;

class Nota extends DataLayer
{
    public function __construct()
    {
        parent::__construct("notas", []);
    }

    public function getPrestador(string $cnpj_cpf = null)
    {
        if (is_null($cnpj_cpf)) {
            return (new Cadastro())->findById($this->cod_emissor);
        } else {
            $cadastro = (new Cadastro())->findById($this->cod_emissor);
            if (($cadastro->cnpj . $cadastro->cpf) == $cnpj_cpf) {
                return $cadastro;
            } else {
                return null;
            }
        }
    }

    public function getTomador(string $cnpj_cpf = null)
    {
        if (is_null($cnpj_cpf)) {
            return (new Cadastro())->findById($this->cod_tomador);
        } else {
            $cadastro = (new Cadastro())->findById($this->cod_tomador);
            if (($cadastro->cnpj . $cadastro->cpf) == $cnpj_cpf) {
                return $cadastro;
            } else {
                return null;
            }
        }
    }

    public function getServicos()
    {
        $notaServicos = (new NotaServico())->find('cod_nota = :nota', "nota={$this->id}")->fetch(true);
        
        $conn = Connect::getInstance();

        foreach($notaServicos as $notaServico)
        {
            $servico = $conn->query("select * from servicos where id = {$notaServico->cod_servico}");
            $servico = $servico->fetchObject();
            $servicos[] = (object) array(
                'id' => $servico->id,
                'descricao' => $servico->descricao,
                'aliquota' => $servico->aliquota,
                'base_calculo' => $notaServico->base_calculo,
                'iss_retido ' => $notaServico->iss_retido,
                'iss' => $notaServico->iss,
                'discriminacao' => $notaServico->discriminacao
            );
        }
        return $servicos;
    }
}
