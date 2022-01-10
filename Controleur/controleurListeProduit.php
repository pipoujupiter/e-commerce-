<?php
require_once 'Modele/produit.php';
require_once 'Vue/vue.php';

class ControleurListeProduit{
    private $produits;
    

    public function __construct(){
        $this->produits = new Produit();
        
    }

    // //Affiche la liste des produits
    // public function listeproduits(){
    //     $listeProduits = $this->produits->Get_produits();
    //     $vue = new Vue("ListeProduit");
    //     $vue->generer(array('listeProduits' => $listeProduits));
    // }

    //Affiche la liste des produits selon la catégorie choisie
    public function listeproduitsparcategorie($params){
        $listeProduitsparCategorie=$this->produits->Get_produitsparcategorie($params);
        $vue = new Vue("ListeProduit");
        $vue->generer(array('listeProduitsparCategorie' => $listeProduitsparCategorie));
    }
}


