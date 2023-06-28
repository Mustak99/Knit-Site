
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
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
   <?php include_once 'header.php'; ?>

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 245px">
                        <a href="" class="nav-item nav-link">Men</a>
                        <a href="" class="nav-item nav-link">Women</a>
                        <a href="" class="nav-item nav-link">Kids</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">Knite</span>Site</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="HomePage.php" class="nav-item nav-link active">Home</a>
                            <a  href="cart.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["LoginUserName"])) { echo "none";} else { echo "block";}?>">Cart</a>
                            <a  href="dashboard.php"class="nav-item nav-link" style="display: <?php if (isset($_SESSION["LoginUserName"])) { echo "block";} else { echo "none";}?>">Dashboard</a>
                            <a class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">

                            <a href="login1/login.php" class="nav-item nav-link" style="display: <?php if (isset($_SESSION["LoginUserName"])) { echo "none";} else { echo "block";}?>">Login</a>
                            
                            <div class="nav-item dropdown" style="display: <?php if (isset($_SESSION["LoginUserName"])) { echo "none";} else { echo "block";}?>">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Register</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="Registration/seller.php" class="dropdown-item">Seller</a>
                                    <a href="Registration/index.php" class="dropdown-item">Customer</a>
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
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                  <?php
// Create connection
$conn = new mysqli("localhost","root","","knitsite");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT UserId,UserFirstName,UserMiddleName,UserLastName,MobileNumber,EmailAddress,UserName,Address,Pincode,Gender,CreationDate,status FROM customerregistration";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    $row = $result->fetch_all(MYSQLI_ASSOC); 
    
}

?>
<html>
<style>
    td,th {
        border: 1px solid black;
        padding: 10px;
        margin: 5px;
        text-align: center;
          }
    table{
        margin-left: 10%;
         }
</style>
  

    <h1>CUSTOMER</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email Address</th>
                <th>Address</th>
                <th>Gender</th>
                <th>User Registration Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
               if(!empty($row))
               foreach($row as $rows)
               
              { 
            ?>
            <tr>
                
                <td><?php echo $rows['UserFirstName']; ?></td>
                <td><?php echo $rows['MobileNumber']; ?></td>
                <td><?php echo $rows['EmailAddress']; ?></td>
                <td><?php echo $rows['Address']; ?></td>
                <td><?php echo $rows['Gender']; ?></td>
                <td><?php echo $rows['CreationDate']; ?></td>
                <td><a href="active.php?cid=<?php echo $rows['UserId']; ?>&status=<?php echo $rows['status']; ?>"><?php if($rows['status']==1)echo"Active"; else echo"Deactive"?></a></td>
  
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
</html>
 <?php
// Create connection
$conn = new mysqli("localhost","root","","knitsite");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT SellerId,SellerFirstName,SellerMiddleName,SellerLastName,MobileNumber,EmailAddress,UserName,Password,BusinessLocation,Pincode,BusinessType,CreationDate,status FROM sellerregistration";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    $row = $result->fetch_all(MYSQLI_ASSOC); 
    
}

?>
<html>
<style>
    td,th {
        border: 1px solid black;
        padding: 10px;
        margin: 5px;
        text-align: center;
          }
    table{
        margin-left: 10%;
         }
</style>
  

    <h1>SELLER</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email Address</th>
                <th>Address</th>
                <th>Business Type</th>
                <th>User Registration Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
               if(!empty($row))
               foreach($row as $rows)
               
              { 
            ?>
            <tr>
                
                <td><?php echo $rows['SellerFirstName']; ?></td>
                <td><?php echo $rows['MobileNumber']; ?></td>
                <td><?php echo $rows['EmailAddress']; ?></td>
                <td><?php echo $rows['BusinessLocation']; ?></td>
                <td><?php echo $rows['BusinessType']; ?></td>
                <td><?php echo $rows['CreationDate']; ?></td>
                <td><a href="active.php?sid=<?php echo $rows['SellerId']; ?>&status=<?php echo $rows['status']; ?>"><?php if($rows['status']==1)echo"Active"; else echo"Deactive"?></a></td>
  
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>

    
</html>
  
<?php   
    mysqli_close($conn);
?>  
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



     


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-12 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border border-white px-3 mr-1">Knit</span> Site</h1>
                </a>
                <p>Knit site application initially focused on small scale seller where people can sale their product and
                    customer buy it, all the verity of seller
                    can sell their product such as general store, medical store, local food stall etc.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"> Maliba Campus, Bardoli-Mahuva Road,
                        Tarsadi, Mahuva-Bardoli Rd, Gopal Vidyanagar, Barodli, Gujarat 394350</i></p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Knitsite@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+91 7507421749</p>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                <a class="text-dark font-weight-semi-bold" href="#">Knit Site </a>. All Rights Reserved. Designed
                by
                <a class="text-dark font-weight-semi-bold" >BCA3_B7</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
    </div>
    <!-- Footer End -->
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>        
</html>
