<?php $titre= 'WEB4SHOP';?>


<?php ob_start(); ?>
<?php foreach ($produits as $produit): ?>
    
    <a href="<?="index.php?action=produit&id=".$produit['id'] ?>">
        <p> <?=$produit['name']?><p>
    </a>
       
<?php endforeach; ?>
<?php $contenu=ob_get_clean(); ?>


<?php require 'Vue/gabarit.php'; ?>