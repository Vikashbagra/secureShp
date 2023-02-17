<?php
session_start();
$product_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2Shopping</title>
    <?php include('./partials/bootstrapLink.php'); ?>
    <style>
        .button{
            display: flex;
            justify-content: center;
            margin-top: 5rem;
            padding: 1rem;
        }
        
    </style>
</head>

<body>

    <?php include('./partials/dashboard_Navbar.php'); ?>


    <div class="container px-5 py-5">
    <?php
                $selec_product = "SELECT * FROM `product` where `product_id`='$product_id'";
                $product_result = mysqli_query($Connection, $selec_product);
                $prodcut_rows = mysqli_num_rows($product_result);
                if ($prodcut_rows > 0) {
                    $fetch_product = mysqli_fetch_assoc($product_result);
                }
                if ($_POST) {
                    $product_id = $_GET['id'];
                   $payment = $_POST['flexRadioDefault'];
                    $order_no = mt_rand();
                    $userid = $_SESSION['userid'];
                    $address_username = $_POST['fullname'];
                    $address_mobile = $_POST['mobile'];
                    $address_flat = $_POST['flat'];
                    $address_area = $_POST['area'];
                    $landmark = $_POST['landmark'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $product_image = $fetch_product['product_image'];
                    $product_price = $fetch_product['product_price'];
                    $product_name = $fetch_product['product_name'];
                    $Billing_address = "$address_flat" . " $address_area" . " $landmark" . " $city" . " $state";
                    $insert_query = "INSERT INTO `orders`(`order_no`, `product_id`, `product_name`, `product_image`, `product_price`, `userid`,`billing_address`, `payment`) VALUES ('$order_no','$product_id','$product_name','$product_image','$product_price','$userid','$Billing_address','$payment')";
                    if (mysqli_query($Connection, $insert_query)) {
                        echo '<div class="alert alert-success" role="alert">
            Order Place Successfully
          </div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
            Your booking not book
          </div>';
                    }


                }
                ?>

    <!-- order detail table end here  -->

    <div class="container px-5 py-5 mb-3 mt-3 ">

        <form method="post">


            <h1>Billing Address :</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Full Name: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="fullname"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mobile No: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="mobile"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Flat,House no.,Building,Company,Apartment :</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="flat"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Area,Street,Secotor,Village :</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="area"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Landmark :</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="landmark"
                    aria-describedby="emailHelp">
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Town/City :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="city"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">State :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="state"
                        aria-describedby="emailHelp">
                </div>
            </div>


        

    <!-- second container start here  -->
    <h1 class="mt-5">Payment Method : </h1>
<div class="container d-flex justify-content-between align-items-center   mt-5">
 
    <div class="left-side" >
    <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" value="COD" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    <b> COD </b>  
  </label>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ipsum error. Vitae laborum quisquam rem facilis autem, cum quae necessitatibus aliquam. Suscipit fugiat fuga error a, eligendi omnis aut porro.</p>
</div>
            </div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault" value="UPI">
  <label class="form-check-label" for="flexRadioDefault">
   <b>UPI </b>
  </label>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ipsum error. Vitae laborum quisquam rem facilis autem, cum quae necessitatibus aliquam. Suscipit fugiat fuga error a, eligendi omnis aut porro.</p>
</div>
 
<div class="right-side">
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault" value="Bank Cheque">
  <label class="form-check-label" for="flexRadioDefault">
  <b> Bank Cheque </b>
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

    <!-- Shopping Address section end here -->




    <?php include('./partials/footer.php') ?>

</body>

</html>