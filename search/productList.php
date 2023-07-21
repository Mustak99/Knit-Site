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

            </div>
        </div>
    </div>
</div>