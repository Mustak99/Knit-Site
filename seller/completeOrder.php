<?php include_once 'sellerHeader.php'; ?>

<?php
include_once("commonMethod.php");
$completeOrders = fetchcompleteOrders(connection(), $sellerId);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Complete Orders</title>
</head>

<body>
    <div id="overlay" class="overlay"></div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Order Date</th>
                    <th>Category</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($completeOrders) || (is_array($completeOrders) && empty($completeOrders[0]))): ?>
                    <tr>
                        <td colspan="7">No complete orders found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($completeOrders as $completeOrder): ?>
                        <tr>
                            <td>
                                <?php echo $completeOrder['OrderID']; ?>
                            </td>
                            <td>
                                <?php echo $completeOrder['CustomerName']; ?>
                            </td>
                            <td>
                                <?php echo $completeOrder['ProductName']; ?>
                            </td>
                            <td>
                                <?php echo $completeOrder['TotalPrice']; ?>
                            </td>
                            <td>
                                <?php echo $completeOrder['OrderDate']; ?>
                            </td>
                            <td>
                                <?php echo $completeOrder['Category']; ?>
                            </td>
                            <td>
                                <?php echo $completeOrder['Quantity']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>