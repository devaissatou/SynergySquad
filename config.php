<?php
/* Database connexion */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'devops');

/* Connexion à la base de données */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

/* verifier connection */
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>