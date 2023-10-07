<?php include_once 'sellerHeader.php'; ?>
<?php
include_once("commonMethod.php");
$pendingOrders = fetchPendingOrders(connection(), $sellerId);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pending Orders</title>
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
                <?php if (empty($pendingOrders) || (is_array($pendingOrders) && empty($pendingOrders[0]))): ?>
                    <tr>
                        <td colspan="7">No pending orders found.</td>
                    </tr>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php foreach ($pendingOrders as $pendingOrder): ?>
                    <?php if (is_array($pendingOrder)): ?>
                        <tr>
                            <td>
                                <?php echo @$pendingOrder['OrderID']; ?>
                            </td>
                            <td>
                                <?php echo @$pendingOrder['CustomerID']; ?>
                            </td>
                            <td>
                                <?php echo @$pendingOrder['OrderDate']; ?>
                            </td>
                            <td>
                                <?php echo @$pendingOrder['Status']; ?>
                            </td>
                            <td>
                                <?php echo @$pendingOrder['ProductName']; ?>
                            </td>
                            <td>
                                <?php echo @$pendingOrder['Quantity']; ?>
                            </td>
                            <td>
                                <?php echo @$pendingOrder['TotalPrice']; ?>
                            </td>
                            <td>
                                <a class="complete-link"
                                    href="sendEmail.php?id=<?php echo $pendingOrder['OrderID']; ?>&status=Dispatch">Dispatch</a>
                                <a class="reject-link"
                                    href="sendEmail.php?id=<?php echo $pendingOrder['OrderID']; ?>&status=Reject">Reject</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>