<?php

if (isset($_SESSION["SellerUserID"])) {
    $sellerId = $_SESSION["SellerUserID"];
    // echo "Seller ID: " . $sellerId;
}

include_once("database.php");
$con = connection();

//fetch total product
function totalProduct($con, $sellerId)
{
    $query = "SELECT count(id) as id FROM products where SID=$sellerId";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

//fetch total quantity

function totalQuantity($con, $sellerId)
{
    $query = "SELECT sum(quantity) as quantity FROM products where SID=$sellerId";
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantity = $row['quantity'];

        // Check if quantity is 0 and return 0 in that case
        if ($quantity == 0) {
            return 0;
        }

        return $quantity;
    }

    // Return 0 if there are no rows in the result
    return 0;
}


//fetch total revenue

function totalRevenue($con, $sellerId)
{
    $query = "SELECT count(id) as id FROM products where SID=$sellerId";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

//fetch total product

function total($con, $sellerId)
{
    $query = "SELECT count(id) as id FROM products where SID=$sellerId";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

// total shirt

function totalShirt($con, $sellerId)
{
    $query = "SELECT count(id) as id FROM products where SID=$sellerId";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

// products details

function fetchProductsWithSizes($con, $sellerId)
{
    $products = array();
    $sql = "SELECT p.id, p.name, p.brand_name, p.description, p.price, p.category, p.quantity, p.image_path, p.status, GROUP_CONCAT(ps.size) AS sizes
        FROM products p
        LEFT JOIN product_size ps ON p.id = ps.product_id
        WHERE p.SID = $sellerId
        GROUP BY p.id
        ORDER BY p.id DESC";

    $result = $con->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $product = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'brand_name' => $row['brand_name'],
                'description' => $row['description'],
                'price' => $row['price'],
                'category' => $row['category'],
                'quantity' => $row['quantity'],
                'status' => $row['status'],
                'image_path' => $row['image_path'],
                'sizes' => $row['sizes']
            );
            $products[] = $product;
        }
    }

    return $products;
}

//fetch total mens 

function totalmen($con, $sellerId)
{
    $query = "SELECT count(id) as id FROM products where SID=$sellerId AND category='Mens'";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalmens = $row['id'];
        return $totalmens;
    }
}

//fetch total women

function totalwomen($con, $sellerId)
{
    $query = "SELECT count(id) as id FROM products where SID=$sellerId AND category='Womens'";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalwomens = $row['id'];
        return $totalwomens;
    }
}

//fetch total children 

function totalchildren($con, $sellerId)
{
    $query = "SELECT count(id) as id FROM products where SID=$sellerId AND category='Childrens'";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalchildrens = $row['id'];
        return $totalchildrens;
    }
}

// fetch pending orders

function fetchPendingOrders($con, $sellerId)
{
    // Query to retrieve pending orders with product names
    $query = "SELECT o.order_id, o.customer_id, o.order_date, o.status, p.name, oi.quantity, oi.total_price
              FROM orders o
              JOIN order_items oi ON o.order_id = oi.order_id
              JOIN products p ON oi.product_id = p.id
              WHERE o.status = 'Pending'";

    $result = $con->query($query);

    if ($result === false) {
        die("Error in SQL query: " . $con->error);
    }

    $pendingOrders = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pendingOrders[] = array(
                "OrderID" => $row["order_id"],
                "CustomerID" => $row["customer_id"],
                "OrderDate" => $row["order_date"],
                "Status" => $row["status"],
                "ProductName" => $row["name"],
                "Quantity" => $row["quantity"],
                "TotalPrice" => $row["total_price"]
            );
        }
    }

    $con->close();

    return $pendingOrders;
}

// fetch complete order

function fetchCompleteOrders($con, $sellerId)
{
    // Query to retrieve pending orders with product names
    $query = "SELECT o.order_id, o.customer_id, o.order_date, o.status, p.name, oi.quantity, oi.total_price
              FROM orders o
              JOIN order_items oi ON o.order_id = oi.order_id
              JOIN products p ON oi.product_id = p.id
              WHERE o.status = 'Dispatch'";

    $result = $con->query($query);

    if ($result === false) {
        die("Error in SQL query: " . $con->error);
    }

    $completeOrders = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $completeOrders[] = array(
                "OrderID" => $row["order_id"],
                "CustomerID" => $row["customer_id"],
                "OrderDate" => $row["order_date"],
                "Status" => $row["status"],
                "ProductName" => $row["name"],
                "Quantity" => $row["quantity"],
                "TotalPrice" => $row["total_price"]
            );
        }
    }

    $con->close();

    return $completeOrders;
}

// fetch reject order

function fetchRejectOrders($con, $sellerId)
{
    // Query to retrieve pending orders with product names
    $query = "SELECT o.order_id, o.customer_id, o.order_date, o.status, p.name, oi.quantity, oi.total_price
              FROM orders o
              JOIN order_items oi ON o.order_id = oi.order_id
              JOIN products p ON oi.product_id = p.id
              WHERE o.status = 'Reject'";

    $result = $con->query($query);

    if ($result === false) {
        die("Error in SQL query: " . $con->error);
    }

    $rejectOrders = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rejectOrders[] = array(
                "OrderID" => $row["order_id"],
                "CustomerID" => $row["customer_id"],
                "OrderDate" => $row["order_date"],
                "Status" => $row["status"],
                "ProductName" => $row["name"],
                "Quantity" => $row["quantity"],
                "TotalPrice" => $row["total_price"]
            );
        }
    }

    $con->close();

    return $rejectOrders;
}

// fetch customer email

function fetchCustomerEmailForOrders($con, $sellerId)
{
    // Query to retrieve customer email for pending orders with a status of 'Reject'
    $query = "SELECT cr.EmailAddress AS customer_email
          FROM orders o
          JOIN customerregistration cr ON o.customer_id = cr.Userid
          WHERE o.status IN ('Dispatch', 'Reject')";

    $result = $con->query($query);

    if ($result === false) {
        die("Error in SQL query: " . $con->error);
    }

    $customerEmail = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $customerEmail = $row["customer_email"];
        }
    }

    $con->close();

    return $customerEmail;
}

// fetch order status

function fetchOrderStatus($con, $sellerId)
{
    // Query to retrieve pending orders with product names
    $query = "SELECT o.status
              FROM orders o
              JOIN order_items oi ON o.order_id = oi.order_id
              JOIN products p ON oi.product_id = p.id";

    $result = $con->query($query);

    if ($result === false) {
        die("Error in SQL query: " . $con->error);
    }

    $orderStatus = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orderStatus = $row["status"];
        }
    }

    $con->close();

    return $orderStatus;
}

?>