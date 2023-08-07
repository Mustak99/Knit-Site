<?php include_once 'sellerHeader.php'; ?>
<body class="bg-white text-dark overflow-x-hidden">

    <?php

    $con = new mysqli("localhost", "root", "", "knitsite") or die();

    // if (isset($_SESSION["LoginUserName"])) {
    $sql = " SELECT SellerFirstName,SellerMiddleName,SellerLastName,MobileNumber,EmailAddress,UserName,Password,BusinessLocation,Pincode,BusinessType, businessdoc FROM sellerregistration where UserName=? LIMIT 1";
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("s", $uname);
        $uname = $_SESSION["LoginUserName"];
        $stmt->execute();
        $res = $stmt->get_result();
        $seller_array = $res->fetch_assoc();

        //    echo "<pre>";
        //    print_r($seller_array);
        //    echo "</pre>";
    
        $UserId = "";
        $SellerFirstName = $seller_array["SellerFirstName"];
        $SellerMiddleName = $seller_array["SellerMiddleName"];
        $SellerLastName = $seller_array["SellerLastName"];
        $MobileNumber = $seller_array["MobileNumber"];
        $EmailAddress = $seller_array["EmailAddress"];
        $UserName = $seller_array["UserName"];
        $Password = $seller_array["Password"];
        $BusinessLocation = $seller_array["BusinessLocation"];
        $Pincode = $seller_array["Pincode"];
        $BusinessType = $seller_array["BusinessType"];
        $BusinessDoc = $seller_array["businessdoc"];
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
                    type="text" class="form-control" value="<?php echo @$SellerFirstName ?>" disabled></div>
            <div class="form-input"><label class="form-label">Middle Name </label><input id="mname" name="middlename"
                    type="text" class="form-control" value="<?php echo @$SellerMiddleName ?>" disabled></div>
            <div class="form-input"><label class="form-label">Last Name </label><input id="lname" name="lastname"
                    type="text" class="form-control" value="<?php echo @$SellerLastName ?>" disabled></div>
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
            <div class="form-input"><label class="form-label">BusinessLocation</label><textarea id="address"
                    name="BusinessLocation" type="text" class="form-control" value=""
                    disabled><?php echo @$BusinessLocation ?></textarea>

                <!-- gets attached through js -->
            </div>
            <!-- ... Other HTML code ... -->
            <div class="form-input">
                <label class="form-label">Business Document</label>
                <!-- File input for Business Document -->
                <input type="file" id="businessDocInput" name="businessdoc" disabled>
                <!-- Display the current business document -->
                <?php if ($BusinessDoc): ?>
                    <p>Current Business Document:
                        <?php echo basename($BusinessDoc); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- ... Other HTML code ... -->

            <div class="radio-input">
                <label class="form-label">Business Type</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" name="BusinessType" value="mens" type="radio" id="mens" <?php if (isset($BusinessType) && $BusinessType == "electronic")
                            echo "checked"; ?> disabled>
                        <label class="form-check-label">
                            Men's wear
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="BusinessType" value="womens" type="radio" id="womens" <?php if (isset($BusinessType) && $BusinessType == "womens")
                            echo "checked"; ?> disabled>
                        <label class="form-check-label">
                            Women's wear
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="BusinessType" value="kids" type="radio" id="kids" <?php if (isset($BusinessType) && $BusinessType == "kids")
                            echo "checked"; ?> disabled>
                        <label class="form-check-label">
                            Kid's wear
                        </label>
                    </div>
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="form-controls pt-2 pb-5">
                <button type="button" id="cancelBtn" class="btn btn-secondary" style="display: none;">Cancel</button>
                <button type="submit" id="saveBtn" class="btn btn-success" style="display: none;">Save</button>
                <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
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
            saveBtn.style.display = 'inline-block';
            cancelBtn.style.display = 'inline-block';

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