<?php
include '../database.php';
include 'includes/sidebar.php';
?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Insert Coupons</h6>
                <form method="post">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Coupon Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="coupon_title" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Coupon Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="coupon_price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Coupon Limit</label>
                        <div class="col-sm-10">
                            <input type="number" value="1" class="form-control" name="coupon_limit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="row mb-3">Select Product</label>
                        <?php
                        $cquery = "SELECT * FROM products";
                        $cresult = $con->query($cquery);
                        if ($cresult->num_rows > 0) {
                            $options = mysqli_fetch_all($cresult, MYSQLI_ASSOC);
                        }
                        ?>
                        <select name="product_title" class="form-select mb-3" aria-label="Default select example">
                            <!--                                    <option>Select Brand</option>-->
                            <?php
                            foreach ($options as $option) {

                                echo' <option value="' . $option['product_id'] . '">' . $option['product_title'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Coupon Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="coupon_code">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="coupon">Create Coupon</button>
                </form>
            </div>
        </div>
    </div>

</div>



<?php 

if(isset($_POST['coupon'])){

    $coupon_title = $_POST['coupon_title'];
    $coupon_price = $_POST['coupon_price'];
    $coupon_code = $_POST['coupon_code'];
    $coupon_limit = $_POST['coupon_limit'];
    $coupon_pro_id = $_POST['product_title'];
    

    $coupon_used=0;

    $get_coupons = "select * from coupons where product_id='$coupon_pro_id' or coupon_code='$coupon_code'";
    $run_coupons = mysqli_query($con,$get_coupons);
    $check_coupons = mysqli_num_rows($run_coupons);

    if($check_coupons==1){

        echo "<script>alert('Coupon Code / Product Already Added. Choose Another Coupon Code / Product')</script>";

    }else{

        $insert_coupon = "insert into coupons (product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used)values('$coupon_pro_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";
        $run_coupon = mysqli_query($con,$insert_coupon);

        if($run_coupon){

            echo "<script>alert('Your Coupon Has Been Created')</script>";
            echo "<script>window.open('view_coupon.php?view_coupon','_self')</script>";

        }

    }

}

?>

