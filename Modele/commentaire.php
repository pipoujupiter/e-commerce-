<?php
require_once 'Modele/modele.php';

class Commentaire extends Modele{

    //Renvoie les informations concernant un commentaire d'un produit choisit
    public function Get_commentaire($idProduit){
        $sql='SELECT * FROM reviews WHERE id_product='.$idProduit;
        $commentaire =$this->executerRequete($sql);
        return $commentaire;
    }
}