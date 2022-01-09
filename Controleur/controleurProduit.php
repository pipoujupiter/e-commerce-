<?php
require_once 'Modele/produit.php';
require_once 'Vue/vue.php';

class ControleurProduit {
    private $produit;

    public function __construct(){
        $this->produit = new Produit();
    }

    //Affiche les détails sur un produit
    public function afficheproduit($params){
        // $produit = $this->produit->Get_produit($params);
        $query=$this->produit->Get_produit($params);
        $produit=$query->fetch();
        
        $vue = new Vue("Produit");
        $vue->generer(array('produit' => $produit));
    }
}

