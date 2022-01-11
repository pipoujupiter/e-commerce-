<?php $this->titre=$produit['name'];?>



<div class="polaroid">
    <img src="<?= "Contenu/images/".$produit['image']?>">
    <div class="container">
        <p><h3><?=$produit['name']?></h3></p>
        <p><h4>Description :</h4><?=$produit['description'] ?></p> 
        <p><h4>Prix : </h4><?=$produit['price'] ?> €</p> 
        <a class="button" href="<?="index.php?vue=commentaire&action=afficheCommentaire&id=".$produit['id']?>"> Voir les commentaires</a>
    </div>
</div>


    

      

    

