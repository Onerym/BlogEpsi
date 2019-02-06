<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>

<?php
// Include config file
require_once "config.php";
?>


 <?php
if(isset($_POST['envoiemodif']))
{
$sarticle = "UPDATE article SET article='".$_POST['articlec']."' WHERE id='".$_POST['idarti']."'";
$sarticle = $link->query ($sarticle);
header("location:index.php");
}
?>


<?php
if(isset($_POST['suppr']))
{
        $sarticle="DELETE FROM article WHERE id='".$_POST['numarti']."'";
        $sarticle = $link->query ($sarticle);
   
        $sarticle = "ALTER TABLE article DROP id;";
        $sarticle = $link->query ($sarticle);

        $sarticle = "ALTER TABLE article ADD id INT NOT NULL PRIMARY KEY AUTO_INCREMENT;";
        $sarticle = $link->query ($sarticle);
        header("location:index.php");
        mysqli_close($link);
        
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Membre</title>
    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
    <body>
        <br><br><br>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>Modifier un article :</h3>
            
             <?php
                if(isset($_POST['envoieid']))
                {
                $idarticle = $_POST['idarti'];
                echo "Article séléctionner: " , htmlspecialchars($idarticle) ,".";
                $infoarticle = mysqli_query($link, 'SELECT * FROM article WHERE id ="'.$idarticle.'" ');
                $articlechange = mysqli_fetch_assoc($infoarticle);
                }
            ?>
            
            <div class="form-group <?php echo (!empty($article_err)) ? 'has-error' : ''; ?>">
                            <input type="number" name="idarti" class="form-control" placeholder="Numéro de l'article." value="<?php echo $idarticle; ?>">
                            <input type="submit" name="envoieid" class="btn btn-info" value="Envoyer">
                            <br><br><br>
                            <textarea name="articlec" rows="15" cols="100" min="1" max="2500" ><?php echo $articlechange['article']; ?></textarea>
                            <span class="help-block"><?php echo $article_err; ?></span>
                            <br>
                            <input type="submit" name="envoiemodif" class="btn btn-info" value="Envoyer">  
            </div> 
        </form>
        <br><br><br><br>
        
        <h3>Supprimer un article :</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <input type="number" name="numarti" class="form-control" placeholder="Numéro de l'article.">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="suppr" class="btn btn-primary" value="Supprimer">
                        </div>
                    </form>
</body>
</html>