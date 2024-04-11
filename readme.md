# php crud by tharsan

## requirements
- [php](https://www.php.net/downloads.php)  ou [xampp](https://www.apachefriends.org/download.html)
- [composer](https://getcomposer.org/download/) ou [Installer Composer sur Windows avec XAMPP](https://www.thecodedeveloper.com/install-composer-windows-xampp/)

## installer les paquets
 ````shell
$ composer update
````
## config
toutes les variable de configuration sont dans le fichier ``.env``

## installation de la base de donnée (migration)
````shell
$ php ./migration.php
````

si il y a l'erreur ci-dessous, il faut activer ``extension=pdo_mysql`` dans php.ini
````shell
PHP Fatal error:  Uncaught PDOException: could not find driver in C:\xampp\htdocs\tp-php-crud\migration.php:11
Stack trace:
#0 C:\xampp\htdocs\tp-php-crud\migration.php(11): PDO->__construct()
#1 {main}
  thrown in C:\xampp\htdocs\tp-php-crud\migration.php on line 11
````
## lancé le serveur php avec l'une des commande suivant

### windows
````shell
$ ./run.bat
````

### linux
````shell
$ ./run.sh
````
ou 
````shell
$ php -S localhost:8080 -t .\public
````


