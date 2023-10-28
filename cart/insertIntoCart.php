<?php
session_start();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION["CustomerUserID"];
    $price = $_GET['price'];
    $quantity=1;
    if(isset($_GET['quantity'])){
    $quantity = trim($_GET['quantity']);
    }
    else{
        $quantity=1;
    }
     

    $conn = new mysqli("localhost", "root", "", "knitsite");
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }


    $check_query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param('ii', $user_id, $product_id);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {

        echo "Product is already in the cart.";
    } else {

        $insert_query = "INSERT INTO cart (user_id, product_id, quantity, price) VALUES (?,?,?,?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param('iiii', $user_id, $product_id, $quantity, $price);

        if ($stmt_insert->execute()) {
            echo "Product added to cart successfully!";
        } else {
            echo "Error adding product to cart: " . $conn->error;
        }

        $stmt_insert->close();
    }

    $stmt_check->close();
    $conn->close();
    header("location:../search/search.php");
} else {
    echo "Product ID not specified.";
}
