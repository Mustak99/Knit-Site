<?php

include_once("database.php");
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

