<head>
    <meta charset="utf-8">
    <title>Knit Site</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

    <!-- Jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>


</head>

 <!-- Navbar Start -->
  <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 123px">
                        <div class="nav-item dropdown" id="list" >
                            <!-- <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div> -->
                        <a href="" class="nav-item nav-link">Men's Dresses</a>
                        <a href="" class="nav-item nav-link">Women's Dresses</a>
                        <a href="" class="nav-item nav-link">Baby's Dresses</a>
                        <!-- <div id="list"></div> -->
                        <!-- <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a> -->
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="HomePage.php" class="nav-item nav-link active">Home</a>
                            <a  href="cart.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["adminName"])) { echo "none";} else { echo "block";}?>">Cart</a>
                            <a  href="dashboard.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["adminName"])) { echo "block";} else { echo "none";}?>">Dashboard</a>
                            <a class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                          
                        <a href="login/login.php" class="nav-item nav-link" style="display: <?php if (isset($_SESSION["LoginUserName"])||isset($_SESSION["adminName"])) { echo "none";} else { echo "block";}?>">Login</a>
                            <div class="nav-item dropdown" style="display: <?php if (isset($_SESSION["LoginUserName"])) { echo "none";} else { echo "block";}?>">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Register</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="Registration/seller.php" class="dropdown-item">Seller</a>
                                    <a href="Registration/customer.php" class="dropdown-item">Customer</a>
                                </div>
                            </div>
                            <?php
                                if (isset($_SESSION["LoginUserName"])) {
                                    include 'HomePageLogin.php';
                                }
                            ?>
                        </div>
                    </div>
                </nav>
                
                <div id="header-carousel" class="carousel slide" data-ride="carousel" style="display: <?php if (isset($_SESSION["search"])) { echo "none";} else { echo "block";}?>">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "categories/categoriesList.php", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      data.forEach(function(item) {
        var link = document.createElement("a");
        link.href = "";
        link.className = "nav-item nav-link";
        link.textContent = item.name;
        document.getElementById("list").appendChild(link);
      });
    } else if (xhr.readyState === 4) {
      console.error(xhr.responseText);
    }
  };
  xhr.send();
});

    </script>
