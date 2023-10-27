<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('admin_login.php','_self')</script>";

}

else {

?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Insert Delivery Boy

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert Delivery Boy

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="dboy_name" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Email: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="dboy_email" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Password: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="password" name="dboy_pass" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">  Vehicle Type: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="dboy_vtype" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Vehicle Number: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="dboy_vno" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Contact: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="dboy_contact" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Address: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<textarea name="dboy_address" class="form-control" rows="3"> </textarea>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Image: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="file" name="dboy_image" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="submit" name="submit" value="Insert Delivery Boy" class="btn btn-primary form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$dboy_name = $_POST['dboy_name'];

$dboy_email = $_POST['dboy_email'];

$dboy_pass = $_POST['dboy_pass'];

$dboy_vtype = $_POST['dboy_vtype'];

$dboy_vno = $_POST['dboy_vno'];

$dboy_contact = $_POST['dboy_contact'];

$dboy_address = $_POST['dboy_address'];

$dboy_image = $_FILES['dboy_image']['name'];

$temp_dboy_image = $_FILES['dboy_image']['tmp_name'];

move_uploaded_file($temp_dboy_image,"dboy_images/$dboy_image");

$insert_dboy = "insert into dboy(dboy_name,dboy_email,dboy_pass,dboy_image,dboy_vtype,dboy_vtype,dboy_vno,dboy_address) values ('$dboy_name','$dboy_email',MD5(.'$dboy_pass'.),'$dboy_image','$dboy_vtype','$dboy_vtype','$dboy_vno','$dboy_address')";

$run_dboy = mysqli_query($con,$insert_dboy);


if($run_dboy){

echo "<script>alert('One dboy Has Been Inserted successfully')</script>";

echo "<script>window.open('index.php?view_dboy','_self')</script>";

}


}


?>



<?php }  ?>