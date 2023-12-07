<?php
include_once("commonMethod.php");

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Get the delivery_boy_id from the session
    if (isset($_SESSION['user_id'])) {
        $delivery_boy_id = $_SESSION['user_id'];

        // Update the order status to "Complete" in your database
        $con = connection();

        $updateQuery = "UPDATE orders SET status = 'Complete' WHERE order_id = ?";
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("i", $order_id);

        if ($stmt->execute()) {
            // Status updated successfully

            // Insert a record into the delivery_boy_finances table
            $insertQuery = "INSERT INTO delivery_boy_finances (delivery_boy_id, order_id, earning_amount, floating_cash) VALUES (?, ?, ?, ?)";
            $insertStmt = $con->prepare($insertQuery);

            $earning_amount = 30;
            $floating_cash = 30;
            $insertStmt->bind_param("iidd", $delivery_boy_id, $order_id, $earning_amount, $floating_cash);

            if ($insertStmt->execute()) {
                // Finance record inserted successfully

                // Update the status in the delivery_boy_order table
                $updateOrderQuery = "UPDATE delivery_boy_order SET status = 'done' WHERE order_id = ?";
                $updateOrderStmt = $con->prepare($updateOrderQuery);
                $updateOrderStmt->bind_param("i", $order_id);

                if ($updateOrderStmt->execute()) {
                    // Order status in delivery_boy_order table updated successfully
                } else {
                    // Handle the update error for delivery_boy_order table
                    echo "Failed to update delivery_boy_order status.";
                }

            } else {
                // Handle the insert error
                echo "Failed to insert finance record.";
            }

            $stmt->close();
            $insertStmt->close();
            $updateOrderStmt->close();
            $con->close();
            header("Location: order.php");
            exit();
        } else {
            // Handle the update error for orders table
            $stmt->close();
            $con->close();
            echo "Failed to update order status.";
        }
    } else {
        // Handle the case where 'delivery_boy_id' is not found in the session
        echo "Delivery boy ID not found in session.";
    }
} else {
    // Handle the case where 'id' is not provided in the URL
    echo "Invalid request.";
}
?>