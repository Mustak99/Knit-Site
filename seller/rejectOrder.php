<?php include_once 'sellerHeader.php'; ?>
<?php
include_once("commonMethod.php");
$rejectOrders = fetchRejectOrders(connection(), $sellerId);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Reject Orders</title>
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
                <?php if (empty($rejectOrders) || (is_array($rejectOrders) && empty($rejectOrders[0]))): ?>
                    <tr>
                        <td colspan="7">No reject orders found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($rejectOrders as $rejectOrder): ?>
                        <tr>
                            <td>
                                <?php echo @$rejectOrder['OrderID']; ?>
                            </td>
                            <td>
                                <?php echo @$rejectOrder['CustomerID']; ?>
                            </td>
                            <td>
                                <?php echo @$rejectOrder['OrderDate']; ?>
                            </td>
                            <td>
                                <?php echo @$rejectOrder['Status']; ?>
                            </td>
                            <td>
                                <?php echo @$rejectOrder['ProductName']; ?>
                            </td>
                            <td>
                                <?php echo @$rejectOrder['Quantity']; ?>
                            </td>
                            <td>
                                <?php echo @$rejectOrder['TotalPrice']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>