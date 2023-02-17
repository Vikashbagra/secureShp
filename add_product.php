<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Secure2shopping</title>
  <?php include('./partials/bootstrapLink.php'); ?>
  <style>
    .main_header {
      height: auto;
      width: 100%;
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      gap: 2px;
      margin: 5rem 0;

    }

    .form_input {
      height: initial;
      width: inherit;
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      gap: 2px;
    }
  </style>
</head>

<body>
  <?php include('./admin_navbar.php'); ?>

  <div class=" main_header">
    <div class="headding">
      <h1>Add Product</h1>
    </div>

    <div class="form_input">

      <div class="row col-md-5">
        <form action="add_product.php" method="post" enctype="multipart/form-data">
          <?php

          if ($_POST) {
            include('./partials/dbconnection.php');
            $product_name = $_POST['product_name'];
            $product_des = $_POST['Product_des'];
            $product_price = $_POST['product_price'];
            $product_category = $_POST['product_category'];
            $product_image = $_FILES['product_image'];
            //    file upload in server 
            $filename = $product_image['name'];
            $tmpName = $product_image['tmp_name'];
            $folder = "./upload/" . $filename;
            move_uploaded_file($tmpName, $folder);
            
            $datainsert = "INSERT INTO `product`(`product_name`, `product_long_dis`, `product_price`, `product_category`, `product_image`) VALUES ('$product_name','$product_des','$product_price','$product_category','$folder')";
            //query   
            $query_result = mysqli_query($Connection, $datainsert);
            //  $insert_row = mysqli_num_rows($query_result);
            if (isset($query_result)) {
              echo '<div class="alert alert-success" role="alert">
              Product Add Successfully
            </div>';
              
            } else {
              echo '<div class="alert alert-danger" role="alert">
        Product not Add Successfully
      </div>';

            }
          }


          ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="product_name" placeholder="Product Name *"
              aria-label="Example text with button addon" aria-describedby="button-addon1">
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="Product_des" placeholder="Product description *"
              aria-label="Example text with button addon" aria-describedby="button-addon1">
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="product_price" placeholder="Product price *"
              aria-label="Example text with button addon" aria-describedby="button-addon1">
          </div>
          <select name="product_category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected>category</option>
            <option value="Men">Men</option>
            <option value="Women">Women</option>
            <option value="Kids">Kids </option>
          </select>
          <div class="input-group mb-3">
            <input type="file" name="product_image" class="form-control" id="inputGroupFile02">
          </div>
      </div>

      <button type="submit" class="btn btn-primary">Add Product</button>
      </form>

    </div>

    <!-- container code end here -->
  </div>





  <?php include('./partials/footer.php'); ?>

</body>

</html>