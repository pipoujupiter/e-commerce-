<?php $titre= 'WEB4SHOP';?>


<?php ob_start(); ?>
<?php foreach ($categories as $categorie): ?>
    
    <a href="<?="index.php?vue=produit&action=listeparcategorie&cat=".$categorie['id'] ?>">
        <p><?=$categorie['name']?><p>
    </a>
       
<?php endforeach; ?>
<?php $contenu=ob_get_clean(); ?>


<?php require 'Vue/gabarit.php'; ?>