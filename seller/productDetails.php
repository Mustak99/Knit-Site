<?php include_once 'sellerHeader.php'; ?>
<?php
include_once("commonMethod.php");
$products = fetchProductsWithSizes(connection(), $sellerId);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Product Management</title>


    <!-- Modify the existing <script> section as follows -->
    <script>
        function showConfirmation(productId) {
            var confirmationBox = document.getElementById("confirmationBox");
            var overlay = document.getElementById("overlay");

            confirmationBox.style.display = "block";
            overlay.classList.add("show");

            var confirmButton = document.getElementById("confirmButton");
            var cancelButton = document.getElementById("cancelButton");
            var closeButton = document.getElementById("closeButton");

            confirmButton.onclick = function () {
                window.location.href = "deleteProduct.php?id=" + productId;
            };

            cancelButton.onclick = function () {
                confirmationBox.style.display = "none";
                overlay.classList.remove("show");
            };

            closeButton.onclick = function () {
                confirmationBox.style.display = "none";
                overlay.classList.remove("show");
            };
        }
    </script>

</head>

<body>
    <div id="overlay" class="overlay"></div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            <img class="fixed-image" src="<?php echo @$product['image_path']; ?>" alt="">
                        </td>
                        <td>
                            <?php echo @$product['name']; ?>
                        </td>
                        <td>
                            <?php echo @$product['brand_name']; ?>
                        </td>
                        <td>
                            <?php echo @$product['description']; ?>
                        </td>
                        <td>
                            <?php echo @$product['price']; ?>
                        </td>
                        <td>
                            <?php echo @$product['category']; ?>
                        </td>
                        <td>
                            <?php echo @$product['sizes']; ?>
                        </td>
                        <td>
                            <?php echo @$product['quantity']; ?>
                        </td>
                        <td>
                            <a class="edit-link" style="text-decoration:none;"
                                href="editProduct.php?id=<?php echo $product['id']; ?>"><img src="./uploads/edit.png"
                                    alt="Edit" width="20" height="20"></a>
                            <a class=" delete-link" style="text-decoration:none;" href="#"
                                onclick="showConfirmation(<?php echo $product['id']; ?>)"><img src="./uploads/delete.png"
                                    alt="Delete" width="20" height="20"></a>
                            <?php if ($product['status'] == 1): ?>
                                <a class="status-link" style="text-decoration:none;"
                                    href="activeDeactive.php?id=<?php echo $product['id']; ?>&name='deactive'">&#x2705;
                                </a>
                            <?php else: ?>
                                <a class="status-link" style="text-decoration:none;"
                                    href="activeDeactive.php?id=<?php echo $product['id']; ?>&name='active'">&#x26D4;
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- Confirmation box structure -->
    <div id="confirmationBox" class="confirmation-box">
        <span id="closeButton" class="close-button">&times;</span>
        <h4>Confirm Product Deletion</h4>
        <p>Are you sure you want to delete this product?</p>
        <button id="confirmButton" class="btn btn-danger">Yes</button>
        <button id="cancelButton" class="btn btn-secondary">No</button>
    </div>
</body>

</html>