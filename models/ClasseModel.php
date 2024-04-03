<?php

namespace Model;

use App\Application;

class ClasseModel
{
    public function __construct(private string $libelle){}
    public function save() : void
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("insert into Classe (libelle) values (:libelle);");
        $query->execute([
            "libelle" => $this->libelle,
        ]);
    }
    public static function findAll():array
    {
        $PDO = Application::$instance->database;
        return $PDO->query("select id,libelle from Classe")->fetchAll();
    }
    public static function findById(int $id) : array | bool
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("select id,libelle from Classe where id=:id");
        $query->execute([
            "id"=>$id
        ]);
        return $query->fetch();
    }
    public static function isExist(string $libelle) : array|bool
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("select id, libelle from Classe where libelle=:libelle");
        $query->execute([
            "libelle"=>$libelle
        ]);
        return !!$query->fetch();
    }
    public static function deleteById(int $id) : bool
    {
        try {
            $PDO = Application::$instance->database;
            $query = $PDO->prepare("delete from Classe where id=:id");
            $query->execute([
                "id"=>$id
            ]);
            return  true;
        }catch (\PDOException $PDOException){
            return false;
        }
    }
    public static function updateLibelle(int $id,string $libelle) : bool
    {
        try {

            $PDO = Application::$instance->database;
            $query = $PDO->prepare("update Classe set libelle=:libelle where id=:id");
            $query->execute([
                "id"=>$id,
                "libelle"=>$libelle
            ]);
            return  true;
        }catch (\PDOException $PDOException){
            Application::print($PDOException);

            return  false;
        }
    }


}