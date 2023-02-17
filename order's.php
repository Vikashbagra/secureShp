<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure2Shopping</title>
    <?php include('./partials/bootstrapLink.php')?>
</head>
<body>
<?php include('./admin_navbar.php');?>
<div class="container mt-5 mb-5">

<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Product Image</th>
      <th>Order No</th>
      <th>Status</th>
      <th>Delevery Date</th>
      <th colspan="2" >Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
$order_select = "SELECT * FROM `orders`";
$order_result = mysqli_query($Connection,$order_select);

if(mysqli_num_rows($order_result)>0){
  
    while(  $fetch_orders = mysqli_fetch_assoc($order_result)){ ?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="<?php echo $fetch_orders['product_image'] ;?>"
              alt=""
              style="width: 80px; height: 80px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?php echo $fetch_orders['product_name']; ?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo $fetch_orders['order_no']; ?></p>
      </td>
      
      <td>
      <p class="text-muted mb-0">
         <?php echo $fetch_orders['order_status'] ?>
      </p>
      </td>
      <td> <p class="text-muted mb-0"><?php echo $fetch_orders['product_delevery_date']; ?></p></td>
      <td>
      <form action="Approve.php?id=<?php echo $fetch_orders['order_no']?>" method="post">
      
       <button type="submit" class="btn btn-success">Approve</button>
    </form>
    </td>
    <td>
      <form action="reject.php?id=<?php echo $fetch_orders['order_no'];
      ?>" method="post">
       <button type="submit" class="btn btn-danger">Reject</button>
      </td>
      </form>
    </tr>

<?php
    }

}

?>

 
</tbody>
</table>

<!-- container class end here -->
</div>


<?php include('./partials/footer.php');?>



</body>
</html>