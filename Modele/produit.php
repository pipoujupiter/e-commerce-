<?php
require_once 'Modele/Modele.php'; 

class Produit extends Modele {

    // Renvoie la liste de tous les produits triés par odre croissant de numéro d'identification
    public function produits() {
        $bdd = getBdd();
        $produits = $bdd->query('select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products');
        return $produits;
    }

    //Renvoie les informations sur un produit 
    public function produitsparcategorie($idCategory){
        $bdd=getBdd();
        $requete=$bdd->prepare('select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products where cat_id=:id');
        $requete->execute(array(":id"=>$idCategory));
        echo('<!-- select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products where cat_id=:id -->');
        echo('<!-- :id='.$idCategory.' -->');
        echo('<!-- count='.$requete->rowCount().' -->');
        return $requete->fetchall();
    }

    //Renvoie les informations sur un produit 
    public function produit($idProduit){
        $bdd=getBdd();
        $requete=$bdd->prepare('select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products where id=:id');
        $requete->execute(array(":id"=>$idProduit));
        if($requete->rowCount()==1)
            return $requete->fetch(); //Accès à la première ligne de résultat

        else throw new Exception("Aucun produit ne correspond à l'ifentifiant '$idProduit'");
    }

}





