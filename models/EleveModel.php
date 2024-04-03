<?php

namespace Model;

use App\Application;

class EleveModel
{
//    private string $firstname;

    public function __construct(
        private string $firtname,
        private string $lastname,
        private string $email,
        private string $dateOfBirth,
        private int $classe,
    ){}

    public function save() : void
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("insert into Eleve (nom, prenom, email, date_de_naissance, classe_Id) values (:nom,:prenom,:email,:date_de_naissance,:classe_Id);");
        $query->execute([
            "nom"=>$this->lastname,
            "prenom"=>$this->firtname,
            "email"=>$this->email,
            "date_de_naissance"=>$this->dateOfBirth,
            "classe_Id"=>$this->classe
        ]);
    }
    public static function findAll() : array
    {
        $PDO = Application::$instance->database;
        $query = $PDO->query("select nom,prenom,email,date_de_naissance,classe_Id,id from Eleve;");
        return  $query->fetchAll();
    }
    public static function findAllAndJoin() : array
    {
        $PDO = Application::$instance->database;
        $query = $PDO->query("select eleve.nom, eleve.prenom, eleve.email, eleve.date_de_naissance, eleve.id eleve_id, classe.libelle classe_libelle from Eleve eleve join Classe classe on eleve.classe_Id = classe.id;");
        return  $query->fetchAll();
    }

}