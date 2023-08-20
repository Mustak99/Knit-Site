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
<div id="search-results" >

<?php
// Establish a database connection
$host = 'localhost';
$dbname = 'knitsite';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Retrieve search query
$query = trim($_GET["name"]);

// Perform search query
$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->bind_param('s', $searchQuery);
$searchQuery = '%' . $query . '%';
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

// Output search results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="container shadow p-3 mb-5 bg-white rounded">';
        echo '<div class="row">';
        // Display the profile image in one column
        echo '<div class="col-3 ">';
        echo '<div class="profile-image-container">';
        echo '<img src="seller/'.$row['image_path'].'" >';
        echo '</div>';
        echo '</div>';
        // Display the product details in another column
        echo '<div class="col-9 ">';
        echo '<h3>'.$row['name'].'</h3>';
        echo '<p>Description: '.$row['description'].'</p>';
        echo '<p>Brand: '.$row['brand_name'].'</p>';    
        echo '<p>Price: '.$row['price'].'</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
     }
} else {
    echo "<p>No results found.</p>";
}

// Close the database connection
$conn->close();

?>

            </div>
        </div>
    </div>
</div>

<script>
    function getProductdetails(id) {
        window.location.href = "product.php?id="+id;
    }
</script>