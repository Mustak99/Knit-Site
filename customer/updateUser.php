<?php
session_start();

$con = new mysqli("localhost", "root", "", "knitsite") or die();

// Step 2: Prepare the update statement
$updateStmt = $con->prepare("UPDATE customerregistration SET UserFirstName=?, UserMiddleName=?, UserLastName=?, MobileNumber=?, UserName=?,EmailAddress=?,Address=?,Pincode=?,Gender=? WHERE UserName=?");

// Step 3: Bind parameters to the prepared statement
$UserFirstName = $_POST["firstname"];
$UserMiddleName = $_POST["middlename"];
$UserLastName = $_POST["lastname"];
$MobileNumber = $_POST["mobileno"];
$UserName = $_POST["username"];
// $Password = $_POST["password"];
$EmailAddress = $_POST["email"];
$Address = $_POST["address"];
$Pincode = $_POST["pincode"];
$Gender = $_POST["gender"];
// $BusinessDoc = $_POST["businessdoc"];

// Note the correct order of variables in the bind_param function
$updateStmt->bind_param("ssssssssss", $UserFirstName, $UserMiddleName, $UserLastName, $MobileNumber, $UserName, $EmailAddress, $Address, $Pincode, $Gender, $UserName);

// Step 4: Execute the prepared statement
if ($updateStmt->execute()) {
    // Step 5: Check if any rows were affected by the update
    if ($updateStmt->affected_rows > 0) {
        // Success: Redirect to UserProfile.php with a success message
        header('Location: UserProfile.php');
        setcookie('update', '1', time() + 2);
    } else {
        // No rows were affected: Redirect to UserProfile.php with a failure message
        header('Location: UserProfile.php');
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