<?php
include '../database.php';
session_start();
@$cid = $_SESSION["CustomerUserID"];

$conn = connection();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as cart_count FROM cart WHERE user_id = '$cid'";
$result = $conn->query($sql);

if ($result === false) {
    die("Error in query: " . $conn->error);
}

$row = $result->fetch_assoc();
$cartCount = $row['cart_count'];

$conn->close();

echo '<span class="badge">' . $cartCount . '</span>';
