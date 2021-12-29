<?php require ('Controleur/controleur.php');

try {
    if (isset($_GET['action'])){
        if($_GET['action'] =='produit'){
            if (isset($_GET['id'])){
                $idProduit=intval($_GET['id']);
                if($idProduit !=0) produit($idProduit);

                else throw new Exception("Identifiant de produit non valide");
            }
            
            else throw new Exception("Identifiant de produit non défini");
        }

        else throw new Exception("Action non valide");
    }

    else {
        acceuil(); //Action par défaut
    }
}


catch (Exception $e ){
    $msgErreur = $e->getMessage();
    require 'Vue/vueErreur.php';
}