<?php
require_once 'Modele/produit.php';
require_once 'Vue/vue.php';

class ControleurProduit {
    private $produits;

    public function _construct(){
        $this->produits = new Produit();
    }

    //Affiche les détails sur un produit
    public function affiche($params){
        $produit=produit($params['id']);
        $vue = new Vue("Produit");
        $vue->generer(array('produits' => $produits));
    }
}


