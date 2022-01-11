<?php $this->titre= 'Commentaire';?>



<?php foreach ($afficheCommentaire as $commentaire): ?>
    
        <div class="infoUtilisateur">
            <p><h4>Utilisateur :</h4></p>
            <img class="photoUtilisateur" src="<?="Contenu/images/".$commentaire['photo_user']?>">
            <br>
            <div class="nomUtilisateur"><?=$commentaire['name_user']?></div>
            <?=$commentaire['stars']?> <img class="etoile" src="Contenu/images/review_star.png"/>
            <br>
            <h3><?=$commentaire['title']?></h3>
            <?=$commentaire['description']?>
            <br>
            <br>
        </div>
        <br>       
<?php endforeach; ?>


<form action="<?="index.php?action=commenter&id=".$commentaire['id_product']?>" method="POST" >
    
    <table>
        <tr><td>Nom d'utilisateur :</td><td><input type="text" name="utilisateur" required ></td></tr> 
        <tr><td><input type="radio" name="genre" value="femme.png" required><label for="femme">Madame</label><br /></td>
        <td><input type="radio" name="genre" value="homme.png"> <label for="homme">Monsieur</label></td></tr> 
        <tr><td>Nombres d'étoiles :</td><td><input type='range' name="etoile" min="0" max="5" step="1"/></td></tr> 
        <tr><td>Titre :</td><td><input type="text" name="titre" ></td></tr>
        <tr><td>Commentaire :</td><td><input type="text" name="description" required ></td></tr>
        <br/>
        <tr><td><input class="button" type="submit" name="commentaire" value="Commenter" >
    </table>
</form>