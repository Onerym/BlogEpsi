<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <title>Blog Epsi B1</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

	<body>
            <header>
            <div id='logo'>
                <a href="index.php"><img id="logo" src="images/chien.jpg" alt="Logo"></a>
            </div>

                <h1>LA VIE EST NUL</h1>
                <nav>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
            <div id='connexion'>
                Connexion à l'espace membre :<br />
                <form action="index.php" method="post">
                Login : <input type="text" name="login" placeholder="Login"><br />
                Mot de passe : <input type="password" name="pass" placeholder="Mot de passe"><br />
                <input type="submit" name="connexion" value="Connexion">
                </form>
                    <a href="inscription.php">Vous inscrire</a>
                <?php
                    if (isset($erreur)) echo '<br /><br />',$erreur;
                ?>
            </div>
            <div id="membre">
                <a href="membre.php"><input type="button" name="espace membrebre"value="espace membre"/></a>
            </nav>
            </header>	
        </body>
</html>