<?php

if (isset($_FILES)) {
    //    echo "<pre>";
//    print_r($_FILES);
//    echo "</pre>";

    $file_name = $_FILES["fileupload"]["name"];
    $file_size = $_FILES["fileupload"]["size"];
    $file_tmp = $_FILES["fileupload"]["tmp_name"];
    $ext = @strtolower(end(explode('.', $file_name)));

    if ($ext == "pdf") {
        if ($file_size > 8388608) {
            setcookie("errorcookie", "File size must be less than 8 MB", time() + 2);
            header("Location: seller.php");
            exit;
        } else {
            $path = "C:/xampp/htdocs/Knit-Site/Registration/sellerDocument";
            move_uploaded_file($file_tmp, $path . $file_name);
        }
    } else {
        setcookie("errorcookie", "Upload pdf file only", time() + 2);
        header("Location: seller.php");
        exit;
    }
}


$mysqli = new mysqli("localhost", "root", "", "knitsite");
//check connection
if ($mysqli === false) {
    die("error: Could not connect to database server.!" . $mysqli->connect_errorno);
}
//prepared statement
$sql = "Insert Into sellerregistration (SellerFirstName, SellerMiddleName, SellerLastName, MobileNumber, EmailAddress, UserName, Password, BusinessLocation, Pincode, BusinessType, CreationDate, businessdoc)
    values (?,?,?,?,?,?,?,?,?,?,?,?)";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ssssssssssss", $firstname, $middlename, $lastname, $mobilenumber, $emailaddress, $username, $password, $businesslocation, $pincode, $businesstype, $dt, $doc);
    $firstname = $_POST['first_name'];
    $middlename = $_POST['middle_name'];
    $lastname = $_POST['last_name'];
    $mobilenumber = $_POST['phone'];
    $emailaddress = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $businesslocation = $_POST['Address'];
    $pincode = $_POST['pincode'];
    $businesstype = $_POST['btype'];
    $dt = date('y-m-d h:i:s');
    $doc = $file_name;
    $stmt->execute();

    header("location:../login/login.php");
} else {
    echo "There is a Problem in Preparation of Query.!" . $mysql->error;
}
$stmt->close();
$mysqli->close();
?>