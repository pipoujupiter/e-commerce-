<?php
require_once 'Modele/Modele.php'; 

class Produit extends Modele {

    // Renvoie la liste de tous les produits triés par odre croissant de numéro d'identification
    public function Get_produits() {
        
        // $bdd = getBdd();
        // $produits = $bdd->query('select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products');
       
        $sql = 'SELECT id AS id, name AS name FROM products';
        $produits = $this->executerRequete($sql);
        return $produits;
    }

    //Renvoie la liste des produits appartenant à la catégorie choisie
    public function Get_produitsparcategorie($idCategory){
        // $bdd=getBdd();
        // $requete=$bdd->prepare('select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products where cat_id=:id');
        // $requete->execute(array(":id"=>$idCategory));
        // echo('<!-- select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products where cat_id=:id -->');
        // echo('<!-- :id='.$idCategory.' -->');
        // echo('<!-- count='.$requete->rowCount().' -->');
        // return $requete->fetchall();

        $sql= 'SELECT * FROM products WHERE cat_id = '.$idCategory;
        $produits =$this->executerRequete($sql);
        return $produits;
    }

    //Renvoie les informations sur un produit 
    public function Get_produit($idProduit){
        // $bdd=getBdd();
        // $requete=$bdd->prepare('select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products where id=:id');
        // $requete->execute(array(":id"=>$idProduit));
        // if($requete->rowCount()==1)
        //     return $requete->fetch(); //Accès à la première ligne de résultat

        // else throw new Exception("Aucun produit ne correspond à l'identifiant '$idProduit'");

        $sql='SELECT id AS id, cat_id AS catId, name AS name, description AS description, image AS image, price AS prix, quantity AS quantite FROM products WHERE id=id';
        $produit=$this->executerRequete($sql,$idProduit);
        return $produit;
    }

}





