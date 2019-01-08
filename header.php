


<?php
// Initialize the session

 

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Nom de compte non valide.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Mot de passe non valide.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            

                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Mot de passe non valide.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Aucun compte n'a été trouvé avec ce nom.";
                }
            } else{
                echo "Une erreur est survenue, réessayez plus tard.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    

}
?>

<?php       
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { 
        echo '<style type="text/css">
        #info {
            display: none;
        }
        #connexion {
            display: block;
        }
        </style>';
    }            
    else
    {
        echo '<style type="text/css">
        #info {
            display: block;
        }
        #connexion {
            display: none;
        }
        </style>';
    }
?>

<?php
session_start();
$info = mysqli_query($link, 'SELECT * FROM configblog WHERE id = 1');

$titreaffichage = mysqli_fetch_assoc($info);

?>





	<body>
            <header>
            <div id='logo'>
                <a href="index.php"><img id="logo" src="images/Logo" alt="Logo"></a>
            </div>
                <div id='titre'>
                <h1><?php echo $titreaffichage['titre']; ?></h1>
                </div>
        <div id='connexion'>
            <h2>Connexion</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Nom de compte">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Connexion">
                </div>
                <p>Aucun compte? <a href="register.php">Créez en un!</a>.</p>
            </form>
        </div>
        <div id='info'>                    
            <h1>Bonjour, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        <p>
            <a href="welcome.php" class="btn btn-primary">Espace membre</a>
            <a href="logout.php" class="btn btn-danger">Déconnexion</a>
        </p>
    </div>          
               
            </header>	
        </body>
</html>

