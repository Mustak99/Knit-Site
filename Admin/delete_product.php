<?php
include 'includes/db.php';
?>
<?php

if(isset($_GET['delete_product'])){

$delete_id = $_GET['delete_product'];

$delete_pro = "delete from products where id='$delete_id'";

$run_delete = mysqli_query($con,$delete_pro);

if($run_delete){

echo "<script>alert('One Product Has been deleted')</script>";

echo "<script>window.open('view_products.php','_self')</script>";

}

}

?>