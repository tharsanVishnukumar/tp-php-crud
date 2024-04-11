<?php

namespace Model;

use App\Application;

class DiplomeModel
{
    public function __construct(private string $libelle){}
    public function  save()
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("insert into Diplome (libelle) values (:libelle);");
        $query->execute([
            "libelle" => trim($this->libelle)
        ]);
    }


    public static function findById(int $id) : array | bool
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("select id,libelle from Diplome where id=:id");
        $query->execute([
            "id"=>$id
        ]);
        return $query->fetch();
    }
    public static function findAll() : array
    {
        $PDO = Application::$instance->database;
        $query = $PDO->query("select id,libelle from Diplome;");
        return  $query->fetchAll();
    }
    public static function isExist(string $libelle) : array|bool
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("select id from Diplome where libelle=:libelle");
        $query->execute([
            "libelle"=>trim($libelle)
        ]);
        return !!$query->fetch();
    }
    public static function updateLibelle(int $id,string $libelle) : bool
    {
        try {
            $PDO = Application::$instance->database;
            $query = $PDO->prepare("update Diplome set libelle=:libelle where id=:id");
            $query->execute([
                "id"=>$id,
                "libelle"=>trim($libelle)
            ]);
            return  true;
        }catch (\PDOException $PDOException){
            Application::$instance->request->session->set("error",$PDOException->getMessage());
            return  false;
        }
    }
    public static function deleteById(int $id) : bool
    {
        try {
            $PDO = Application::$instance->database;
            $query = $PDO->prepare("delete from Diplome where id=:id");
            $query->execute([
                "id"=>$id
            ]);
            return  true;
        }catch (\PDOException $PDOException){
            $request->session->set("error",$PDOException->getMessage());
            return false;
        }
    }
}