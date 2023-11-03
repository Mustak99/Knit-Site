<?php include_once 'sellerHeader.php'; ?>
<?php
include_once("commonMethod.php");
$deliveryBoys = fetchDeliveryBoy(connection(), $sellerId);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Delivery Boy Management</title>
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Vehicle Type</th>
                    <th>Assign Order</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deliveryBoys as $deliveryBoy): ?>
                    <tr>
                        <td>
                            <?php echo $deliveryBoy['full_name']; ?>
                        </td>
                        <td>
                            <?php echo $deliveryBoy['phone_number']; ?>
                        </td>
                        <td>
                            <?php echo $deliveryBoy['gender']; ?>
                        </td>
                        <td>
                            <?php echo $deliveryBoy['vehicle_type']; ?>
                        </td>
                        <td>
                            <a
                                href="assignOrderProcess.php?order_id=<?php echo $_GET['id']; ?>&delivery_boy_id=<?php echo $deliveryBoy['id']; ?>">
                                <img src="./uploads/assign-order.png" alt="Assign Order" width="40" height="40"
                                    style="cursor: pointer;" title="Assign order">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>