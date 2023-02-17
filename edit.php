<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2shopping</title>
    <?php include('./partials/bootstrapLink.php');?>
    <style>
        .main_header{
            height: auto; 
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            margin:5rem 0;
    
        }
        .form_input{
            height: initial;
            width:inherit;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }
    </style>
</head>
<body>
<?php include('./admin_navbar.php');
include('./partials/dbconnection.php');

//select query 
$userid = $_GET['id'];
$selectQuery = "SELECT * FROM `user` WHERE `id`='$userid'";
$selectResult = mysqli_query( $Connection, $selectQuery);

if(mysqli_num_rows($selectResult)>0){
    $fetch = mysqli_fetch_assoc($selectResult);
}



?>

<div class=" main_header">
 <div class="headding">
    <h1>Edit information</h1>
</div>

<div class="form_input">

<div class="row col-md-5">
<?php

if($_POST){
    $userid = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $usertype = $_POST['usertype'];
    $profile = $_FILES['profile'];

     //    file upload in folder 
     $filename = $profile['name'];
     $tmpName = $profile['tmp_name'];
     $folder = "./upload/" . $filename;
     move_uploaded_file($tmpName, $folder);
$update_query = "UPDATE `user` SET `username`='$username',`email`='$email',`phone`='$phone',`address`='$address',`usertype`='$usertype',`profile`='$folder' WHERE `id`='$userid'";
$update_result = mysqli_query($Connection,$update_query);
header("location:user's.php");
exit();
}
?>


<form action="edit.php?id=<?php echo $fetch['id']; ?>" method="post" enctype="multipart/form-data">
<div class="input-group mb-3">
  <input type="text" class="form-control" name="username" value="<?php echo $fetch['username'] ?>" aria-label="Example text with button addon" aria-describedby="button-addon1">
</div>
<div class="input-group mb-3">
  <input type="text" class="form-control" name="email" value="<?php echo $fetch['email'] ?>" aria-label="Example text with button addon" aria-describedby="button-addon1">
</div>
<div class="input-group mb-3">
  <input type="text" class="form-control" name="phone" value="<?php echo $fetch['phone'] ?>" aria-label="Example text with button addon" aria-describedby="button-addon1">
</div>
<div class="input-group mb-3">
  <input type="text" class="form-control" name="address" placeholder="Enter Your Address" value="<?php echo $fetch['address'] ?>" aria-label="Example text with button addon" aria-describedby="button-addon1">
</div>
<select name="usertype" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option value="<?php echo $fetch['usertype'];?>" selected><?php echo $fetch['usertype'];?></option>
  <option value="user">user</option>
  <option value="admin">admin</option>
</select>

<div class="input-group mb-3">
  <input type="file" name="profile" class="form-control" id="inputGroupFile02" value="<?php echo $fetch['profile'] ?>" ?>
</div>
</div>

<button type="submit" class="btn btn-primary">update</button>
    </form>

</div>

<!-- container code end here -->
</div>





<?php include('./partials/footer.php');?>

</body>
</html>