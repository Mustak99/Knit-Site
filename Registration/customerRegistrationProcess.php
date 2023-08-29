<?php

$mysqli = new mysqli("localhost", "root", "", "knitsite");
//check connection
if ($mysqli === false) {
    die("error: Could not connect to database server.!" . $mysqli->connect_errorno);
}
//prepared statement
$sql = "Insert Into customerregistration (UserFirstName, UserMiddleName, UserLastName, MobileNumber, EmailAddress, UserName, Password, Address, Pincode, Gender, CreationDate)
    values (?,?,?,?,?,?,?,?,?,?,?)";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("sssssssssss", $firstname, $middlename, $lastname, $mobilenumber, $emailaddress, $username, $password, $address, $pincode, $gender, $dt);
    $firstname = $_POST['first_name'];
    $middlename = $_POST['middle_name'];
    $lastname = $_POST['last_name'];
    $mobilenumber = $_POST['phone'];
    $emailaddress = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $address = $_POST['Address'];
    $pincode = $_POST['pincode'];
    $gender = $_POST['gender'];
    $dt = date('y-m-d h:i:s');
    $stmt->execute();

    header("location:../login/login.php");
} else {
    echo "There is a Problem in Preparation of Query.!" . $mysql->error;
}
$stmt->close();
$mysqli->close();
?>