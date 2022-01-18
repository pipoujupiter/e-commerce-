<?php
require_once 'Modele/produit.php';
require_once 'Modele/panier.php';
require_once 'Vue/vue.php';

class ControleurProduit {
    private $produit;
    private $panier;

    public function __construct(){
        $this->produit = new Produit();
        $this->panier = new Panier();
    }

    //Affiche les détails sur un produit
    public function afficheproduit($params){
        // $produit = $this->produit->Get_produit($params);
        $query=$this->produit->Get_produit($params);
        $produit=$query->fetch();
        
        $vue = new Vue("Produit");
        $vue->generer(array('produit' => $produit));
    }

    public function ctrlCheckOrder($idClient){
        return $this->panier->checkOrder($idClient);
    }

    public function ctrlGetIdOrder($idClient,$status){
        return $this->panier->getIdOrder($idClient,$status);
    }

    public function ctrlCreateOrder($idClient,$session){
        $this->panier->createOrder($idClient,$session);
    }

    public function ctrlAddProduct($idCommande,$idProduit,$qteProduit){
        return $this->panier->addProduct($idCommande,$idProduit,$qteProduit);
    }

    public function ctrlGetCustomerId($pseudo){
        return $this->panier->getCustomerId($pseudo);
    }
}


