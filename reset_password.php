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

    <div class="container h-100 w-100 registercontainer">
        <!-- <div class="card bg-light"> -->
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Reset Your Password</h4>
            <p class="text-center">Get started with your free account</p>
            <?php
include('./partials/dbconnection.php');
    $mail_token = $_GET['token'];
if($_POST){
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword) {
        $select_query = "SELECT * FROM `user` WHERE `token`='$mail_token'";
        $query_result = mysqli_query($Connection, $select_query);

        if (mysqli_num_rows($query_result) > 0) {
            $fetch_data = mysqli_fetch_assoc($query_result);
            $id = $fetch_data['id'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $update_query = "UPDATE `user` SET `password`='$hash' WHERE `id`='$id'";
            $update_result = mysqli_query($Connection, $update_query);
            if(isset($update_result)){
                echo '<div class="alert alert-success" role="alert">
                Your password successfully updated
                <a href="login.php">Back too login</a>
              </div>';
                        
                
            }
            else{
                echo '<div class="alert alert-danger" role="alert">
                Your password is not updated
              </div>';
            }

        } 
        }else {
            echo "invalid token";
    }



}


?>

            <form method="post">
                <div class="form-group input-group">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Set new password" type="password" name="password">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Repeat password" type="password" name="cpassword">
                </div> <!-- form-group// -->


                    <div class="form-group input-group">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                        <!-- form-group// -->
                        <div class="form-group input-group">
                            <p class="text-center">Have don't account <a href="register.php">Register</a> </p>
                        </div>

                    </div>
            </form>
        </article>
    </div> <!-- card.// -->

    </div>
    <!--container end.//-->

</body>

</html>l




