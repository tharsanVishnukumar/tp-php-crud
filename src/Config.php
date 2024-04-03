<?php

namespace App;

class Config
{
    public string $database_dsn;
    public string $database_user;
    public string $database_password;
    public static Config $instance;

    public function __construct()
    {
        self::$instance = $this;
        $this->database_dsn = $_ENV["DATABASE_DSN"].";dbname=".$_ENV["DATABASE_NAME"];
        $this->database_user = $_ENV["DATABASE_USER"];
        $this->database_password = $_ENV["DATABASE_PASSWORD"];
    }

    public static function load(): void{
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
        $dotenv->load();
    }
}