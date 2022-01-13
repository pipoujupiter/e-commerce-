
<!doctype html>
<html lang="fr">
  <head>
    
    
    <title><?=$titre?></title>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="Contenu/style.css">
  </head>

  
    <header>
      <div class="topnav">
        <a href="index.php"><img class="logo" src="Contenu/images/logo.png"/></a>
        <?php 

            if(!isset($_SESSION['logged'])){
              $_SESSION['logged']=false;
            }

            if($_SESSION['logged']){
              echo ("<a href= \"index.php?action=inscription\">");
              echo ("<p>Déconnexion</p></a>");
              // echo ('Utilisateur : '.$_SESSION["pseudo"]);
            }

            else{
              echo ("<a href= \"index.php?action=inscription\">");
              echo ("<p>Inscription</p></a>");
              echo ("<a href= \"index.php?action=connexion\">");
              echo ("<p>Connexion</p></a>");
            }
          ?>
      </div>
    </header>
  

  <body>
    <div class="container-fluid content">
      <?=$contenu?>
    </div>
  </body>


  <footer>
    <div class="footer">
        <a href="https://forge.univ-lyon1.fr/groupe-alice-auxane/projet_web"><img src="Contenu/images/gitlab_logo.png"/></a>

    </div>        
    </footer>

</html>
