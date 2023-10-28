<?php
session_start();
if (isset($_SESSION["SellerUserID"])) {
    $customer_id = $_SESSION["SellerUserID"];
} else {
    $customer_id = $_SESSION["CustomerUserID"];
}

$conn = new mysqli("localhost", "root", "", "knitsite");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$order_status = "Pending"; 

$insert_order_sql = "INSERT INTO orders (customer_id, status) VALUES ($customer_id, '$order_status')";

if ($conn->query($insert_order_sql) === TRUE) {

    $order_id = $conn->insert_id;

    $cart_sql = "SELECT c.product_id, c.quantity, p.price
                FROM cart c
                JOIN products p ON c.product_id = p.id
                WHERE c.user_id = $customer_id";

    $cart_result = $conn->query($cart_sql);

    if ($cart_result) {
        while ($cart_row = $cart_result->fetch_assoc()) {
            $product_id = $cart_row["product_id"];
            $quantity = $cart_row["quantity"];
            $price = $cart_row["price"];
            $total_price = $price * $quantity+10;

            $insert_order_item_sql = "INSERT INTO order_items (order_id, product_id, quantity, total_price)
                VALUES ($order_id, $product_id, $quantity, $total_price)";

            // Execute the query to insert into 'order_items' table
            if ($conn->query($insert_order_item_sql) === TRUE) {
                // The item has been successfully added to the order, now we can delete it from the cart.
                $delete_from_cart_sql = "DELETE FROM cart WHERE user_id = $customer_id AND product_id = $product_id";

                // Execute the query to delete the item from the cart
                if (!$conn->query($delete_from_cart_sql)) {
                    echo "Error deleting item from the cart: " . $conn->error;
                }
            } else {
                echo "Error creating order item: " . $conn->error;
            }
        }
    }
    header("Location: ../customer/order.php");
    exit;

} else {
    echo "Error creating order: " . $conn->error;
}

// Close the database connection when done.
$conn->close();
?>
