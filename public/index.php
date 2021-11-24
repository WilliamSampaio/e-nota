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
$router->get('/tomadores/{opcao}', "Site:tomadores");
$router->post('/tomadores/{opcao}', "Site:tomadores");
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
 * Define as rotas do modulo EMISSOR
 */
$router->group('emissor');
$router->get('/', function($data){
    echo '<h1>modulo emissor</h1>';
    var_dump($data);
});

/**
 * Define as rotas do modulo CONTADOR
 */
$router->group('contador');
$router->get('/', function($data){
    echo '<h1>modulo contador</h1>';
    var_dump($data);
});

/**
 * Define as rotas do modulo SEP
 */
$router->group('sep');
$router->get('/', "Sep:inicio");
$router->get('/login/{result}', "Sep:login");
$router->get('/login', "Sep:login");
$router->post('/login', "Sep:login");
$router->get('/principal', "Sep:principal");

/**
 * Define as rotas dos report
 */
$router->group('report');
$router->get('/nota/{nota}', "Report:imprimirNota");

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
