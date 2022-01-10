<?php

require_once 'Modele/connexion.php';
require_once 'Vue/Vue.php';

class ControleurConnexion{
    private $connexion;

    public function __construct(){
        $this->connexion = new Connexion();
    }

    public function connexion(){
        $vue=new Vue('Connexion');
        $vue->generer(array(NULL));
    }

    public function ctrlCheckUser($pseudo,$hashMdp){
        return $this->connexion->checkUser($pseudo,$hashMdp);
    }
}