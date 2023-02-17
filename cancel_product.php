<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2Shopping</title>
    <?php include('./partials/bootstrapLink.php') ?>
</head>
<body>
<?php include('./partials/dashboard_Navbar.php')?>
<!-- here start container -->


<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col"><?php echo $_SESSION['order_no']; ?></th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>
  <?php

$id = $_GET['productid'];
$data_select  = "SELECT * FROM `product` where `product_id`= $id";
$select_result = mysqli_query($Connection,$data_select);
if(mysqli_num_rows($select_result)>0){
    while($fetch_data = mysqli_fetch_assoc($select_result)){ ?>
    <tr>
      <th scope="row"></th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
<?php   
}
}

?>
    
  </tbody>
</table>

</div>




<!-- here end container -->



<?php include('./partials/footer.php') ?>
</body>
</html>