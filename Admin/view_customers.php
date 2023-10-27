<?php
include 'includes/sidebar.php';
include 'includes/db.php';
?>
   <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">View Customers</h6>
<!--                        <a href="">Show All</a>-->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Phone Number</th>
<!--                                    <th scope="col">Address</th>-->
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $i = 0;

                                $get_c = "select * from customers";

                                $run_c = mysqli_query($con, $get_c);

                                while ($row_c = mysqli_fetch_array($run_c)) {

                                    $c_id = $row_c['customer_id'];

                                    $c_name = $row_c['customer_name'];

                                    $c_email = $row_c['customer_email'];

                                    $c_image = $row_c['customer_image'];
                                    
                                    $c_contact = $row_c['customer_contact'];
                                    
                                    //$c_address = $row_c['customer_address'];


                                    $i++;
                                    ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $c_name; ?></td>

                                        <td><?php echo $c_email; ?></td>

                                        <td><img src="../admin_area/admin_images/<?php echo $c_image; ?>" width="60" height="60" ></td>
                                        
                                        <td><?php echo $c_contact; ?></td>
                                        
<!--                                        <td><?//php echo '$c_address';?></td>-->


                                        <td>

                                            <a href="delete_customers.php?delete_customers=<?php echo $c_id; ?>" >

                                                <i class="fa fa-trash-o" ></i> Delete

                                            </a>


                                        </td>


                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
   </div>
