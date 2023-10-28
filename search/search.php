<?php
$search = 1;
include_once '../head.php';
include_once '../header.php';
?>

<div id="search-results">
    <div class="row">
        <?php
        $search = 1;
        $host = 'localhost';
        $dbname = 'knitsite';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }

        // Retrieve search query
        @$query = trim($_GET["name"]);

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
                echo '<div class="col-md-3">';
                echo '<div class="card mb-4">';
                echo '<img src="../seller/' . $row['image_path'] . '" class="card-img-top" style="height: 400px;" alt="' . $row['name'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title" align="center">' . $row['name'] . '</h5>';
                echo '<h4 class="card-price" align="center">₹' . $row['price'] . '</h4>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<div class="d-flex justify-content-between bg-light border">';
                echo '<a href="../cart/viewProduct.php?product_id=' . $row['id'] .'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>';
                echo '<a href="../cart/insertIntoCart.php?product_id=' . $row['id'] . '&price=' . $row['price'] . '" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                
            }
        } else {
            echo "<p>No results found.</p>";
        }

        $conn->close();
        ?>

    </div>
</div>

<?php include_once '../footer.php'; ?>