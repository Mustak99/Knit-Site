<?php
session_start();

$con = new mysqli("localhost","root","","knitsite") or die();

// Step 2: Prepare the update statement
$updateStmt = $con->prepare("UPDATE customerregistration SET UserFirstName=?, UserMiddleName=?, UserLastName=?, MobileNumber=?,EmailAddress=?,Address=?,Pincode=?,Gender=? WHERE UserName=?");

// Step 3: Bind parameters to the prepared statement
$UserId=$_SESSION["LoginUserName"];
$UserFirstName=$_POST["fname"]; 
$UserMiddleName=$_POST["mname"];
$UserLastName=$_POST["lname"]; 
$MobileNumber=$_POST["cno"]; 
$EmailAddress=$_POST["email"];  
$Address=$_POST["address"]; 
$Pincode=$_POST["zip"]; 
$Gender=$_POST["gender"];     
$updateStmt->bind_param("sssssssss", $UserFirstName, $UserMiddleName, $UserLastName,$MobileNumber,$EmailAddress,$Address,$Pincode,$Gender,$UserId);

// Step 4: Execute the prepared statement
$updateStmt->execute();

// Step 5: Check for errors
if ($updateStmt->errno) {
    echo "Error updating record: " . $updateStmt->error;
} else {
    header('Location: updateProfile.php');
    setcookie('update', '1', time()+2);

}

// Step 6: Close the statement and the database connection
$updateStmt->close();
$con->close();

?>