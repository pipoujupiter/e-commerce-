<?php $this->titre=$produit['name'];?>


<div class="col-7 mx-auto mt-2 " style="border-radius: 10px; background-color:#f2f2f2; padding: 10px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)">
  <div class="row pt-2">
        <div class="col">
            <img class="imgproduit" src="<?= "Contenu/images/".$produit['image']?>">
            
        </div>
        <div class="col">
                <h4><strong><?=$produit['name']?></strong></h4>
                <h5>Description :</h5><p><?=$produit['description'] ?></p> 
                <h5>Prix : </h5><p><?=$produit['price'] ?> €</p> 
                <a class="button" href="<?="index.php?vue=commentaire&action=afficheCommentaire&id=".$produit['id']?>"> Voir les commentaires</a>             
        </div>
    </div>
    
    <hr>
    <div class="row pt-2">
        <div class="col">
            <form action="<?="index.php?action=affiche&id=".$produit['id'];?>" method="POST">
                <div class="container mb-3">
                        <p class="mb-2">Choisissez la quantité :</p><input type="number" name="quantite" class="form-control mx-auto" style="width:60px;" min="1" max="20" required/>
                </div>
                <input class="button" type="submit" name="ajoutPanier" value="Ajouter au panier">
            </form>
        </div>
    </div>
</div>
  

    

      

    

