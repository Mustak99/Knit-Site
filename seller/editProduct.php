<?php include_once 'sellerHeader.php';
?>
<!doctype html>
<html lang="en">

<head>
  <style>
    .error-message {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
  <script>
    function validateForm() {
      // Reset previous error messages
      clearErrorMessages();

      // Initialize error flag
      var hasErrors = false;

      // Validate shoe name
      var shoeName = document.getElementById("name").value;
      var shoeNameRegex = /^[a-zA-Z\s]+$/;
      if (!shoeNameRegex.test(shoeName)) {
        displayErrorMessage("name", "Invalid name. Only alphabets are allowed.");
        hasErrors = true;
      }

      // Validate description
      var description = document.getElementById("description").value;
      if (description.length > 150) {
        displayErrorMessage("description", "Description cannot exceed 150 characters.");
        hasErrors = true;
      }

      // Validate brand
      var brand = document.getElementById("brand").value;
      var brandRegex = /^[a-zA-Z\s]+$/;
      if (!brandRegex.test(brand)) {
        displayErrorMessage("brand", "Invalid brand name. Only alphabets are allowed.");
        hasErrors = true;
      }

      // If there are errors, prevent form submission
      if (hasErrors) {
        return false;
      }

      return true;
    }

    // Function to display error message below a field
    function displayErrorMessage(fieldId, message) {
      var field = document.getElementById(fieldId);
      var errorContainer = document.createElement("div");
      errorContainer.classList.add("error-message");
      errorContainer.textContent = message;
      field.parentNode.appendChild(errorContainer);
    }

    // Function to clear all error messages
    function clearErrorMessages() {
      var errorMessages = document.getElementsByClassName("error-message");
      while (errorMessages.length > 0) {
        errorMessages[0].remove();
      }
    }
  </script>

  <?php
  $con = new mysqli("localhost", "root", "", "knitsite") or die();
  $id = $_GET['id'];
  $productSql = "SELECT name, brand_name, category, price, quantity, description FROM products WHERE id = ? LIMIT 1";
  if ($productStmt = $con->prepare($productSql)) {
    $productStmt->bind_param("i", $id);
    $productStmt->execute();
    $productRes = $productStmt->get_result();
    $productData = $productRes->fetch_assoc();

    // Fetch sizes from the product_size table
    $sizeSql = "SELECT size FROM product_size WHERE product_id = ?";
    if ($sizeStmt = $con->prepare($sizeSql)) {
      $sizeStmt->bind_param("i", $id);
      $sizeStmt->execute();
      $sizeRes = $sizeStmt->get_result();
      $sizes = array();
      while ($sizeRow = $sizeRes->fetch_assoc()) {
        $sizes[] = $sizeRow['size'];
      }
      $sizeStmt->close();
    }

    $Id = "";
    $name = $productData["name"];
    $brand_name = $productData["brand_name"];
    $category = $productData["category"];
    $price = $productData["price"];
    $quantity = $productData["quantity"];
    $description = $productData["description"];
  }
  ?>
  <form action="editProductProcess.php?id=<?php echo $id; ?>" method="POST">
    <div class="row">
      <div class="col-md-12">
        <div class="p-4 shadow rounded">
          <h2 class="text-center mb-4">Update Product</h2>
          <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="row mb-3">
              <div class="col-md-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo @$name ?>">
              </div>
              <div class="col-md-3">
                <label for="brand" class="form-label">Brand:</label>
                <input type="text" id="brand" name="brand" class="form-control" value="<?php echo @$brand_name ?>">
              </div>
              <div class="col-md-3">
                <label for="category" class="form-label">Category:</label>
                <select id="category" name="category" class="form-control">
                  <option value="Mens" <?php if ($category === 'Mens')
                    echo 'selected'; ?>>Men's</option>
                  <option value="Womens" <?php if ($category === 'Womens')
                    echo 'selected'; ?>>Women's</option>
                  <option value="Childrens" <?php if ($category === 'Childrens')
                    echo 'selected'; ?>>Children's</option>
                </select>
              </div>

              <div class="col-md-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control"
                  value="<?php echo @$price ?>">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control"
                  value="<?php echo @$quantity ?>">
              </div>
              <div class="col-md-3">
                <label for="quantity" class="form-label">Size:</label> <br>
                <?php
                $availableSizes = array("XS ", "S ", "M ", "L ", "XL ", "XXL ");
                foreach ($availableSizes as $sizeOption) {
                  $sizeOption = trim($sizeOption);
                  $checked = in_array($sizeOption, $sizes) ? 'checked' : '';
                  echo '<input type="checkbox" id="size" name="size[]" class="" value="' . $sizeOption . '" ' . $checked . '> ' . $sizeOption;
                }
                ?>
              </div>
            </div>
            <div class="row mb-3">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description:</label>
              <textarea id="description" name="description" class="form-control"><?php echo $description; ?></textarea>
            </div></textarea>
            <div class="text-center">
              <a href="productDetails.php?id=<?php echo $id; ?>" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
  </form>
  </div>
  </div>
  </div>