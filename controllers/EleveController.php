<?php

namespace Controller;

use App\Application;
use Model\ClasseModel;
use Model\EleveModel;

class EleveController
{
    public function create(\App\Request $request,\App\Response $responce)
    {
        if(!filter_var($request->body["email"],FILTER_VALIDATE_EMAIL)){
            return $responce->redirect("/eleve/create");
        }
        if(EleveModel::isEmailUnique($request->body["email"])){
            $request->session->set("error","cet email est déjà utilisé");
            return $responce->redirect("/eleve/create");
        }

        $eleve = new EleveModel(
            $request->body["firstname"],
            $request->body["lastname"],
            $request->body["email"],
            $request->body["dateOfBirth"],
            $request->body["classe"],
            $request->body["sexe"],
        );
        $eleve->save();
        return $responce->redirect("/eleve");
    }
    public function delete(\App\Request $request,\App\Response $response): string
    {
        EleveModel::deleteById($request->params["id"]);

        return $response->redirect("/eleve");
    }
    public function edit(\App\Request $request,\App\Response $responce):string
    {
        $eleveid = $request->params["id"];
        $body = $request->body;
        $eleve = EleveModel::findById($request->params["id"]);
        if($eleve === false){
            $request->session->set("error","Cet étudiant n'existe pas");
            return $responce->redirect("/eleve");
        }

        $result =  EleveModel::edit(
            $eleveid,
            $body["lastname"],
            $body["firstname"],
            $body["email"],
            $body["dateOfBirth"],
            $body["classe"],
            $body["sexe"]
        );

        if($result === false){
            $request->session->set("error","Impossible de modifier l'utilisateur.");
        }
        return $responce->redirect("/eleve");
    }
    public function showEdit(\App\Request $request,\App\Response $responce):string
    {
        $classes = ClasseModel::findAll();
        $eleve = EleveModel::findById($request->params["id"]);
        if($eleve === false){
            return $responce->render("404");
        }
        return $responce->render("eleve.edit",[
            "classes" => $classes,
            "eleve" => $eleve
        ]);
    }
    public function show(\App\Request $request,\App\Response $responce):string
    {
        $eleves = EleveModel::findAllAndJoin();
        return $responce->render("eleve.show",[
            "eleves" => $eleves
        ]);
    }
    public function showCreate(\App\Request $request,\App\Response $responce)
    {
        $classes = ClasseModel::findAll();

        return $responce->render("eleve.create",[
            "classes" => $classes,
        ]);
    }


}