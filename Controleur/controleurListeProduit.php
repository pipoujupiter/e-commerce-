<?php
require_once 'Modele/produit.php';
require_once 'Modele/categorie.php';
require_once 'Vue/vue.php';

class ControleurListeProduit{
    private $produits;
    private $categories;

    public function _construct(){
        $this->produits = new Produit();
        $this->categories = new Categorie();
    }

    //Affiche la liste des produits
    public function liste($params){
        $produits=produits();
        $vue = new Vue("ListeProduit");
        $vue->generer(array('produits' => $produits,'categories' => $categories));
    }

    //Affiche la liste des produits selon la catégorie choisie
    public function listeparcategorie($params){
        $produits=produitsparcategorie($params['cat']);
        $vue = new Vue("ListeProduit");
        $vue->generer(array('produits' => $produits,'categories' => $categories));
    }
}



