<?php
namespace App;

class Router  {
    private \AltoRouter $router;
    public function __construct(){
        $this->router  = new \AltoRouter();
    }
    public function get(string $path,array | string | callable $target):void{
        $this->router->map("GET", $path, $target);
    }
    public function post(string $path,$target):void{
        $this->router->map("POST", $path, $target);
    }

    public function resolve(Request $req, Response $res){
        $match =  $this->router->match();
        if($match === false) {
            return $res->setStatus(404)->render("404");
        }
        $req->setParams($match["params"]);
        $target = $match['target'];

        if(is_string($target)){
            return $res->render($target);
        }
        if(is_array($target)){
            $target[0] = new $target[0]();
        }
        return call_user_func($target, $req, $res);
    }
}