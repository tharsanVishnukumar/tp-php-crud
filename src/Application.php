<?php 
namespace App;

class Application {
    public Router $router;
    public Response $response;
    public Request $request;
    public Database $database;
    public static Application $instance;
    public function __construct(){
        self::$instance = $this;
        $this->router = new Router();
        $this->request = new Request();
        $this->response = new Response();
        $this->database = new Database();
    }
    public function run(): void {
        echo $this->router->resolve($this->request,$this->response);
    }
    public static function print($value):void{
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

    }
}