<?php
include 'includes/db.php';
include 'includes/sidebar.php';
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">View Coupon</h6>
            <!--                        <a href="">Show All</a>-->
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">#</th>
                        <th scope="col">Coupon Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Coupon Price</th>
                        <th scope="col">Coupon Code</th>
                        <th scope="col">Limit</th>
                        <th scope="col">Used</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>                                    
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 0;
                    $get_coupons = "select * from coupons";
                    $run_coupons = mysqli_query($con, $get_coupons);

                    while ($row_coupons = mysqli_fetch_array($run_coupons)) {

                        $coupon_id = $row_coupons['coupon_id'];
                        $coupon_pro_id = $row_coupons['product_id'];
                        $coupon_title = $row_coupons['coupon_title'];
                        $coupon_price = $row_coupons['coupon_price'];
                        $coupon_code = $row_coupons['coupon_code'];
                        $coupon_limit = $row_coupons['coupon_limit'];
                        $coupon_used = $row_coupons['coupon_used'];

                        $get_products = "select * from products where product_id='$coupon_pro_id'";

                        $run_products = mysqli_query($con, $get_products);
                        $row_products = mysqli_fetch_array($run_products);

                        $product_title = $row_products['product_title'];

                        $i++;
                        ?>

                        <tr>

                            <td><?php echo $i; ?></td>
                            <td><?php echo $coupon_title; ?></td>
                            <td><?php echo $product_title; ?></td>
                            <td>₹ <?php echo $coupon_price; ?></td>
                            <td><?php echo $coupon_code; ?></td>
                            <td><?php echo $coupon_limit; ?></td>
                            <td><?php echo $coupon_used; ?></td>
                            <td>

                                <a href="index.php?edit_coupon=<?php echo $coupon_id ?>">

                                    <i class="fa fa-pencil"></i> Edit

                                </a>

                            </td>
                            <td>

                                <a href="index.php?delete_coupon=<?php echo $coupon_id ?>"> 

                                 Delete

                                </a>

                            </td>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>