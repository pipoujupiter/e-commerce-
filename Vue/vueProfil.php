<?php $this->titre='Profil'; ?>


<div class="col-6 mx-auto mt-2 " style="border-radius: 10px; background-color:#f2f2f2; padding: 10px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)">
    <div class="row pt-2">
        <div class="col text-center"><h2><strong><?=$profil['surname']?> <?=$profil['forname']?></strong></h2></div>
    </div>

    <hr>

    <div class="row align-items-center pt-2">
        <div class="col text-center">
            
            <p>Adresse : <?=$profil['add1'] ?></p>
            <p>Ville : <?=$profil['add3']?> (<?=$profil['postcode']?>)</p>
            <p> Numéro de téléphone : <?=$profil['phone']?></p>
            <p> E-mail : <?=$profil['email']?></p>
        </div>
    </div>

    <hr>
<form action="index.php?action=profil" method="POST">
    <div class="row align-items-center pt-2">
        <div class="col text-center">
            <h4> Changer les informations </h4>
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
    <br/>
    <div class="row align-items-center pt-2">
        <div class="col text-center">
            <input class="button" type="submit" name="changementProfil" value="Effectuer les changements">
        </div>
    </div>
</form>  
</div>

