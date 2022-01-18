<?php $this->titre='Connexion' ?>


<div class="col-10  mx-auto mt-3 " style="padding: 10px; ">
<form action="index.php?action=connexion" method="POST">
    <div class="form-row">
            <div class="form-group col-md-3">
                <label for="pseudoConnexion">Nom d'utilisateur </label>
                <input type="text" name="pseudoConnexion" class="form-control" id="pseudoConnexion" required>
            </div>
            <div class="form-group col-md-3">
                <label for="mdpConnexion">Mot de passe </label>
                <input name="mdpConnexion" type="password" class="form-control" id="mdpConnexion" required>
            </div>
    </div>
    <div class="form-row">
            <div class="col-md-3">
                <input class="button" type="submit" name="validerConnexion" value="Se connecter">
            </div>
    </div>
    
</form>
</div>