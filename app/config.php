<?php
/* Database connexion */
define('DB_SERVER', 'database');
define('DB_USERNAME', 'test');
define('DB_PASSWORD', 'test');
define('DB_NAME', 'devops');

/* Connexion à la base de données */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

/* verifier connection */
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
