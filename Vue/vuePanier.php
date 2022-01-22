<?php $this->titre='Panier'; 

if($_SESSION['logged']): ?>
<div class="col-6 mx-auto mt-2 " style="border-radius: 10px; background-color:#f2f2f2; padding: 10px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)">
  <div class="row pt-2">
    <div class="col text-center"><h2><strong>Panier</strong></h2></div>
  </div>

  <?php if(isset($produits)):
        if(count($produits) > 0):
        foreach($produits as $produit): ?>
  
  <div class="row align-items-center pt-2">
    <div class="col text-center">
      <img src="<?= "Contenu/images/".$produit['image']?>" style="max-width: 150px;">
      <br>
      <br>
      <p><?=$produit['name']?></p>
    </div>
    <div class="col text-center">
      <p>Quantité : <?=$produit['quantity'] ?></p>
      <p> Prix : <?=$produit['price']*$produit['quantity'] ?> € </p>
    </div>
    
  </div>
  <?php if(count($produits) >= 1) {echo('<hr/>');} ?>
  <?php endforeach; ?>
  <div class="row pt-2">
    
    <div class="col text-center"> <h5><strong> TOTAL : <?=$totalPrix?> €</strong></h5></div>
  </div>
  <hr>
  <div class="row align-items-center pt-2">
    <div class="col text-center"><form action="index.php?action=commande" method="POST"><input type="submit" name="command" class="button" value="Passer la commande"></form></div>
    <div class="col text-center"><form action="index.php?action=panier" method="POST"><input type="submit"  name="viderPanier" class="button" value="Vider le panier"></form></div>
  </div>
  <?php endif;?>
  <?php else: ?>
  <div class="row align-items-center py-5">
    <div class="col text-center">
      <h4>Il n'y a rien dans votre panier</h4>
      <a href="index.php">Retourner à la boutique</a>
    </div>
  </div>
  <?php endif;?>
</div>


<?php endif;?>