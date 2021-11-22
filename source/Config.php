<?php

date_default_timezone_set('America/Manaus');

define('URL_BASE', "http://" . $_SERVER['SERVER_NAME'] . "/public");

define('DIR_BASE', $_SERVER['DOCUMENT_ROOT']);

define("SITE", "e-Nota");

define("TENANCY_APP", false);

define("CONFIG_INI_FILE", __DIR__ . "/../.config.ini");

$configIni = parse_ini_file(CONFIG_INI_FILE, TRUE);

if (!$configIni) throw new exception('Incapaz de abrir ' . CONFIG_INI_FILE . '.');

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
