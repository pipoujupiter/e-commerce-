<?php
require_once 'Modele/categorie.php';
require_once 'Vue/vue.php';

class ControleurAccueil {
    private $categories;

    public function __construct() {
        $this->categories = new Categorie();
    }

    //Affiche la liste des trois catégories
    public function listecategorie() {
        $listeCategories = $this->categories->Get_categories();
        $vue = new Vue("Accueil");
        $vue->generer(array('listeCategories' => $listeCategories));   
        
        
    }
}

