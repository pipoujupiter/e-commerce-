<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titre"> WEB4SHOP </h1></a>
                <?php 
                    if(!isset($_SESSION['connecte'])){
                    $_SESSION['connecte']=false;
                    }

                    if($_SESSION['connecte']){
                        echo ("<a href= \"index.php?action=inscription\">");
                        echo ("<p>Déconnexion</p></a>");
                        echo ('Utilisateur : '.$_SESSION['utilisateur']);
                        }

                    else{
                        echo ("<a href= \"index.php?action=inscription\">");
                        echo ("<p>Inscription</p></a>");
                        echo ("<a href= \"index.php?action=connexion\">");
                        echo ("<p>Connexion</p></a>");
                        }
                ?>
            </header>
            <div id="contenu">           
                <?=$contenu ?>
            </div>
            <footer id="piedBlog">
                Site web réalisé par Morin Alice et Valembois Auxane.
            </footer>
        </div>
    </body>
</html>

