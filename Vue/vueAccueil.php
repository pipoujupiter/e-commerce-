<?php $this->titre= 'WEB4SHOP';?>



<?php foreach ($listeCategories as $categorie): ?>
    
    <a href="<?="index.php?vue=produit&action=listeparcategorie&cat=".$categorie['id'] ?>">
           
            <img src="<?= "Contenu/images/".$categorie['name']?>" style="max-width: 450px;
  height: auto;">
            <br>
            <br>
          
    </a>
       
<?php endforeach; ?>
