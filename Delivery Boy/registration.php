<!DOCTYPE html>
<html>

<head>
    <title>Delivery Boy Registration Form</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.2);
        }

        .input-group {
            margin: 10px 0;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            height: 40px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col-2 {
            width: 48%;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .btn--radius-2 {
            background: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
    <script>
        function validateForm() {
            var errors = [];

            var fullName = document.forms["registrationForm"]["full_name"].value;
            var phoneNumber = document.forms["registrationForm"]["phone_number"].value;
            var email = document.forms["registrationForm"]["email"].value;
            var password = document.forms["registrationForm"]["password"].value;
            var confirmPassword = document.forms["registrationForm"]["confirm_password"].value;
            var streetAddress = document.forms["registrationForm"]["street_address"].value;
            var city = document.forms["registrationForm"]["city"].value;
            var state = document.forms["registrationForm"]["state"].value;
            var zipCode = document.forms["registrationForm"]["zip_code"].value;
            var dateOfBirth = document.forms["registrationForm"]["date_of_birth"].value;
            var licenseNumber = document.forms["registrationForm"]["license_number"].value;
            var issuingState = document.forms["registrationForm"]["issuing_state"].value;
            var expirationDate = document.forms["registrationForm"]["expiration_date"].value;
            var vehicleType = document.forms["registrationForm"]["vehicle_type"].value;

            // Validation rules
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var datePattern = /^\d{4}-\d{2}-\d{2}$/;
            var phonePattern = /^[6-9]\d{9}$/;
            var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,12}$/;

            if (fullName === "") {
                errors.push({ field: "full_name", message: "Full Name is required" });
            }
            if (phoneNumber === "") {
                errors.push({ field: "phone_number", message: "Phone Number is required" });
            } else if (!phoneNumber.match(phonePattern)) {
                errors.push({ field: "phone_number", message: "Please enter a valid phone number" });
            }
            if (email === "") {
                errors.push({ field: "email", message: "Email is required" });
            } else if (!email.match(emailPattern)) {
                errors.push({ field: "email", message: "Please enter a valid email address" });
            }
            if (password === "") {
                errors.push({ field: "password", message: "Password is required" });
            } else if (!password.match(passwordPattern)) {
                errors.push({ field: "password", message: "Password must be 8-12 characters and include at least one uppercase letter, one lowercase letter, one digit, and one special character" });
            }
            if (confirmPassword === "") {
                errors.push({ field: "confirm_password", message: "Confirm Password is required" });
            } else if (password !== confirmPassword) {
                errors.push({ field: "confirm_password", message: "Passwords do not match" });
            }
            if (streetAddress === "") {
                errors.push({ field: "street_address", message: "Street Address is required" });
            }
            if (city === "") {
                errors.push({ field: "city", message: "City is required" });
            }
            if (state === "") {
                errors.push({ field: "state", message: "State is required" });
            }
            if (zipCode === "") {
                errors.push({ field: "zip_code", message: "ZIP Code is required" });
            }
            if (dateOfBirth === "") {
                errors.push({ field: "date_of_birth", message: "Date of Birth is required" });
            } else if (!dateOfBirth.match(datePattern)) {
                errors.push({ field: "date_of_birth", message: "Please enter a valid date of birth (YYYY-MM-DD)" });
            }
            if (licenseNumber === "") {
                errors.push({ field: "license_number", message: "Driver's License Number is required" });
            }
            if (issuingState === "") {
                errors.push({ field: "issuing_state", message: "Issuing State is required" });
            }
            if (expirationDate === "") {
                errors.push({ field: "expiration_date", message: "Expiration Date is required" });
            }
            if (vehicleType === "") {
                errors.push({ field: "vehicle_type", message: "Vehicle Type is required" });
            }

            // Display errors
            errors.forEach(function (error) {
                document.getElementById(error.field + "_error").innerHTML = error.message;
            });

            // Check if there are errors
            if (errors.length > 0) {
                return false;
            }

            return true;
        }

        // Clear error messages when input fields are focused
        function clearError(field) {
            document.getElementById(field + "_error").innerHTML = "";
        }
    </script>
</head>

<body>
    <h2>Delivery Boy Registration Form</h2>
    <form name="registrationForm" method="post" action="registrationProcess.php" onsubmit="return validateForm()">
        <h3>Personal Information:</h3>
        Full Name: <input type="text" name="full_name" onfocus="clearError('full_name')"><br>
        <span id="full_name_error" style="color: red;"></span><br>

        <h3>Contact Information:</h3>
        Phone Number: <input type="text" name="phone_number" onfocus="clearError('phone_number')"><br>
        <span id="phone_number_error" style="color: red;"></span><br>
        <?php
        if (isset($_GET["error"])) {
            echo '<p style="color: red;">Mobile number already exixts</p>';
        }
        ?>
        Email Address: <input type="text" name="email" onfocus="clearError('email')"><br>
        <span id="email_error" style="color: red;"></span><br>

        <h3>Password Information:</h3>
        Password: <input type="password" name="password" onfocus="clearError('password')"><br>
        <span id="password_error" style="color: red;"></span><br>
        Confirm Password: <input type="password" name="confirm_password" onfocus="clearError('confirm_password')"><br>
        <span id="confirm_password_error" style="color: red;"></span><br>

        <h3>Address:</h3>
        Street Address: <input type="text" name="street_address" onfocus="clearError('street_address')"><br>
        <span id="street_address_error" style="color: red;"></span><br>
        City: <input type="text" name="city" onfocus="clearError('city')"><br>
        <span id="city_error" style="color: red;"></span><br>
        State: <input type="text" name="state" onfocus="clearError('state')"><br>
        <span id="state_error" style="color: red;"></span><br>
        ZIP Code: <input type="text" name="zip_code" onfocus="clearError('zip_code')"><br>
        <span id="zip_code_error" style="color: red;"></span><br>

        <h3>Date of Birth:</h3>
        <input type="date" name="date_of_birth" onfocus="clearError('date_of_birth')"><br>
        <span id="date_of_birth_error" style="color: red;"></span><br>

        <h3>Gender:</h3>
        <input type="radio" name="gender" value="Male" checked> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other<br><br>

        <h3>Driver's License Information:</h3>
        Driver's License Number: <input type="text" name="license_number" onfocus="clearError('license_number')"><br>
        <span id="license_number_error" style="color: red;"></span><br>
        Issuing State: <input type="text" name="issuing_state" onfocus="clearError('issuing_state')"><br>
        <span id="issuing_state_error" style="color: red;"></span><br>
        Expiration Date: <input type="date" name="expiration_date" onfocus="clearError('expiration_date')"><br>
        <span id="expiration_date_error" style="color: red;"></span><br>

        <h3>Vehicle Information:</h3>
        Vehicle Type:
        <select name="vehicle_type" onfocus="clearError('vehicle_type')">
            <option value="">Select</option>
            <option value="Car">Car</option>
            <option value="Motorcycle">Motorcycle</option>
            <option value="Bicycle">Bicycle</option>
            <option value="Other">Other</option>
        </select><br>
        <span id="vehicle_type_error" style="color: red;"></span><br>

        <input type="submit" name="submit" value="Submit">

        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</body>

</html>