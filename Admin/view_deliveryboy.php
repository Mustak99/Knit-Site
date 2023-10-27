<?php
include 'includes/sidebar.php';
include 'includes/db.php';
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">View Delivery Boy</h6>
            <!--                        <a href="">Show All</a>-->
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">

                <thead><!-- thead Starts -->

                    <tr>

                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <!-- <th>Country</th> -->
                        <!-- <th>City</th> -->
                        <th>Phone Number</th>
                        <th>Delete</th>


                    </tr>

                </thead><!-- thead Ends -->


                <tbody><!-- tbody Starts -->

                    <?php
                    $i = 0;

                    $get_c = "select * from delivery_boy";

                    $run_c = mysqli_query($con, $get_c);

                    while ($row_c = mysqli_fetch_array($run_c)) {

                        $c_id = $row_c['delivery_id'];

                        $c_name = $row_c['delivery_name'];

                        $c_email = $row_c['delivery_email'];

                        $c_image = $row_c['delivery_image'];

// $c_country = $row_c['seller_country'];
//$c_city = $row_c['seller_city'];

                        $c_contact = $row_c['delivery_contact'];

                        $i++;
                        ?>

                        <tr>

                            <td><?php echo $i; ?></td>

                            <td><?php echo $c_name; ?></td>

                            <td><?php echo $c_email; ?></td>

                            <td><img src="../admin_area/admin_images/<?php echo $c_image; ?>" width="60" height="60" ></td>

        <!-- <td><?php echo $c_country; ?></td> -->

        <!-- <td><?php echo $c_city; ?></td> -->

                            <td><?php echo $c_contact; ?></td>

                            <td>

                                <a href="delete_sellers.php?delete_sellers=<?php echo $c_id; ?>" >

                                    <i class="fa fa-trash-o" ></i> Delete

                                </a>


                            </td>


                        </tr>

                    <?php } ?>


                </tbody><!-- tbody Ends -->
            </table>
        </div>
    </div>
</div>
