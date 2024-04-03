<?php
namespace App;

class Request{
    public string $path;
    public Session $session;
    public array $body;
    public string $method;
    public array $params = [];
    function __construct(){
        $this->parserMethod();
        $this->parserBody();
        $this->session = new Session();

    }
    public function setParams(array $params) : void
    {
        $this->params = $params;
    }
    private function parserMethod() : void
    {
        $this->method =  strtolower($_SERVER['REQUEST_METHOD']);
    }

    private function parserBody():void
    {
        $body = [];
        if ($this->method === "get") {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method === "post") {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        $this->body =  $body;
    }

}