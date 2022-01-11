<?php $this->titre= 'WEB4SHOP';?>



<?php foreach ($listeCategories as $categorie): ?>
    
    <a href="<?="index.php?vue=produit&action=listeparcategorie&cat=".$categorie['id'] ?>">
           
            <img class="banniere" src="<?= "Contenu/images/".$categorie['name']?>">
            <br>
            <br>
          
    </a>
       
<?php endforeach; ?>
