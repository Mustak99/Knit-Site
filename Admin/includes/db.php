<?php
   $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "knitsite";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
      

    $con = new mysqli($servername, $username, $password, $dbname) or die('not success');
    // Check connection
    
?>