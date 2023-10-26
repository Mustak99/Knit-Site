<?php
require_once 'email.php';
include_once("commonMethod.php");

// Check if the required parameters are provided in the URL
if (isset($_GET['id']) && isset($_GET['status'])) {
    $orderId = $_GET['id'];
    $newStatus = $_GET['status'];

    // Update the order status and quantity based on the provided value
    if ($newStatus == 'Reject') {
        $updateQuery = "UPDATE orders SET status = ? WHERE order_id = ?";
    } else {
        $updateQuery = "UPDATE orders AS o
        JOIN order_items AS oi ON o.order_id = oi.order_id
        JOIN products AS p ON oi.product_id = p.id
        SET o.status = ?,
        p.quantity = p.quantity - oi.quantity
        WHERE o.order_id = ?";
    }

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

        // update quantity in product
        echo @$pendingOrder['Quantity'];
        header("Location: pendingOrder.php");
        exit;
    }

}
?>