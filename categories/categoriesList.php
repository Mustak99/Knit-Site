<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from MySQL
$sql = "SELECT name FROM products";
$result = $conn->query($sql);

// Prepare data as JSON
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);

// Close the database connection
$conn->close();
?>
