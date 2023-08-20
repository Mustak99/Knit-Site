<?php
session_start();
 if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION["CustomerUserID"]; 
    $price=$_GET['price'];
    $quantity=1;
    // echo $product_id . $price . $quantity . $user_id;
    $conn = new mysqli("localhost","root","","knitsite");
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }


    $insert_query = "INSERT INTO cart (user_id, product_id, quantity, price) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param('iiii', $user_id, $product_id,$quantity, $price);
    
    if ($stmt->execute()) {
        echo "Product added to wishlist successfully!";
    } else {
        echo "Error adding product to wishlist: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Product ID not specified.";
}
 ?>
