<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        /* Add your CSS styles here */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            display: none;
        }

        .email-container,
        .otp-container {
            display: block;
        }

        .hidden {
            display: none;
        }

        /* Style for the square-shaped OTP input boxes */
        .otp-input {
            width: 50px;
            /* Set the width to create a square */
            height: 50px;
            /* Set the height to match the width and create a square */
            text-align: center;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: inline-block;
            font-size: 20px;
            /* Adjust font size for better visibility */
        }

        /* To display all OTP inputs in a single line */
        .otp-container {
            display: flex;
            align-items: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="form-container">
        <h2>Forgot Password</h2>
        <form id="forgotPasswordForm">
            <div class="email-container">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <span class="error-message" id="emailError">Please enter a valid email address</span>
            <br>
            <button type="button" onclick="validateEmail()">Next</button>
        </form>
    </div>

    <script>
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

        function validateEmail() {
            const emailInput = document.getElementById("email");
            const emailError = document.getElementById("emailError");

            // Regular expression for email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(emailInput.value)) {
                emailError.style.display = "block";
            } else {
                
            
                require_once 'connection.php';

                $sql = "SELECT EmailAddress	 FROM customerregistration WHERE EmailAddress = ? LIMIT 1";
                $sql2 = "SELECT EmailAddress FROM sellerregistartion WHERE EmailAddress = ? LIMIT 1";

                if ($stmt = $con -> prepare($sql)) {
                    $stmt -> bind_param("s", $mail_id);
                    $mail_id = $email_id;
                    $stmt -> execute();
                    $result = $stmt -> get_result();
                    $customer_num_rows = $result -> num_rows;
                }

                $result -> free();
                $stmt -> close();

                if ($customer_num_rows === 0) {
                    if ($stmt = $con -> prepare($sql2)) {
                        $stmt -> bind_param("s", $mail_id);
                        $mail_id = $email_id;
                        $stmt -> execute();
                        $result = $stmt -> get_result();
                        $seller_num_rows = $result -> num_rows;
                    }
                

                    $result -> free();
                    $stmt -> close();

                    if ($seller_num_rows === 1) {
                        // it is customer
                        $otp = rand("111111", "999999");
                        echo $otp;
                        // $_SESSION["otpGeneratedForPass"] = md5($otp);

                        // // send mail
                        // $vc = new VerificationCode($email_id, $otp);
                        // $vc -> sendMail();

                        // showOTP($email_id);
                    } else {
            echo '<div class="wrap-input100 validate-input" id="usernameErrorMssg" data-validate = "Invalid email id">
                            < input class="input100" type = "text" name = "emailid" id = "forgotPassEmailid" placeholder = "Email Id" />
        </div > ';

            echo '<p class="text-danger"> No such email id found </p>';

            echo '<div class="container-login100-form-btn">
                            < div class="wrap-login100-form-btn" >
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type="button" name="forgotPassword" id="forgotPasswordNext" value="submitEmail">
                    Next
                </button>
            </div >
        </div > ';
                    }
                } else {
                    // it is seller
                    $otp = rand("111111", "999999");
                    echo $otp;
                    // $_SESSION["otpGeneratedForPass"] = md5($otp);

                    // send mail
                    // $vc = new VerificationCode($email_id, $otp);
                    // $vc -> sendMail();

                    // showOTP($email_id);
                }

                $con -> close();
            }



            }

        // Hide the email container and the "Next" button
        $('.email-container, button').addClass('hidden');

        // Simulate an AJAX request to generate the OTP input boxes and "Submit OTP" button
        setTimeout(function () {
            // Create the individual OTP input boxes
            const otpInput1 = '<input type="text" class="otp-input" id="otp1" name="otp1" required maxlength="1">';
            const otpInput2 = '<input type="text" class="otp-input" id="otp2" name="otp2" required maxlength="1">';
            const otpInput3 = '<input type="text" class="otp-input" id="otp3" name="otp3" required maxlength="1">';
            const otpInput4 = '<input type="text" class="otp-input" id="otp4" name="otp4" required maxlength="1">';
            const otpInput5 = '<input type="text" class="otp-input" id="otp5" name="otp5" required maxlength="1">';
            const otpInput6 = '<input type="text" class="otp-input" id="otp6" name="otp6" required maxlength="1">';

            // Create the "Submit OTP" button
            const otpButton = '<button type="button" onclick="submitOTP()">Submit OTP</button>';

            // Add the OTP input boxes and "Submit OTP" button to the form
            $('#forgotPasswordForm').append('<div class="otp-container">' + otpInput1 + otpInput2 + otpInput3 + otpInput4 + otpInput5 + otpInput6 + otpButton + '</div>');
        }, 1000); // Simulating a delay for the AJAX response (1 second)
            }
        }

        function submitOTP() {
            // You can access each OTP input using their respective IDs (e.g., "otp1", "otp2", ..., "otp6")

            // Simulate another AJAX request to the server to verify the OTPs
            setTimeout(function () {
                // Here, you can perform the OTP verification or any other actions you need.

                // For this example, we'll just display an alert message for demonstration purposes.
                alert("OTP verification successful!");
            }, 1000); // Simulating a delay for the AJAX response (1 second)
        }
    </script>
</body>

</html>