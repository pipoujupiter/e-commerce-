<?php
require('Modele/connexion.php');

// Renvoie la liste de tous les produits triés par odre croissant de numéro d'identification
function categories() {
    $bdd = getBdd();
    $categories = $bdd->query('select id as id, name as name from categories');
    return $categories;
}
