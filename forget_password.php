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

    <div class="container h-100 w-100 registercontainer">
        <!-- <div class="card bg-light"> -->
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Forget Your Password</h4>
            <p class="text-center">Get started with your free account</p>
            <form method="post">

                <?php
                include('./partials/dbconnection.php');
                if ($_POST) {
                    $email = $_POST['email'];
                    $select_query = "SELECT * FROM `user` WHERE `email`='$email'";
                    $query_result = mysqli_query($Connection, $select_query);
                    if (mysqli_num_rows($query_result) > 0) {
                        $fetch_data = mysqli_fetch_assoc($query_result);
                        $token = $fetch_data['token'];
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

                        $mail->Subject = 'Reset Password Link';
                        $mail->Body = 'Hello' . $username . ' Please click here to reset you account password http://localhost/E_commerce_Project/reset_password.php?token=' . $token;

                        if ($mail->send()) {
                            echo '<div class="alert alert-success" role="alert">
                            Reset link send in your register email '  .$email .'
                                    </div>';
                        }
                    }
                }
                ?>

                <div class="form-group input-group">

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Enter Your Register Email" type="email">
                    </div> <!-- form-group// -->



                    <div class="form-group input-group">
                        <button type="submit" class="btn btn-primary btn-block">Send Mail</button>
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