<?php $this->titre='Categorie';?>



<?php foreach ($listeProduitsparCategorie as $produit): ?>
    <div class="polaroid">  
        <a href="<?="index.php?vue=produit&action=affiche&id=".$produit['id']?>"><img src="<?= "Contenu/images/".$produit['image']?>"></a>
        <div class="container">    
            <p><?=$produit['name']?><p>
        </div> 
    </div>
<?php endforeach; ?>
