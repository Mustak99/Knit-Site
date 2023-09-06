<?php

  if (isset($_GET["productId"])) {
    $productId = $_GET["productId"];

    // Replace this with your database connection code
    $conn = new mysqli("localhost", "root", "", "knitsite");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Perform the deletion in your database (e.g., DELETE FROM cart WHERE id = $productId)
    $deleteSql = "DELETE FROM cart WHERE id = $productId";

    if ($conn->query($deleteSql) === TRUE) {
      header("location:cart.php"); 
    } else {
      echo "Error deleting product: " . $conn->error; // Handle any error message
    }

    $conn->close();
  } else {
    echo "Product ID not provided"; // Handle the case where productId is not set in the POST data
  }

?>
