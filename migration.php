<?php
require "./vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

$dsn = $_ENV["DATABASE_DSN"];
$user = $_ENV["DATABASE_USER"];
$dbname = $_ENV["DATABASE_NAME"];
$password = $_ENV["DATABASE_PASSWORD"];

$pdo = new PDO($dsn,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

echo "database connect".PHP_EOL;
$migrationQuery = file_get_contents("./sql/migration.sql");
$pdo->query("create database if not exists $dbname;");

echo "database $dbname created".PHP_EOL;

$pdo->query("use $dbname");
$pdo->query($migrationQuery);
echo "migration done".PHP_EOL;
