<?php 
require "../vendor/autoload.php";

use App\Application;
use App\Config;


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

// eleve routes
$app->router->get("/eleve",[\Controller\EleveController::class,"show"]);
$app->router->get("/eleve/create",[\Controller\EleveController::class,"showCreate"]);
$app->router->post("/eleve/create",[\Controller\EleveController::class,"create"]);
$app->router->get("/eleve/delete/[:id]", [\Controller\EleveController::class, "delete"]);

$app->router->get("/eleve/edit/[:id]",[\Controller\EleveController::class,"showEdit"]);
$app->router->post("/eleve/edit/[:id]",[\Controller\EleveController::class,"edit"]);


// diplome route
$app->router->get("/diplome",[\Controller\DiplomeController::class,"show"]);
$app->router->get("/diplome/create","diplome.create");
$app->router->post("/diplome/create",[\Controller\DiplomeController::class,"create"]);
$app->router->get("/diplome/edit/[:id]",[\Controller\DiplomeController::class,"showEdit"]);
$app->router->post("/diplome/edit/[:id]",[\Controller\DiplomeController::class,"edit"]);

$app->router->get("/diplome/delete/[:id]",[\Controller\DiplomeController::class,"delete"]);

$app->router->get("/diplome/eleve/[:id]",[\Controller\DiplomeController::class,"showAdd"]);
$app->router->post("/diplome/eleve/[:id]",[\Controller\DiplomeController::class,"add"]);
$app->router->get("/diplome/[:diplomeid]/eleve/[:eleveid]/delete",[\Controller\DiplomeController::class,"removeDiplome"]);
$app->run();
