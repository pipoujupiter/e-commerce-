<?php $this->titre='Connexion' ?>

<form action="index.php?action=connexion" method="POST">
    <table>
        <tr><td>Nom d'utilisateur :</td><td><input type="text" name="pseudoConnexion" required ></td></tr>
        <tr><td>Mot de passe :</td><td><input type="password" name="mdpConnexion" required></td></tr>
        <br/>
        <tr><td><input class="button" type="submit" name="validerConnexion" value="Se connecter">
    </table>   