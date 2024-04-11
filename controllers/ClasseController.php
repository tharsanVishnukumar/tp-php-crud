<?php

namespace Controller;

use App\Application;
use Model\ClasseModel;

class ClasseController
{
    public function show(\App\Request $request,\App\Response $response):string
    {
        $classes =  ClasseModel::findAll();
        return $response->render("classe.show", [
            "classes" => $classes,
        ]);
    }
    public function editShow(\App\Request $request,\App\Response $response):string
    {
        $classe = ClasseModel::findById($request->params["id"]);
        if($classe === false){
            return $response->render("404");
        }
        return $response->render("classe.edit",[
            "classe"=> $classe
        ]);
    }
    public function edit(\App\Request $request,\App\Response $response):string
    {
        $className = $request->body["classe-name"];
        $classeId = $request->params["id"];

        if(ClasseModel::isExist($className)){
            $request->session->set("error","le nom de la classe et déjà utilisé");
            return $response->redirect("/classe/edit/".$classeId);
        }
        $result =  ClasseModel::updateLibelle($classeId,$className);
        if($result === false) {
            return $response->render("error");
        }
        return $response->redirect("/classe");
    }
    public function delete(\App\Request $request,\App\Response $response): string
    {
        ClasseModel::deleteById($request->params["id"]);
        return $response->redirect("/classe");
    }
    public function create(\App\Request $request,\App\Response $response):string
    {
        $className = $request->body["classe-name"];
        if(ClasseModel::isExist($className)){
            $request->session->set("error","le nom de la classe et déjà utilisé");
            return $response->redirect("/classe/create");
        }
        $classe = new ClasseModel($className);
        $classe->save(Application::$instance->database);
        return  $response->redirect("/classe");
    }
}