<?php

require_once 'Modele/panier.php';
require_once 'Vue/Vue.php';

class ControleurPanier {
    private $panier;


    public function __construct(){
        $this->panier = new Panier();
    }

    // Affiche le panier du client
    public function panier($idClient,$idCommande){
        $produits=$this->panier->getProductsOrder($idCommande);
        $commande=$this->panier->checkOrder($idClient);
        $totalPrix=$this->panier->getTotalPrice($idCommande);
        $vue=new Vue('Panier');
        $vue->generer(array('produits'=>$produits,'commande'=>$commande,'totalPrix'=>$totalPrix));
    }

  
    public function ctrlViderPanier($idCommande){
      return $this->panier->viderPanier($idCommande);
    }

    public function ctrlSetTotalOrder($idCommande){
        $this->panier->setTotalOrder($idCommande);
    }

    // Affiche le panier du client pas connecté
    public function paniernoConnect(){
        $vue=new Vue('Panier');
        $vue->generer(array(NULL));
    }
}