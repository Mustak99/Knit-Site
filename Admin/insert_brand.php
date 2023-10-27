<?php 
include 'includes/sidebar.php';
include 'includes/db.php';
?>
<script>
		function isFname(evt) 
		{
 		   evt = (evt) ? evt : window.event;
  			var charCode = (evt.which) ? evt.which : evt.keyCode;
			var tel = document.getElementById('example-text-input-1');
  			if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) ) 
			{
    				return false;
 			}
  			else
		        {
				if (tel.value.length < 20)
				{
					return true;
				}
				else
				{
					//alert("Please enter only Alphabets Numbers.");
					return false;
				}
			}
		}
      </script>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Insert Products Brand</h6>
                            <form method="post">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Brand</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="example-text-input-1" name="brand_name" mexlength="30" tabindex="0" onkeypress="return isFname(event)" required>
                                        <span id="usernamecheck" style="color: red;"></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="brand">Insert Product Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
                    
</div>


<?php

if(isset($_POST['brand'])){
    
$brand_name = mysqli_real_escape_string($con,$_POST['brand_name']);

$get_user = " INSERT INTO brand (brand_name) VALUES "
        . "('".$brand_name."')";

mysqli_query($con,$get_user);

echo "<script>alert('successfully inserted!')</script>";

echo "<script>window.open('view_brand.php','_self')</script>";

}

?>