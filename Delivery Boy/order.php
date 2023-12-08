<?php
include_once("commonMethod.php");
$name = getFullNameByUserId(connection(), $user_id);
$userOrders = getUserOrder(connection(), $user_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Knit Site</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <script>
        function confirmComplete(orderId) {
            var confirmation = confirm("Are you sure you want to complete this order?");
            if (confirmation) {
                // If the user confirms, redirect to the completeOrderProcess.php with the order ID
                window.location.href = "completeOrderProcess.php?id=" + orderId;
            }
        }
    </script>
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>

        <div class="main">
            <?php include 'head.php'; ?>

            <main class="content">
                <?php if (empty($userOrders)): ?>
                    <p>No orders are found.</p>
                <?php else: ?>
                    <h1>User Orders</h1>
                    <table class="table">
                        <tr>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Address</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                        </tr>
                        <?php foreach ($userOrders as $order): ?>
                            <tr>
                                <td>
                                    <?php echo $order['customer_name']; ?>
                                </td>
                                <td>
                                    <?php echo $order['product_name']; ?>
                                </td>
                                <td>
                                    <?php echo $order['product_description']; ?>
                                </td>
                                <td>
                                    <?php echo $order['address']; ?>
                                </td>
                                <td>
                                    <?php echo $order['product_price']; ?>
                                </td>
                                <td>
                                    <?php echo $order['quantity']; ?>
                                </td>
                                <td>
                                    <a class="edit-link" style="text-decoration:none;" href="javascript:void(0);"
                                        onclick="confirmComplete(<?php echo $order['order_id']; ?>);">
                                        <img src="./img/complete.png" alt="Complete" width="35" height="35">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>

</html>