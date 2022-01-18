<?php $this->titre='Categorie';?>

<div class="container">
    <div class="row pt-2">
        <?php foreach ($listeProduitsparCategorie as $produit): ?>
            <div class="col-7 mx-auto mt-2 " style="border-radius: 10px; background-color:#f2f2f2; padding: 10px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)">
                    
            <a href="<?="index.php?vue=produit&action=affiche&id=".$produit['id']?>">
                    <img src="<?= "Contenu/images/".$produit['image']?>">
                    </a>
                    <br/>
                    <br/>
                    <h5><strong><?=$produit['name']?></strong></h5>
                    <h5>Prix : <?=$produit['price'] ?> €</h5>

            </div>
            
        <?php endforeach; ?>
    </div>

</div>