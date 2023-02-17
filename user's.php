
<?php
include('./partials/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2Shopping</title>
</head>
<body>
<?php include('./admin_navbar.php'); ?>

<!-- product section start here -->

<div class="container my-2 py-5">
    <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>User Type</th>
      <th>Status</th>
      <th>Mobile Number</th>
      <th>Address</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      
      $query = "SELECT * FROM `user`";
      $result = mysqli_query($Connection, $query);
      $num_rows = mysqli_num_rows($result);
      if($num_rows>0)
      {
        while($fetch = mysqli_fetch_assoc($result)){
          ?>
          <td>  
          <div class="d-flex align-items-center">
            <img
                src="<?php echo $fetch['profile']; ?>"
                alt=""
                style="width: 45px; height: 45px"
                class="rounded-circle"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1"><?php echo $fetch['username'];?></p>
              <p class="text-muted mb-0"><?php echo $fetch['email']; ?></p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1"><?php echo $fetch['usertype']; ?></p>
          
  
        </td>
        <td>
        <p class="fw-normal mb-1"><?php echo $fetch['status']; ?></p>
        </td>
        <td><?php echo $fetch['phone']; ?></td>
          
        <td><?php echo $fetch['address']; ?></td>
        <td>
          <a href="edit.php?id=<?php echo $fetch['id']; ?>"><i class="fa-solid fa-pen"></i></a>
        </td>
        <td>
       <a href="delect.php?id=<?php echo $fetch['id']; ?>"> <i class="fa-solid fa-trash"></i></a>

        </td>
        </tr>
        <?php
        

        }
      }
      

      ?>
  </tbody>
</table>
</div>
<!-- product table end here  -->


<?php include('./partials/footer.php'); ?>




</body>
</html>