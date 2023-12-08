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
            c.Address As address,
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
            'address' => $row['address'],
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
            c.Address As address,
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
            'address' => $row['address'],
            'quantity' => $row['quantity']
        );
    }

    $stmt->close();

    return $completeOrders;
}


// fetch current day earnings
function getCurrentDayEarnings($con, $user_id)
{
    $currentDate = date("Y-m-d");

    $sql = "SELECT SUM(earning_amount) AS total_earnings FROM delivery_boy_finances
            WHERE delivery_boy_id = ? AND DATE(last_transaction_date) = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $user_id, $currentDate);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_earnings'];
    } else {
        return 0;
    }
}


// fetch current week earnings
function getCurrentWeekEarnings($con, $user_id)
{
    $currentDate = date("Y-m-d");

    $startOfWeek = date("Y-m-d", strtotime("last monday", strtotime($currentDate)));

    $endOfWeek = date("Y-m-d", strtotime("next sunday", strtotime($currentDate)));

    $sql = "SELECT SUM(earning_amount) AS total_earnings FROM delivery_boy_finances
            WHERE delivery_boy_id = ? AND DATE(last_transaction_date) BETWEEN ? AND ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $user_id, $startOfWeek, $endOfWeek);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_earnings'];
    } else {
        return 0;
    }
}


// fetch current week earnings day-wise
function getCurrentWeekEarningsDayWise($con, $user_id)
{
    $currentDate = date("Y-m-d");
    $startOfWeek = date("Y-m-d", strtotime("last monday", strtotime($currentDate)));
    $endOfWeek = date("Y-m-d", strtotime("next sunday", strtotime($currentDate)));

    // Create an array with all days of the week as keys
    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    // Initialize earnings array with all days set to 0
    $earningsByDay = array_fill_keys($daysOfWeek, 0);

    $sql = "SELECT DAYNAME(last_transaction_date) AS transaction_day, SUM(earning_amount) AS total_earnings 
            FROM delivery_boy_finances
            WHERE delivery_boy_id = ? AND DATE(last_transaction_date) BETWEEN ? AND ?
            GROUP BY transaction_day
            ORDER BY MIN(last_transaction_date)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $user_id, $startOfWeek, $endOfWeek);
    $stmt->execute();

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        // Update earnings array with actual data for each day
        $earningsByDay[$row['transaction_day']] = $row['total_earnings'];
    }

    return $earningsByDay;
}


// fetch month wise  earnings
function getCurrentYearEarningsMonthWise($con, $user_id)
{
    $currentDate = date("Y-m-d");
    $startOfYear = date("Y-01-01", strtotime($currentDate));
    $endOfYear = date("Y-12-t", strtotime($currentDate));

    // Create an array with all months of the year as keys
    $monthsOfYear = [];
    for ($month = 1; $month <= 12; $month++) {
        $monthsOfYear[date('M', mktime(0, 0, 0, $month, 1))] = 0;
    }

    $sql = "SELECT DATE_FORMAT(last_transaction_date, '%b') AS transaction_month, SUM(earning_amount) AS total_earnings 
            FROM delivery_boy_finances
            WHERE delivery_boy_id = ? AND DATE(last_transaction_date) BETWEEN ? AND ?
            GROUP BY transaction_month
            ORDER BY MIN(last_transaction_date)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $user_id, $startOfYear, $endOfYear);
    $stmt->execute();

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        // Update earnings array with actual data for each month
        $monthsOfYear[$row['transaction_month']] = $row['total_earnings'];
    }

    return $monthsOfYear;
}


// fetch order with status
function getUserOrderWithStatus($con, $user_id)
{
    $query = "SELECT
            dbo.order_id AS order_id,
            dbo.status As status,
            c.UserFirstName AS customer_name,
            c.Address As address,
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
        AND (o.status = 'Dispatch' OR o.status = 'Pending' OR o.status = 'Complete')";


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
            'address' => $row['address'],
            'status' => $row['status'],
            'quantity' => $row['quantity']
        );
    }

    $stmt->close();

    return $userOrders;
}


// count order status done 
function countDoneOrders($con, $delivery_boy_id)
{
    $query = "SELECT COUNT(*) AS done_count FROM delivery_boy_order WHERE delivery_boy_id = ? AND status = 'done'";
    
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $delivery_boy_id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    $doneCount = $row['done_count'];
    
    $stmt->close();
    
    return $doneCount;
}


// count order in-progress done 
function countInProgressOrders($con, $delivery_boy_id)
{
    $query = "SELECT COUNT(*) AS done_count FROM delivery_boy_order WHERE delivery_boy_id = ? AND status = 'in-progress'";
    
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $delivery_boy_id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    $doneCount = $row['done_count'];
    
    $stmt->close();
    
    return $doneCount;
}





?>