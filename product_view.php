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

    <style>
        
    </style>
</head>

<body>

    <?php include('./partials/dashboard_Navbar.php'); ?>

    <div class="container px-5 py-5">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order No.</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Price</th>

                </tr>
            </thead>
            <tbody>
    </div>
    </form>
    </div>

    <?php

    $order_no = $_GET['order_no'];

    $select = "SELECT * FROM `orders` WHERE `order_no`='$order_no'";
    $select_result = mysqli_query($Connection, $select);

    if (mysqli_num_rows($select_result) > 0) {
        $fetch = mysqli_fetch_assoc($select_result); { ?>
            <tr>
                <th scope="row">
                    <?php echo $fetch['order_no'] ?>
                </th>
                <td> <img src="<?php echo $fetch['product_image']
                    ?>" height="100px" width="100px"></td>
                <td>
                    <?php echo $fetch['product_name'] ?>
                </td>
                <td>
                    <?php echo $fetch['product_qty'] ?>
                </td>
                <td>
                    <?php echo $fetch['product_price'] ?>
                </td>
                <td>
                    <?php echo $fetch['product_price'] ?>
                </td>
            </tr>
            </tbody>
            <?php

        }
    }


    ?>


    </table>


    <div class="cancel_product">
        <form action="" method="post">
           
<?php

if(($_SERVER['REQUEST_METHOD'] == 'POST') ){

$id = $_GET['order_no'];

$delect_query = "DELETE FROM `orders` WHERE `order_no`='$id'";

if(mysqli_query($Connection,$delect_query)){
    echo "<div class='alert alert-success' role='alert'>
    Your Order Successfully Cancel
  </div>" ;
    exit();  
}
else{ 
    echo "<div class='alert alert-danger' role='alert'>
    Order Not Cancel
  </div>" ;
}
}

?>
            <button type="submit"  class="btn btn-warning">Cancel Order</button>
            </form>
    </div>
   
    <!-- </div>

<div class="container py-5 px-5" id="resion_container" style="display:none;">
<p> this is cancel product session </p>
</div> -->
    </div>

    <?php include('./partials/footer.php') ?>
</body>

</html>