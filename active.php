<?php
session_start();
include('./partials/dbconnection.php');
$mail_token = $_GET['token'];

$query = "SELECT * FROM `user` WHERE `token`='$mail_token' ";
$select_query = mysqli_query($Connection, $query);
if(mysqli_num_rows($select_query)>0){
    $datafetch = mysqli_fetch_assoc($select_query);
    $ID = $datafetch['id'];
    $status = "active";
    $update_query = "UPDATE `user` SET `status`='$status' WHERE `id`='$ID'";
    $update_result = mysqli_query($Connection, $update_query);
        $_SESSION['msg'] = "Your Account Successfully Activated";
        header('location:login.php');
    }



?>