<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "e_commerce";

$Connection = mysqli_connect($servername, $username, $password, $database);

if(!$Connection){
    die("Your connection is not successfully");
}
?>