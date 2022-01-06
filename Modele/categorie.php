<?php
require_once 'Modele/Modele.php';

class Categorie extends Modele {

    // Renvoie la liste de tous les produits triés par odre croissant de numéro d'identification
    public function categories() {
        $bdd = getBdd();
        $categories = $bdd->query('select id as id, name as name from categories');
        return $categories;
    }

}
