<?php
require_once 'Modele/Modele.php'; 

class Produit extends Modele {

    // // Renvoie la liste de tous les produits triés par odre croissant de numéro d'identification
    // public function Get_produits() {
    //     $sql = 'SELECT id AS id, name AS name FROM products';
    //     $produits = $this->executerRequete($sql);
    //     return $produits;
    // }

    //Renvoie la liste des produits appartenant à la catégorie choisie
    public function Get_produitsparcategorie($idCategory){
       
        $sql= 'SELECT * FROM products WHERE cat_id = '.$idCategory;
        $produits =$this->executerRequete($sql);
        return $produits;
    }

    //Renvoie les informations sur un produit 
    public function Get_produit($idProduit){
    
        $sql='SELECT * FROM products WHERE id='.$idProduit;
        $produit=$this->executerRequete($sql);
 
        return $produit;
    }

}





