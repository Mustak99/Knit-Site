<?php
include_once("commonMethod.php");

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $street_address = $_POST["street_address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip_code = $_POST["zip_code"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $license_number = $_POST["license_number"];
    $issuing_state = $_POST["issuing_state"];
    $expiration_date = $_POST["expiration_date"];
    $vehicle_type = $_POST["vehicle_type"];

    // Get database connection
    $connection = connection();

    // Update user data
    $query = "UPDATE `delivery_boys` SET
        `full_name` = '$full_name',
        `phone_number` = '$phone_number',
        `email` = '$email',
        `street_address` = '$street_address',
        `city` = '$city',
        `state` = '$state',
        `zip_code` = '$zip_code',
        `date_of_birth` = '$date_of_birth',
        `gender` = '$gender',
        `license_number` = '$license_number',
        `issuing_state` = '$issuing_state',
        `expiration_date` = '$expiration_date',
        `vehicle_type` = '$vehicle_type'
        WHERE `id` = $user_id";

    $result = mysqli_query($connection, $query);

    // Check if the update was successful
    if ($result) {
        // Redirect to the profile page after updating
        header("Location: profile.php?update=success");
        exit();
    } else {
        // Redirect to the profile page with an error parameter
        header("Location: profile.php?update=error");
        exit();
    }
} else {
    // Redirect to the profile page if accessed without POST data
    header("Location: profile.php");
    exit();
}
?>