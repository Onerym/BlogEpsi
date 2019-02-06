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
 
// Define variables and initialize with empty values
$article = "";
$article_err = "";
 
if(isset($_POST['envoie']))
{
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["article"]))){
        $article_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM article WHERE article = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_article);
            
            // Set parameters
            $param_article = trim($_POST["article"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $article_err = "This username is already taken.";
                } else{
                    $article = trim($_POST["article"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    

    
    // Check input errors before inserting in database 
    if(empty($article_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO article (article) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_article);
            
            // Set parameters
            $param_article= $article;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

            
    // Close connection
    mysqli_close($link);
}
}
?>

 <?php
$info = mysqli_query($link, 'SELECT * FROM configblog WHERE id = 1');
$titreaffichage = mysqli_fetch_assoc($info);
?>





 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Membre</title>
    <link rel="stylesheet" href="css/style.php">
</head>    
    <body>
            <?php require 'header.php'; ?>
    <div class="page-header">
        <h1>Bonjour, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenue dans l'espace membre.</h1>
    </div>
        <br><br><br>
        <a href="reset-password.php" class="btn btn-warning">Changer de mot de passe</a>
        <br><br><br><br><br>
        <?php require_once "modifadmin.php"; ?>
        <br><br><br><br>
        <?php require_once "LogoSend.php"; ?>
        <br><br><br><br>
        <?php require_once "Background.php"; ?>
        <br><br><br><br>
        <?php require_once "SliderSend1.php"; ?>
        <br><br><br><br>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>Ecrire un nouvel article :</h3>
            <div class="carticle <?php echo (!empty($article_err)) ? 'has-error' : ''; ?>">
                            <textarea name="article" rows="15" cols="100" min="1" max="2500" ></textarea>
                            <span class="help-block"><?php echo $article_err; ?></span>
            </div> 
            <br>
            <input type="submit" name="envoie" class="btn btn-info" value="Envoyer">
        </form>
        <br><br><br><br>
        <?php require_once "modifarticle.php"; ?>
        <br><br><br><br><br><br>
	<a href="index.php" class="btn btn-success">Retour vers la page d'accueil</a>
        <br><br><br><br><br><br><br><br>
    <?php require 'footer.php'; ?>
</body>
</html>