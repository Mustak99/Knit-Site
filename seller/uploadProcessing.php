<?php
session_start();
$Name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$brand = $_POST["brand"];
$category = $_POST["category"];
$image = $_FILES["image"];
$quantity = $_POST["quantity"];
$sizes = $_POST["size"];
$sid = $_SESSION["SellerUserID"];


if ($image["error"] === UPLOAD_ERR_OK) {
  $fileName = $image["name"];
  $fileSize = $image["size"];
  $fileType = $image["type"];
  $fileTmpPath = $image["tmp_name"];

  $allowedExtensions = ["jpeg", "jpg"];
  $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  if (!in_array($fileExtension, $allowedExtensions)) {
    echo "Invalid file type. Only JPEG images are allowed.";
    exit;
  }

  $maxFileSize = 2 * 1024 * 1024; // 2MB
  if ($fileSize > $maxFileSize) {
    echo "File size exceeds the maximum limit of 2MB.";
    exit;
  }


  $uniqueFilename = uniqid() . "." . $fileExtension;
  $targetPath = "uploads/" . $uniqueFilename;


  if (move_uploaded_file($fileTmpPath, $targetPath)) {

    $mysqli = new mysqli("localhost", "root", "", "knitsite");
    if ($mysqli === false) {
      die("error: Could not connect to database server.!" . $mysqli->connect_errorno);
    }



    $sql = "INSERT INTO products (name, description, price, quantity, brand_name, category, image_path, SID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Bind the parameters to the prepared statement
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssdsssss", $Name, $description, $price, $quantity, $brand, $category, $targetPath, $sid);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
      $product_id = $stmt->insert_id; // Get the ID of the inserted product

      // Now insert sizes into the product_size table
      $sizeInsertSql = "INSERT INTO product_size (product_id, size) VALUES (?, ?)";
      $sizeStmt = $mysqli->prepare($sizeInsertSql);
      foreach ($sizes as $size) {
        $sizeStmt->bind_param("is", $product_id, $size);
        $sizeStmt->execute();
      }

      $sizeStmt->close();
    }

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
      header("Location: addProduct.php?success=true");
    } else {
      echo "Error uploading product.";
    }

    // Close the database connection
    $stmt->close();
    $mysqli->close();
  } else {
    echo "Error moving the uploaded file.";
  }
} else {
  echo "Error uploading the file.";
}

?>