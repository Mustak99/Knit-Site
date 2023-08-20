<?php
session_start();
   $conn = new mysqli("localhost","root","","knitsite");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT COUNT(*) as cart_count FROM cart";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cartCount = $row['cart_count'];


$conn->close();



echo '<span class="badge">' . $cartCount . '</span>';
?>
