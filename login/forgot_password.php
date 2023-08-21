<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <!--bootstrap-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <style>
        .nav-links-change-margin {
            margin-top: 160px;
        }

        .otp-input-container {
            display: flex;
            margin: 3px;
        }

        .otp-input {
            border: 1px solid grey;
            width: 40px;
            height: 40px;
            border-radius: 5px;
            text-align: center;
        }

        .otp-input:focus {
            border-color: black !important;
        }

        .main-otp-div {
            display: flex;
        }

        #loader {
            display: none;
            justify-content: center;
        }

        #loader img {
            height: 80px;
            width: 80px;
        }
    </style>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(images/bg-1.png);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Reset Password</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div id="changeToOTPCont">
                                <div class="wrap-form-control validate-input" id="usernameErrorMssg"
                                    data-validate="Invalid email id">
                                    <input class="form-control" type="text" name="emailid" id="forgotPassEmailid"
                                        placeholder="Email Id" />
                                </div>

                                <div class="container-login100-form-btn">
                                    <div class="wrap-login100-form-btn">
                                        <div class="form-group"></div>
                                        <button class=" form-control btn btn-primary rounded submit px-3" type="button"
                                            name="forgotPassword" id="forgotPasswordNext" value="submitEmail">
                                            Next
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center"><a href="login.php">Back</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>

    <script src="../assets/javaScripts/jquery-3.6.0.js"></script>
    <script>
        $(document).on('click', "#forgotPasswordNext", function () {
            var value = $("#forgotPassEmailid").val();

            // Function to validate an email address using regular expression
            function isValidEmail(email) {
                const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
                return emailPattern.test(email);
            }

            if (!isValidEmail(value)) {
                $("#usernameErrorMssg").addClass("alert-validate");
                return;
            }

            $.ajax({
                url: "password.php",
                type: "POST",
                data: {
                    emailIdToSendOtp: value
                },
                beforeSend: function () {
                    $("#loader").css("display", "flex");
                },
                success: function (response) {
                    $("#changeToOTPCont").html(response);
                    $("#loader").css("display", "none");
                }
            });
        });


        $(document).on('click', "#otpSubmitButton", function () {
            var value = $("#otpInput1").val() + '' + $("#otpInput2").val() + '' + $("#otpInput3").val() + '' + $("#otpInput4").val() + '' + $("#otpInput5").val() + '' + $("#otpInput6").val() + '';

            $.ajax({
                url: "valid-otp.php",
                type: "POST",
                data: {
                    SendOtpValues: value
                },
                beforeSend: function () {
                    $("#loader").css("display", "flex");
                },
                success: function (response) {
                    $("#changeToOTPCont").html(response);
                    $("#loader").css("display", "none");
                }
            });
        });


        // validing form

        $(document).on("submit", "#changePassForm", function (event) {
            event.preventDefault();

            var password = $("#newPass").val();
            var confirmPassword = $("#confirmChangePassword").val();

            // Check if the password fields are not empty
            if (password.trim() === '') {
                $("#newPassword").addClass("alert-validate");
                return;
            }

            if (confirmPassword.trim() === '') {
                $("#newPasswordConfirms").addClass("alert-validate");
                return;
            }

            // Password validation: Allow alphabets, numbers, and underscores only
            var passwordPattern = /^[A-Za-z0-9_]{8,12}$/;
            if (!passwordPattern.test(password)) {
                $("#newPassword").addClass("alert-validate");
                return;
            }


            // Check if the passwords match
            if (password !== confirmPassword) {
                $("#newPasswordConfirms").addClass("alert-validate");
                return;
            }

            $("#changePassForm")[0].submit();
        });

        $(document).on("focus", "input", function () {
            $("#newPassword").removeClass("alert-validate");
            $("#newPasswordConfirms").removeClass("alert-validate");
            $("#usernameErrorMssg").removeClass("alert-validate");
        });



        $(document).ready(function () {
            $(document).on('input', '.otp-input', function (event) {
                const value = $(this).val();
                if (value) {
                    const inputs = $('.otp-input');
                    const index = inputs.index(this);
                    if (index < inputs.length - 1) {
                        inputs.eq(index + 1).focus();
                    }
                }
            });

            $(document).on('keydown', '.otp-input', function (event) {
                if (event.key === 'Backspace' && !$(this).val()) {
                    event.preventDefault();
                    const inputs = $('.otp-input');
                    const index = inputs.index(this);
                    if (index > 0) {
                        inputs.eq(index - 1).focus();
                        const length = inputs.eq(index - 1).val().length;
                        inputs.eq(index - 1).get(0).setSelectionRange(length, length);
                    }
                }
            });
        });
    </script>

</body>

</html>