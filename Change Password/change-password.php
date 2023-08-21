<?php include_once '../seller/sellerHeader.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script> -->

    <title>Change Password</title>

    <style>
        .form-container {
            display: grid;
            grid-template-columns: repeat(2, minmax(250px, 1fr));
            gap: 20px;
            margin: 0 auto;
            max-width: 800px;
        }

        .form-input {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .radio-label {
            margin-left: 5px;
        }

        form {
            font-size: 14px;
        }
    </style>
</head>

<body class="bg-white text-dark overflow-x-hidden">
    <form action="updateUser.php" method="post" class="m-5" name="registration-form"
        onsubmit="return formUpdateValidForm();">

        <div style="text-align: center;">
            <h2 class="mt-3">
                Change Password
            </h2>
        </div>

        <div class="form-container">
            <div class="form-input">
                <label class="form-label">Old Password</label>
                <input name="oldpassword" id="oldpassword" type="text" class="form-control" placeholder="enter old password">
                <span id="errormsg1"></span>
            </div>
            <div class="form-input">
                <label class="form-label">New Password</label>
                <input id="newpassword" name="newpassword" type="text" class="form-control"placeholder="enter new password">
            </div>
            <div class="form-input">
                <label class="form-label">Confirm New Password</label>
                <input id="confirmnewpassword" name="confirmnewpassword" type="text" class="form-control" placeholder="enter confirm password">
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="form-controls pt-2 pb-5">
                <button type="button" id="updateBtn" class="btn btn-primary">Change Password</button>
            </div>
        </div>
    </form>
    <script src="../Registration/jsReg/regValidation.js"></script>
</body>

</html>