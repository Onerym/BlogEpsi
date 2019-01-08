<?php
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$titre = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
        $titre = trim($_POST["titre"]);
        
    // Check input errors before updating the database
        // Prepare an update statement
        $sql = "UPDATE configblog SET titre = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $titre, $param_id);
            
            // Set parameters
            $param_id = "1";
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                header("location: index.php");
                exit();
            } else{
                echo "Erreur! Veuillez réesaayer plus tard.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
}
?>
    

 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrement</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
    </style>
</head>
<body>
    <div class="formchange">
        <h2>Titre du site</h2>
        <p><p>Veuillez remplir cet informations pour pouvoir changer le titre du site.</p></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($titre_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="titre" class="form-control" value="<?php echo $titre; ?>">
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Envoyer">
                <input type="reset" class="btn btn-default" value="Annuler">
            </div>
        </form>
    </div>    
</body>
</html>

