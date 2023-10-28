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
                                    height="300" class="border">

                                <div class="card-body">
                                    <div class="card-heading">
                                        <h5 class="card-title">Customer:
                                            <?php echo @$pendingOrder['CustomerName']; ?>
                                        </h5>
                                    </div>
                                    <!-- <p class="card-text">Customer ID:
                                        <?php echo @$pendingOrder['CustomerID']; ?>
                                    </p> -->
                                    <p class="card-text">Order Date:
                                        <?php echo @$pendingOrder['OrderDate']; ?>
                                    </p>
                                    <p class="card-text">Status:
                                        <?php echo @$pendingOrder['Status']; ?>
                                    </p>
                                    <p class="card-text" class="text-justify">Product Name:
                                        <?php echo @$pendingOrder['ProductName']; ?>
                                    </p>
                                    <p class="card-text">Description:
                                        <?php echo @$pendingOrder['Description']; ?>
                                    </p>
                                    <p class="card-text">Quantity:
                                        <?php echo @$pendingOrder['Quantity']; ?>
                                    </p>
                                    <p class="card-text">Price:
                                        <?php echo @$pendingOrder['TotalPrice']; ?>
                                    </p>
                                    <div class="card-actions">
                                        <img src="./uploads/dispatch.png" alt="Dispatch" width="40" height="40"
                                            onclick="location.href='sendEmail.php?id=<?php echo $pendingOrder['OrderID']; ?>&status=Dispatch';"
                                            style="cursor: pointer;">
                                        <img src="./uploads/reject.png" alt="Reject" width="40" height="40" align="right"
                                            onclick="location.href='sendEmail.php?id=<?php echo $pendingOrder['OrderID']; ?>&status=Reject';"
                                            style="cursor: pointer;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>