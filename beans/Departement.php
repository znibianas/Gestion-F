<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of departement
 *
 * @author mosab
 */
class Departement {
    private $id;
    private $code;
    private $libelle;
    
    function __construct($id, $code, $libelle) {
        $this->id = $id;
        $this->code = $code;
        $this->libelle = $libelle;
    }

    function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->code;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }


}
