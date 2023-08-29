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

function fetchProductsWithSizes($conn, $sellerId)
{
    $products = array();
    $sql = "SELECT p.id, p.name, p.brand_name, p.description, p.price, p.category, p.quantity, p.image_path, p.status, GROUP_CONCAT(ps.size) AS sizes
        FROM products p
        LEFT JOIN product_size ps ON p.id = ps.product_id
        WHERE p.SID = $sellerId
        GROUP BY p.id
        ORDER BY p.id DESC";

    $result = $conn->query($sql);

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
?>