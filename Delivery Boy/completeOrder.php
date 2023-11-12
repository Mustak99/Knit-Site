<?php
include_once("commonMethod.php");
$name = getFullNameByUserId(connection(), $user_id);
$completeOrders = getCompleteOrder(connection(), $user_id);
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
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>

        <div class="main">
            <?php include 'head.php'; ?>

            <main class="content">
                <?php if (empty($completeOrders)): ?>
                    <p>No complete orders are found.</p>
                <?php else: ?>
                    <h1>Complete Orders</h1>
                    <table class="table">
                        <tr>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Order Date</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                        </tr>
                        <?php foreach ($completeOrders as $completeorder): ?>
                            <tr>
                                <td>
                                    <?php echo $completeorder['customer_name']; ?>
                                </td>
                                <td>
                                    <?php echo $completeorder['product_name']; ?>
                                </td>
                                <td>
                                    <?php echo $completeorder['product_description']; ?>
                                </td>
                                <td>
                                    <?php echo $completeorder['order_date']; ?>
                                </td>
                                <td>
                                    <?php echo $completeorder['product_price']; ?>
                                </td>
                                <td>
                                    <?php echo $completeorder['quantity']; ?>
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