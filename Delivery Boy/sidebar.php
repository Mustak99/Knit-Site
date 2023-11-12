<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Knit Site</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Styling for the toggle switch */
        .toggle-switch {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Center horizontally */
            margin-top: 10px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input[type="checkbox"]:checked+.slider {
            background-color: #2196F3;
        }

        input[type="checkbox"]:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input[type="checkbox"]:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
    </style>


</head>

<body>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">Knit Site</span>
            </a>

            <?php

            $conn = new mysqli('localhost', 'root', '', 'knitsite');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $log_status = 0;
            $user_id = 0;
            $check_status = "";
            $change_state = 0;

            if (isset($_SESSION["user_id"])) {
                $user_id = trim($_SESSION["user_id"]);
            } else {
                die;
            }

            // Modify the update query to set login_status to 1 when the toggle is on
            $sql = "SELECT login_status FROM delivery_boys WHERE id = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $result->fetch_assoc();
                $log_status = $data["login_status"];
                $result->free();
                $stmt->close();
            }

            $conn->close();

            if ($log_status == 1) {
                $check_status = "checked";
            } else {
                $change_state = 1;
            }

            ?>
            <!-- Toggle switch in the middle -->
            <div id="toggle-switch-cont" class="d-flex justify-content-between py-0">
                <div class="p-4 text-white py-0">
                    <p class="pt-4">
                        <?php
                        if ($log_status == 1) {
                            echo "Online";
                        } else {
                            echo "Offline";
                        }

                        ?>
                    </p>
                </div>
                <div class="toggle-switch p-2 py-0">
                    <label class="switch">
                        <input type="checkbox" id="update-status-toogle" value="1" <?php echo $check_status; ?>
                            onchange="changeStatus(<?php echo $change_state; ?>);">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <!-- End of toggle switch -->
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item active">
                    <a class="sidebar-link" href="dashboard.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="order.php">
                        <i class="align-middle" data-feather="shopping-bag"></i> <span
                            class="align-middle">Orders</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="completeOrder.php">
                        <i class="align-middle" data-feather="check-circle"></i> <span
                            class="align-middle">Complete Orders</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="profile.php">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="chart.php">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="logout.php">
                        <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function changeStatus(loginStatus) {

            // Send an AJAX request to update login_status
            $.ajax({
                type: "POST",
                url: "update_login_status.php",
                data: { login_status: loginStatus },
                success: function (response) {
                    $("#toggle-switch-cont").html(response);
                },
                error: function (xhr, status, error) {
                    // Handle errors (if needed)
                    console.error(error);
                }
            });
        };

    </script>
</body>

</html>