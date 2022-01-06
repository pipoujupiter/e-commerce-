<?php $titre= 'WEB4SHOP';?>


<?php ob_start(); ?>

<table>
    <tr><td>Nom d'utilisateur :</td><td><input type="text" name="pseudoConnexion"></td></tr>
    <tr><td>Mot de passe:</td><td><input type="password" name="mdpConnexion"></td></tr>
    <br/>
    <tr><td><input class="button" type="submit" name="validerConnexion" value="Se connecter">
</table>   

       

<?php $contenu=ob_get_clean(); ?>


<?php require 'Vue/gabarit.php'; ?>