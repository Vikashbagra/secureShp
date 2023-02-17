<?php
$success = false;
$danger =  false;

?>
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
    <?php include('./admin_navbar.php'); ?>
 

<div class="container py-5 px-5">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Order No</th>
      <th scope="col">Prodcut Image</th>
      <th scope="col">Product_name</th>
      <th scope="col">user Name</th>
      <th scope="col">Billing Address</th>
      <th scope="col">Product Price</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
<?php
$userid =  $_SESSION['userid'];

$select_user = "SELECT * FROM `user` where `id`='$userid'";
$select_user_result = mysqli_query($Connection,$select_user);

if(mysqli_num_rows($select_user_result)>0){
    $fetch_user_data = mysqli_fetch_assoc($select_user_result);
}


?>

  <?php 
$order_no = $_GET['id'];

$select_qeuery = "SELECT * FROM `orders` WHERE `order_no`=$order_no";
$select_result = mysqli_query($Connection,$select_qeuery);

if(mysqli_num_rows($select_result)>0){
    while($fetch = mysqli_fetch_assoc($select_result)){?>
     <tr>
      <th scope="row"><?php echo $fetch['order_no']; ?></th>
      <th scope="row"> <img src="<?php echo $fetch['product_image']; ?>" height="100" width=80"    > </th>
      <td><?php echo $fetch['product_name']; ?></td>
      <td><?php echo $fetch_user_data['username']; ?></td>
      <td><?php echo $fetch['billing_address']; ?></td>
      <td><?php echo $fetch['product_price']; ?></td>
      <td><?php echo $fetch['date_time']; ?></td>
    </tr>
    <?php

    }



}

?>

  </tbody>
</table>

<div class="container">

<?php

if($_POST){
  $update_id = $_GET['id'];
    $delevery_date = $_POST['delevery_date'];
    $status = $_POST['flexRadioDefault'];
    if(!empty($delevery_date AND $status)){
      $data_insert = "  UPDATE `orders` SET `product_delevery_date`='$delevery_date',`order_status`='$status' WHERE `order_no`='$update_id'";
      if(mysqli_query($Connection,$data_insert)){
        echo '<div class="alert alert-success" role="alert">
        Update Successfully
      </div>
      ';
      }
      else{
        echo '<div class="alert alert-danger" role="alert">
        Update not Successfully
      </div>
      ';
      }
    } 
    else{
      echo "Your data is empety";
    }
}

?>


  <form action="" method="post">
  <label for="birthday">Delevery Date:</label>
  <input type="date" id="birthday" name="delevery_date" class="form-control">

<h1 class="mt-5">Delevery Status :</h1>
<div class="container d-flex justify-content-between align-items-center   mt-5">

    <div class="left-side" >
    <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" value="pickup" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    <b>Pickup</b>  
  </label>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ipsum error. Vitae laborum quisquam rem facilis autem, cum quae necessitatibus aliquam. Suscipit fugiat fuga error a, eligendi omnis aut porro.</p>
</div>
            </div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault" value="dispatch">
  <label class="form-check-label" for="flexRadioDefault">
   <b>Dispatch</b>
  </label>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ipsum error. Vitae laborum quisquam rem facilis autem, cum quae necessitatibus aliquam. Suscipit fugiat fuga error a, eligendi omnis aut porro.</p>
</div>
 
<div class="right-side">
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault" value="delevered">
  <label class="form-check-label" for="flexRadioDefault">
  <b>Delevered</b>
  </label>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ipsum error. Vitae laborum quisquam rem facilis autem, cum quae necessitatibus aliquam. Suscipit fugiat fuga error a, eligendi omnis aut porro.</p>
</div>
    
</div>
</div>

<div class="button">
<button type="submit" class="btn btn-primary">Order Place </button>
</div>
</form>

</div>

</div>
 


</div>


    <?php include('./partials/footer.php') ?>
</body>
</html>
