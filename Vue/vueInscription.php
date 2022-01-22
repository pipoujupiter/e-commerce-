<?php $this->titre='Inscription' ?>


<div class="col-6 mx-auto mt-2 " style="padding: 10px; ">
    <form action="index.php?action=inscription" method="POST">
    <div class="row align-items-center pt-2">
        <div class="col text-center">
            <label for="pseudoInscription">Nom d'utilisateur </label>
            <input type="text" name="pseudoInscription" class="form-control"
            id="pseudoInscription" aria-describedby="pseudoHelp" required>
            <small id="pseudoHelp" class="form-text text-muted">Votre nom d'utilisateur sera visible par tous.</small>
        </div> 
    </div>
        <div class="row align-items-center pt-2">
            <div class="col text-center">
                <label for="mdpInscription">Mot de passe </label>
                <input type="password" name="mdpInscription" class="form-control" id="mdpInscription" required>
            </div>
            <div class="col text-center">
                <label for="confirmerMdpInscription">Confirmer mot de passe </label>
                <input name="confirmerMdpInscription" type="password" class="form-control" id="confirmerMdpInscription" required>
            </div>
        </div>
        <hr>
        <!-- Informations personnelles de l'utilisateur -->
        <div class="row align-items-center pt-2">
            <div class="col text-center">
                <label for="surname">Nom </label>
                <input type="text" name="surname" class="form-control" id="surname" required>
            </div>
            <div class="col text-center">
                <label for="forname">Prénom </label>
                <input name="forname" type="text" class="form-control" id="forname" required>
            </div>
        </div>
        <div class="row align-items-center pt-2">
            <div class="col text-center">
                <label for="add1">Adresse</label>
                <input type="text" name="add1" class="form-control" id="add1" required>
            </div>
            <div class="col text-center">
                <label for="add2">Complément d'adresse</label>
                <input name="add2" type="text" class="form-control" id="add2">
            </div>
        </div>
        <div class="row align-items-center pt-2">
            <div class="col text-center">
                <label for="add3">Ville </label>
                <input type="text" name="add3" class="form-control" id="add3" required>
            </div>
            <div class="col text-center">
                <label for="postcode">Code postal</label>
                <input name="postcode" type="number" class="form-control" id="postcode" required>
            </div>
        </div>

        <div class="row align-items-center pt-2">
            <div class="col text-center">
                <label for="phone">Numéro de téléphone </label>
                <input type="number" name="phone" class="form-control" id="phone"  required>
            </div> 
            <div class="col text-center">
                <label for="email">Email </label>
                <input type="email" name="email" class="form-control" id="email"  required>
            </div> 
        </div>
        <br>
        <div class="row align-items-center pt-2">
            <div class="col text-center">
                <input class="button" type="submit" name="validerInscription" value="S'inscrire">
            </div>
        </div>   
    </div>
</form>
</div>
    