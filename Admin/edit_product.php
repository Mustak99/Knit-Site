<?php
include 'includes/db.php';

$pName = "";
$pBrand = "";
$price = "";
$des = "";

if (isset($_GET['edit_product'])) {

  $edit_id = trim($_GET['edit_product']);

  $get_p = "select * from products where id=? LIMIT 1";

  $no = 0;

  if ($stmt = $con->prepare($get_p)) {
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $no = $result->num_rows;
    $product_array = $result->fetch_assoc();
  }

  $stmt->close();

  if ($no > 0) {
    $pName = $product_array["name"];
    $pBrand = $product_array["brand_name"];
    $price = $product_array["price"];
    $desc = $product_array["description"];
  }

}

?>


<!DOCTYPE html>

<html>

<head>

  <title> Edit Products </title>


  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: '#product_desc,#product_features'
    });
  </script>

</head>

<body>

  <form action="editProductProcess.php?id=<?php echo $id; ?>" method="POST">
    <div class="row">
      <div class="col-md-12">
        <div class="p-4 shadow rounded">
          <h2 class="text-center mb-4">Update Product</h2>
          <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="row mb-3">
              <div class="col-md-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $pName; ?>">
              </div>
              <div class="col-md-3">
                <label for="brand" class="form-label">Brand:</label>
                <input type="text" id="brand" name="brand" class="form-control" value="<?php echo $pBrand; ?>">
              </div>
              

              <div class="col-md-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" value="<?php echo $price; ?>">
              </div>
            </div>
            
            <div class="row mb-3">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description:</label>
              <textarea id="description" name="description" class="form-control"><?php echo $desc; ?></textarea>
            </div></textarea>
            <div class="text-center">
              <a href="productDetails.php?id=<?php echo $id; ?>" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
  </form>






</body>

</html>

<?php

if (isset($_POST['update'])) {

  $product_title = $_POST['product_title'];
  // $product_cat = $_POST['product_cat'];
  // $cat = $_POST['cat'];
  // $manufacturer_id = $_POST['manufacturer'];
  $product_price = $_POST['product_price'];
  $product_desc = $_POST['product_desc'];
  $product_keywords = $_POST['product_keywords'];

  $psp_price = $_POST['psp_price'];

  $product_label = $_POST['product_label'];

  $product_url = $_POST['product_url'];

  // $product_features = $_POST['product_features'];

  // $product_video = $_POST['product_video'];

  $status = "product";

  $product_img1 = $_FILES['product_img1']['name'];
  $product_img2 = $_FILES['product_img2']['name'];
  $product_img3 = $_FILES['product_img3']['name'];

  $temp_name1 = $_FILES['product_img1']['tmp_name'];
  $temp_name2 = $_FILES['product_img2']['tmp_name'];
  $temp_name3 = $_FILES['product_img3']['tmp_name'];

  if (empty($product_img1)) {

    $product_img1 = $new_p_image1;
  }


  if (empty($product_img2)) {

    $product_img2 = $new_p_image2;
  }

  if (empty($product_img3)) {

    $product_img3 = $new_p_image3;
  }


  move_uploaded_file($temp_name1, "product_images/$product_img1");
  move_uploaded_file($temp_name2, "product_images/$product_img2");
  move_uploaded_file($temp_name3, "product_images/$product_img3");

  $update_product = "update products set product_title='$product_title',product_url='$product_url',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_psp_price='$psp_price',product_desc='$product_desc',product_keywords='$product_keywords',product_label='$product_label' where product_id='$p_id'";

  $run_product_id = mysqli_query($con, $update_product);

  if ($run_product_id) {

    echo "<script> alert('Product has been updated successfully') </script>";

    echo "<script>window.open('index.php?view_products','_self')</script>";
  }
}

?>