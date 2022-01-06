<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurListeProduit.php';
require_once 'Controleur/controleurProduit.php';

require_once 'Vue/vue.php';

class Routeur {
    private $ctrlAccueil;
    private $ctrlListeProduit;
    private $ctrlProduit;

    public function __construct(){
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlListeProduit = new ControleurListeProduit();
        $this->ctrlProduit = new ControleurProduit();

    }

    //Traite une requête entrante
    public function routerRequete(){

        try {
            if (!isset($_GET['action']))
                $action='liste';
            elseif (isset($actions[$_GET['action']]))
                $action = $_GET['action'];
            else
                throw new Exception("L'action ".$_GET['action']." n'est pas valable pour la vue.");

            }

        catch(Exception $e){
            $this->erreur($e->getMessage());
        }  

    }  

    // Affiche une erreur
    private function erreur($msgErreur){
        $vue = new Vue ("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

}