<?php
require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurCommentaire{
    private $commentaire;

    public function __construct()
    {
        $this->commentaire = new Commentaire();
    }

    //Affiche les commentaires des utilisateurs concernant le produit selectionné
    public function afficheCommentaire($params){
        // return $this->commentaire->Get_commentaire($params);
        $afficheCommentaire=$this->commentaire->Get_commentaire($params);
        $vue = new Vue("Commentaire");
        $vue->generer(array('afficheCommentaire'=> $afficheCommentaire));
    }

    //Ajoute un commentaire d'un produit
    public function commenter($utilisateur,$genre,$etoile,$titre,$description,$idProduit){
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($utilisateur,$genre,$etoile,$titre,$description,$idProduit);
        // Actualisation de l'affichage de la page commentaire
        $this->afficheCommentaire($idProduit);
    }
}