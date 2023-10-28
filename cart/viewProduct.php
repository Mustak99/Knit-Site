<?php
$cart=1;
include_once '../head.php' ?>
<!DOCTYPE html>
<html lang="en">

<body>
<?php include_once '../header.php';

?>
<?php
// Create a connection to the database
$conn = new mysqli("localhost", "root", "", "knitsite");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the product ID from the URL
$product_id = $_GET['product_id'];

// Prepare and execute a SQL query to fetch product details
$sql = "SELECT p.*, ps.size FROM products p
        LEFT JOIN product_size ps ON p.id = ps.product_id
        WHERE p.id = $product_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch the product details
    $product = mysqli_fetch_assoc($result);
?>
        <div class="container">
            <div class="col border p-3 main-section bg-white" >
                <div class="row m-0 " >
                    <div class="col-lg-4 left-side-product-box pb-3">
                        <img src="../seller/<?php echo $product['image_path']; ?>" class="img-fluid border p-3">
                    </div>
                    <div class="col-lg-8">
                        <div class="right-side-pro-detail border p-3 m-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3><?php echo $product['name']; ?></h3>
                                </div>
                                <div class="col-lg-12">
                                    <p class="m-0 p-0 price-pro">$<?php echo number_format($product['price'], 2); ?></p>
                                    <hr class="p-0 m-0">
                                </div>
                                <div class="col-lg-12 pt-2">
                                    <h5>Product Detail</h5>
                                    <span><?php echo $product['description']; ?></span>
                                    <hr class="m-0 pt-2 mt-2">
                                </div>
                                <div class="col-lg-12">
                                    <p class="tag-section"><strong>Tag : </strong><a href="#"><?php echo $product['category']; ?></a></p>
                                </div>
                                <div class="col-lg-12">
                                    <h6>Size :</h6>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="checkbox" name="size[]" value="' . $row['size'] . '">';
                                        echo '<label class="form-check-label">' . $row['size'] . '</label>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-12">
                                    <h6>Quantity :</h6>
                                    <input type="number" class="form-control text-center w-100" value="1">
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 pb-2">
                                        <a href="../cart/insertIntoCart.php?product_id=<?php echo $product['id'] ?>&price=<?php echo $product['price'] ?>" class="btn btn-danger w-100">Add To Cart</a>

                                        </div>
                                        <div class="col-lg-6">
                                            <a href="#" class="btn btn-success w-100">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center pt-3">
                    <h2 class="section-title px-5"><span class="px-2">More Products</span></h2>
                    </div>
                </div>
                <div class="row mt-3 p-0 text-center pro-box-section">
                    <?php
                    // Fetch more products from the database and display them in a loop
                    $moreProductsSQL = "SELECT * FROM products WHERE id != $product_id LIMIT 4";
                    $moreProductsResult = mysqli_query($conn, $moreProductsSQL);

                    while ($moreProduct = mysqli_fetch_assoc($moreProductsResult)) {
                    ?>
                        <div class="col-lg-3 pb-2">
                            <div class="pro-box border p-0 m-0">
                                <img src="../seller/<?php echo $moreProduct['image_path']; ?>" class="img-fluid">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>


<?php
include_once '../footer.php';
} else {
    echo "Product not found.";
}

// Close the database connection
mysqli_close($conn);
?>