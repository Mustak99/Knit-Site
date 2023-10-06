<?php include_once 'sellerHeader.php'; ?>
<?php
include_once("commonMethod.php");
// $idVal = totalProduct(connection());
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
            </tbody>
        </table>
    </div>
</body>

</html>