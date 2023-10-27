<?php
include 'includes/db.php';
include 'includes/sidebar.php';
?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">View Payments</h6>
            <!--                        <a href="">Show All</a>-->
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">#</th>
                        <th scope="col">Customer Id</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Payment Date</th>
                        <th scope="col">Payment Mode</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;

                    $get_payments = "select * from payments";

                    $run_payments = mysqli_query($con, $get_payments);

                    while ($row_payments = mysqli_fetch_array($run_payments)) {

                        $payment_id = $row_payments['payment_id'];
                        
                        $customer_id = $row_payments['customer_id'];
                        
                        $order_id = $row_payments['order_id'];

                        $payment_date = $row_payments['payment_date'];

                        $payment_mode = $row_payments['payment_mode'];
                        
                        $payment_id = $row_payments['order_id'];

                        $i++;
                        ?>


                        <tr>

                            <td><?php echo $i; ?></td>
                             
                            <td><?php echo $customer_id; ?></td>
                            
                            <td><?php echo $order_id;  ?></td>
                            
                            <td<?php echo $payment_id;?>></td>

                            <td><?php echo $payment_date; ?></td>

                            <td><?php echo $payment_mode; ?></td>

                            <td>

                                <a href="view_payments.php?payment_delete=<?php echo $payment_id; ?>" >

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