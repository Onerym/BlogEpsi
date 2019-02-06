<?php
 
require_once "config.php";
 


if(isset($_POST['couleur']))
{
    $sql="UPDATE configblog SET footer='".$_POST['footer']."', body='".$_POST['body']."', header='".$_POST['header']."', article='".$_POST['article']."' WHERE id='1'";
   
   if (mysqli_query($link, $sql)) {
      header("location: index.php");
   } else {
      echo "Erreur: " . mysqli_error($link);
   }
   mysqli_close($link);
}

if(isset($_POST['stitre']))
{
    $sql="UPDATE configblog SET titre='".$_POST['titre']."' WHERE id='1'";
   if (mysqli_query($link, $sql)) {
      header("location: index.php");
   } else {
      echo "Erreur: " . mysqli_error($link);
   }
   mysqli_close($link);
}

?>
    
<?php
$info = mysqli_query($link, 'SELECT * FROM configblog WHERE id = 1');
$titreaffichage = mysqli_fetch_assoc($info);
?>
 

    <div class="formchange">
        <h2>Titre du site</h2>
        <p>Veuillez remplir cet informations pour pouvoir changer le titre du site.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="titre" class="form-control" value="<?php echo $titreaffichage['titre'] ?>">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="stitre" class="btn btn-primary" value="Envoyer">
                <input type="reset" class="btn btn-default" value="Annuler">
            </div>
        </form>
        <br><br><br><br>
        <h2>Changement de couleur</h2>
        <p>Veuillez remplir cet informations pour pouvoir changer les différentes couleurs du site.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="color" id="head" name="header" value="<?php echo $titreaffichage['header'] ?>">
                <label for="header">Couleur du header.</label>
                <br>
                <input type="color" id="head" name="body" value="<?php echo $titreaffichage['body'] ?>">
                <label for="body">Couleur du fond du site.</label>
                <br>
                <input type="color" id="head" name="footer" value="<?php echo $titreaffichage['footer'] ?>">
                <label for="footer">Couleur du footer.</label>
                <br>
                <input type="color" id="head" name="article" value="<?php echo $titreaffichage['article'] ?>"> 
                <label for="article">Couleur des articles.</label>
                <br><br>
            <div class="form-group">
                <input type="submit" name="couleur" class="btn btn-primary" value="Envoyer">
                <input type="reset" class="btn btn-default" value="Annuler">
            </div>
        </form>
    </div>    

