<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2shopping</title>
    <?php include('./partials/bootstrapLink.php') ?>

    <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  .about-me {
    border: 1px solid #a09467;
    margin: 15px auto;
    padding: 5px 20px;
    border-radius: 4px;
    box-shadow: 0px 0px 1px -5px #000000;
    text-align: justify;
    max-width: 600px;
    font-size: 17px;
    line-height: 1.4em;
  }
  .about-me legend {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 10px;
    border: 1px solid #a09467;
    border-radius: 5px 5px 5px 5px;
    background-color: #ffffff;
    color: #000000;
    box-shadow: 0px -5px 15px -5px rgba(0,0,0,0.386);
  }
  .about-me legend img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }
  .about-me legend span {
    margin-left: 10px;
    font-size: 19px;
    font-weight: bold;
  }
  .about-me h2 {
    line-height: 1.2em;
    margin: 10px auto;
  }
  .about-me a {
    text-decoration: none;
    color: inherit;
  }
  .about-me table {
    width: 100%;
    margin: 10px auto;
    border-collapse: collapse
  }
  .about-me table tr:nth-child(2n+1) td {
    background-color: rgba(103,148,247,0.08)
  }
  .about-me table td {
    padding: 10px;
  }
  .about-me table tr img {
    width: 50px;
    height: 50px;
    display: block;
    margin: 10px auto;
    border-radius: 50%;
    box-shadow: 0 0 15px -8px rgba(0,0,0,0.8);
  }
</style>
</head>
<body>
<?php include('./partials/dashboard_Navbar.php') ?>

<div class="container">

<fieldset class="about-me">
  <legend><img onerror="this.style.display = 'none'" src="secure2shopping" alt="secure2shopping" /><span> secure2shopping</span></legend>
<center><h2>About Us</h2></center>
<p>
  Hello Friends, welcome to our website <a href="secure2shopping.com"><strong>secure2shopping</strong></a>, founded on 20 January 2021 by <strong>vikash bagra</strong>.
</p>
<br><p>
  <b>secure2shopping</b> is a free professional e commerce platform where we provide e commerce etc. with a focus on dependability and daily. It is one of the basic needs of our everyday life. However, there are thousands of websites for e commerce etc. but here you will find a useful and comprehensive content. We hope you enjoy our e commerce as much as we enjoy offering them to you.
</p>
<br><p>
  If you have any <a href="https://www.3schools.in" target="_blank">question</a> or query regarding our website, please contact us by visiting our <a href="http://localhost/E_commerce_Project/contact.php" target="_blank">Contact Us</a> page or mailling us at <a href="mailto:secure2shopping@gmail.com" target="_blank">secure2shopping@gmail.com</a> .
</p>

</fieldset>


</div>





<?php include('./partials/footer.php') ?>


</body>
</html>