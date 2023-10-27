<?php
include 'includes/db.php';
?>
<?php

if(isset($_GET['edit_product'])){

$edit_id = $_GET['edit_product'];

$get_p = "select * from products where product_id='$edit_id'";

$run_edit = mysqli_query($con,$get_p);

$row_edit = mysqli_fetch_array($run_edit);

$p_id = $row_edit['product_id'];

$p_title = $row_edit['product_title'];

// $p_cat = $row_edit['p_cat_id'];

// $cat = $row_edit['cat_id'];

// $m_id = $row_edit['manufacturer_id'];

$p_image1 = $row_edit['product_img1'];

$p_image2 = $row_edit['product_img2'];

$p_image3 = $row_edit['product_img3'];

$new_p_image1 = $row_edit['product_img1'];

$new_p_image2 = $row_edit['product_img2'];

$new_p_image3 = $row_edit['product_img3'];

$p_price = $row_edit['product_price'];

$p_desc = $row_edit['product_desc'];

//$p_keywords = $row_edit['product_keywords'];

$psp_price = $row_edit['product_psp_price'];

//$p_label = $row_edit['product_label'];

//$p_url = $row_edit['product_url'];

// $p_features = $row_edit['product_features'];

// $p_video = $row_edit['product_video'];

}

// $get_manufacturer = "select * from manufacturers where manufacturer_id='$m_id'";

// $run_manufacturer = mysqli_query($con,$get_manufacturer);

// $row_manfacturer = mysqli_fetch_array($run_manufacturer);

// $manufacturer_id = $row_manfacturer['manufacturer_id'];

// $manufacturer_title = $row_manfacturer['manufacturer_title'];


// $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";

// $run_p_cat = mysqli_query($con,$get_p_cat);

// $row_p_cat = mysqli_fetch_array($run_p_cat);

// $p_cat_title = $row_p_cat['p_cat_title'];

// $get_cat = "select * from categories where cat_id='$cat'";

// $run_cat = mysqli_query($con,$get_cat);

// $row_cat = mysqli_fetch_array($run_cat);

// $cat_title = $row_cat['cat_title'];

?>
