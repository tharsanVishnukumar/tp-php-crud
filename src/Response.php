<?php
namespace App;
class Response {
    public function __construct(){}
    public function setStatus(int $code) :Response{
        http_response_code($code);
        return $this;
    }
    public function render(string $page, array $params = []): string{
        foreach($params  as $key => $value){
            $$key = $value;
        }
        ob_start();
        $__page_title = "php-crud";
        $request = Application::$instance->request;
        $__session_error = $request->session->get("error");
        $request->session->unset("error");

        include("../layouts/header.php");
        include("../views/".$page.".php");
        include("../layouts/footer.php");
        return ob_get_clean();
    }
    public function redirect(string $path)
    {
        header("Location: ".$path);
        return "redirect ".$path;
    }
}