<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Delivery Boy

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Delivery Boy

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>User Name</th>

<th>Email</th>

<th>Image</th>

<th>vtype</th>

<th>vno</th>

<th>Delete</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_dboy = "select * from dboy";

$run_dboy = mysqli_query($con,$get_dboy);

while($row_dboy = mysqli_fetch_array($run_dboy)){

$dboy_id = $row_dboy['dboy_id'];

$dboy_name = $row_dboy['dboy_name'];

$dboy_email = $row_dboy['dboy_email'];

$dboy_image = $row_dboy['dboy_image'];

$dboy_vtype = $row_dboy['dboy_vtype'];

$dboy_vno = $row_dboy['dboy_vno'];





?>

<tr>

<td><?php echo $dboy_name; ?></td>

<td><?php echo $dboy_email; ?></td>

<td><img src="dboy_images/<?php echo $dboy_image; ?>" width="60" height="60" ></td>

<td><?php echo $dboy_vtype; ?></td>

<td><?php echo $dboy_vno; ?></td>

<td>

<a href="index.php?dboy_delete=<?php echo $dboy_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>


</tr>


<?php } ?>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->





<?php }  ?>