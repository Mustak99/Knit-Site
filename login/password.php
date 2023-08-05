<?php

if (isset($_POST["emailIdToSendOtp"])) {
    session_start();
    $email_id = trim($_POST["emailIdToSendOtp"]);
    $_SESSION["forgotUserEmailIdPassChange"] = $email_id;

    if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
        session_destroy();
        header("Location: forgot_password.php");
        die;
    }

    require_once 'email.php';

    // function

    function showOTP($email)
    {
        echo "<script>
            setTimeout(function() {
                sessionStorage.removeItem('otpGeneratedForPass');
            }, 120000); // 60000 milliseconds = 1 minute
          </script>";

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

    require_once 'database.php';
    $connection = connection(connection());


    $sql = "SELECT EmailAddress FROM customerregistration WHERE EmailAddress = ? LIMIT 1";
    $sql2 = "SELECT EmailAddress FROM sellerregistration WHERE EmailAddress = ? LIMIT 1";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("s", $mail_id);
        $mail_id = $email_id;
        $stmt->execute();
        $result = $stmt->get_result();
        $seller_num_rows = $result->num_rows;
    }

    $result->free();
    $stmt->close();

    if ($seller_num_rows === 0) {
        if ($stmt = $connection->prepare($sql2)) {
            $stmt->bind_param("s", $mail_id);
            $mail_id = $email_id;
            $stmt->execute();
            $result = $stmt->get_result();
            $customer_num_rows = $result->num_rows;
        }

        $result->free();
        $stmt->close();

        if ($customer_num_rows === 1) {
            // it is customer
            $otp = 123456;
            $_SESSION["otpGeneratedForPass"] = md5($otp);

            // send mail
            $vc = new VerificationCode($email_id, $otp);
            $vc->sendMail();

            showOTP($email_id);
        } else {
            echo '<div class="wrap-input100 validate-input" id="usernameErrorMssg" data-validate = "Invalid email id">
            <input class="input100" type="text" name="emailid" id="forgotPassEmailid" placeholder="Email Id"/>
        </div>';

            echo '<p class="text-danger"> No such email id found </p>';

            echo '<div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type="button" name="forgotPassword" id="forgotPasswordNext" value="submitEmail">
                    Next
                </button>
            </div>
        </div>';
        }
    } else {
        // it is seller
        $otp = 123456;
        $_SESSION["otpGeneratedForPass"] = md5($otp);

        // send mail
        $vc = new VerificationCode($email_id, $otp);
        $vc->sendMail();

        showOTP($email_id);
    }

    $connection->close();
}

?>