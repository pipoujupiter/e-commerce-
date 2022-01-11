<?php

require 'Modele/produit.php';

//Affiche les détails sur un produit
function affiche($params){
    $produit=produit($params['id']);
    require 'Vue/vue_produit.php';
}

//Affiche les détails sur un produit
function liste($params){
    $produits=produits();
    require 'Vue/vue_produit_liste.php';
}

//Affiche les détails sur un produit
function listeparcategorie($params){
    $produits=produitsparcategorie($params['cat']);
    require 'Vue/vue_produit_liste.php';
}