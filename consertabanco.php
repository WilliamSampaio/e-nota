<?php

    require_once 'autoload.php';
    
    $sql = $PDO->query("select * from municipios");
    while($result = $sql->fetch()){
        $result['nome'] = utf8_decode($result['nome']);
        $PDO->query("update municipios set nome='{$result['nome']}' where codigo='{$result['codigo']}'");
    }
