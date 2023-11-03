<?php
include_once("commonMethod.php");

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Update the order status to "Complete" in your database
    $con = connection();

    $updateQuery = "UPDATE orders SET status = 'Complete' WHERE order_id = ?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        // Status updated successfully
        $stmt->close();
        $con->close();
        header("Location: order.php");
        exit();
    } else {
        // Handle the update error
        $stmt->close();
        $con->close();
        echo "Failed to update order status.";
    }
} else {
    // Handle the case where 'id' is not provided in the URL
    echo "Invalid request.";
}
?>