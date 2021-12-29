<?php require 'Modele/modele.php';

//Affiche la liste de tous les produits 
function acceuil(){
    $produits=getproduits();
require 'Vue/vueAcceuil.php';
}

//Affiche les détails sur un produit
function produit($idProduit){
    $produit=getproduit($idProduit);
require 'Vue/vueProduit.php';
}