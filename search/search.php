<?php include_once '../head.php';
include_once '../header.php';
?>
<div id="search-results">

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
            echo '<div class="container shadow p-3 mb-2 bg-white rounded">';
            echo '<div class="row">';
            // Display the profile image in one column
            echo '<div class="col-3 " style="overflow:hidden; height:100%;">';
            echo '<div class="profile-image-container">';
            echo '<img style="height:200px"  src="../seller/' . $row['image_path'] . '" >';
            echo '</div>';
            echo '</div>';
            // Display the product details in another column
            echo '<div class="col-6 ">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>Brand: ' . $row['brand_name'] . '</p>';
            echo '<p>Description: ' . $row['description'] . '</p>';
            echo '</div>';
            echo '<div class="col-3 ">';
            echo '<div class="d-flex flex-row align-items-center mb-1">';
            echo '<h4 class="mb-1 me-1">₹' . $row['price'] . '</h4>';
            // echo '<span class="text-danger"><s>Charges on shipping</s></span>';
            echo '</div>';
            echo '<h7 class="text-success">Charges on shipping</h7>';
            echo '<div class="d-flex flex-column mt-4">';
            echo '<a class="btn rounded btn-outline-info btn-sm" type="button" href="../cart/viewProduct.php">Details</a>';
            echo '<a class="btn btn-outline-primary rounded btn-sm mt-2" type="button" href="../cart/insertIntoCart.php?product_id=' . $row['id'] . '&price='.$row['price'].'">  ';
            echo '  Add to wishlist';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No results found.</p>";
    }

    // Close the database connection
    $conn->close();

    include_once'../footer.php';
    ?>

