<?php

//Effectue la connexion à la BDD
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=web4shop;charset=utf8','web4shop', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $bdd;
}
