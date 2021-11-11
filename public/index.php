<?php

require __DIR__ . '/../vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/**
 * Define o namespace dos controllers
 */
$router->namespace("Source\App");

$router->group(null);
$router->get('/', function(){
    header("Location: site");
});

/**
 * Define as rotas do modulo SITE
 */
$router->group('site');

// inicio
$router->get('/', "Site:inicio");
$router->get('/prestadores', "Site:prestadores");


/**
 * Tratamento dos erros
 */
$router->group('error');
$router->get('/{errcode}', function ($data) {
    echo "<h1>Erro {$data['errcode']}</h1>";
    // var_dump($data);
});

$router->dispatch();

if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}
