<?php $this->titre=$categories['name'];?>


<?php ob_start(); ?>
<?php foreach ($produits as $produit): ?>
    
    <a href="index.php?vue=produit&action=affiche&id=<?=$produit['id']?>">
        <p><?=$produit['name']?><p>
    </a>
       
<?php endforeach; ?>
<?php $contenu=ob_get_clean(); ?>


<?php require 'Vue/gabarit.php'; ?>