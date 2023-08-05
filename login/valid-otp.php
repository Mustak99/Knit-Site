<?php

if (isset($_POST["SendOtpValues"])) {
    session_start();

    if (isset($_SESSION["otpGeneratedForPass"])) {
        $user_otp = md5(trim($_POST["SendOtpValues"]));
        $generated_otp = $_SESSION["otpGeneratedForPass"];
        // unset($_SESSION["otpGeneratedForPass"]);
        // session_destroy();

        if ($user_otp === $generated_otp) {
            echo '<div>
            <form action="change-password.php" method="POST" id="changePassForm">
                <div class="wrap-input100 validate-input" id="newPassword" data-validate="Invalid Password">
                    <input class="form-control" type="password" name="EnterNewPassword" id="newPass"
                        placeholder="New Password" />
                </div>

                <div class="wrap-input100 validate-input" id="newPasswordConfirms"
                    data-validate="Password does not match">
                    <input class="form-control" type="password" name="confirmPassword" id="confirmChangePassword"
                        placeholder="Confirm Password" />
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="form-control btn btn-primary rounded submit px-3" type="submit" name="changePasswordsDBSave"
                            id="changePassword" value="changePasswordDB">
                            Change Password
                        </button>
                    </div>
                </div>
            </form>
        </div>';

            echo '<script>
                document.getElementById("back-nav-links-cont").style.display = "none";
                document.getElementById("back-nav-links-cont-2").style.display = "none";
            </script>';
        } else {
            echo '<div class="main-otp-div">
                <div class="otp-input-container">
                    <input class="otp-input" type="text" maxlength="1" id="otpInput1"
                        autofocus />
                </div>

                <div class="otp-input-container">
                    <input class="otp-input" type="text" maxlength="1" id="otpInput2" />
                </div>

                <div class="otp-input-container">
                    <input class="otp-input" type="text" maxlength="1" id="otpInput3" />
                </div>

                <div class="otp-input-container">
                    <input class="otp-input" type="text" maxlength="1" id="otpInput4" />
                </div>

                <div class="otp-input-container">
                    <input class="otp-input" type="text" maxlength="1" id="otpInput5" />
                </div>

                <div class="otp-input-container">
                    <input class="otp-input" type="text" maxlength="1" id="otpInput6" />
                </div>
            </div>';

            echo '<br><p class="text-danger mt-2">Invalid OTP</p>';

            echo '<div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="form-control btn btn-primary rounded submit px-3" type="button" name="usbmitOTP"
                        id="otpSubmitButton" value="submitOTP">
                        Submit
                    </button>
                </div>
            </div>';
        }
    } else {
        session_destroy();
        header("Location: forgot-password.php");
    }
}

?>