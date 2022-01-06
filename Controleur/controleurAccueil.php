<?php
require_once 'Modele/categorie.php';
require_once 'Vue/vue.php';

class ControleurAccueil {
    private $categories;

    public function _construct(){
        $this->categories = new Categorie();
    }

    //Affiche la liste de toutes les catégories
    public function liste($params){
        $categories=categories();
        $vue = new Vue("Accueil");
        $vue->generer(array('categories' => $categories));   
    }
}

