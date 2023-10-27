<?php

//Function connect to the database server
function doDBConnect() {
    global $con;
    $con = new mysqli("localhost", "root", "", "knitsite") or die('not success');
    if (isset($con->connect_error)) {
        die("Connection failed" . $con->connect_error . "<br/>");
    } 
}

function doDBClose() {
    global $con;
    $con->close();
}

function goHome() {
    //echo "<br/><a href ='prac7_Home.php'>Home</a>";
}
doDBConnect();
?>

<?php
   $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "knitsite";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
      
    // Check connection
    if(!$connection){
        die('Database connection error : ' .mysql_error());
    }
?>