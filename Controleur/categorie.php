<?php

require 'Modele/categorie.php';

//Affiche la liste de tous les produits 
function liste($params){
    $categories=categories();
    require 'Vue/vue_categorie_liste.php';
}
