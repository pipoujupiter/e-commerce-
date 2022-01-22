
<!doctype html>
<html>
  <head>
    
    
    <title><?=$titre?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="Contenu/style.css">
  </head>

  
    <header>
      
      <div class="topnav">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <a href="index.php"><img class="logo" src="Contenu/images/logo2.png"/></a>
          </div>
          
        <?php 

            if(!isset($_SESSION['logged'])){
              $_SESSION['logged']=false;
            }

            if($_SESSION['logged']){
              echo ("<div class='col-sm'><a href= \"index.php?action=inscription\">");
              echo ("<p>Déconnexion</p></a></div>");
              echo("<div class='col-sm'><a href= \"index.php?action=profil\">");
              echo("<p> Utilisateur : ");
              echo ($_SESSION["pseudo"].'</p></a></div>');
              echo("<div class='col-sm'><a href= \"index.php?action=panier\">");
              echo ("<p>Panier</p></a></div>");
            }

            else{
              echo ("<div class='col-sm-auto'><a href= \"index.php?action=inscription\">");
              echo ("<p>Inscription</p></a></div>");
              echo ("<div class='col-sm-auto'><a href= \"index.php?action=connexion\">");
              echo ("<p>Connexion</p></a></div>");
            }
          ?>
      </div>
      </div>
      </div>
    </header>
  

  <body>
    <div class="content">
      <?=$contenu?>
    </div>
  </body>


  <footer>
    <div class="footer">
        <a href="https://forge.univ-lyon1.fr/groupe-alice-auxane/projet_web"><img src="Contenu/images/gitlab_logo.png" style="max-width: 150px;"/></a>

    </div>        
    </footer>

</html>
