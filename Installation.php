<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'remy');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'Blog');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$drop = "DROP DATABASE Blog";
if ($drop = $link->query ($drop)) {
    echo "Base de donnée correctement initialiser\n";
} else {
    echo "Erreur lors de l'initialisation de la base de donnée : " . mysql_error() . "\n";
}


$create = "CREATE DATABASE Blog";
if ($create = $link->query ($create)) {
    echo "Base de donnée créée correctement\n";
} else {
    echo 'Erreur lors de la création de la base de donnée : ' . mysql_error() . "\n";
}

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


$cusers = "CREATE TABLE users (
                    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                ); ";
if ($cusers = $link->query ($cusers)) {
    echo "La table users a été créée correctement\n";
} else {
    echo 'Erreur lors de la création de la table "users" : ' . mysql_error() . "\n";
}


$cconfigblog = "CREATE TABLE configblog (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL UNIQUE,
    header VARCHAR(11) NOT NULL,
    body VARCHAR(11) NOT NULL,
    footer VARCHAR(11) NOT NULL,
    article VARCHAR(11) NOT NULL
);";
if ($cconfigblog = $link->query ($cconfigblog)) {
    echo "La table users a été créée correctement\n";
} else {
    echo 'Erreur lors de la création de la table "configblog" : ' . mysql_error() . "\n";
}


$cconfig = "INSERT INTO `configblog` (`id`, `titre`, `header`, `body`, `footer`, `article`) VALUES
(1, 'Blog-Idea', '#4D3103', '#FFFFFF', '#4D3103', '#FFFFFF');";
if ($cconfig = $link->query ($cconfig)) {
    echo "La configuration de configblog a été créée correctement\n";
} else {
    echo 'Erreur lors de la création des configurations de "configblog" : ' . mysql_error() . "\n";
}





$carticle = "CREATE TABLE article (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    article VARCHAR(12500) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);";
if ($carticle = $link->query ($carticle)) {
    echo "La table users a été créée correctement\n";
} else {
    echo 'Erreur lors de la création de la table "article" : ' . mysql_error() . "\n";
}


header("location:index.php");
?>
