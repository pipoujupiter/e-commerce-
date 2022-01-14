<?php $this->titre='Inscription' ?>



<form action="index.php?action=inscription" method="POST">
    
        <div class="form-group col-sm-4">
            <label for="pseudoInscription">Nom d'utilisateur </label>
            <input type="text" name="pseudoInscription" class="form-control"
            id="pseudoInscription" aria-describedby="pseudoHelp" required>
            <small id="pseudoHelp" class="form-text text-muted">Votre nom d'utilisateur sera visible par tous.</small>
        </div> 
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="mdpInscription">Mot de passe </label>
                <input type="password" name="mdpInscription" class="form-control" id="mdpInscription" required>
            </div>
            <div class="form-group col-md-3">
                <label for="confirmerMdpInscription">Confirmer mot de passe </label>
                <input name="confirmerMdpInscription" type="password" class="form-control" id="confirmerMdpInscription" required>
            </div>
        </div>

        <!-- Informations personnelles de l'utilisateur -->
        <div class="form-row">
            <div class="form-group col-3">
                <label for="surname">Nom </label>
                <input type="text" name="surname" class="form-control" id="surname" required>
            </div>
            <div class="form-group col-md-3">
                <label for="forname">Prénom </label>
                <input name="forname" type="text" class="form-control" id="forname" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="add1">Adresse</label>
                <input type="text" name="add1" class="form-control" id="add1" required>
            </div>
            <div class="form-group col-md-3">
                <label for="add2">Complément d'adresse</label>
                <input name="add2" type="text" class="form-control" id="add2">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="add3">Ville </label>
                <input type="text" name="add3" class="form-control" id="add3" required>
            </div>
            <div class="form-group col-md-3">
                <label for="postcode">Code postal</label>
                <input name="postcode" type="number" class="form-control" id="postcode" required>
            </div>
        </div>

        <div class="form-group col-sm-3">
            <label for="phone">Numéro de téléphone </label>
            <input type="number" name="phone" class="form-control" id="phone"  required>
        </div> 
        <div class="form-group col-sm-3">
            <label for="email">Email </label>
            <input type="email" name="email" class="form-control" id="email"  required>
        </div> 

        <div class="form-row">
            <div class="col-md-3">
                <input class="button" type="submit" name="validerInscription" value="S'inscrire">
            </div>
        </div>
    

    
</form>
    