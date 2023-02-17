<?php

include('./partials/dbconnection.php');
$id = $_GET['id'];

$query = "DELETE FROM `product` WHERE `Product_id`='$id'";
if(mysqli_query($Connection, $query)){
 echo "<div class='alert alert-success' role='alert'>
    Product Delect Successfully
  </div>" ;
  header("Location: http://localhost/E_commerce_Project/product's.php", true, 301);
}
else{
    echo "<div class='alert alert-success' role='alert'>
    Product Not Delect
  </div>" ;
}



?>