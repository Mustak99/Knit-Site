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
$query = $_POST['query'];

// Perform search query
$stmt = $pdo->prepare("SELECT * FROM product WHERE name LIKE :query");
$stmt->bindValue(':query', '%' . $query . '%');
$stmt->execute();
$result = $stmt->fetchAll();

// Output search results
if (count($result) > 0) {
    foreach ($result as $row) {
        echo'<div class="container">';
        echo'<div class="row">';
        echo'<div class="col-2">';
                echo '<div class="profile-image-container">';
                echo '<img src="'.$row['image_path'].'" alt="Shoe Image" class="profile-image">';
                echo "</div>";
                echo'</div>';
                echo'<div class="col">';
                 
            echo "<h3>".$row['shoe_name']."</h3>";
                echo "<p>Description:".$row['description']."</p>";
                echo "<p>Brand:".$row['brand_name']."</p>";
                echo "<p>Category:".$row['category']."</p>";
                echo "<p>Price: ".$row['price']."</p>";
                echo'</div>';
        echo'</div>';
        echo'</div>';
    }
} else {
    echo "<p>No results found.</p>";
}
?>
