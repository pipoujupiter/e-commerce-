<?php


// Renvoie la liste de tous les produits triés par odre croissant de numéro d'identification
function getproduits() {
    $bdd = getBdd();
    $produit = $bdd->query('select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products');
    
    return $produit;
}



//Effectue la connexion à la BDD
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=web4shop;charset=utf8','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $bdd;
}


//Renvoie les informations sur un produit 
function getproduit($idProduit){
    $bdd=getBdd();
    $requete=$bdd->prepare('select id as id, cat_id as catId, name as name, description as description, image as image, price as prix, quantity as quantite from products where id=:id');
    $requete->execute(array(":id"=>$idProduit));
    if($requete->rowCount()==1)
        return $requete->fetch(); //Accès à la première ligne de résultat

    else throw new Exception("Aucun produit ne correspond à l'ifentifiant '$idProduit'");
}