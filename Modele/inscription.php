<?php 

require_once 'Modele/Modele.php';

class Inscription extends Modele {

    //Renvoie vrai si l'utilisateur peut être crée, faux sinon
    public function checkAvaibility($pseudo){
        $sql='SELECT username FROM logins WHERE username=?';
        $resultat=$this->executerRequete($sql,array($pseudo));
        return ($resultat->RowCount()==0);
    }

    //Insère le nouvel utilisateur dans la table logins et customers
    public function register($nomuser,$prenomuser,
    $adresse,$compladresse,$ville,$codepostal,$telephone,$email,$pseudo,$hashMdp){    
        $sql='INSERT INTO customers VALUES (NULL,?,?,?,?,?,?,?,?,"1")'; 
        $this->executerRequete($sql,array($nomuser,$prenomuser,
        $adresse,$compladresse,$ville,$codepostal,$telephone,$email));

        $customer=$this->getIdCustomers($email);
        $customerId=$customer['id'];

        $sql1="INSERT INTO logins VALUES (NULL,$customerId,?,?)";
        $this->executerRequete($sql1,array($pseudo,$hashMdp));
        
    }

    //Renvoie le bon identifiant de id_customers
    public function getIdCustomers($email){
        $sql='SELECT id FROM customers WHERE email=?';
        $customerId=$this->executerRequete($sql,array($email));
        return $customerId->fetch();
    }
    

    
}