<?php
include_once("database.php");
$con = connection();
$id = $_GET['id'];
$name = $_GET['name'];
mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");
if ($name == 'active') {
    $query = "UPDATE products SET  status=0 WHERE id = $id";
    if (mysqli_query($con, $query)) {
        header("location:productDetails.php");
    } else {
        echo "Error while activating a product: " . mysqli_error($conn);
    }
} else {
    $query = "UPDATE products SET  status=1 WHERE id = $id";
    if (mysqli_query($con, $query)) {
        header("location:productDetails.php");
    } else {
        echo "Error while activating a product: " . mysqli_error($conn);
    }
}
?>