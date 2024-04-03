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

        $eleve = new EleveModel(
            $request->body["firstname"],
            $request->body["lastname"],
            $request->body["email"],
            $request->body["dateOfBirth"],
            $request->body["classe"],
        );
        $eleve->save();
        return $responce->redirect("/eleve/create");
    }
    public function showEdit(\App\Request $request,\App\Response $responce):string
    {
        $classes = ClasseModel::findAll();
        return $responce->render("eleve.edit",[
            "classes" => $classes
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
            "classes" => $classes
        ]);
    }


}