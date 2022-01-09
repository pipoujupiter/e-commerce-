<?php
require_once 'Modele/Modele.php';

class Categorie extends Modele {

    // Renvoie la liste des catégories par odre croissant de numéro d'identification
    public function Get_categories() {
        /*$bdd = getBdd();
        
        $categories = $bdd->query('select id as id, name as name from categories');*/
        $sql = 'SELECT id AS id, name AS name FROM categories';
        $categories = $this->executerRequete($sql);
        return $categories;
    }

}
