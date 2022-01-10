
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Contenu/style.css">
    <title><?=$titre?></title>
    <script type="text/javascript" scr="Contenu/script.js">
    </script>
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
        Site web réalisé par Morin Alice et Valembois Auxane.
    </div>        
    </footer>

</html>
