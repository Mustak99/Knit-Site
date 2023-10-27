<?php include_once 'sellerHeader.php'; ?>
<?php
include_once("commonMethod.php");
$pendingOrders = fetchPendingOrders(connection(), $sellerId);
$orderCount = count($pendingOrders);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pending Orders</title>
</head>

<body>
    <div class="container">
        <?php if (empty($pendingOrders) || (is_array($pendingOrders) && empty($pendingOrders[0]))): ?>
            <div>No pending orders found.</div>
        <?php endif; ?>
        <?php $count = 0; ?>
        <?php foreach ($pendingOrders as $pendingOrder): ?>
            <?php if (is_array($pendingOrder)): ?>
                <div class="order">
                    <p>Order ID:
                        <?php echo @$pendingOrder['OrderID']; ?>
                    </p>
                    <p>Customer ID:
                        <?php echo @$pendingOrder['CustomerID']; ?>
                    </p>
                    <p>Order Date:
                        <?php echo @$pendingOrder['OrderDate']; ?>
                    </p>
                    <p>Status:
                        <?php echo @$pendingOrder['Status']; ?>
                    </p>
                    <p>Product Name:
                        <?php echo @$pendingOrder['ProductName']; ?>
                    </p>
                    <p>Quantity:
                        <?php echo @$pendingOrder['Quantity']; ?>
                    </p>
                    <p>Price:
                        <?php echo @$pendingOrder['TotalPrice']; ?>
                    </p>
                    <div class="order-actions">
                        <a class="complete-link"
                            href="sendEmail.php?id=<?php echo $pendingOrder['OrderID']; ?>&status=Dispatch">
                            <img src="./uploads/dispatch.png" alt="Dispatch" width="30" height="30" title="Dispatch">
                        </a>
                        <a class="reject-link" href="sendEmail.php?id=<?php echo $pendingOrder['OrderID']; ?>&status=Reject">
                            <img src="./uploads/reject.png" alt="Reject" width="30" height="30" title="Reject">
                        </a>
                    </div>
                </div>
                <?php $count++; ?>
                <?php if ($count % 4 === 0): ?>
                    <div style="flex-basis: 100%; height: 0;"></div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</body>

</html>