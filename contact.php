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
    <title>Secure2shopping</title>
    <?php include('./partials/bootstrapLink.php') ?>
</head>

<body>
    <?php include('./partials/dashboard_Navbar.php') ?>


    <div class="container">


        <?php

        if ($_POST) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
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

            $mail->Subject = $subject;
            $mail->Body = 'Hello' . $name . $message;

            if ($mail->send()) {
                echo "<script> window.alert('successfully mail send') </script>";
            } else {
                echo "<script> window.alert('successfully mail not send') </script>";
            }
        }
        ?>
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to
                contact us directly. Our team will come back to you within
                a matter of hours to help you.</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="" method="POST">

                        <?php


                        ?>

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Your name</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Your email</label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Subject</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2"
                                        class="form-control md-textarea"></textarea>
                                    <label for="message">Your message</label>
                                    <input type="text" id="message" name="message" rows="2" class="form-control">
                                </div>
                                <div>
                                    <button type="submit"
                                        class="btn btn-primary mt-5 d-flex justify-content-center align-items-center">send
                                        Mail</button>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                    </form>


                    <div class="status"></div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>3/174 Sector 3 Partap Nagar 302033</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>7414836421</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>vikashbagra611@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

        </section>
        <!--Section: Contact v.2-->

    </div>





    <?php include('./partials/footer.php') ?>


</body>

</html>