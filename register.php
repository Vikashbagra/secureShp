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
    <link rel="stylesheet" href="./css/register.css">


</head>

<body>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <script src="https://kit.fontawesome.com/f3edc708d3.js" crossorigin="anonymous"></script>


    <div class="container registercontainer ">
        <!-- <div class="card bg-light"> -->
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
            <?php
            // include('./partials/header.php');
            if ($_POST) {
                include('./partials/dbconnection.php');
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                $phone = $_POST['phone'];
                $file = $_FILES['uploadfile'];

                //    file upload in server 
                $filename = $file['name'];
                $tmpName = $file['tmp_name'];
                $folder = "upload/" . $filename;
                move_uploaded_file($tmpName, $folder);

                if ($password == $cpassword) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    // create a unick token
                    $token = bin2hex(random_bytes(50));
                    //data insert query
                    $query = "INSERT INTO `user` (`username`, `email`, `password`, `phone`, `profile`, `token`, `date`) VALUES ('$username', '$email', '$hash', '$phone', '$folder','$token', current_timestamp())";
                    $sql = mysqli_query($Connection, $query);

                    if (isset($sql)) {


                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->Host = "smtp.gmail.com";
                        $mail->SMTPAuth = true;
                        $mail->Username = 'vikashbagra611@gmail.com';
                        $mail->Password = 'bayybuuegvoohwzf';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;

                        $mail->setFrom('vikashbagra611@gmail.com');
                        $mail->addAddress($email);
                        $mail->isHTML(true);

                        $mail->Subject = 'Acccount Activaction email';
                        $mail->Body = 'Hello' . $username . ' Please click here to activate you account http://localhost/E_commerce_Project/active.php?token=' . $token;

                        if ($mail->send()) {

                            $_SESSION['msg'] = "Send Mail In Your Registed mail id" . $email;
                            header('location:login.php');

                        } else {
                            echo "<script> window.alert('successfully mail not send') </script>";
                        }





                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                        Successfully not Register
                      </div>';
                    }




                } else {
                    echo '<div class="alert alert-danger" role="alert">
            Your Password is not match
          </div>';

                }
            }
            ?>


            <form action="./register.php" method="post" enctype="multipart/form-data">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="username" class="form-control" placeholder="Full name" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>

                    <input name="phone" class="form-control" placeholder="Phone number" type="text" name="phone">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Create password" type="password" name="password">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Repeat password" type="password" name="cpassword">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-sharp fa-solid fa-image"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Repeat password" type="file" name="uploadfile">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->

    </div>
    <!--container end.//-->

</body>

</html>l