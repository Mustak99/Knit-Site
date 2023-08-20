<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registration</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="cssReg/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-30 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title p-b-10">Seller Registration</h2>
                    <form method="POST" action="sellerRegistrationProcess.php" onsubmit="return formValidForm()" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" id="firstname" name="first_name">
                                    <span id="errormsg1"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="text" name="email" id="useremail">
                                    <span id="errormsg2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <!-- <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Middle name</label>
                                    <input class="input--style-4" type="text" name="middle_name" id="middlename">
                                    <span id="errormsg3"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Business Type</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Men's wear
                                            <input type="radio" checked="checked" name="btype" value="mens">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Women's wear
                                            <input type="radio" name="btype" value="womens">
                                            <span class="checkmark"></span>
                                        </label><br>
                                        <label class="radio-container">kid's wear
                                            <input type="radio" name="btype" value="kids">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <!-- <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div> -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name</label>
                                    <input class="input--style-4" type="text" name="last_name" id="lastname">
                                    <span id="errormsg5"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone" id="phoneno">
                                    <span id="errormsg6"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Username</label>
                                    <input class="input--style-4" type="text" name="username" id="userName">
                                    <span id="errormsg7"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password" id="userpassword">
                                    <span id="errormsg8"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" type="password" name="confirmPassword" id="confPassword">
                                    <span id="errormsg9"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Pincode</label>
                                    <input class="input--style-4" type="text" name="pincode" id="pincode">
                                    <span id="errormsg10"></span>
                                </div>
                            </div>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Business Location</label>
                                    <input class="input--style-4" type="text" name="Address" id="address">
                                    <span id="errormsg11"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Business Document</label>
                                    <input class="input--style-4" type="file" name="fileupload" id="fileupload">
                                    <span id="fileupload">
                                        <?php if(isset($_COOKIE["errorcookie"])) echo $_COOKIE["errorcookie"]; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-15">
                                    <button class="btn btn--radius-2 btn-color1" name="submit" value="Submit" type="submit">Sign Up</button>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-15">
                                    <button class="btn btn--radius-2 btn-color1" type="reset">Clear</button>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space p-t-30 seller-reg">
                            <div class="col-5">
                                <center>
                                <div class="p-t-15">
                                    <a href="../login/login.php" style="text-decoration: none;">Already have an account?</a>
                                    <a href="../HomePage.php" style="padding-left:150px;text-decoration:none">Home-></a>
                                </div>
                                   
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="jsReg/global.js"></script>
    <script src="jsReg/regValidation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input").focusin(function() {
                $("#errormsg1,#errormsg2,#errormsg3,#errormsg5,#errormsg6,#errormsg7,#errormsg8,#errormsg9,#errormsg11,#errormsg10").text("");
            });
        });


    </script>

</body>

</html>
