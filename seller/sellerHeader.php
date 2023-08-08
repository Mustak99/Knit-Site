<?php 
    include_once '../head.php';
    include_once '../header.php';
    $_SESSION["SellerDashboard"]=1;
?>
  <!-- Navbar Start -->
  <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between  bg-secondary text-white w-100"  href="sellerDashboard.php" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">DashBoard</h6>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 123px">
                        <div class="nav-item dropdown" >
                        
                        <a href="sellerProfile.php" class="nav-item nav-link">profile</a>
                        <a href="addProduct.php" class="nav-item nav-link">Add Product</a>
                   
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
                            <a href="../HomePage.php" class="nav-item nav-link active">Home</a>
                            <a  href="cart.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["adminName"])) { echo "none";} else { echo "block";}?>">Cart</a>
                            <a  href="dashboard.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["adminName"])) { echo "block";} else { echo "none";}?>">Dashboard</a>
                            <a class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">

                        <div class="nav-item dropdown" style="display: <?php if (isset($_SESSION["name"] )) { echo "block";} else { echo "none";}?>">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php if(isset($_SESSION["name"])) {echo$_SESSION["name"]."  ";} ?></a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="../Login/logout.php" class="dropdown-item">Logout</a>
                                    <a href="updateProfile.php" class="dropdown-item" style="display: <?php if (isset($_SESSION["adminId"])) { if (isset($_SESSION["adminId"])) { echo "none"; } else { echo "block";}} else { echo "none";}  ?>">Profile</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
                
                <div  >
                
    <!-- Navbar End -->
