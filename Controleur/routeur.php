<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurListeProduit.php';
require_once 'Controleur/controleurProduit.php';
require_once 'Controleur/controleurInscription.php';
require_once 'Controleur/controleurConnexion.php';
require_once 'Controleur/controleurCommentaire.php';
require_once 'Controleur/controleurPanier.php';
require_once 'COntroleur/controleurProfil.php';
require_once 'Vue/vue.php';

class Routeur {
    private $ctrlAccueil;
    private $ctrlListeProduit;
    private $ctrlProduit;
    private $ctrlInscription;
    private $ctrlConnexion;
    private $ctrlCommentaire;
    private $ctrlPanier;
    private $ctrlProfil;

    public function __construct(){
      $this->ctrlAccueil = new ControleurAccueil();
      $this->ctrlListeProduit = new ControleurListeProduit();
      $this->ctrlProduit = new ControleurProduit();
      $this->ctrlInscription = new ControleurInscription();
      $this->ctrlConnexion = new ControleurConnexion();
      $this->ctrlCommentaire = new ControleurCommentaire();
      $this->ctrlPanier = new ControleurPanier();
      $this->ctrlProfil = new ControleurProfil();
    }
    
    //Traite une requête entrante
    public function routerRequete(){
        try {

          //Affichage des produits en fonction de la catégorie choisie
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

              if(isset($_POST['ajoutPanier'])){
                if($_SESSION['logged']){
                  $id=intval($this->getParametre($_GET,'id'));
                  $pseudoClient=$this->getParametre($_SESSION,'pseudo');
                  $client=$this->ctrlProduit->ctrlGetCustomerId($pseudoClient);
                  $idClient=$client['customer_id'];
                  $qteProduit=intval($this->getParametre($_POST,'quantite'));

                  if($this->ctrlProduit->ctrlCheckOrder($idClient)){ //On regarde si l'utilisateur a une commande en cours
                    $idCommande=$this->ctrlProduit->ctrlGetIdOrder($idClient,0);
    
                    //On vérifie qu'il n'y a pas de problème de stock
                    if($this->ctrlProduit->ctrlAddProduct($idCommande,$id,$qteProduit)){
                    echo('<script> location.replace("index.php?action=panier"); </script>');
                    }
                    else{
                      throw new Exception("Produit en rupture de stock/en quantité insuffisante");
                    }
                  }
                  else{
                    //Si l'utilisateur n'a pas de commande en cours il faut en créer une
                    $this->ctrlProduit->ctrlCreateOrder($idClient,$_SESSION['id']);
    
                    $idCommande=$this->ctrlProduit->ctrlGetIdOrder($idClient,0);
    
                    if($this->ctrlProduit->ctrlAddProduct($idCommande,$id,$qteProduit)){
                      echo('<script> location.replace("index.php?action=panier"); </script>');
                    }
                    else{
                      throw new Exception("Produit en rupture de stock/en quantité insuffisante");
                    }
                  }
                }
                
              }

          }

          //Affichage des commentaires d'un produit
          else if($_GET['action']=='afficheCommentaire'){
            $id=intval($this->getParametre($_GET,'id'));
            if ($id!=0){
              $this->ctrlCommentaire->afficheCommentaire($id);
            }
          }
          //Ajout d'un nouveau commentaire
          else if($_GET['action']=='commenter'){
            if ($_SESSION['logged']){
              $id=intval($this->getParametre($_GET,'id'));
              if ($id!=0){
                if(isset($_POST['commentaire'])){
                  $utilisateur=$_SESSION['pseudo'];
                  
                  $titre=$this->getParametre($_POST,'titre');
                  $description=$this->getParametre($_POST,'description');
                  $genre=$this->getParametre($_POST,'genre');
                  $etoile=$this->getParametre($_POST,'etoile');
                  $this->ctrlCommentaire->commenter($utilisateur,$genre,$etoile,$titre,$description,$id);
                }
              }
            }
            else {
              throw new Exception("Veuillez-vous connecter pour laisser un commentaire.");
            }
          }

          //Affichage du panier de l'utilisateur
          else if($_GET['action']=='panier'){
            if($_SESSION['logged']){
              $pseudoClient=$this->getParametre($_SESSION,'pseudo');
  
              $client=$this->ctrlProduit->ctrlGetCustomerId($pseudoClient);
              $idClient=$client['customer_id'];
                if($this->ctrlProduit->ctrlCheckOrder($idClient)) {
                $idCommande=$this->ctrlProduit->ctrlGetIdOrder($idClient,0);
  
                $this->ctrlPanier->ctrlSetTotalOrder($idCommande);
  
                $this->ctrlPanier->panier($idClient,$idCommande);
  
                if(isset($_POST['viderPanier'])) {
                  $this->ctrlPanier->ctrlViderPanier($idCommande);
                  echo('<script> location.replace("index.php?action=panier"); </script>');
                }
              }
              else{
                $this->ctrlPanier->paniernoConnect();
              }
            }
          }

          //Affichage de la page de la commande 
          else if($_GET['action']=='commande'){
            
          }
        
          //Affichage d'inscription sur le site
            else if($_GET['action']=='inscription'){
              if(!$_SESSION['logged']){ //Si l'utilisateur n'est pas connecté on affiche la page de connexion
                $this->ctrlInscription->inscription();

                if(isset($_POST['validerInscription'])){

                  if($this->getParametre($_POST,'mdpInscription')==$this->getParametre($_POST,'confirmerMdpInscription')){
                    $pseudo=$this->getParametre($_POST,'pseudoInscription');
                    
                    //Remplir les infos personnelles de l'utilisateur 
                    $nomuser=$this->getParametre($_POST,'surname');
                    $prenomuser=$this->getParametre($_POST,'forname');
                    $adresse=$this->getParametre($_POST,'add1');
                    $compladresse=$this->getParametre($_POST,'add2');
                    $ville=$this->getParametre($_POST,'add3');
                    $codepostal=$this->getParametre($_POST,'postcode');
                    $telephone=$this->getParametre($_POST,'phone');
                    $email=$this->getParametre($_POST,'email');

                    if($this->ctrlInscription->ctrlCheckAvaibility($pseudo)&&$this->ctrlInscription->ctrlCheckAvaibility($email)){
                      $hashMdpInscription=sha1($this->getParametre($_POST,'mdpInscription'));
                      
                    
                      $this->ctrlInscription->ctrlRegister($nomuser,$prenomuser,
                      $adresse,$compladresse,$ville,$codepostal,$telephone,$email,$pseudo,$hashMdpInscription);


                      //Une fois enregistré on connecte l'utilisateur
                      $_SESSION['logged']=true;
                      $_SESSION['pseudo']=$pseudo;
                      
                      echo('<script> location.replace("index.php"); </script>');
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
                $_SESSION['pseudo']=NULL;
                header('Location:index.php');

              }
            }

            //Affichage de la connexion sur le site
            else if($_GET['action']=='connexion'){
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

            //Affichage du profil d'utilisateur
            else if($_GET['action']=='profil'){
              if($_SESSION['logged']){
                $pseudoClient=$this->getParametre($_SESSION,'pseudo');
                $client=$this->ctrlProduit->ctrlGetCustomerId($pseudoClient);
                $idClient=$client['customer_id'];

                $this->ctrlProfil->afficheProfil($idClient);
              }
              else {
                throw new Exception("Veuillez-vous connecter pour accéder à votre profil.");
              }

              if(isset($_POST['changementProfil'])){

                //Récupération des informations rentrées dans le formulaire
                $adresse=$this->getParametre($_POST,'add1');
                $compladresse=$this->getParametre($_POST,'add2');
                $ville=$this->getParametre($_POST,'add3');
                $codepostal=$this->getParametre($_POST,'postcode');
                $telephone=$this->getParametre($_POST,'phone');
                $email=$this->getParametre($_POST,'email');

                $this->ctrlProfil->setChangement($idClient,$adresse,$compladresse,$ville,$codepostal,$telephone,$email);
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
    private function getParametre($tableau,$nom){
      if(isset($tableau[$nom])){
          return $tableau[$nom];
      }
      else{
          throw new Exception("Paramètre '$nom' absent");
      }
  }
}