<?php 
require_once 'Modele/profil.php';
require_once 'Vue/vue.php';

class ControleurProfil{
    private $profil;

    public function __construct()
    {
        $this->profil = new Profil();
    }

    //Affiche les détails sur le profil
    public function afficheProfil($idClient){
        $query=$this->profil->getProfil($idClient);
        $profil=$query->fetch();
        
        $vue = new Vue("Profil");
        $vue->generer(array('profil' => $profil));

    }

    //Changement des infos de l'utilisateur
    public function setChangement($idClient,$adresse,$compladresse,$ville,$codepostal,$telephone,$email){
        $this->profil->Changement($idClient,$adresse,$compladresse,$ville,$codepostal,$telephone,$email);

        $vue = new Vue("Profil");
        
    }
}