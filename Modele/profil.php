<?php 
require_once 'Modele/modele.php';

class Profil extends Modele{

    //Renvoie les informations sur un utilisateur
    public function getProfil($idClient){
        $sql='SELECT * FROM customers WHERE id='.$idClient;
        $profil=$this->executerRequete($sql);

        return $profil;

    }

    //Change les information de l'utilisateur dans la table customers
    public function Changement($idClient,$adresse,$compladresse,$ville,$codepostal,$telephone,$email){    
        
        $sql='UPDATE customers SET add1=?,add2=?,add3=?,postcode=?,phone=?,email=? WHERE id=?'; 
        $this->executerRequete($sql,array($adresse,$compladresse,$ville,$codepostal,$telephone,$email,$idClient));
    }
}
