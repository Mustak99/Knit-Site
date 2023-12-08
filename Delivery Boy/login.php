<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
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
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn--radius-2 {
            background: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h2>User Login</h2>
    <form name="loginForm" method="post" action="loginProcess.php">
        <h3>Login Information:</h3>
        Mobile Number: <input type="text" name="phone_number" required><br><br>
        Password: <input type="password" name="password" required><br>
        <?php
        if (isset($_GET["error"])) {
            echo '<p class="error-message">Mobile number or password does not match</p>';
        }
        ?> <br>
        <input type="submit" name="login" value="Login" class="btn--radius-2">
        <p>Don't have an account ? <a href="registration.php">Sign up</a></p>

    </form>
</body>

</html>