<?php
session_start();
require_once "config.php";
?>

<?php
$info = mysqli_query($link, 'SELECT * FROM configblog WHERE id = 1');
$titreaffichage = mysqli_fetch_assoc($info);
?>
      

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Blog Epsi B1</title>
        <link href="css/style.php" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
    <?php require 'header.php'; ?>

    <br><br><br>

    <div id="slideshow">
      <div class="slide-wrapper">
        <div class="slide"><img class="slider" src="images/1" alt="Slide 1"></div>
        <div class="slide"><img class="slider" src="images/2" alt="Slide 2"></div>
        <div class="slide"><img class="slider" src="images/3" alt="Slide 3"></div>
      </div>
    </div>


    <?php
    $resultatar = mysqli_query($link, "SELECT * FROM article ORDER BY id DESC LIMIT 1");
    $rowar = mysqli_fetch_array($resultatar);
    $nbarticle=$rowar['id'];

    while($nbarticle >= 1){

        $coucou = mysqli_query($link, "SELECT * FROM article WHERE id = '$nbarticle'");

        $test = mysqli_fetch_assoc($coucou);
            if(!empty($test))
                {
                  echo '<div class="article">'.$test['article'].'<br><br></div>';
                   $test = null;
                }
          $nbarticle--;
        }
     ?>


    <?php require 'footer.php'; ?>
    </body>
</html>