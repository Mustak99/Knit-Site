<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_dboy'])){

$delete_id = $_GET['delete_dboy'];

$delete_pro = "delete from dboy where dboy_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_pro);

if($run_delete){

echo "<script>alert('One dboy Has been deleted')</script>";

echo "<script>window.open('index.php?view_dboy','_self')</script>";

}

}

?>

<?php } ?>