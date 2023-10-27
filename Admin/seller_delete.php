

<?php

if(isset($_GET['seller_delete'])){

$delete_id = $_GET['seller_delete'];

$delete_seller = "delete from sellers where seller_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_seller);


if($run_delete){

echo "<script>alert('Seller Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_sellers','_self')</script>";


}

}


?>




