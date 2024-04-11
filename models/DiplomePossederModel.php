<?php

namespace Model;

use App\Application;

class DiplomePossederModel
{
    public function __construct(
        private int $eleve_id,
        private int $diplome_id
    ){}
    public function save()
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("insert into Diplome_Posseder (eleve_id, diplome_id) values (:eleve_id,:diplome_id);");
        $query->execute([
            "eleve_id"=>$this->eleve_id,
            "diplome_id" => $this->diplome_id
        ]);
    }

    public static function deleteByIds(int $eleve_id,int $diplome_id) : bool
    {
        try {
            $PDO = Application::$instance->database;
            $query = $PDO->prepare("delete from Diplome_Posseder where eleve_id=:eleve_id and diplome_id=:diplome_id");
            $query->execute([
               "eleve_id" => $eleve_id,
               "diplome_id"=>$diplome_id
            ]);
            return  true;
        }catch (\PDOException $PDOException){
            $request->session->set("error",$PDOException->getMessage());
            return false;
        }
    }
}