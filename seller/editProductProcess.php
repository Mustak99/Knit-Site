<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $con = new mysqli("localhost", "root", "", "knitsite") or die();

    $id = $_GET['id'];
    $name = $_POST['name'];
    $brand_name = $_POST['brand'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $sizes = $_POST["size"];
    $description = $_POST['description'];

    // Update product information in the products table
    $sql = "UPDATE products SET name=?, brand_name=?, category=?, price=?, quantity=?, description=? WHERE id=?";
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("sssdssi", $name, $brand_name, $category, $price, $quantity, $description, $id);
        if ($stmt->execute()) {
            // Update sizes in the product_size table
            $deleteSizesSql = "DELETE FROM product_size WHERE product_id=?";
            $deleteStmt = $con->prepare($deleteSizesSql);
            $deleteStmt->bind_param("i", $id);
            $deleteStmt->execute();
            $deleteStmt->close();

            // Insert updated sizes into the product_size table
            $insertSizesSql = "INSERT INTO product_size (product_id, size) VALUES (?, ?)";
            $insertStmt = $con->prepare($insertSizesSql);
            foreach ($sizes as $size) {
                $insertStmt->bind_param("is", $id, $size);
                $insertStmt->execute();
            }
            $insertStmt->close();

            // Redirect to the product details page after successful update
            header("Location: productDetails.php?id=" . $id);
            exit();
        } else {
            echo "Error updating product: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $con->error;
    }
    $con->close();
}
?>