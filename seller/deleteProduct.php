<?php
include_once("database.php");
$con = connection();
$id = $_GET['id'];
mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");
$query = "DELETE products, product_size
FROM products
LEFT JOIN product_size ON products.id = product_size.product_id
WHERE products.id = $id";
if (mysqli_query($con, $query)) {
    header("location:productDetails.php");
} else {
    echo "Error deleting product: " . mysqli_error($conn);
}
?>