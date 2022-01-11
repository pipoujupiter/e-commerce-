
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Contenu/style.css">
    <title><?=$titre?></title>
    
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
    <div class="content">
      <?=$contenu?>
    </div>
  </body>


  <footer id="piedBlog">
    <div class="footer">
        <a href="https://forge.univ-lyon1.fr/groupe-alice-auxane/projet_web"><img src="Contenu/images/gitlab_logo.png"/></a>

    </div>        
    </footer>

</html>
