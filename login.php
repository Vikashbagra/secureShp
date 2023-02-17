<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">


</head>

<body>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <script src="https://kit.fontawesome.com/f3edc708d3.js" crossorigin="anonymous"></script>


    <div class="container registercontainer">
        <!-- <div class="card bg-light"> -->
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Login Your Account</h4>
            <p class="text-center">Get started with your free account</p>
        
          
            
            <?php
            include('./partials/dbconnection.php');

            if ($_POST) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $query = "SELECT * FROM `user` where`email` = '$email'";
                $result = mysqli_query($Connection, $query);
                $num_rows = mysqli_num_rows($result);
                if ($num_rows > 0) {
                    $fetch = mysqli_fetch_assoc($result);
                    // $verify_password = password_verify($password,PASSWORD_DE);
                    if (password_verify($password, $fetch['password'])) {
                        if ($fetch['status'] == "active") {
                            echo '<div class="alert alert-success" role="alert">' . $_SESSION['msg'] . '</div>';
                            $_SESSION['userid'] = $fetch['id'];
                            if ($fetch['usertype'] == "user") {
                                header('location:dashboard.php');
                            }elseif($fetch['usertype']=="admin"){
                                header('location:admin_dashboard.php');
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                    Please Active Your Account
                      </div>';

                        }

                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                    Password not Matching
                      </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                invalid credentials
                  </div>';
                }
            }
            ?>


            <form action="./login.php" method="post">

                <div class="form-group input-group">
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email">
                </div> <!-- form-group// -->
               
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Create password" type="password" name="password">
                </div> <!-- form-group// -->
            
                <div class="form-group input-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                 <!-- form-group// -->
                <div class="form-group input-group" >
                <p class="text-center">Have don't account <a href="register.php">Register</a> </p>
        </div>
        <div class="form-group" >
                <p class="text-center"><a href="forget_password.php">Forget Your Password</a> </p>
        </div>
        </div>
            </form>
        </article>
    </div> <!-- card.// -->

    </div>
    <!--container end.//-->

</body>

</html>