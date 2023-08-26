<?php
include_once("database.php");
$con = connection();
$id = $_GET['id'];
mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");
$query = "DELETE FROM products WHERE id = $id";
if (mysqli_query($con, $query)) {
    header("location:productDetails.php");
} else {
    echo "Error deleting product: " . mysqli_error($conn);
}
?>