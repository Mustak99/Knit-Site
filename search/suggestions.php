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
$query = $_GET['term'];

// Perform search query
$stmt = $pdo->prepare("SELECT name FROM products WHERE name LIKE :query");
$stmt->bindValue(':query', '%' . $query . '%');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Output search results
echo json_encode($result);
?>
