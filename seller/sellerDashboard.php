<?php include_once 'sellerHeader.php';
?>
<?php
include_once("commonMethod.php");
$totalproduct = totalProduct(connection(), $sellerId);
$quantity = totalQuantity(connection(), $sellerId);
$revenue = totalRevenue(connection(), $sellerId);
$shirt = totalShirt(connection(), $sellerId);
$products = fetchProductsWithSizes(connection(), $sellerId);
$currentweek = fetchCurrentWeekRevenue(connection(), $sellerId);
$previousweek = fetchPreviousWeekRevenue(connection(), $sellerId);
$pendingordercount = fetchPendingOrdersCount(connection(), $sellerId);
$completeordercount = fetchDispatchedOrdersCount(connection(), $sellerId);
$rejectordercount = fetchRejectedOrdersCount(connection(), $sellerId);
$outwardstock = fetchOutwardstock(connection(), $sellerId);
$completeOrders = fetchCompleteOrders(connection(), $sellerId);
?>

<!doctype html>
<html lang="en">

<head> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
   <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/vector-map/jqvmap.css">
    <link rel="stylesheet" href="assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <title>Seller Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->


    <div class="container-fluid  dashboard-content">

        <!-- ============================================================== -->
        <!-- pagehader  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- metric -->
            <div id="productDiv" class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="cursor: pointer;">
                    <div class="card-body">
                        <h5 class="text-muted">Products</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">
                                <?php echo @$totalproduct; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. metric -->
            <!-- metric -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="cursor: pointer;">
                    <div class="card-body">
                        <h5 class="text-muted">Total Quantity</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">
                                <?php echo @$quantity; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. metric -->
            <!-- metric -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="cursor: pointer;">
                    <div class="card-body">
                        <h5 class="text-muted">Available Stock</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">
                                <?php echo @$quantity ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. metric -->
            <!-- metric -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="cursor: pointer;">
                    <div class="card-body">
                        <h5 class="text-muted">Outward Stock</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">
                                <?php echo $outwardstock; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /. metric -->
    </div>
    <!-- ============================================================== -->
    <!-- revenue  -->
    <!-- ============================================================== -->
    <br> <br>
    <div class="row">
        <div class="col-xl-8 col-lg-12 col-md-8 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Revenue</h5>
                <div class="card-body">
                    <canvas id="revenueChart" width="400" height="150"></canvas>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end reveune  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- total sale  -->
        <!-- ============================================================== -->
        <!-- total sale  -->
        <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Total Sale</h5>
                <div class="card-body">
                    <canvas id="total-sale-pie" width="300" height="255"></canvas>

                </div>
            </div>
        </div>
        <!-- end total sale  -->



        <!-- ============================================================== -->
        <!-- end total sale  -->
        <!-- ============================================================== -->
    </div>

    <br> <br>
    <div class="row">
        <!-- ============================================================== -->
        <!-- top selling products  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <center>
                    <h4 class="card-header">Sold Products Details</h4>
                </center>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 426px; overflow-y: scroll;">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Customer Name</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Order Date</th>
                                    <th class="border-0">Category</th>
                                    <th class="border-0">Quantity</th>
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
                                                <?php echo @$completeOrder['CustomerName']; ?>
                                            </td>
                                            <td>
                                                <?php echo @$completeOrder['ProductName']; ?>
                                            </td>
                                            <td>
                                                <?php echo @$completeOrder['TotalPrice']; ?>
                                            </td>
                                            <td>
                                                <?php echo @$completeOrder['OrderDate']; ?>
                                            </td>
                                            <td>
                                                <?php echo @$completeOrder['Category']; ?>
                                            </td>
                                            <td>
                                                <?php echo @$completeOrder['Quantity']; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- ============================================================== -->
        <!-- end top selling products  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- revenue locations  -->
        <!-- ============================================================== -->
        <!-- <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card"></div>
        </div> -->
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end revenue locations  -->
    <!-- ============================================================== -->
    </div>
    <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- social source  -->
            <!-- ============================================================== -->
            <div class="card">
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end social source  -->
        <!-- ============================================================== -->
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- sales traffice source  -->
        <!-- ============================================================== -->
        <div class="card">
        </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end sales traffice source  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- sales traffic country source  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
        <div class="card">
        </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end sales traffice country source  -->
    <!-- ============================================================== -->
    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 js-->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstrap bundle js-->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js-->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chartjs js-->
    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>

    <!-- main js-->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- jvactormap js-->
    <script src="assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- sparkline js-->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="assets/vendor/charts/sparkline/spark-js.js"></script>
    <!-- dashboard sales js-->
    <script src="assets/libs/js/dashboard-sales.js"></script>

    <script>
        // Add a click event listener to the div
        document.getElementById("productDiv").addEventListener("click", function () {
            // Redirect to productDetails.php
            window.location.href = "productDetails.php";
        });
    </script>

    <script>
        $(document).ready(function () {
            // Get the revenue data for the current week using PHP
            <?php
            $currentWeekData = fetchCurrentWeekRevenue($con, $sellerId);
            ?>

            // Get the revenue data for the previous week using PHP
            <?php
            $previousWeekData = fetchPreviousWeekRevenue($con, $sellerId);
            ?>

            // Labels for the days of the week (e.g., Sun, Mon, Tue, etc.)
            var labels = <?php echo json_encode(array_keys($currentWeekData)); ?>;

            // Revenue data for the current week
            var currentWeekRevenue = <?php echo json_encode(array_values($currentWeekData)); ?>;

            // Revenue data for the previous week
            var previousWeekRevenue = <?php echo json_encode(array_values($previousWeekData)); ?>;

            var ctx = document.getElementById('revenueChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Current Week Revenue',
                            data: currentWeekRevenue,
                            backgroundColor: "rgba(89, 105, 255, 0.5)",
                            borderColor: "rgba(89, 105, 255, 0.7)",
                            borderWidth: 2
                        },
                        {
                            label: 'Previous Week Revenue',
                            data: previousWeekRevenue,
                            backgroundColor: "rgba(255, 64, 123, 0.5)",
                            borderColor: "rgba(255, 64, 123, 0.7)",
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function (value, index, values) {
                                    return '$' + value;
                                }
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 14,
                                fontFamily: 'Circular Std Book',
                                fontColor: '#71748d',
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 14,
                                fontFamily: 'Circular Std Book',
                                fontColor: '#71748d',
                            }
                        }]
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Get your data for the pie chart (e.g., total sales for different categories)
            var pieChartData = {
                labels: ["Pending Order", "Complete Order", "Reject Order"],
                datasets: [
                    {
                        data: [<?php echo @$pendingordercount; ?>, <?php echo @$completeordercount; ?>, <?php echo @$rejectordercount; ?>], // Replace with your actual data
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            // 'rgba(75, 192, 192, 0.7)',
                            // 'rgba(153, 102, 255, 0.7)'
                        ]
                    }
                ]
            };

            var ctx = document.getElementById('total-sale-pie').getContext('2d');

            var pieChart = new Chart(ctx, {
                type: 'doughnut',
                data: pieChartData,
                options: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    }
                }
            });
        });
    </script>



</body>

</html>