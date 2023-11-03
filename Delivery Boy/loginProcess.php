<?php
session_start();

// Create a database connection
$conn = new mysqli("localhost", "root", "", "knitsite");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $mobile_number = $_POST["phone_number"];
    $password = md5($_POST["password"]);

    // Perform user authentication
    $sql = "SELECT id FROM delivery_boys WHERE phone_number = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $mobile_number, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Successful login
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["id"];
        header("Location: ./dashboard.php");
    } else {
        // Login failed
        header("Location: login.php?error=1");
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>