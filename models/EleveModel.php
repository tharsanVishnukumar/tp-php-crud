<?php

namespace Model;

use App\Application;

class EleveModel
{
    public function __construct(
        private string $firtname,
        private string $lastname,
        private string $email,
        private string $dateOfBirth,
        private int $classe,
        private string $sexe,
    ){}

    public function save() : void
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("insert into Eleve (nom, prenom, email, date_de_naissance, classe_Id,sexe) values (:nom,:prenom,:email,:date_de_naissance,:classe_Id,:sexe);");
        $query->execute([
            "nom"=>$this->lastname,
            "prenom"=>$this->firtname,
            "email"=>$this->email,
            "date_de_naissance"=>$this->dateOfBirth,
            "classe_Id"=>$this->classe,
            "sexe"=>$this->sexe,
        ]);
    }
    public static function deleteById(int $id) : bool
    {
        try {
            $PDO = Application::$instance->database;
            $query = $PDO->prepare("delete from Eleve where id=:id");
            $query->execute([
                "id"=>$id
            ]);
            return  true;
        }catch (\PDOException $PDOException){
            $request->session->set("error",$PDOException->getMessage());
            return false;
        }
    }
    public static function findById(int $id) : array | bool
    {

        $PDO = Application::$instance->database;
        $query = $PDO->prepare("select nom,prenom,email,date_de_naissance,classe_Id,id,sexe from Eleve where id=:id;");
        $query->execute([
            "id"=>$id
        ]);
        return $query->fetch();
    }
    public static function edit(int $id, string $nom,string $prenom,string $email,string $date_de_naissance,int $classe_Id,string $sexe):bool
    {
        $PDO = Application::$instance->database;
        $classe =  ClasseModel::findById($classe_Id);
        if($classe === false) return false;

        $query = $PDO->prepare("update Eleve set nom = :nom,prenom = :prenom,email = :email, date_de_naissance = :date_de_naissance, classe_Id = :classe_Id, sexe = :sexe where id = :id;");
        $query->execute([
            "id"=>$id,
            "nom"=>$nom,
            "prenom" => $prenom,
            "email" => $email,
            "date_de_naissance" => $date_de_naissance,
            "classe_Id" => $classe_Id,
            "sexe" => $sexe
        ]);
        return true;
    }


    public static function isEmailUnique(string $email)
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("select nom, prenom, email from Eleve where email =:email;");
        $query->execute([
            "email" => $email
        ]);
        return $query->fetchAll();
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
        $query = $PDO->query("select 
                                        eleve.nom,
                                        eleve.prenom,
                                        eleve.email,
                                        eleve.date_de_naissance,
                                        eleve.id eleve_id,
                                        classe.libelle classe_libelle,
                                        sexe 
                                    from Eleve eleve 
                                    left join Classe classe 
                                    on eleve.classe_Id = classe.id;");
        return  $query->fetchAll();
    }
    public  static function getAllDiplomeById(int $id):array
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("select 
                                            diplome.id diplome_id, 
                                            diplome.libelle diplome_libelle, 
                                            eleve.id eleve_id
                                            from eleve
                                            inner join diplome_posseder on diplome_posseder.eleve_id = eleve.id 
                                            inner join diplome on diplome.id = diplome_posseder.diplome_id 
                                            where eleve.id = :eleve_id;");
        $query->execute([
            "eleve_id"=>$id
        ]);

        return $query->fetchAll();
    }
    public  static function getAllNotOwnDiplomeById(int $id):array
    {
        $PDO = Application::$instance->database;
        $query = $PDO->prepare("select 
                                            diplome.id,
                                            diplome.libelle 
                                            from diplome
                                            left join diplome_posseder 
                                            on diplome.id = diplome_posseder.diplome_id  
                                            and diplome_posseder.eleve_id = :eleve_id
                                            where diplome_posseder.eleve_id is null;");
        $query->execute([
            "eleve_id"=>$id
        ]);

        return $query->fetchAll();
    }

}