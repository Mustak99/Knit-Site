<?php

include_once("../database.php");
$con = connection();

//fetch total customer
function totalCustomer($con)
{
    $query = "SELECT count(UserId) as id FROM customerregistration";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

//fetch total seller
function totalSeller($con)
{
    $query = "SELECT count(SellerId) as id FROM sellerregistration";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
} 

//fetch total revenue
function totalrevenue($con)
{
    $query = "SELECT SUM(total_price) as price from order_items";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function janrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 1;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}


function febrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 2;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function marchrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 3;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function aprilrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 4;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function mayrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 5;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function junerevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 6;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function julyrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 7;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function augrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 8;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function seprevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 9;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function octrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 10;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function novrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 11;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}

function decrevenue($con)
{
    $query = "SELECT SUM(oi.total_price) AS price
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.order_id
    WHERE MONTH(o.order_date) = 12;
    ";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['price'];
        return $id;
    }
}


function fetchCustomers($con)
{
    $customers = array();

    // Define the SQL query with the corrected table name and use placeholders for prepared statements
    $sql = "SELECT UserId, UserFirstName, UserMiddleName, UserLastName, MobileNumber, EmailAddress, UserName, Password, Address, Pincode, Gender, CreationDate, status
            FROM customerregistration";

    // Use a prepared statement to execute the query
    $stmt = $con->prepare($sql);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $customer = array(
                'UserFirstName' => $row["UserFirstName"],
                'UserMiddleName' => $row["UserMiddleName"],
                'UserLastName' => $row["UserLastName"],
                'MobileNumber' => $row["MobileNumber"],
                'EmailAddress' => $row["EmailAddress"],
                'UserName' => $row["UserName"],
                'Password' => $row["Password"],
                'Address' => $row["Address"],
                'Pincode' => $row["Pincode"],
                'Gender' => $row["Gender"],
                'CreationDate' => $row["CreationDate"],
                'status' => $row["status"],
            );
            $customers[] = $customer;
        }

        $stmt->close();
    }

    return $customers;
}

function fetchSellers($con)
{
    $sellers = array();

    $sql = "SELECT SellerId, SellerFirstName, SellerMiddleName, SellerLastName, MobileNumber, EmailAddress, UserName, Password, BusinessLocation, Pincode, BusinessType, CreationDate, status, businessdoc
            FROM sellerregistration";

    $stmt = $con->prepare($sql);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $seller = array(
                'SellerFirstName' => $row["SellerFirstName"],
                'SellerMiddleName' => $row["SellerMiddleName"],
                'SellerLastName' => $row["SellerLastName"],
                'MobileNumber' => $row["MobileNumber"],
                'EmailAddress' => $row["EmailAddress"],
                'UserName' => $row["UserName"],
                'Password' => $row["Password"],
                'BusinessLocation' => $row["BusinessLocation"],
                'Pincode' => $row["Pincode"],
                'BusinessType' => $row["BusinessType"],
                'CreationDate' => $row["CreationDate"],
                'status' => $row["status"],
                'businessdoc' => $row["businessdoc"],
            );
            $sellers[] = $seller;
        }

        $stmt->close();

        return $sellers;
    }
}

?>