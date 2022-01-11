<?php

$vues = array(
    'categorie' => array(
        'liste' => array()
        ),
    'produit' => array(
        'liste' => array(),
        'affiche' => array('id'=>'int'),
        'listeparcategorie' => array('cat' => 'int'),
        )
    );

$params=array();

try {
    if (!isset($_GET['vue']))
        $vue='categorie';
    elseif (isset($vues[$_GET['vue']]))
        $vue = $_GET['vue'];
    else
        throw new Exception("La vue ".$_GET['vue']." n'existe pas");
    
    $actions = $vues[$vue];
      
    if (!isset($_GET['action']))
        $action='liste';
    elseif (isset($actions[$_GET['action']]))
        $action = $_GET['action'];
    else
        throw new Exception("L'action ".$_GET['action']." n'est pas valable pour la vue".$vue);

    foreach ($actions[$action] as $nom => $type) {
        if (!isset($_GET[$nom]))
            throw new Exception("argument ". $nom . " manquant");
        
        // switch ($type) {
        //     case 'int':
        //         if (! is_integer($_GET[$nom]) )
        //             throw new Exception("argument ". $nom . "=" . $_GET[$nom] . " n'est pas un entier valide");
        //         break; 
        //     }
        
        $params[$nom] = $_GET[$nom];
    }
    require('Controleur/'.$vue.'.php');
    call_user_func($action, $params);
}
catch (Exception $e ){
    $msgErreur = $e->getMessage();
    require 'Vue/vueErreur.php';
}