<?php $this->titre=$produit['name'];?>


<div class="container containerProduct">
    <div class="row">
        <div class="col">
            <img class="imgproduit" src="<?= "Contenu/images/".$produit['image']?>">
        </div>
        <div class="col">
                <h4><?=$produit['name']?></h4>
                <h5>Description :</h5><p><?=$produit['description'] ?></p> 
                <h5>Prix : </h5><p><?=$produit['price'] ?> €</p> 
                <a class="button" href="<?="index.php?vue=commentaire&action=afficheCommentaire&id=".$produit['id']?>"> Voir les commentaires</a>
        </div>
    </div>
</div>
  

    

      

    

