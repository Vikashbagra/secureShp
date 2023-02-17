
<?php
include('./partials/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2Shopping</title>
</head>
<body>
<?php include('./admin_navbar.php'); ?>

<!-- product section start here -->

<div class="container my-2 py-5">
    <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Product id</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Product Description</th>
      <th>Product image</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        
      $query = "SELECT * FROM `product`";
      $result = mysqli_query($Connection, $query);
      $num_rows = mysqli_num_rows($result);
      if($num_rows>0)
      {
        while($fetch = mysqli_fetch_assoc($result)){
          ?>
          <td>  
         <?php echo $fetch['product_id']; ?>
        </td>
        <td>
          <?php echo mb_strimwidth($fetch['product_name'], 0,25,"..."); ?></p>
          
        </td>
        <td>
        <p class="fw-normal mb-1"><?php echo $fetch['product_price']; ?></p>
        </td>
        <td><?php echo mb_strimwidth($fetch['product_long_dis'], 0, 40, "..."); ?></td>
          
        <td><img
         src="<?php echo $fetch['product_image']; ?>"
         alt="prodcut"
         height="100px"
         width="100px"
         ></td>
        <td>
          <a href="product_edit.php?id=<?php echo $fetch['product_id']; ?>"><i class="fa-solid fa-pen"></i></a>
        </td>
        <td>
       <a href="product_delect.php?id=<?php echo $fetch['product_id']; ?>"> <i class="fa-solid fa-trash"></i></a>

        </td>
        </tr>
        <?php 
        

        }
      }
      

      ?>
  </tbody>
</table>
</div>
<!-- product table end here  -->


<?php include('./partials/footer.php'); ?>




</body>
</html>