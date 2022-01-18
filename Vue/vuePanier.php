<?php $this->titre='Panier'; 

if($_SESSION['logged']): ?>
<div class="col-10 mx-auto mt-2 " style="border-radius: 10px; background-color:#f2f2f2; padding: 10px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)">
  <div class="row pt-2">
    <div class="col text-center"><h2><strong>Panier</strong></h2></div>
    <hr/>
  </div>
  <?php if(isset($produits)):
        if(count($produits) > 0):
        foreach($produits as $produit): ?>
  <div class="row align-items-center pt-2">
    <div class="col text-center">
      <img src="<?= "Contenu/images/".$produit['image']?>" style="height:100px;width=100px;">
    </div>
    <div class="col text-center">
      <p><?=$produit['name']?></p>
    </div>
    <div class="col text-center">
      <p>Prix unité : <?=$produit['price'] ?> €</p>
    </div>
    <div class="col text-center">
      <p>Quantité : <?=$produit['quantity'] ?></p>
    </div>
    <div class="col text-center">
      <p>Sous-total : <?=$produit['price'] * $produit['quantity'] ?> €</p>
    </div>
  </div>
  <?php if(count($produits) >= 1) {echo('<hr/>');} ?>
  <?php endforeach; ?>
  <div class="row pb-3">
    <div class="col text-center"><a href="index.php?action=saisirAdresse" class="btn btn-danger">Passer la commande</a></div>
    <div class="col text-center"><form action="index.php?action=panier" method="POST"><input type="submit"  name="viderPanier" class="btn btn-danger" value="Vider le panier.."></form></div>
    <div class="col text-center">Total à payer (TTC) : <?=$totalPrix?> €</div>
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