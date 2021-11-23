<?php

// define o fuso horario
date_default_timezone_set('America/Manaus');

// development, production ou testing
define('ENVIROMENT', 'development');

// caso seja uma aplicação com multiplas prefeituras
define("TENANCY_APP", false);

// define a url base
define('URL_BASE', "http://" . $_SERVER['SERVER_NAME'] . "/public");

// define o diretorio raiz do servidor
define('DIR_BASE', $_SERVER['DOCUMENT_ROOT']);

// define o nome do sistema/app
define("SITE", "e-Nota");

// define o diretorio do arquivo de configuração
define("CONFIG_INI_FILE", __DIR__ . "/../.config.ini");

// configurações específicas de cada ambiente
// caso o ambiente seja de desenvolvimento
if (ENVIROMENT == 'development') {

    // define a configuração de conexão do ambiente de desenvolvimento
    // a função getenv() está retornando as variaveis de ambiente definidas
    // no arquivo docker-compose.yml
    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => getenv('DB_HOST'),
        "port" => getenv('DB_PORT'),
        "dbname" => getenv('DB_NAME'),
        "username" => getenv('DB_USER'),
        "passwd" => getenv('DB_PASS'),
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);

    // caso o ambiente seja de produção
} elseif (ENVIROMENT == 'production') {

    // define a configuração de conexão do ambiente de produção
    // as variaveis são oriundas do arquivo de configuração .config.ini
    // localizado na raiz do projeto
    $configIni = parse_ini_file(CONFIG_INI_FILE, TRUE);
    if (!$configIni) throw new exception('Incapaz de abrir ' . CONFIG_INI_FILE . '.');

    // caso o app seja tenancy, ou seja, tenha multiplas prefeituras utilizando
    // o mesmo servidor/código fonte e acessadas pelo subdominio
    if (TENANCY_APP) {

        $urlArray = explode('.', $_SERVER['SERVER_NAME']);

        if ($urlArray[0] == 'www') {
            $subDominio = $urlArray[1];
        } else {
            $subDominio = $urlArray[0];
        }

        define("DATA_LAYER_CONFIG", [
            "driver" => "mysql",
            "host" => $configIni[$subDominio]['DB_HOST'],
            "port" => $configIni[$subDominio]['DB_PORT'],
            "dbname" => $configIni[$subDominio]['DB_DATABASE'],
            "username" => $configIni[$subDominio]['DB_USERNAME'],
            "passwd" => $configIni[$subDominio]['DB_PASSWORD'],
            "options" => [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ]);

        // caso o app não seja tenancy, ou seja, não tenha multiplas prefeituras utilizando
        // o mesmo servidor/código fonte e acessadas pelo subdominio
    } else {

        define("DATA_LAYER_CONFIG", [
            "driver" => "mysql",
            "host" => $configIni['DB_HOST'],
            "port" => $configIni['DB_PORT'],
            "dbname" => $configIni['DB_DATABASE'],
            "username" => $configIni['DB_USERNAME'],
            "passwd" => $configIni['DB_PASSWORD'],
            "options" => [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ]);
    }
} elseif (ENVIROMENT == 'testing') {
    // nada por enquanto...
}

function getSubDominio()
{
    $urlArray = explode('.', $_SERVER['SERVER_NAME']);

    if (TENANCY_APP) {
        if ($urlArray[0] == 'www') {
            return $urlArray[1];
        } else {
            return $urlArray[0];
        }
    }

    return '';
}

function url(string $uri = null): string
{
    if ($uri) {
        return URL_BASE . "/{$uri}";
    }

    return URL_BASE;
}

function dirBase(string $path = null): string
{
    if ($path) {
        return DIR_BASE . "/{$path}";
    }

    return DIR_BASE;
}
