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
        return $quantity;
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

// products details

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

//fetch total mens 

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

//fetch total mens 

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
?>