<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurListeProduit.php';
require_once 'Controleur/controleurProduit.php';
require_once 'Controleur/controleurInscription.php';
require_once 'Controleur/controleurConnexion.php';
require_once 'Controleur/controleurCommentaire.php';
require_once 'Vue/vue.php';

class Routeur {
    private $ctrlAccueil;
    private $ctrlListeProduit;
    private $ctrlProduit;
    private $ctrlInscription;
    private $ctrlConnexion;
    private $ctrlCommentaire;

    public function __construct(){
      $this->ctrlAccueil = new ControleurAccueil();
      $this->ctrlListeProduit = new ControleurListeProduit();
      $this->ctrlProduit = new ControleurProduit();
      $this->ctrlInscription = new ControleurInscription();
      $this->ctrlConnexion = new ControleurConnexion();
      $this->ctrlCommentaire = new ControleurCommentaire();
    }
    
    //Traite une requête entrante
    public function routerRequete(){
        try {
          if(isset($_GET['action'])){
            if($_GET['action']=='listeparcategorie'){
              $id=intval($this->getParametre($_GET,'cat')); //intval renvoie la valeur numerique du parametre ou 0 en cas d'echec
              if ($id!=0){
                  $this->ctrlListeProduit->listeproduitsparcategorie($id);
              }

              else {
                  throw new Exception("Identifiant de la catégorie incorrecte");
              }
          }

          else if($_GET['action']=='affiche'){
              $id=intval($this->getParametre($_GET,'id'));
              if ($id!=0){
                  $this->ctrlProduit->afficheproduit($id);
                  
              }
              else {
                  throw new Exception("Identifiant du produit incorrect");
              }
          }

          //Ajout de la page commentaire
          else if($_GET['action']=='afficheCommentaire'){
            $id=intval($this->getParametre($_GET,'id'));
            if ($id!=0){
              $this->ctrlCommentaire->afficheCommentaire($id);
            }
          }
          //Ajout d'un nouveau commentaire
          else if($_GET['action']=='commenter'){
            $id=intval($this->getParametre($_GET,'id'));
            if ($id!=0){
              if(isset($_POST['commentaire'])){
                $utilisateur=$this->getParametre($_POST,'utilisateur');
                $titre=$this->getParametre($_POST,'titre');
                $description=$this->getParametre($_POST,'description');
                $genre=$this->getParametre($_POST,'genre');
                $etoile=$this->getParametre($_POST,'etoile');
                $this->ctrlCommentaire->commenter($utilisateur,$genre,$etoile,$titre,$description,$id);
              }
          }
        }
          
            else if($_GET['action']=='inscription'){
              if(!$_SESSION['logged']){ //Si l'utilisateur n'est pas connecté on affiche la page de connexion
                $this->ctrlInscription->inscription();

                if(isset($_POST['validerInscription'])){

                  if($this->getParametre($_POST,'mdpInscription')==$this->getParametre($_POST,'confirmerMdpInscription')){
                    $pseudo=$this->getParametre($_POST,'pseudoInscription');

                    if($this->ctrlInscription->ctrlCheckAvaibility($pseudo)){
                      $hashMdpInscription=sha1($this->getParametre($_POST,'mdpInscription'));
                      $this->ctrlInscription->ctrlRegister($pseudo,$hashMdpInscription);
                      $_SESSION['logged']=true; //Une fois enregistré on connecte l'utilisateur
                      $_SESSION['pseudo']=$pseudo;
                      header('Location:index.php');
                    }
                    else{
                      throw new Exception("Utilisateur déjà existant");
                    }
                  }
                  else{
                    throw new Exception("Le mot de passe n'est pas le même");
                  }
                } //Si connecté, on le déconnecte
              }
              else{
                $_SESSION['logged']=false;
                header('Location:index.php');

              }
            }
            else if($_GET['action']='connexion'){
              $this->ctrlConnexion->connexion();
              if(isset($_POST['validerConnexion'])){

                $pseudo=$this->getParametre($_POST,'pseudoConnexion');
                $hashMdpConnexion=sha1($this->getParametre($_POST,'mdpConnexion'));

                if($this->ctrlConnexion->ctrlCheckUser($pseudo,$hashMdpConnexion)){
                  $_SESSION['logged']=true;
                  $_SESSION['pseudo']=$pseudo;
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
          else{ //Aucune action définie : affichage de l'accueil
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
    private function getparametre($tableau,$nom){
      if(isset($tableau[$nom])){
          return $tableau[$nom];
      }
      else{
          throw new Exception("Paramètre '$nom' absent");
      }
  }
}