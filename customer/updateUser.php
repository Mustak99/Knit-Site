<?php
session_start();

$con = new mysqli("localhost", "root", "", "knitsite") or die();

// Step 2: Prepare the update statement
$updateStmt = $con->prepare("UPDATE customerregistration SET UserFirstName=?, UserMiddleName=?, UserLastName=?, MobileNumber=?, UserName=?, Password=?,EmailAddress=?,Address=?,Pincode=?,Gender=? WHERE UserName=?");

// Step 3: Bind parameters to the prepared statement
$UserId = $_SESSION["LoginUserName"];
$updateStmt->bind_param("sssssssssss", $UserFirstName, $UserMiddleName, $UserLastName, $MobileNumber, $UserName, $Password, $EmailAddress, $Address, $Pincode, $Gender, $UserId);
$UserFirstName = $_POST["firstname"];
$UserMiddleName = $_POST["middlename"];
$UserLastName = $_POST["lastname"];
$MobileNumber = $_POST["mobileno"];
$UserName = $_POST["username"];
$Password = $_POST["password"];
$EmailAddress = $_POST["email"];
$Address = $_POST["address"];
$Pincode = $_POST["pincode"];
$Gender = $_POST["gender"];

// Step 4: Execute the prepared statement
$updateStmt->execute();

// Step 5: Check for errors
if ($updateStmt->errno) {
    echo "Error updating record: " . $updateStmt->error;
} else {
    header('Location: updateProfile.php');
    setcookie('update', '1', time() + 2);
}

// Step 6: Close the statement and the database connection
$updateStmt->close();
$con->close();
?>
