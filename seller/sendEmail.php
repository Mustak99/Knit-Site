<?php
require_once 'email.php';
include_once("commonMethod.php");

if (isset($_GET['id']) && isset($_GET['status'])) {
    // Sanitize user input
    $orderId = (int) $_GET['id'];
    $newStatus = $_GET['status'];

    $con = new mysqli('localhost', 'root', '', 'knitsite');

    if ($con->connect_error) {
        die("Database connection failed: " . $con->connect_error);
    }

    // Update the order status and quantity based on the provided value
    if ($newStatus == 'Reject') {
        // Get the reason for rejection from the URL
        $reason = isset($_GET['reason']) ? $_GET['reason'] : '';

        // Update the order status and rejection reason
        $updateQuery = "UPDATE orders SET status = ?, reject_reason = ? WHERE order_id = ?";

        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("ssi", $newStatus, $reason, $orderId);
    } else {
        $updateQuery = "UPDATE orders AS o
        JOIN order_items AS oi ON o.order_id = oi.order_id
        JOIN products AS p ON oi.product_id = p.id
        SET o.status = ?,
        p.quantity = p.quantity - oi.quantity
        WHERE o.order_id = ?";

        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("si", $newStatus, $orderId);
    }

    if ($stmt->execute()) {
        // Status updated successfully
        $stmt->close();

        // Retrieve customer's email
        $customerEmailQuery = "SELECT cr.EmailAddress AS customer_email
        FROM orders o
        JOIN customerregistration cr ON o.customer_id = cr.Userid
        WHERE o.status IN ('Dispatch', 'Reject') AND o.order_id = ?";

        $stmt = $con->prepare($customerEmailQuery);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $customerEmail = $row['customer_email'];
        $stmt->close();

        $orderStatus = $newStatus;

        // Send an email notification
        $receiverEmail = $customerEmail;
        $orderStatusNotification = new OrderStatusNotification($receiverEmail, $orderStatus, $reason);

        try {
            $orderStatusNotification->sendOrderStatusNotification();
        } catch (Exception $e) {
            // Handle email sending errors here
            error_log("Email sending error: " . $e->getMessage());
        }

        // If it's a rejection, insert a refund record into the refunds table
        if ($newStatus == 'Reject') {

            // Calculate and define refund amount, customer_id, and order_id
            $refundQuery = "SELECT o.order_id, o.customer_id, SUM(oi.total_price) AS refund_amount
                            FROM orders o
                            JOIN order_items oi ON o.order_id = oi.order_id
                            WHERE o.status = 'reject' AND o.order_id = ?
                            GROUP BY o.order_id, o.customer_id";

            $stmtRefund = $con->prepare($refundQuery);
            $stmtRefund->bind_param("i", $orderId);

            $stmtRefund->execute();
            $stmtRefund->bind_result($orderId, $customerId, $refundAmount);

            // Fetch the result
            $stmtRefund->fetch();
            $stmtRefund->close();

            // Insert a refund record
            $insertRefundQuery = "INSERT INTO refunds (order_id, customer_id, refund_amount) VALUES (?, ?, ?)";
            $stmtInsertRefund = $con->prepare($insertRefundQuery);
            $stmtInsertRefund->bind_param("iid", $orderId, $customerId, $refundAmount);

            $stmtInsertRefund->execute();
            $stmtInsertRefund->close();
        }


        // Redirect to the pending order page
        header("Location: pendingOrder.php");
        exit;
    }

    // Close the database connection
    $con->close();
}
?>