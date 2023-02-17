<?php

include('./partials/dbconnection.php');
$id = $_GET['id'];
$query = "DELETE FROM `user` WHERE `id`='$id'";

$result =  mysqli_query($Connection,$query);
if(isset($result)){
    header("location:user's.php");
}

?>