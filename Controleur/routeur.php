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
            if (isset($_GET['action'])){
                if($_GET['action']=='listeparcategorie'){
                    $id=intval($this->Get_parametre($_GET,'cat')); //intval renvoie la valeur numerique du parametre ou 0 en cas d'echec
                    if ($id!=0){
                        $this->ctrlListeProduit->listeproduitsparcategorie($id);
                    }
                    else {
                        throw new Exception("Identifiant de la catégorie incorrecte");
                    }
                }
            }
            else { // Aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->listecategorie();
            }




            // if (!isset($_GET['action']))
            //     $action='liste';
            //     ctrlAcceuil->
            // elseif (isset($actions[$_GET['action']]))
            //     $action = $_GET['action'];
            // else
            //     throw new Exception("L'action ".$_GET['action']." n'est pas valable pour la vue.");

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

    //Recherche un paramètre dans un tableau
    private function Get_parametre($tableau,$nom){
        if(isset($tableau[$nom])){
            return $tableau[$nom];
        }
        else{
            throw new Exception("Paramètre '$nom' absent");
        }
    }
}