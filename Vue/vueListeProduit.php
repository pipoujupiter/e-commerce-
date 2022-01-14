<?php $this->titre='Categorie';?>

<div class="container">
    <div class="row">
        <?php foreach ($listeProduitsparCategorie as $produit): ?>
            <div class="col-md-3">

                <div class="polaroid">  
                    <a href="<?="index.php?vue=produit&action=affiche&id=".$produit['id']?>"><img src="<?= "Contenu/images/".$produit['image']?>"></a>
                    <div class="container">    
                        <p><?=$produit['name']?><p>
                    </div> 
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>