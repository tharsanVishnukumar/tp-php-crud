<?php

namespace Controller;

use Model\ClasseModel;
use Model\DiplomeModel;
use Model\DiplomePossederModel;
use Model\EleveModel;

class DiplomeController
{
    public function show(\App\Request $request,\App\Response $response):string
    {
        $diplomes =  DiplomeModel::findAll();
        return $response->render("diplome.show", [
            "diplomes" => $diplomes,
        ]);
    }
  public function showEdit(\App\Request $request,\App\Response $response):string
    {
        $diplome =  DiplomeModel::findById($request->params["id"]);
        if($diplome === false){
            return $response->render("404");
        }
        return $response->render("diplome.edit", [
            "diplome" => $diplome,
        ]);
    }
    public function edit(\App\Request $request,\App\Response $response):string
    {
        $diplomeName=  $request->body["diplome-name"];
        if(DiplomeModel::isExist($diplomeName)){
            $request->session->set("error","le nom du diplôme et déjà utilisé");
            return $response->redirect("/diplome/create");
        }
        $result =  DiplomeModel::updateLibelle($request->params["id"],$diplomeName);
        if($result === false){
            return $response->render("error");
        }
        return $response->redirect("/diplome");
    }

    public function create(\App\Request $request,\App\Response $response):string
    {

        $diplomeName=  $request->body["diplome-name"];
        if(DiplomeModel::isExist($diplomeName)){
            $request->session->set("error","le nom du diplôme et déjà utilisé");
            return $response->redirect("/diplome/create");
        }
        $diplome =  new DiplomeModel(
            $diplomeName
        );
        $diplome->save();

        return $response->redirect("/diplome");
    }
    public function showAdd(\App\Request $request,\App\Response $response):string
    {
        $eleve_id = $request->params["id"];
        $eleve =  EleveModel::findById($eleve_id);
        $diplomes_posseder = EleveModel::getAllDiplomeById($eleve_id);
        $diplomes = EleveModel::getAllNotOwnDiplomeById($eleve_id);

        return  $response->render("diplome.add",[
            "eleve" => $eleve,
            "diplomes" => $diplomes,
            "diplomes_posseder" => $diplomes_posseder
        ]);
    }public function add(\App\Request $request,\App\Response $response):string
    {
        $eleve_id = $request->params["id"];
        $diplome_id = $request->body["diplome"];


        if(EleveModel::findById($eleve_id) == false){
            return $response->render("404");
        }

        if(DiplomeModel::findById($diplome_id) == false){
            $request->session->set("error","Diplôme introuvable.");
            return $response->redirect("/diplome/eleve/$eleve_id");
        }
        $diplomePosseder = new DiplomePossederModel(
            $eleve_id,
            $diplome_id
        );
        $diplomePosseder->save();
        return $response->redirect("/diplome/eleve/$eleve_id");
    }
    public function delete(\App\Request $request,\App\Response $response):string
    {
        $diplome_id = $request->params["id"];
        DiplomeModel::deleteById($diplome_id);
        return $response->redirect("/diplome");
    }

    public function removeDiplome(\App\Request $request,\App\Response $response):string
    {
        $eleve_id = $request->params["eleveid"];
        $diplome_id = $request->params["diplomeid"];
        DiplomePossederModel::deleteByIds($eleve_id,$diplome_id);
        return $response->redirect("/diplome/eleve/$eleve_id");
    }


}