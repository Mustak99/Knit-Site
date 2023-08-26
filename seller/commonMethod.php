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

//fetch total order

function totalOrder($con, $sellerId)
{
    $query = "SELECT count(id) as id FROM products where SID=$sellerId";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
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

//fetch total 

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

// sold products

$query = "SELECT * FROM products where SID=$sellerId";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$products = array();

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}
?>