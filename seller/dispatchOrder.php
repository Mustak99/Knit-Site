<?php include_once 'sellerHeader.php'; ?>

<?php
include_once("commonMethod.php");
$dispatchOrders = fetchDispatchOrders(connection(), $sellerId);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dispatch Orders</title>
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
                <?php if (empty($dispatchOrders) || (is_array($dispatchOrders) && empty($dispatchOrders[0]))): ?>
                    <tr>
                        <td colspan="7">No dispatch orders found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($dispatchOrders as $dispatchOrder): ?>
                        <tr>
                            <td>
                                <?php echo $dispatchOrder['OrderID']; ?>
                            </td>
                            <td>
                                <?php echo $dispatchOrder['CustomerName']; ?>
                            </td>
                            <td>
                                <?php echo $dispatchOrder['ProductName']; ?>
                            </td>
                            <td>
                                <?php echo $dispatchOrder['TotalPrice']; ?>
                            </td>
                            <td>
                                <?php echo $dispatchOrder['OrderDate']; ?>
                            </td>
                            <td>
                                <?php echo $dispatchOrder['Category']; ?>
                            </td>
                            <td>
                                <?php echo $dispatchOrder['Quantity']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>