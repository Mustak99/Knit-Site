
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
                        <a href="mens.php" class="nav-item nav-link">Men's Dresses</a>
                        <a href="womens.php" class="nav-item nav-link">Women's Dresses</a>
                        <a href="childrens.php" class="nav-item nav-link">Children's Dresses</a>
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
                            <a  href="cart/cart.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["adminName"])) { echo "none";} else { echo "block";}?>">Cart</a>
                            <a  href="dashboard.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["adminName"])) { echo "block";} else { echo "none";}?>">Dashboard</a>
                            <a  href="seller/sellerDashboard.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["SellerUserID"])) { echo "block";} else { echo "none";}?>">Dashboard</a>
                            <a class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                          
                        <a href="login/login.php" class="nav-item nav-link" style="display: <?php if (isset($_SESSION["name"])||isset($_SESSION["adminName"])) { echo "none";} else { echo "block";}?>">Login</a>
                            <div class="nav-item dropdown" style="display: <?php if (isset($_SESSION["name"])) { echo "none";} else { echo "block";}?>">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Register</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="Registration/seller.php" class="dropdown-item">Seller</a>
                                    <a href="Registration/customer.php" class="dropdown-item">Customer</a>
                                </div>
                            </div>
                            <?php
                                if (isset($_SESSION["name"])||isset($_SESSION["CustomerUserID"])) {
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
