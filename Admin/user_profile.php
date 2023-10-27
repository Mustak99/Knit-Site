<?php 
include 'includes/sidebar.php';
include 'includes/db.php';
?>
<?php

$admin_email = $_SESSION['admin_email'];

$get_admin = "select * from admin where admin_email='.$admin_email.'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_pass = $row_admin['admin_pass'];

$admin_image = $row_admin['admin_image'];

$new_admin_image = $row_admin['admin_image'];

// $seller_country = $row_seller['seller_country'];

// $seller_job = $row_seller['seller_job'];

$admin_contact = $row_admin['admin_contact'];

// $seller_about = $row_seller['seller_about'];

?>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Edit Profile</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                  
                                    <label class="col-sm-2 col-form-label">Admin Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Admin Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Admin Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="admin_pass" class="form-control" required value="<?php echo $admin_pass; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Admin Contact</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">
                                    </div>
                                </div>                                     
                                <div class="mb-3">
                                    <label class="form-label">Admin Image</label>
                                    <input class="form-control" type="file" name="product_img1">
                                    <img src="..admin_area/admin_images/<?Php echo $admin_image; ?>" width="70" height="70" >

                                </div>
                                <input type="submit" class="btn btn-primary" name="update" value="Update Profile">
                            </form>
                        </div>
                    </div>
                </div>
                    
</div>


<?php

if(isset($_POST['update'])){

$admin_name = $_POST['admin_name'];

$admin_email = $_POST['admin_email'];

$admin_pass = $_POST['admin_pass'];

//$seller_country = $_POST['seller_country'];

//$seller_job = $_POST['seller_job'];

$admin_contact = $_POST['admin_contact'];

//$seller_about = $_POST['seller_about'];


$admin_image = $_FILES['admin_image']['name'];

//$temp_seller_image = $_FILES['seller_image']['tmp_name'];

move_uploaded_file($temp_admin_image,"admin_area/admin_images/$admin_image");

if(empty($admin_image)){

$admin_image = $new_admin_image;

}

$update_admin = "update admin set admin_name='$admin_name',admin_email='$admin_email',admin_pass='$admin_pass',admin_image='$admin_image',admin_contact='$admin_contact'where admin_id='$admin_id'";

$run_admin = mysqli_query($connection,$update_admin);

if($run_admin){

echo "<script>alert('Admin Has Been Updated successfully and login again')</script>";

echo "<script>window.open('admin_login.php','_self')</script>";

session_destroy();

}

}


?>



