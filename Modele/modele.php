<?php 
abstract class Modele {

    //Object PDO d'accès à la BD
    private $bdd;
    
    //Execute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params=null){
        if($params==null){
            $resultat=$this->getBdd()->query($sql); //Execution directe
        }
        else{
            $resultat=$this->getBdd()->prepare($sql); //requete préparée
        }
        return $resultat;
    }

    //Renvoie un object de connexion à la BD en initialisant la connexion au besoin
    private function getBdd(){
        if($this->bdd==null){
            $this-> $bdd = new PDO('mysql:host=localhost;dbname=web4shop;charset=utf8','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}

