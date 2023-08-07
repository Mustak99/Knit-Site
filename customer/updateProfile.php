<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <title>Edit profile</title>
</head>

<body class="bg-white text-dark overflow-x-hidden">

    <?php


if(isset($_SESSION["SellerUserID"])){
$sql =" SELECT UserId,UserFirstName,UserMiddleName,UserLastName,MobileNumber,EmailAddress,UserName,Address,Pincode,Gender,CreationDate,status FROM customerregistration where UserId=? LIMIT 1";
if ($stmt = $con->prepare($sql)) {
    $stmt->bind_param("s",$uid);
    $uid = $_SESSION["SellerUserID"];
    $stmt->execute();
    $res = $stmt->get_result();
    $cust_array = $res->fetch_assoc();


    // if (isset($_SESSION["LoginUserName"])) {
    $sql = " SELECT UserFirstName,UserMiddleName,UserLastName,MobileNumber,EmailAddress,UserName,Password,Address,Pincode,Gender FROM customerregistration where UserName=? LIMIT 1";
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("s", $uname);
        $uname = $_SESSION["LoginUserName"];
        $stmt->execute();
        $res = $stmt->get_result();
        $cust_array = $res->fetch_assoc();

        //    echo "<pre>";
        //    print_r($cust_array);
        //    echo "</pre>";

        $UserId = "";
        $UserFirstName = $cust_array["UserFirstName"];
        $UserMiddleName = $cust_array["UserMiddleName"];
        $UserLastName = $cust_array["UserLastName"];
        $MobileNumber = $cust_array["MobileNumber"];
        $EmailAddress = $cust_array["EmailAddress"];
        $UserName = $cust_array["UserName"];
        $Password = $cust_array["Password"];
        $Address = $cust_array["Address"];
        $Pincode = $cust_array["Pincode"];
        $Gender = $cust_array["Gender"];
    }
    // }

    ?>

    <center>
        <h1 class="mt-3">
            Update profile
        </h1>
    </center>
    <form action="updateUser.php" method="post" class="m-5" name="registration-form">
        <div class="gap-2 mx-4" style="display:grid;grid-template-columns:repeat(2 , minmax( 250px , 1fr));">
            <div class="form-input"><label class="form-label">First Name </label><input name="firstname" id="firstname"
                    type="text" class="form-control" value="<?php echo @$UserFirstName ?>" disabled></div>
            <div class="form-input"><label class="form-label">Middle Name </label><input id="mname" name="middlename"
                    type="text" class="form-control" value="<?php echo @$UserMiddleName ?>" disabled></div>
            <div class="form-input"><label class="form-label">Last Name </label><input id="lname" name="lastname"
                    type="text" class="form-control" value="<?php echo @$UserLastName ?>" disabled></div>
            <div class="form-input"><label class="form-label">Mobile Number </label><input id="cno" name="mobileno"
                    type="text" class="form-control" value="<?php echo @$MobileNumber ?>" disabled></div>
            <div class="form-input"><label class="form-label">Username </label><input id="email" name="username"
                    type="text" class="form-control" value="<?php echo @$UserName ?>" disabled></div>
            <div class="form-input"><label class="form-label">Password </label><input id="" name="password" type="text"
                    class="form-control" value="<?php echo @$Password ?>" disabled></div>
            <div class="form-input"><label class="form-label">Email Address </label><input id="email" name="email"
                    type="email" class="form-control" value="<?php echo @$EmailAddress ?>" disabled></div>
            <div class="form-input"><label class="form-label">pincode </label><input id="zip" name="pincode" type="text"
                    class="form-control" value="<?php echo @$Pincode ?>" disabled></div>
            <div class="form-input"><label class="form-label"> Address</label><textarea id="address" name="address"
                    type="text" class="form-control" value="" disabled><?php echo @$Address ?></textarea>

                <!-- gets attached through js -->
            </div>
            <div class="radio-input">
                <label class="form-label">Gender</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" name="gender" value="M" type="radio" id="male" <?php if (isset($Gender) && $Gender == "M")
                            echo "checked"; ?> disabled>
                        <label class="form-check-label">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="gender" value="F" type="radio" id="Female" <?php if (isset($Gender) && $Gender == "F")
                            echo "checked"; ?> disabled>
                        <label class="form-check-label">
                            Female
                        </label>
                    </div>
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column mt-3">

            <div class="form-controls pt-2 pb-5">
                <a href="HomePage.php" class="btn btn-danger">Back</a>
                <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
                <button type="submit" id="saveBtn" class="btn btn-success" style="display: none;">Save</button>
                <button type="button" id="cancelBtn" class="btn btn-secondary" style="display: none;">Cancel</button>
            </div>
        </div>

    </form>

    <script>
        const updateBtn = document.getElementById('updateBtn');
        const saveBtn = document.getElementById('saveBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const inputs = document.querySelectorAll('input[disabled], textarea[disabled], select[disabled]');

        updateBtn.addEventListener('click', () => {
            updateBtn.style.display = 'none';
            saveBtn.style.display = 'block';
            cancelBtn.style.display = 'block';

            inputs.forEach(input => {
                input.removeAttribute('disabled');
            });
        });

        cancelBtn.addEventListener('click', () => {
            saveBtn.style.display = 'none';
            updateBtn.style.display = 'block';
            cancelBtn.style.display = 'none';

            inputs.forEach(input => {
                input.setAttribute('disabled', 'disabled');
            });
        });
    </script>
</body>

</html>
