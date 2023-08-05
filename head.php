<?php 
session_start();
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Knit Site</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?php if (isset($_SESSION["SellerUserID"])) { echo "../img/favicon.ico";} else { echo "img/favicon.ico";} ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php if (isset($_SESSION["SellerUserID"])) { echo "../css/style.css";} else { echo "css/style.css";} ?>" rel="stylesheet">

    <!-- Jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?php if (isset($_SESSION["SellerUserID"])) { echo "../lib/easing/easing.min.js";} else { echo "lib/easing/easing.min.js";} ?>"></script>
<script src="<?php if (isset($_SESSION["SellerUserID"])) { echo "../lib/owlcarousel/owl.carousel.min.js";} else { echo "lib/owlcarousel/owl.carousel.min.js";} ?>"></script>

<!-- Contact Javascript File -->
<script src="<?php if (isset($_SESSION["SellerUserID"])) { echo "../mail/jqBootstrapValidation.min.js";} else { echo "mail/jqBootstrapValidation.min.js";} ?>"></script>
<script src="<?php if (isset($_SESSION["SellerUserID"])) { echo "../mail/contact.js";} else { echo "mail/contact.js";} ?>"></script>

<!-- Template Javascript -->
<script src="<?php if (isset($_SESSION["SellerUserID"])) { echo "../js/main.js";} else { echo "js/main.js";} ?>"></script>
</head>