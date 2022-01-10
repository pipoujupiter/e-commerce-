<?php $this->titre= 'WEB4SHOP';?>



<?php foreach ($listeCategories as $categorie): ?>
    
    <a href="<?="index.php?vue=produit&action=listeparcategorie&cat=".$categorie['id'] ?>">
        <p><?=$categorie['name']?><p>
    </a>
       
<?php endforeach; ?>
