<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2Shopping</title>
</head>
<body>

<?php
session_start();
include('./partials/dashboard_Navbar.php');
?>

<!-- product section start here -->

<div class="container my-2 py-5">
 
    <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Product Image</th>
      <th>Order No.</th>
      <th>status</th>
      <th>Delevery Date</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php

  $id = $_SESSION['userid'];
  
  $selec_all = "SELECT * FROM `orders` WHERE `userid`=$id";
  $select_result = mysqli_query($Connection,$selec_all);
  $selct_rows = mysqli_num_rows($select_result);
  if($selct_rows>=1){
    // session variable creating 
    $fetch_data = mysqli_fetch_assoc($select_result);
    while($fetch_data = mysqli_fetch_assoc($select_result)){
      ?>
    <tr>
      <td><img 
      src="<?php echo $fetch_data['product_image'] ?>"
       alt="Product_image"
       height="100px"
       width="100px"
       ></td>
       <td><?php echo $fetch_data['order_no'] ?></td>
       <td><?php 
       if($fetch_data['order_status']=="order place"){
        echo '<button type="button" class="btn btn-secondary">order place</button>';
       }
       elseif($fetch_data['order_status']=="dispatch"){
        echo '<button type="button" class="btn btn-primary">dispatch</button>';
       }
       elseif($fetch_data['order_status']=="delevered"){
        echo '<button type="button" class="btn btn-success">delevered</button>';
       }
       
       ?></td>
       <td><?php echo $fetch_data['product_delevery_date'] ?></td>
       <td><a href="product_view.php?order_no=<?php echo $fetch_data['order_no'] ?>"><i class="fa-sharp fa-solid fa-eye"></i></a></td>
       
    </tr><?php
    }
  }
  else{

  }
  ?>
  </tbody>
</table>

</div>
<!-- product table end here  -->

<?php
include('./partials/footer.php')

?>
    
</body>
</html>