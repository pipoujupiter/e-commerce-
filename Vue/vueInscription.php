<?php $this->titre='Inscription' ?>

<form action="index.php?action=inscription" method="POST">
    <table>
        <tr><td>Nom d'utilisateur :</td><td><input type="text" name="pseudoInscription" required ></td></tr>
        <tr><td>Mot de passe:</td><td><input type="password" name="mdpInscription" required></td></tr>
        <tr><td>Confirmer mot de passe :</td><td><input type="password" name="confirmerMdpInscription" required></td></tr>       
        <br/>
        <tr><td><input class="button" type="submit" name="validerInscription" value="S'inscrire" >
    </table>       


    