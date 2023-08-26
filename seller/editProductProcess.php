<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $con = new mysqli("localhost", "root", "", "knitsite") or die();

    $id = $_GET['id'];
    $name = $_POST['name'];
    $brand_name = $_POST['brand'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE products SET name=?, brand_name=?, category=?, price=?, description=? WHERE id=?";
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("sssssi", $name, $brand_name, $category, $price, $description, $id);
        if ($stmt->execute()) {
            // Redirect to the product details page after successful update
            header("Location: productDetails.php");
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