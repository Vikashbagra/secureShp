<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2Shopping</title>
    <?php include('./partials/bootstrapLink.php'); ?>
</head>
<body>
    <?php
    session_start();
    include('./partials/dashboard_Navbar.php'); ?>
    

    <div class="container ">

<h1 class="text-center w-100 my-3 ">Latest Product's</h1>
<div class="row mx-5 my-5 g-3">

<?php
include('./partials/dbconnection.php');

$category = $_GET['category'];

$select_data = "SELECT * FROM `product` where `product_category`='$category'";
$select_result = mysqli_query($Connection,$select_data);

if(mysqli_num_rows($select_result)>0){
  while($fetch= mysqli_fetch_assoc($select_result)){ ?>

    <div class="card col-md-3" style="width: 18rem; height:20rem;">
  <img src="<?php echo $fetch['product_image'];
   ?>"
   height="150px"
   width="80px"
   class="card-img-top mt-1" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo mb_strimwidth($fetch['product_name'], 0, 25, "...");?></h5>
    <p class="card-text"><?php echo mb_strimwidth($fetch['product_long_dis'], 0, 20, "...");?></p>
    <a href="product_shop.php" class="btn btn-primary">shop</a>
  </div>
</div>
<?php
    
  }


}
?>
</div>
</div>




    <?php include('./partials/footer.php') ?>
</body>
</html>