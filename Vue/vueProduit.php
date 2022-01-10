<?php $this->titre=$produit['name'];?>



<div class="polaroid">
    <img src="<?= "Contenu/images/".$produit['image']?>">
    <div class="container">
        <p><?=$produit['name']?></p>
    </div>
</div>
    <p><?=$produit['description'] ?></p> 
    <p>Prix : <?=$produit['price'] ?> €</p> 

      

    

