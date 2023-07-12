<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', 'cojo');
define('DB_USERNAME', 'futbolme_nueva');
define('DB_PASSWORD', 'A3r0r3d');
define('DB_NAME', 'futbolme_nueva');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$acentos = $link->query("SET NAMES 'utf8'");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>