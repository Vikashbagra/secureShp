
<?php

include('./partials/dbconnection.php');
$id = $_GET['id'];


$delect_query = "DELETE FROM `orders` WHERE `order_no`='$id'";

if(mysqli_query($Connection,$delect_query)){
    header("location:order's.php");
}
else{ ?>
<script>
    window.alert('Yoru Query is fail');
</script>
<?php
}


?>