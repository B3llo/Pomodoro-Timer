<?php 

$user = "root";
$passwd = "";
$database = "ADS";
$host = "localhost";

$mysqli = new mysqli($host, $user, $passwd, $database);

if($mysqli->error) { 
    die("Error while trying to connect to database...");
}
?>