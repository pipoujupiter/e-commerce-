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
}