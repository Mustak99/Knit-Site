<?php

include_once("database.php");
$con = connection();

//fetch total product
function totalProduct($con)
{
    $query = "SELECT count(id) as id FROM products";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

//fetch total order

function totalOrder($con)
{
    $query = "SELECT count(id) as id FROM products";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

//fetch total revenue

function totalRevenue($con)
{
    $query = "SELECT count(id) as id FROM products";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

//fetch total 

function total($con)
{
    $query = "SELECT count(id) as id FROM products";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

// total shirt

function totalShirt($con)
{
    $query = "SELECT count(id) as id FROM products";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }
}

// sold products

$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$users = array();

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}
?>