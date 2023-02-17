<?php
session_start();
ini_set('error_reporting', E_ALL);
if(!$_SESSION['userid']){
    die("<a class='text-center' href= 'login.php'> Please continue to login </a>");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2shopping</title>
    <link rel="stylesheet" href="./css/style.css">
  
</head>
<body>
  
    <?php include('./partials/dashboard_Navbar.php') ?>
<!-- slider code start here -->

<div id="carouselExampleIndicators" class="carousel slide h-100">
  <div class="carousel-indicators ">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active h-50">
      <img src="./images/sliderimage2.jpg" class="d-block w-100 h-50 " alt="...">
    </div>
    <div class="carousel-item h-50">
      <img src="./images/sliderimage3.jpg" class="d-block w-100 h-50" alt="...">
    </div>
    <div class="carousel-item h-50">
      <img src="./images/sliderimages.avif" class="d-block w-100 h-50" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- slider code end here -->
<div class="container d-flex align-items-center flex-column align-items-center ">

<h1 class="text-center w-100 my-3 ">Latest Product's</h1>
<div class="row g-3">

<?php

$select_data = "SELECT * FROM `product`";
$select_result = mysqli_query($Connection,$select_data);

if(mysqli_num_rows($select_result)>0){
  while($fetch= mysqli_fetch_assoc($select_result)){ ?>


    <div class="card col-md-4 mx-2 " style="width: 18rem; height:20rem;">
  <img src="<?php echo $fetch['product_image'];
   ?>"
   height="150px"
   width="80px"
   class="card-img-top mt-1" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo mb_strimwidth($fetch['product_name'], 0, 25, "...");?></h5>
    <p class="card-text"><?php echo mb_strimwidth($fetch['product_long_dis'], 0, 20, "...");?></p>
    <a href="./product_shop.php?id=<?php echo $fetch['product_id']; ?>" class="btn btn-success px-5 text-center">Buy</a>
  </div>
</div>
<?php
    
  }


}
?>
</div>
</div>

<!-- product section end here -->







<!-- footer section start here  -->


<?php include('./partials/footer.php') ?>

<!-- footer section end here  -->

</body>
</html>