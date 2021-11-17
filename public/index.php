<?php

require __DIR__ . '/../vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/**
 * Define o namespace dos controllers
 */
$router->namespace("Source\App");

$router->group(null);
$router->get('/', function () {
    header("Location: site");
});

/**
 * Define as rotas do modulo SITE
 */
$router->group('site');
$router->get('/', "Site:inicio");
$router->get('/prestadores', "Site:prestadores");
$router->get('/contadores', "Site:contadores");
$router->get('/tomadores', "Site:tomadores");
$router->get('/rps', "Site:rps");
$router->get('/beneficios', "Site:beneficios");
$router->get('/faq', "Site:faq");
$router->get('/ouvidoria/{opcao}', "Site:ouvidoria");
$router->post('/ouvidoria/{opcao}', "Site:ouvidoria");
$router->get('/ouvidoria', "Site:ouvidoria");
$router->get('/noticias', "Site:noticias");
$router->get('/legislacao', "Site:legislacao");


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
