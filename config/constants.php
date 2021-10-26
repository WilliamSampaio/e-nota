<?php

require_once 'config.php';

/**
 *  ARQUIVOS COM AS CONSTANTES DO SISTEMA.
 */

// URL BASE
define('BASE_URL', "http://{$_SERVER['SERVER_NAME']}/");

// PATH ABSOLUTO
define('ROOT_PATH', '/var/www/html');

// CONFIG FILE
define('CONFIG_FILE', ROOT_PATH . '/.config.ini');

// DEFINE DIRETORIOS
define('DIR_CLASS', ROOT_PATH . '/class/');
define('DIR_CONFIG', ROOT_PATH . '/config/');

// SUBDOMAIN
if($config['subdomain'])
{
    define('SUBDOMAIN', true);
}