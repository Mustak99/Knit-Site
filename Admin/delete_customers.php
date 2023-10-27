<?php
include 'includes/db.php';
?>
<?php

if(isset($_GET['delete_customer'])){

$delete_id = $_GET['delete_customer'];

$delete_pro = "delete from customers where customer_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_pro);

if($run_delete){

echo "<script>alert('One Customer Has been deleted')</script>";

echo "<script>window.open('view_customers.php?view_customers','_self')</script>";

}

}

?>