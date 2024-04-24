<?php
include '../database.php';

// Get data from the AJAX request
$productId = $_POST['productId'];
$newQuantity = $_POST['newQuantity'];

// Create a database connection
$conn = connection();

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the quantity in the "cart" table
$sql = "UPDATE cart SET quantity = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $newQuantity, $productId);

if ($stmt->execute()) {
    echo "Quantity updated successfully";
} else {
    echo "Error updating quantity: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
