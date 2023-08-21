<?php
session_start();

$con = new mysqli("localhost", "root", "", "knitsite") or die();

// Step 2: Prepare the update statement
$updateStmt = $con->prepare("UPDATE sellerregistration SET SellerFirstName=?, SellerMiddleName=?, SellerLastName=?, MobileNumber=?, UserName=?,EmailAddress=?,BusinessLocation=?,Pincode=?,BusinessType=? WHERE UserName=?");

// Step 3: Bind parameters to the prepared statement
$SellerFirstName = $_POST["firstname"];
$SellerMiddleName = $_POST["middlename"];
$SellerLastName = $_POST["lastname"];
$MobileNumber = $_POST["mobileno"];
$UserName = $_POST["username"];
// $Password = $_POST["password"];
$EmailAddress = $_POST["email"];
$BusinessLocation = $_POST["BusinessLocation"];
$Pincode = $_POST["pincode"];
$BusinessType = $_POST["BusinessType"];
// $BusinessDoc = $_POST["businessdoc"];

// Note the correct order of variables in the bind_param function
$updateStmt->bind_param("ssssssssss", $SellerFirstName, $SellerMiddleName, $SellerLastName, $MobileNumber, $UserName, $EmailAddress, $BusinessLocation, $Pincode, $BusinessType, $UserName);

// Step 4: Execute the prepared statement
if ($updateStmt->execute()) {
    // Step 5: Check if any rows were affected by the update
    if ($updateStmt->affected_rows > 0) {
        // Success: Redirect to sellerProfile.php with a success message
        header('Location: sellerProfile.php');
        setcookie('update', '1', time() + 2);
    } else {
        // No rows were affected: Redirect to sellerProfile.php with a failure message
        header('Location: sellerProfile.php');
        setcookie('update', '0', time() + 2);
    }
} else {
    // Error executing the prepared statement: Display the error message
    echo "Error updating record: " . $updateStmt->error;
}

// Step 6: Close the statement and the database connection
$updateStmt->close();
$con->close();
?>