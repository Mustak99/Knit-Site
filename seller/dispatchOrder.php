<?php include_once 'sellerHeader.php'; ?>
<?php
include_once("commonMethod.php");
$completeOrders = fetchCompleteOrders(connection(), $sellerId);
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
                    <th>Customer ID</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($completeOrders) || (is_array($completeOrders) && empty($completeOrders[0]))): ?>
                    <tr>
                        <td colspan="7">No dispatched orders found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($completeOrders as $completeOrder): ?>
                        <tr>
                            <td>
                                <?php echo @$completeOrder['OrderID']; ?>
                            </td>
                            <td>
                                <?php echo @$completeOrder['CustomerID']; ?>
                            </td>
                            <td>
                                <?php echo @$completeOrder['OrderDate']; ?>
                            </td>
                            <td>
                                <?php echo @$completeOrder['Status']; ?>
                            </td>
                            <td>
                                <?php echo @$completeOrder['ProductName']; ?>
                            </td>
                            <td>
                                <?php echo @$completeOrder['Quantity']; ?>
                            </td>
                            <td>
                                <?php echo @$completeOrder['TotalPrice']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>