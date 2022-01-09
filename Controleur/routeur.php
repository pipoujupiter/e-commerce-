<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurListeProduit.php';
require_once 'Controleur/controleurProduit.php';
require_once 'Controleur/controleurInscription.php';
require_once 'Controleur/controleurConnexion.php';
require_once 'Vue/vue.php';

class Routeur {
    private $ctrlAccueil;
    private $ctrlListeProduit;
    private $ctrlProduit;
    private $ctrlInscription;
    private $ctrlConnexion;

    public function __construct(){
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlListeProduit = new ControleurListeProduit();
        $this->ctrlProduit = new ControleurProduit();
        $this->ctrlInscription = new ControleurInscription();
        $this->ctrlConnexion = new ControleurConnexion();

    }

    //Traite une requête entrante
    public function routerRequete(){

        try {
            if (isset($_GET['action'])){
                if($_GET['action']=='listeparcategorie'){
                    $id=intval($this->Get_parametre($_GET,'cat')); //intval renvoie la valeur numerique du parametre ou 0 en cas d'echec
                    if ($id!=0){
                        $this->ctrlListeProduit->listeproduitsparcategorie($id);
                    }

                    else {
                        throw new Exception("Identifiant de la catégorie incorrecte");
                    }
                }

                else if($_GET['action']=='affiche'){
                    $id=intval($this->Get_parametre($_GET,'id'));
                    if ($id!=0){
                        $this->ctrlProduit->afficheproduit($id);
                    }
                    else {
                        throw new Exception("Identifiant du produit incorrect");
                    }

                }
                else if($_GET['action']=='inscription'){
                    if(!$_SESSION['connecte']){ //Si l'utilisateur n'est pas connecté on affiche la page de connexion
                      $this->ctrlInscription->formulaireInscription();
      
                      if(isset($_POST['validerInscription'])){
      
                        if($this->Get_parametre($_POST,'mdpInscription')==$this->Get_parametre($_POST,'confirmerMdpInscription')){
                          $pseudo=$this->Get_parametre($_POST,'utilisateurInscription');
      
                          if($this->ctrlInscription->PossibiliteInscription($pseudo)){
                            $hashMdpInscription=sha1($this->Get_parametre($_POST,'mdpInscription'));
                            $this->ctrlInscription->Inscription($pseudo,$hashMdpInscription);
                            $_SESSION['connecte']=true; //Une fois enregistré on connecte l'utilisateur
                            $_SESSION['utilisateur']=$pseudo;
                            header('Location:index.php');
                          }
                          else{
                            throw new Exception("Utilisateur déjà existant");
                          }
                        }
                        else{
                          throw new Exception("Le mot de passe n'est pas le même");
                        }
                      } //Sil'utilisateur est déjà connecté on le déconnecte
                    }
                    else{
                      $_SESSION['connecte']=false;
                      header('Location:index.php');
      
                    }
                  }
                  else if($_GET['action']='connexion'){
                    $this->ctrlConnexion->connexion();
                    if(isset($_POST['validerConnexion'])){
      
                      $pseudo=$this->Get_parametre($_POST,'pseudoConnexion');
                      $hashMdpConnexion=sha1($this->Get_parametre($_POST,'mdpConnexion'));
      
                      if($this->ctrlConnexion->ctrlVerifierUtilisateur($pseudo,$hashMdpConnexion)){
                        $_SESSION['connecte']=true;
                        $_SESSION['utilisateur']=$pseudo;
                        header('Location:index.php');
                      }
                      else{
                        throw new Exception("Utilisateur non enregistré");
                      }
                    }
                  }
                  else{
                    throw new Exception("Action non valide");
                  }
            }
            else { // Aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->listecategorie();
            }

        }

        catch(Exception $e){
            $this->erreur($e->getMessage());
        }  

    }  

    // Affiche une erreur
    private function erreur($msgErreur){
        $vue = new Vue ("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    //Recherche un paramètre dans un tableau
    private function Get_parametre($tableau,$nom){
        if(isset($tableau[$nom])){
            return $tableau[$nom];
        }
        else{
            throw new Exception("Paramètre '$nom' absent");
        }
    }
}