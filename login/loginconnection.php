<?php
//connection to database server
session_start();

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

$con=new mysqli("localhost","root","","knitsite");

if($con->connect_errno)
    die("connection Failed:".$con->connect_error);
if (isset($_POST['submit'])) {
        $username = $_POST['uname'];
        $password = md5($_POST['psw']);
        
//        first table

        $sql = "select * from admin where admin_login_id = '$username' and admin_password= '$password' ";  
        $result = mysqli_query($con, $sql);
   
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
        // second table
        
        $sql2 = "select * from customerregistration where UserName = '$username' and Password= '$password' and status='1'";  
        $result2 = mysqli_query($con, $sql2);
   
        
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);  
        $count2 = mysqli_num_rows($result2); 
        
//        Third table
        $sql3 = "select * from  sellerregistration where UserName = '$username' and Password= '$password'and status='1'";  
        $result3 = mysqli_query($con, $sql3);
   
        
        $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);  
        $count3 = mysqli_num_rows($result3);
        
        if($count == 1){  
            if (isset($_POST["remember"])) {
                setcookie("rememberCookie", $username, time()+60*60*24);
            }
            else {
                setcookie("rememberCookie", $username, time()-60);
            }
            

            $_SESSION["LoginUserName"] = $row["admin_login_id"];
            $_SESSION["adminName"] = $row["admin_login_id"];
            header("Location: ../HomePage.php");
            
        }  
        
       elseif ($count2 == 1) {
            if (isset($_POST["remember"])) {
                setcookie("rememberCookie", $username, time()+60*60*24);
            }
            else {
                setcookie("rememberCookie", $username, time()-60);
            }
            

            $_SESSION["LoginUserName"] = $username;
            $_SESSION["UserID"] = $row2["UserId"];
            echo $_SESSION["UserID"];
            header("Location: ../HomePage.php");
        }
        
         elseif ($count3 == 1) {
            if (isset($_POST["remember"])) {
                setcookie("rememberCookie", $username, time()+60*60*24);
            }
            else {
                setcookie("rememberCookie", $username, time()-60);
            }
            

            $_SESSION["LoginUserName"] = $username;
            $_SESSION["SellerUserID"] = $row3["SellerId"];
            echo $_SESSION["UserID"];
            header("Location: ../HomePage.php");
        }
       
        
        else{
                 setcookie("loginerror","Invalid Username or password !",time()+1);
            
            header("Location: login.php");
        }    
        
}  
 