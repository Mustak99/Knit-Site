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
    <link href="css/style.css" rel="stylesheet">

    <!-- Jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>



</head>
<?php include_once 'header.php' ?>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class=" dropdown-item" id="search-results">

<?php
// Establish a database connection
$host = 'localhost';
$dbname = 'knitsite';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Retrieve search query
$query = trim($_GET["name"]);

// Perform search query
$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE :query");
$stmt->bindValue(':query', '%' . $query . '%');
$stmt->execute();
$result = $stmt->fetchAll();

// Output search results
if (count($result) > 0) {
    foreach ($result as $row) {
        echo "<div>";
        echo "<h3>".$row['name']."</h3>";
        echo "<p>".$row['description']."</p>";
        echo "<p>Price: ".$row['price']."</p>";
        echo "</div>";
    }
} else {
    echo "<p>No results found.</p>";
}
?>
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
                                    include 'indexLogin.php';
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
>>>>>>> 0a7dc59b05c9eb7447678b8b23135a8a88e40d9f:productList.php
            </div>
        </div>
    </div>
</div>