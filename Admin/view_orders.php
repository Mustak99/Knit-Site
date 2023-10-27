<?php
include 'includes/db.php';
include 'includes/sidebar.php';
?>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">View Orders</h6>
<!--            <a href="">Show All</a>-->
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;

                    $get_orders = "select * from customer_orders";

                    $run_orders = mysqli_query($con,$get_orders);

                    while ($row_orders = mysqli_fetch_array($run_orders)) {

                    $order_id = $row_orders['order_id'];

                    $c_id = $row_orders['customer_id'];

                    //$invoice_no = $row_orders['invoice_no'];

                    $product_id = $row_orders['product_id'];

                    $qty = $row_orders['qty'];

                    //$size = $row_orders['size'];

                    $order_status = $row_orders['order_status'];

                    $get_products = "select * from products where product_id='$product_id'";

                    $run_products = mysqli_query($con,$get_products);

                    $row_products = mysqli_fetch_array($run_products);

                    //$product_title = $row_products['product_title'];

                    $i++;

                    ?>

                    <tr>

                        <td><?php echo $i; ?></td>

                        <td>
                            <?php
                            $get_customer = "select * from customers where customer_id='$c_id'";

                            $run_customer = mysqli_query($con, $get_customer);

                            $row_customer = mysqli_fetch_array($run_customer);

                            $customer_email = $row_customer['customer_email'];

                            echo $customer_email;
                            ?>
                        </td>

<!-- <td bgcolor="orange" ><?php echo $invoice_no; ?></td> -->

                        <td><?php echo $product_id; ?></td>

                        <td><?php echo $qty; ?></td>

<!-- <td><?php echo $size; ?></td> -->

                        <td>
<?php
$get_customer_order = "select * from customer_orders where order_id='$order_id'";

$run_customer_order = mysqli_query($con, $get_customer_order);

$row_customer_order = mysqli_fetch_array($run_customer_order);

$order_date = $row_customer_order['order_date'];

$amount = $row_customer_order['amount'];

echo $order_date;
?>
                        </td>

                        <td>₹<?php echo $amount; ?></td>

                        <td>
<?php
if($order_status=='pending'){

echo $order_status = '<div style="color:red;">Pending</div>';

}
else{

echo $order_status = 'Completed';

}
?>
                        </td>

                        <td>

                            <a href="view_orders.php?order_delete=<?php echo $order_id; ?>" >

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