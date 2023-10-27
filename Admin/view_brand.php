<?php 
include 'includes/sidebar.php';
include 'includes/db.php';
?>
<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">View Brand</h6>
<!--                        <a href="">Show All</a>-->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                              <tbody>
                                <?php
                                $i = 0;

                                $get_pro = "select * from brand";
                                //$get_c = "select * from sellers";
                                $run_pro = mysqli_query($connection, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $brand_id = $row_pro['brand_id'];

                                    $brand_name = $row_pro['brand_name'];

                                    $pro_date = $row_pro['date'];

                                    $i++;
                                    ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $brand_name; ?></td>

                                        <!--<td> <?php //echo $pro_keywords;  ?> </td>-->

                                        <td><?php echo $pro_date; ?></td>

                                        <td>

                                            <a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">

                                                <i class="fa fa-trash-o"> </i> Delete

                                            </a>

                                        </td>

                                        <td>

                                            <a href="edit_brand.php?edit_brand=<?php echo $brand_id; ?>">

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