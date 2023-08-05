<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <title>Edit profile</title>
</head>
<body class="bg-white text-dark overflow-x-hidden" >

<?php

$con = new mysqli("localhost","root","","knitsite") or die();

if(isset($_SESSION["SellerUserID"])){
$sql =" SELECT UserId,UserFirstName,UserMiddleName,UserLastName,MobileNumber,EmailAddress,UserName,Address,Pincode,Gender,CreationDate,status FROM customerregistration where UserId=? LIMIT 1";
if ($stmt = $con->prepare($sql)) {
    $stmt->bind_param("s",$uid);
    $uid = $_SESSION["SellerUserID"];
    $stmt->execute();
    $res = $stmt->get_result();
    $cust_array = $res->fetch_assoc();

//    echo "<pre>";
//    print_r($cust_array);
//    echo "</pre>";

    $UserId="";
    $UserFirstName=$cust_array["UserFirstName"]; 
    $UserMiddleName=$cust_array["UserMiddleName"];
    $UserLastName=$cust_array["UserLastName"]; 
    $MobileNumber=$cust_array["MobileNumber"]; 
    $EmailAddress=$cust_array["EmailAddress"]; 
    $UserName=$cust_array["UserName"]; 
    $Address=$cust_array["Address"]; 
    $Pincode=$cust_array["Pincode"]; 
    $Gender=$cust_array["Gender"];          
}  

}  

?>

    <center>
        <h1 class="mt-3">
            Update user profile
</h1>
    </center>
    <form action="updateUser.php" method="post" class="m-5"  name="registration-form">
        <div class="gap-2 mx-4" style="display:grid;grid-template-columns:repeat(2 , minmax( 250px , 1fr));">
            <div class="form-input"><label class="form-label"  for="fname">First Name </label><input pattern="[A-Za-z]{4,10}" title="Enter a valid name" required placeholder="ex-Rohan"  name="fname" id="fname" type="text" class="form-control" value="<?php echo @$UserFirstName?>"></div>
            <div class="form-input"><label class="form-label" for="mname">Middle Name  </label><input required pattern="[A-Za-z]{4,10}" title="Enter a valid name" id="mname" placeholder="ex-Chetan" name="mname" type="text" class="form-control" value="<?php echo @$UserMiddleName?>"></div>
            <div class="form-input"><label class="form-label" for="lname">Last Name  </label><input required pattern="[A-Za-z]{4,10}" title="Enter a valid name" id="lname" placeholder="ex-Patel" name="lname" type="text" class="form-control" value="<?php echo @$UserLastName?>"></div>
            <div class="form-input"><label class="form-label" for="zip">pincode  </label><input required pattern="[0-9]{6}" title="Enter valid zip" id="zip" placeholder="ex-394651" name="zip" type="text" class="form-control" value="<?php echo @$Pincode?>"></div>
            <div class="form-input"><label class="form-label" for="cno">Contact Number  </label><input required pattern="[0-9]{10}" title="Enter valid phone number" id="cno" placeholder="ex-1234567890" name="cno" type="text"class="form-control"  value="<?php echo @$MobileNumber?>"></div>
            <div class="form-input"><label class="form-label" for="email">Email Address  </label><input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter valid email" required id="email" placeholder="ex-username@doamin" name="email" type="email" class="form-control" value="<?php echo @$EmailAddress?>"></div>
            <div class="form-input"><label class="form-label" for="address"> Address</label><textarea pattern="[A-Za-z0-9 ,-]{6 , 40}" required id="address" placeholder="" name="address" type="text" class="form-control" value="" ><?php echo @$Address?></textarea>
               
                <!-- gets attached through js -->
            </div>
            <div class="radio-input">
                <P for="gender">Select your gender</P>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" name="gender" value="M" type="radio" id="male" <?php if(isset($Gender) && $Gender == "M") echo "checked";?>>
                                  <label class="form-check-label" for="male">
                    Male
                                  </label>
                                </div>
                    <div class="form-check">
                                  <input class="form-check-input" name="gender" value="F" type="radio" id="Female" <?php if(isset($Gender) && $Gender == "F") echo "checked";?>>
                                  <label class="form-check-label" for="Female">
                    Female
                                  </label>
                                </div>
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column mt-3">
        <p>
  
  
</p>
<!-- <button type="button" onclick="enableAllInput()" name="toggleState" class="btn btn-primary">Update</button> -->
        <div class="form-controls pt-2 pb-5">
            <a href="HomePage.php">
            <input href="HomePage.php" type="button" class="btn btn-danger" value="back"></a>
            <input type="submit" name="submit" value="submit" class="btn btn-success">
        </div>
        </div>
    
    </form>

<?php if(isset( $_COOKIE['update']))echo "<script>alert('Update Profile Successfully!');</script>"; ?>


<script>

</script>


</body>

</html>