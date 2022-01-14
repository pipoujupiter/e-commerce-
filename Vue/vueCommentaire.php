<?php $this->titre= 'Commentaire';?>


<div class="container">
    <div class="row">
        <?php foreach ($afficheCommentaire as $commentaire): ?>
            
            <div class="col-md-3 colComment">
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

    <div class="container">
    <form action="<?="index.php?action=commenter&id=".$commentaire['id_product']?>" method="POST" >
    
    <table>
        
        <!-- <tr><td>Nom d'utilisateur :</td><td><input type="text" name="utilisateur" required ></td></tr>  -->
        <tr><td><input type="radio" name="genre" value="femme.png" required><label for="femme">Madame</label><br /></td>
        <td><input type="radio" name="genre" value="homme.png"> <label for="homme">Monsieur</label></td></tr> 
        <tr><td>Nombres d'étoiles :</td><td><input type='range' name="etoile" min="0" max="5" step="1"/></td></tr> 
        <tr><td>Titre :</td><td><input type="text" name="titre" ></td></tr>
        <tr><td>Commentaire :</td><td><input type="text" name="description" required ></td></tr>
        <br/>
        <tr><td><input class="button" type="submit" name="commentaire" value="Commenter" >
    </table>
</form> 
    </div>
<?php else : ?>
    <p> Veuillez-vous connecter pour laisser un commentaire. </p>
<?php endif; ?>






