<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

// require './PHPMailer-master/src/OAuth.php';
require './PHPMailer-master/src/OAuthTokenProvider.php';
require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/POP3.php';
require './PHPMailer-master/src/SMTP.php';
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

        <form method="post">

            <button type="submit" class="btn btn-warning" id="cancel_product">Cancel Order</button>
            <button type="submit" class="btn btn-warning" id="cancel_product"></button>
            <button type="submit" class="btn btn-warning" id="cancel_product">Cancel Order</button>

        </form>

    </div>

    </div>


    <?php include('./partials/footer.php') ?>
</body>

</html>