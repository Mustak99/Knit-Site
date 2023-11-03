<?php
session_start();
?>
<?php

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}

include_once("database.php");
$con = connection();

// fetch user name 
function getFullNameByUserId($con, $user_id)
{
    $name = '';
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT full_name FROM delivery_boys WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['full_name'];
    }

    $stmt->close();
    return $name;
}

// fetch order
function getUserOrder($con, $user_id)
{
    $query = "SELECT
            dbo.order_id AS order_id,
            c.UserFirstName AS customer_name,
            o.order_date,
            p.name AS product_name,
            p.description AS product_description,
            p.price AS product_price,
            oi.quantity
        FROM delivery_boy_order dbo
        INNER JOIN orders o ON dbo.order_id = o.order_id
        INNER JOIN customerregistration c ON o.customer_id = c.UserId
        INNER JOIN order_items oi ON o.order_id = oi.order_id
        INNER JOIN products p ON oi.product_id = p.id
        WHERE dbo.delivery_boy_id = ? 
        AND (o.status = 'Dispatch' OR o.status = 'Pending')";


    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $userOrders = array();

    while ($row = $result->fetch_assoc()) {
        $userOrders[] = array(
            'order_id' => $row['order_id'],
            'customer_name' => $row['customer_name'],
            'order_date' => $row['order_date'],
            'product_name' => $row['product_name'],
            'product_description' => $row['product_description'],
            'product_price' => $row['product_price'],
            'quantity' => $row['quantity']
        );
    }

    $stmt->close();

    return $userOrders;
}


// fetch complete order
function getCompleteOrder($con, $user_id)
{
    $query = "SELECT
            dbo.order_id AS order_id,
            c.UserFirstName AS customer_name,
            o.order_date,
            p.name AS product_name,
            p.description AS product_description,
            p.price AS product_price,
            oi.quantity
        FROM delivery_boy_order dbo
        INNER JOIN orders o ON dbo.order_id = o.order_id
        INNER JOIN customerregistration c ON o.customer_id = c.UserId
        INNER JOIN order_items oi ON o.order_id = oi.order_id
        INNER JOIN products p ON oi.product_id = p.id
        WHERE dbo.delivery_boy_id = ? 
        AND o.status = 'Complete'";


    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $completeOrders = array();

    while ($row = $result->fetch_assoc()) {
        $completeOrders[] = array(
            'order_id' => $row['order_id'],
            'customer_name' => $row['customer_name'],
            'order_date' => $row['order_date'],
            'product_name' => $row['product_name'],
            'product_description' => $row['product_description'],
            'product_price' => $row['product_price'],
            'quantity' => $row['quantity']
        );
    }

    $stmt->close();

    return $completeOrders;
}

?>