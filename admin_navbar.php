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
    <?php include('./partials/bootstrapLink.php'); ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg text-white bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="dashboard.php">Secure2Shopping</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white ">
                    <li class="nav-item ">
                        <a class="nav-link active text-light" aria-current="page" href="./admin_dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="./user's.php">User's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="./product's.php">Product's</a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="./add_product.php">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="./order's.php">Order's</a>
                    </li>

                </ul>

                <div class="row mx-4">
                <div class=" col-2 mx-5 p-md-1 nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                           <?php
                             include('./partials/dbconnection.php');
                            $userid = $_SESSION['userid'];
                            $query = "SELECT * FROM `user` WHERE `id`='$userid'";
                            $query_run = mysqli_query($Connection,$query );
                            
                            if(mysqli_num_rows($query_run)>0){
                                $fetch = mysqli_fetch_assoc($query_run);
                                echo $fetch['username'];
                            }
                        
                            
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./useraccount.php">Account</a></li>
                        </ul>
</div>
<div class="col-2 mx-3">
                   <a href="./logout.php" <button type="button" class="btn btn-outline-secondary text-light"">
                        Logout
                    </button></a>
</div>
                </div>
                  
            </div>
        </div>
    </nav>
</body>

</html>