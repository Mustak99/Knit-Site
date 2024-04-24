<?php
include '../database.php';

if(isset($_GET['delete_customers'])){
    $delete_id = $_GET['delete_customers'];

    $delete_customer = "DELETE FROM customerregistration WHERE UserId='$delete_id'";

    $run_delete = mysqli_query($con, $delete_customer);

    if($run_delete){
        echo "<script>alert('Customer Has Been Deleted')</script>";
        echo "<script>window.open('view_customers.php?view_customers', '_self')</script>";
    }
}
?>