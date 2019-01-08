<?php
    require_once "config.php";
    ?>



<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <title>Blog Epsi B1</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        
                <style type="text/css">
                    body{ font: 14px sans-serif; }
                    .wrapper{ width: 350px; padding: 20px; }
                </style>
    </head>




<?php require 'header.php'; ?>

<br><br><br>
    
<div id="slideshow">
  <div class="slide-wrapper">
    <div class="slide"><img class="slider" src="images/Slide1" alt="Slide 1"></div>
    <div class="slide"><img class="slider" src="images/Slide2" alt="Slide 2"></div>
    <div class="slide"><img class="slider" src="images/Slide3" alt="Slide 3"></div>
  </div>
</div>
    
  




<?php


 
 
$nbarticle = 10000;

while($nbarticle >= 1){

$coucou = mysqli_query($link, "SELECT * FROM article WHERE id = '$nbarticle'");

$test = mysqli_fetch_assoc($coucou);
    if(!empty($test)){
echo '<div class="article">'.$test['article'].'<br><br></div>';
$test = null;
    }
$nbarticle--;
}
 ?>


<?php require 'footer.php'; ?>

</html>