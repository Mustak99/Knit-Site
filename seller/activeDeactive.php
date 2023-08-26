<?php
include_once("database.php");
$con = connection();
$id = $_GET['id'];
$name = $_GET['name'];
$sql = "UPDATE products SET status = CASE WHEN status = 0 THEN 1 ELSE 0 END WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
header("location:productDetails.php")
?>