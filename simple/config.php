<?php
/* Database credentials. */
define('DB_SERVER', 'us-cdbr-east-03.cleardb.com');
define('DB_USERNAME', 'b2ca6fbf8a3e2cb2ca6fbf8a3e2c');
define('DB_PASSWORD', 'a40a7933');
define('DB_NAME', 'heroku_d1695ff1876190e');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
