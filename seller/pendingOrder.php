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
        <?php else: ?>
            <div class="row">
                <?php foreach ($pendingOrders as $pendingOrder): ?>
                    <?php if (is_array($pendingOrder)): ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="<?php echo $pendingOrder['Image']; ?>" class="card-img-top" alt="Product Image"
                                    height="300">
                                <div class="card-body">
                                    <div class="card-heading">
                                        <h5 class="card-title">Order ID:
                                            <?php echo @$pendingOrder['OrderID']; ?>
                                        </h5>
                                    </div>
                                    <p class="card-text">Customer ID:
                                        <?php echo @$pendingOrder['CustomerID']; ?>
                                    </p>
                                    <p class="card-text">Order Date:
                                        <?php echo @$pendingOrder['OrderDate']; ?>
                                    </p>
                                    <p class="card-text">Status:
                                        <?php echo @$pendingOrder['Status']; ?>
                                    </p>
                                    <p class="card-text">Product Name:
                                        <?php echo @$pendingOrder['ProductName']; ?>
                                    </p>
                                    <p class="card-text">Quantity:
                                        <?php echo @$pendingOrder['Quantity']; ?>
                                    </p>
                                    <p class="card-text">Price:
                                        <?php echo @$pendingOrder['TotalPrice']; ?>
                                    </p>
                                    <div class="card-actions">
                                        <img class="btn" src="dispatch_image.png" alt="Dispatch"
                                            onclick="location.href='sendEmail.php?id=<?php echo $pendingOrder['OrderID']; ?>&status=Dispatch';"
                                            width="100" height="100">
                                        <img class="btn" src="./uploads/reject.png" alt="Reject" width="50" height="50"
                                            onclick="location.href='sendEmail.php?id=<?php echo $pendingOrder['OrderID']; ?>&status=Reject';">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS (optional, for interactive components) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>