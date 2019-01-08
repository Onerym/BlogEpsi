<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$titre = "";
$titre_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["titre"]))){
        $titre_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM configblog WHERE titre = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_titre);
            
            // Set parameters
            $param_titre = trim($_POST["titre"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $titre_err = "This username is already taken.";
                } else{
                    $titre = trim($_POST["titre"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    

    
    // Check input errors before inserting in database 
    if(empty($titre_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO configblog (titre) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_titre);
            
            // Set parameters
            $param_titre= $titre;

            
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
?>

<?php
$install = mysqli_query($link, "SELECT * FROM configblog WHERE id = 1");

$title = mysqli_fetch_assoc($install);
    if(!empty($title)){
        header("Location: index.php");
    }
    ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Installation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
    </style>
</head>
<body>
       
    <div class="formchange">
        <h2>Installation</h2>
        <p>Veuillez remplir ces informations pour créer le titre du site.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($titre_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="titre" class="form-control" value="<?php echo $titre; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Envoyer">
                <input type="reset" class="btn btn-default" value="Annuler">
            </div>
        </form>
    </div>    
</body>
</html>
