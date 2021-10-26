<?php

class Config
{
    private $config;

    public function __construct($configFilePath)
    {
        if (!$this->config = parse_ini_file($configFilePath, TRUE)) throw new exception('Unable to open ' . $configFilePath . '.');
    }

    public function getConfig()
    {
        return $this->config;
    }
}
