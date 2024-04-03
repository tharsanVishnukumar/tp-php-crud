<?php

namespace App;

class Database extends \PDO
{
    public function __construct()
    {
        $config  = Config::$instance;
        parent::__construct($config->database_dsn, $config->database_user, $config->database_password);
    }
}