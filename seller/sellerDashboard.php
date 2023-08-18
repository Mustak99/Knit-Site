<?php include_once 'sellerHeader.php';
?>
<?php
include_once("commonMethod.php");
$idVal = totalProduct(connection());
$order = totalOrder(connection());
$revenue = totalRevenue(connection());
$shirt = totalShirt(connection());

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
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Products</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">
                                <?php echo @$idVal; ?>
                            </h1>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. metric -->
            <!-- metric -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Order</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">
                                <?php echo @$order; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. metric -->
            <!-- metric -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Revenue</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">
                                <?php echo @$revenue; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. metric -->
            <!-- metric -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Growth</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">+28.45% </h1>
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
                    <canvas id="revenue" width="400" height="150"></canvas>
                </div>
                <div class="card-body border-top">
                    <div class="row">
                        <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-3">
                            <h4> Today's Earning: $2,800.30</h4>
                            <p>Suspendisse potenti. Done csit amet rutrum.
                            </p>
                        </div>
                        <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                            <h2 class="font-weight-normal mb-3"><span>$50,325</span> </h2>
                            <div class="mb-0 mt-3 legend-item">
                                <span class="fa-xs text-primary mr-1 legend-title "><i
                                        class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Current Week</span>
                            </div>
                        </div>
                        <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                            <h2 class="font-weight-normal mb-3">

                                <span>$59,567</span>
                            </h2>
                            <div class="text-muted mb-0 mt-3 legend-item"> <span
                                    class="fa-xs text-secondary mr-1 legend-title"><i
                                        class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Previous
                                    Week</span></div>
                        </div>
                    </div>
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
                    <canvas id="pieChart"></canvas>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php
                        $selling_details = [
                            'Product A' => @$shirt,
                            'Product B' => 50,
                            'Product C' => 20,
                            'Product D' => 10,
                            'Product E' => 25
                        ];
                        $labels = array_keys($selling_details);
                        $values = array_values($selling_details);
                        $colors = [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)'
                        ];
                        ?>

                        <?php foreach ($labels as $index => $label): ?>
                            <li class="list-group-item" style=" <?php echo $colors[$index % count($colors)]; ?>;">
                                <?php echo '<span class="fa-xs text-brand mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span> <span class="legend-text"></span>';
                                echo $label; ?>: <?php echo $values[$index]; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
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
                <center> <h4 class="card-header">Sold Products Details</h4> </center>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 426px; overflow-y: scroll;">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">ID</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Description</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Order Date</th>
                                    <th class="border-0">CategoryID</th>
                                    <th class="border-0">Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>
                                            <?php echo @$user['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo @$user['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo @$user['description']; ?>
                                        </td>
                                        <td>
                                            <?php echo @$user['price']; ?>
                                        </td>
                                        <td>
                                            <?php echo @$user['created_at']; ?>
                                        </td>
                                        <td>
                                            <?php echo @$user['category_id']; ?>
                                        </td>
                                        <td>Patricia J. King </td>
                                    </tr>
                                <?php endforeach; ?>
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
    <div class="footer">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstrap bundle js-->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js-->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chartjs js-->
    <script src="../assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="../assets/vendor/charts/charts-bundle/chartjs.js"></script>

    <!-- main js-->
    <script src="../assets/libs/js/main-js.js"></script>
    <!-- jvactormap js-->
    <script src="../assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- sparkline js-->
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="../assets/vendor/charts/sparkline/spark-js.js"></script>
    <!-- dashboard sales js-->
    <script src="../assets/libs/js/dashboard-sales.js"></script>
    <script>
        // Chart.js configuration
        var ctx = document.getElementById('pieChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($values); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        });
    </script>


</body>

</html>