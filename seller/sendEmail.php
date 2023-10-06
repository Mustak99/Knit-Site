<?php
require_once 'email.php';
include_once("commonMethod.php");

// Check if the required parameters are provided in the URL
if (isset($_GET['id']) && isset($_GET['status'])) {
    $orderId = $_GET['id'];
    $newStatus = $_GET['status'];

    // Update the order status based on the provided status value
    $updateQuery = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param("si", $newStatus, $orderId);

    if ($stmt->execute()) {
        // Status updated successfully
        $stmt->close();
        $con->close();

        $customerEmail = fetchCustomerEmailForOrders(connection(), @$sellerId);
        // Pass the $newStatus to the fetchOrderStatus function
        $orderStatus = $newStatus;

        // send mail
        $receiverEmail = $customerEmail;
        $Status = $orderStatus;
        $orderStatusNotification = new OrderStatusNotification($receiverEmail, $orderStatus);
        $orderStatusNotification->sendOrderStatusNotification();
        header("Location: pendingOrder.php");
        exit;
    }

}
?>