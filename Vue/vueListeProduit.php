<?php $this->titre='Categorie';?>



<?php foreach ($listeProduitsparCategorie as $produit): ?>
    
    <a href="<?="index.php?vue=produit&action=affiche&id=".$produit['id']?>">
        <p><?=$produit['name']?><p>
    </a>
       
<?php endforeach; ?>
