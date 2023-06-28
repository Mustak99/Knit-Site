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
input::-ms-reveal, input::-ms-clear {
    display: none;
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
                            <h3 class="mb-4">Log In</h3>
                        </div>
                        <div class="w-100">
                            <p class="social-media d-flex justify-content-end">
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                            </p>
                        </div>
                    </div>
                    <form action="loginconnection.php" method="POST" class="signin-form">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="uname" value="<?php
                            if (isset($_COOKIE["rememberCookie"])) {
                                echo $_COOKIE["rememberCookie"];
                            }
                            ?>" required>
                            <label class="form-control-placeholder" for="username" >Username</label>
                        </div><br>
                        <div class="form-group">
                            <input id="password-field" type="password" name="psw" class="form-control"  required>
                            <label class="form-control-placeholder" for="password">Password</label>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                             <span style="color:red"><?php if(isset($_COOKIE["loginerror"])){echo$_COOKIE["loginerror"];} ?> </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" value="Submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                    <input type="checkbox" name="remember"  <?php
                            if (isset($_COOKIE["rememberCookie"])) {
                                echo "checked";
                            }
                           ?>>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                    <!--<p class="text-center">Don't have an account? <a data-toggle="tab" href="#">Sign Up</a></p>-->

                    <p class="text-center"><a href="../HomePage.php">Back</a></p>

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

</body>
</html>

