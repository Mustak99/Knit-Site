<?php

  $shoeName = $_POST["shoe_name"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $brand = $_POST["brand"];
  $category = $_POST["category"];
  $image = $_FILES["image"];


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
     
        include_once 'db_connect.php';


      $sql = "INSERT INTO shoes (shoe_name, description, price, brand_name, category, image_path) VALUES (?, ?, ?, ?, ?, ?)";

      // Bind the parameters to the prepared statement
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssdsss", $shoeName, $description, $price, $brand, $category, $targetPath);
      $stmt->execute();

      // Check if the insertion was successful
      if ($stmt->affected_rows > 0) {
        echo "Product uploaded successfully.";
      } else {
        echo "Error uploading product.";
      }

      // Close the database connection
      $stmt->close();
      $conn->close();
    } else {
      echo "Error moving the uploaded file.";
    }
  } else {
    echo "Error uploading the file.";
  }

?>
