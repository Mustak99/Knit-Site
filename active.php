<?php
$cid = $_GET['cid'] ?? null;
$sid = $_GET['sid'] ?? null;

$conn = new mysqli("localhost", "root", "", "knitsite");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE customerregistration SET status = CASE WHEN status = 0 THEN 1 ELSE 0 END WHERE UserId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cid);
$stmt->execute();
$stmt->close();

$sql1 = "UPDATE sellerregistration SET status = CASE WHEN status = 0 THEN 1 ELSE 0 END WHERE SellerId = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $sid);
$stmt1->execute();
$stmt1->close();

$conn->close();
header('Location: dashboard.php');
?>
