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