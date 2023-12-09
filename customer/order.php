<?php
$order = 1;
include_once '../head.php';
include_once '../header.php';
include_once '../navbar.php';

if (!isset($_SESSION["CustomerUserID"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "knitsite");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$customer_id = $_SESSION["CustomerUserID"];

// Retrieve orders and their associated items using a JOIN query
$query = "SELECT o.order_id, o.order_date, o.status, o.reject_reason, oi.product_id, p.name AS product_name, p.image_path, oi.quantity, oi.total_price
          FROM orders o
          JOIN order_items oi ON o.order_id = oi.order_id
          JOIN products p ON oi.product_id = p.id
          WHERE o.customer_id = $customer_id
          ORDER BY o.order_date DESC";

$result = $conn->query($query);
echo '        <div class="row">';
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $order_id = $row["order_id"];
        $order_date = $row["order_date"];
        $status = $row["status"];
        $product_name = $row["product_name"];
        $quantity = $row["quantity"];
        $total_price = $row["total_price"];
        $image_path = $row["image_path"];
        $reject_reason = $row["reject_reason"];
        $order_date = date('Y-m-d', strtotime($order_date));
        // Calculate the expected delivery date (2 days after order date)
        $expected_delivery_date = date('Y-m-d', strtotime($order_date . ' + 2 days'));

        // Wrap the existing code in the provided UI structure
        echo '
        <div class="col-4">
            <div class="card card-stepper" style="border-radius: 16px; margin-top:10px;">
                <div class="card-header p-4">
                    <div class="row">
                        <div class="col">
                            <p class="text-muted mb-0"> Delivery: <span class="fw-bold text-body">' . $status . '</span> </p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex flex-row mb-4 pb-2">
                        <div class="flex-fill">
                            <h5 class="bold">' . $product_name . '</h5>
                            <p class="text-muted"> Qt: ' . $quantity . ' item</p>
                            <h5 class="mb-3"> ₹ ' . $total_price . '</h5>
                            <p class="text-muted">Delivered By: <span class="text-body">' . $expected_delivery_date . '</span></p>';
        
        // Display reject reason if the status is "Rejected"
        if ($status == "Reject") {
            echo '<p class="text-muted" >Reject Reason: <span class="text-body" style="color:red !important;font-size:15px">' . $reject_reason . '</span></p>';
        }
        
        echo '
                        </div>
                        <div>
                            <img class="align-self-center img-fluid" src="../seller/' . $image_path . '" width="250" style="height:200px">
                        </div>
                    </div>
                </div>
               
            </div>
        </div>';
    }
    echo '</div>';
} else {
    echo "Error retrieving orders: " . $conn->error;
}

// Close the database connection when done.
$conn->close();
?>
