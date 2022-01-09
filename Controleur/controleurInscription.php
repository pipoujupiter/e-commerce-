<?php

require_once 'Modele/inscription.php';
require_once 'Vue/Vue.php';

class ControleurInscription {
    private $inscription;

    public function __construct(){
        $this->inscription = new Inscription();
    }

    // Affiche le formulaire d'inscription
    public function formulaireInscription(){
        $vue=new Vue('Inscription');
        $vue->generer(array(NULL));
    }

    public function PossibiliteInscription($pseudo){
       return $this->inscription->possibiliteInscription($pseudo);
    }

    public function Inscription($pseudo,$hashMdp){
        $this->inscription->enregistrerUtilisateur($pseudo,$hashMdp);
    }
}