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

// men's image

$query = "SELECT image_path FROM products WHERE category='Mens' AND status=1";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$mens = array();

while ($row = mysqli_fetch_assoc($result)) {
    $mens[] = $row;
}

// women's image

$query = "SELECT image_path FROM products WHERE category='Womens' AND status=1";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$womens = array();

while ($row = mysqli_fetch_assoc($result)) {
    $womens[] = $row;
}

// children's image

$query = "SELECT image_path FROM products WHERE category='Childrens' AND status=1";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$childrens = array();

while ($row = mysqli_fetch_assoc($result)) {
    $childrens[] = $row;
}

// select latest mens image

$query = "SELECT image_path FROM products WHERE category='Mens' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$mensRecentImg = array();

while ($row = mysqli_fetch_assoc($result)) {
    $mensRecentImg[] = $row;
}

// select latest womens image

$query = "SELECT image_path FROM products WHERE category='Womens' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$womensRecentImg = array();

while ($row = mysqli_fetch_assoc($result)) {
    $womensRecentImg[] = $row;
}

// select latest childrens image

$query = "SELECT image_path FROM products WHERE category='Childrens' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$childrensRecentImg = array();

while ($row = mysqli_fetch_assoc($result)) {
    $childrensRecentImg[] = $row;
}

// all category image

$query = "SELECT image_path FROM products";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$allImg = array();

while ($row = mysqli_fetch_assoc($result)) {
    $allImg[] = $row;
}
?>