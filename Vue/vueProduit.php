<?php $this->titre=$produit['name'];?>


<?php ob_start(); ?>

<div class="produit">

    <img src='Contenu\images\<?=$produit['image'] ?>'/> 
    <p><?=$produit['name']?><p>
    <p><?=$produit['description']?><p>
    <p><?=$produit['prix']?><p>
    <p><?=$produit['quantite']?><p>

</div>

       

<?php $contenu=ob_get_clean(); ?>


<?php require 'Vue/gabarit.php'; ?>