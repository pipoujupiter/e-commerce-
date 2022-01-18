<?php $this->titre= 'Commentaire';?>


<div class="container">
    <div class="row pt-2">
        <?php foreach ($afficheCommentaire as $commentaire): ?>
            
            
            <div class="col-3 mt-3 center " style="border-radius: 10px; background-color:#f2f2f2; padding: 10px; margin:10%;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
        </br>
                    <h4>Utilisateur :</h4>
                    <img class="photoUtilisateur" src="<?="Contenu/images/".$commentaire['photo_user']?>">
        </br>
                    <?=$commentaire['name_user']?>
        </br>
                    <?=$commentaire['stars']?> <img class="etoile" src="Contenu/images/review_star.png"/>
        </br>
                    <strong><?=$commentaire['title']?></strong></br>
                    <?=$commentaire['description']?>
                    <br>
                    <br>
            </div>
        </br>
        </br>       
        <?php endforeach; ?>
    </div>
</div>


<?php 
if ($_SESSION['logged']): ?>

<div class="col-10  mx-auto mt-3 " style="padding: 10px; ">
    <form action="<?="index.php?action=commenter&id=".$commentaire['id_product']?>" method="POST" >
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="femme">Madame</label>
                <input type="radio" name="genre" value="femme.png" required>
            </div>
            <div class="form-group col-md-3">
                <label for="homme">Monsieur</label>
                <input type="radio" name="genre" value="homme.png">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="etoile">Etoiles</label>
                <input type='range' name="etoile" min="0" max="5" step="1"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="titre">Titre</label>
                <input type="text" name="titre" >
            </div>
            <div class="form-group col-md-3">
                <label for="description">Description</label>
                <input type="text" name="description" required >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <input class="button" type="submit" name="commentaire" value="Commenter" >
            </div>
        </div>
    </form> 
</div>
<?php else : ?>
    <p> Veuillez-vous connecter pour laisser un commentaire. </p>
<?php endif; ?>






