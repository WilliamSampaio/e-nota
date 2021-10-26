<?php

class Connection extends PDO
{
    private $DB_HOST;
    private $DB_DATABASE;
    private $DB_USERNAME;
    private $DB_PASSWORD;

    public function __construct($config_file)
    {
        if (!$config = parse_ini_file($config_file, TRUE)) throw new exception('Unable to open ' . $config_file . '.');
       
        $this->DB_HOST = $config[getSubdominio()]['DB_HOST'];
        $this->DB_DATABASE = $config[getSubdominio()]['DB_DATABASE'];
        $this->DB_USERNAME = $config[getSubdominio()]['DB_USERNAME'];
        $this->DB_PASSWORD = $config[getSubdominio()]['DB_PASSWORD'];
       
        parent::__construct(
            'mysql:host=' . $this->DB_HOST . ';dbname=' . $this->DB_DATABASE, 
            $this->DB_USERNAME, 
            $this->DB_PASSWORD, 
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
        );
    }
}