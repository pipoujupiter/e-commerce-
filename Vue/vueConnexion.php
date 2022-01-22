<?php $this->titre='Connexion' ?>


<div class="col-6 mx-auto mt-2 " style="padding: 10px; ">
<form action="index.php?action=connexion" method="POST">
    <div class="row align-items-center pt-2">
        <div class="col text-center">
                <label for="pseudoConnexion">Nom d'utilisateur </label>
                <input type="text" name="pseudoConnexion" class="form-control" id="pseudoConnexion" required>
            </div>
            <div class="col text-center">
                <label for="mdpConnexion">Mot de passe </label>
                <input name="mdpConnexion" type="password" class="form-control" id="mdpConnexion" required>
            </div>
    </div>
    <br>
    <div class="row align-items-center pt-2">
            <div class="col text-center">
                <input class="button" type="submit" name="validerConnexion" value="Se connecter">
            </div>
    </div>
    
</form>
</div>