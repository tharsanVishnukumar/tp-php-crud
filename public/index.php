<?php 
require "../vendor/autoload.php";

use App\Application;
use App\Config;

try {

    Config::load();
    new Config();
    $app = new Application();
    $app->router->get("/", "home");
    // classe routes
    $app->router->get("/classe", [\Controller\ClasseController::class, "show"]);
    $app->router->get("/classe/create", "classe.create");

    $app->router->post("/classe/create", [\Controller\ClasseController::class, "create"]);
    $app->router->get("/classe/delete/[:id]", [\Controller\ClasseController::class, "delete"]);

    $app->router->get("/classe/edit/[:id]",[\Controller\ClasseController::class,"editShow"]);
    $app->router->post("/classe/edit/[:id]",[\Controller\ClasseController::class,"edit"]);


    $app->router->get("/eleve",[\Controller\EleveController::class,"show"]);
    $app->router->get("/eleve/create",[\Controller\EleveController::class,"showCreate"]);
    $app->router->post("/eleve/create",[\Controller\EleveController::class,"create"]);

    $app->router->get("/eleve/edit/[:id]",[\Controller\EleveController::class,"showEdit"]);
    $app->run();

} catch (\Exception $exception) {
    if($exception instanceof PDOException){
        echo $exception->getMessage()."</br>";
    }else{
        Application:print($exception);
    }
}