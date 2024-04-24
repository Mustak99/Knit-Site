<?php

if(isset($_GET['delete_sellers'])){

$delete_id = $_GET['delete_sellers'];

$delete_seller = "delete from sellerregistration where SellerId='$delete_id'";

$run_delete = mysqli_query($con,$delete_seller);


if($run_delete){

echo "<script>alert('Seller Has Been Deleted')</script>";

echo "<script>window.open('view_sellers.php?view_sellers','_self')</script>";


}

}


?>




