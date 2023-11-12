<?php
include_once("commonMethod.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve order_id and delivery_boy_id from GET data
    $order_id = $_GET['order_id'];
    $delivery_boy_id = $_GET['delivery_boy_id'];

    // Insert the assignment into the delivery_boy_order table
    $con = connection();
    $query = "INSERT INTO `delivery_boy_order` (`order_id`, `delivery_boy_id`) VALUES (?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ii", $order_id, $delivery_boy_id);

    if ($stmt->execute()) {
        // Records inserted successfully, set a parameter for successful assignment
        header("Location: pendingOrder.php?assignment=success");
        exit;
    } else {
        // Assignment failed
        // Handle the error, show an error message, or redirect to an error page
        header("Location: error.php");
        exit;
    }

    $stmt->close();
    $con->close();
} else {
    // Handle invalid or unsupported request methods
    header("HTTP/1.0 405 Method Not Allowed");
    exit;
}
?>