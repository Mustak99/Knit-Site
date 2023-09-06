<?php
$cart=1;
include_once '../head.php' ?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include_once '../header.php';

  ?>
      <script>
    $(document).ready(function () {
        // Listen for changes in quantity input fields
        $("input[name='quantity']").on("change", function () {
            var productId = $(this).attr("id").replace("quantity_", ""); // Extract the product ID
            var newQuantity = $(this).val(); // Get the new quantity value
            var productPrice = $(this).data("price"); // Get the product price from data attribute
            var totalElement = $(this).closest("tr").find(".total"); // Get the total element in the same row

            // Send an AJAX request to update the quantity in the database
            $.ajax({
                url: "update_quantity.php", // Replace with the URL of your PHP script for updating quantity
                method: "POST",
                data: {
                    productId: productId,
                    newQuantity: newQuantity
                },
                success: function (response) {
                    // Handle the response, e.g., display a success message
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    // Handle errors, e.g., display an error message
                    console.error(error);
                }
            });

            // Calculate and update the total
            var total = productPrice * newQuantity;
            totalElement.text("$" + total.toFixed(2)); // Update the total with 2 decimal places
        });
    });
</script>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 90px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="../HomePage.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <?php
    if(isset($_SESSION["SellerUserID"])){
        $customer_id=$_SESSION["SellerUserID"];
    }
    else{
        $customer_id=$_SESSION["CustomerUserID"];
    }

    $conn = new mysqli("localhost","root","","knitsite");
   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "SELECT c.id, c.quantity, c.price, p.name AS product_name, p.image_path
    FROM cart c
    JOIN products p ON c.product_id = p.id WHERE c.user_id = $customer_id";

    $result = $conn->query($sql);
?>

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='align-middle'><img src='../seller/" . $row['image_path'] . "' alt='' style='width: 50px;'>" . $row['product_name'] ."</td>";
                            echo "<td class='align-middle'>" . $row['price'] . "</td>";
                            echo "<td class='align-middle'>";
                            echo "<div class='input-group quantity mx-auto' style='width: 100px;'>";
                            echo "<input type='number' min='1' class='form-control form-control-sm bg-secondary text-center' name='quantity' value='" . $row['quantity'] . "' id='quantity_" . $row['id'] . "' data-price='" . $row['price'] . "'>";
                            echo "</div>";
                            echo "</td>";
                            echo "<td class='align-middle total'>" . ($row['price'] * $row['quantity']) . "</td>";
                            echo "<td class='align-middle'><a class='btn btn-sm btn-primary' href='delete_product.php?productId=".$row['id']."'><i class='fa fa-times'></i></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <?php

$sql = "SELECT c.id, c.quantity, p.price, p.name AS product_name, p.image_path
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = $customer_id";

$result = $conn->query($sql);

$subTotal = 0;
$shippingCost = 10; 
?>

<!-- Cart Summary HTML -->
<div class="card border-secondary mb-5">
    <div class="card-header bg-secondary border-0">
        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Subtotal</h6>
            <h6 class="font-weight-medium" id="subtotal">$0.00</h6>
        </div>
        <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Shipping</h6>
            <h6 class="font-weight-medium">$<?php echo $shippingCost; ?></h6>
        </div>
    </div>
    <div class="card-footer border-secondary bg-transparent">
        <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Total</h5>
            <h5 class="font-weight-bold" id="total">$0.00</h5>
        </div>
        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
    </div>
</div>

<script>
$(document).ready(function () {
    // Function to calculate and update the cart summary
    function updateCartSummary() {
        var subtotal = 0;

        // Loop through each row in the cart table
        $("tbody tr").each(function () {
            var quantity = parseInt($(this).find("input[name='quantity']").val());
            var price = parseFloat($(this).find("input[name='quantity']").data("price"));
            var total = quantity * price;
            subtotal += total;
        });

        // Update the subtotal and total in the cart summary
        $("#subtotal").text("$" + subtotal.toFixed(2));
        var total = subtotal + <?php echo $shippingCost; ?>;
        $("#total").text("$" + total.toFixed(2));
    }

    // Listen for changes in quantity input fields
    $("input[name='quantity']").on("change", function () {
        var productId = $(this).attr("id").replace("quantity_", ""); // Extract the product ID
        var newQuantity = $(this).val(); // Get the new quantity value
        var productPrice = $(this).data("price"); // Get the product price from data attribute
        var totalElement = $(this).closest("tr").find(".total"); // Get the total element in the same row

        // Send an AJAX request to update the quantity in the database (your existing code)

        // Calculate and update the total
        var total = productPrice * newQuantity;
        totalElement.text("$" + total.toFixed(2)); // Update the total with 2 decimal places

        // Update the cart summary
        updateCartSummary();
    });

    // Initial cart summary update
    updateCartSummary();
});
</script>


    

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


</body>

</html>