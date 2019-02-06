<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'remy');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'Blog');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>