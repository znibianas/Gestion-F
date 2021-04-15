<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FiliereService
 *
 * @author mosab
 */
include_once 'beans/Filiere.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class FiliereService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }

    
    public function create($o) {
        $query = "INSERT INTO Filiere VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(),$o->getLibelle() )) or die('Error');
    
    }

    public function delete($id) {
        $query = "DELETE FROM Classes WHERE filiere = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
        $queryy = "DELETE FROM Filiere WHERE id = ?";
        $reqq = $this->connexion->getConnexion()->prepare($queryy);
        $reqq->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from filiere";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    

    public function findById($id) {
        $query = "select * from filiere where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        $fonction = new Filiere($res->id,$res->code, $res->libelle);
        return $fonction;
    }

     public function findByIdApi($id) {
        $query = "select * from Filiere where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        return $res;
    }
    
    public function findclasses($filiere) {
        $query = "select nom from classes WHERE filiere =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($filiere));
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function update($o) {
        $query = "UPDATE Filiere SET libelle = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelle(),$o->getCode(), $o->getId())) or die('Error');       
    }
    public function countClasses() {
        $query = "SELECT libelle,count(filiere) as nbrclasses FROM classes inner join filiere on filiere.id=classes.filiere group by classes.filiere";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
}
