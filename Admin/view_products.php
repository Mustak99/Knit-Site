<?php 
include 'includes/sidebar.php';
include 'includes/db.php'; 
?>
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4" style="width: 70% !important;">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">View Products</h6>
<!--                        <a href="">Show All</a>-->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;

                                $get_pro = "select * from products";
                                //$get_c = "select * from sellers";
                                $run_pro = mysqli_query($connection, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['id'];
                                    $pro_name = $row_pro['name'];
                                  

                                    $pro_title = $row_pro['description'];

                                    // $pro_image = $row_pro[''];

                                    $pro_price = $row_pro['price'];

                                    //$pro_keywords = $row_pro['product_keywords'];

                                    $pro_brandname= $row_pro['brand_name'];

                                    $i++;
                                    ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $pro_name  ; ?></td> 

                                        <td><?php echo $pro_title; ?></td>
                                        
                                        

                                        <!-- <td><img src="/newkidsland/includes/images/product/<?php echo $pro_image; ?>" width="60" height="60"></td> -->

                                        <td>₹ <?php echo $pro_price; ?></td>

                                        <!--<td> <?php //echo $pro_keywords;  ?> </td>-->

                                        <td><?php echo $pro_brandname; ?></td>

                                        <td>

                                            <a href="delete_product.php?delete_product=<?php echo $pro_id; ?>">

                                                <i class="fa fa-trash-o"> </i> Delete

                                            </a>

                                        </td>

                                        <td>

                                            <a href="edit_product.php?edit_product=<?php echo $pro_id; ?>">

                                                <i class="fa fa-pencil"> </i> Edit

                                            </a>

                                        </td>

                                    </tr>

<?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

