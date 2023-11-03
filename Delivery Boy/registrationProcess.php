<?php
// Create a database connection
$conn = new mysqli("localhost", "root", "", "knitsite");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $street_address = $_POST["street_address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip_code = $_POST["zip_code"];
    $password = md5($_POST["password"]);
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $license_number = $_POST["license_number"];
    $issuing_state = $_POST["issuing_state"];
    $expiration_date = $_POST["expiration_date"];
    $vehicle_type = $_POST["vehicle_type"];

    // Check if the phone number already exists
    $check_phone_query = "SELECT phone_number FROM delivery_boys WHERE phone_number = ?";
    $stmt_check = $conn->prepare($check_phone_query);
    $stmt_check->bind_param("s", $phone_number);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // Phone number already exists, display an error message
        header("Location: registration.php?error=1");
    } else {
        // Phone number is unique, proceed with insertion
        $insert_query = "INSERT INTO delivery_boys (full_name, phone_number, email, street_address, city, state, zip_code, password, date_of_birth, gender, license_number, issuing_state, expiration_date, vehicle_type)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssssssssssssss", $full_name, $phone_number, $email, $street_address, $city, $state, $zip_code, $password, $date_of_birth, $gender, $license_number, $issuing_state, $expiration_date, $vehicle_type);

        if ($stmt->execute()) {
            header("Location: login.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the database connections
    $stmt_check->close();
    $stmt->close();
    $conn->close();
}
?>