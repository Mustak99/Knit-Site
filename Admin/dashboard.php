<?php
include_once("commonMethod.php");
$customer = totalcustomer(connection());
$seller = totalseller(connection());
$revenue = totalrevenue(connection());
$janrevenue = janrevenue(connection());
$febrevenue = febrevenue(connection());
$marchrevenue = marchrevenue(connection());
$aprilrevenue = aprilrevenue(connection());
$mayrevenue = mayrevenue(connection());
$junerevenue = junerevenue(connection());
$julyrevenue = julyrevenue(connection());
$augrevenue = augrevenue(connection());
$seprevenue = seprevenue(connection());
$octrevenue = octrevenue(connection());
$novrevenue = novrevenue(connection());
$decrevenue = decrevenue(connection());
$customers = fetchCustomers(connection());
$sellers = fetchCustomers(connection());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Knit Site</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
</head>

<body>


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">Knit Site</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Welcome to Admin Panel</h6>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>


                <a href="view_sellers.php" class="nav-item nav-link"><i class='fa fa-user'></i>View Sellers</a>
                <a href="view_customers.php" class="nav-item nav-link"><i class='fa fa-user'></i>View Customers</a>
                <a href="view_deliveryboy.php" class="nav-item nav-link"><i class='fa fa-user'></i>View Delivery Boy</a>
                <a href="view_products.php" class="nav-item nav-link"><i class='fas fa-tasks'></i>View Products</a>
                <a href="view_orders.php" class="nav-item nav-link"><i class='fas fa-tasks'></i>View Orders</a>
                <a href="view_payments.php" class="nav-item nav-link"><i class="fa fa-credit-card"></i>View Payments</a>
                <a href="viewReports.php" class="nav-item nav-link"><i class="fa fa-file"></i>View Reports</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-list"></i>Category</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="insert_category.php" class="dropdown-item">Insert Category</a>
                        <a href="view_category.php" class="dropdown-item">View Category</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-tags"></i>Coupons</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="insert_coupon.php" class="dropdown-item">Insert Coupons</a>
                        <a href="view_coupon.php" class="dropdown-item">View Coupons</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-th me-2"></i>Delivery boy Salary</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="insert_salary.php" class="dropdown-item">Insert Salary</a>
                        <a href="view_salary.php" class="dropdown-item">View Salary</a>
                    </div>
                </div>
                <a href="user_profile.php" class="nav-item nav-link"><i class="far fa-edit"></i>Edit Profile</a>
                <a href="../login/logout.php" class="nav-item nav-link"><i class="fa fa-power-off"></i>Logout</a>

            </div>
        </nav>
    </div>
    <!-- Sidebar End -->
    <div style="margin-left: 250px;">

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-home"></i>
                        </span>Admin Dashboard
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Customers</h4>
                                <h2 class="mb-5"><?php echo @$customer ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Sellers</h4>
                                <h2 class="mb-5"><?php echo @$seller ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Revenue</h4>
                                <h2 class="mb-5"><?php echo @$revenue ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="clearfix">
                                    <h4 class="card-title float-left">Month wise total Revenue</h4>
                                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                </div>
                                <canvas id="revenue-chart" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Traffic Sources</h4>
                                <canvas id="pie-chart"></canvas>
                                <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Customers</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">User ID</th>
                                                <th class="border-0">First Name</th>
                                                <th class="border-0">Middle Name</th>
                                                <th class="border-0">Last Name</th>
                                                <th class="border-0">Mobile Number</th>
                                                <th class="border-0">Email Address</th>
                                                <th class="border-0">User Name</th>
                                                <th class="border-0">Address</th>
                                                <th class="border-0">Pincode</th>
                                                <th class="border-0">Gender</th>
                                                <th class="border-0">Creation Date</th>
                                                <th class="border-0">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($customers)) : ?>
                                                <?php foreach ($customers as $customer) : ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo @$customer['UserId']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['UserFirstName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['UserMiddleName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['UserLastName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['MobileNumber']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['EmailAddress']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['UserName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['Address']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['Pincode']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['Gender']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['CreationDate']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo @$customer['status']; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="12">No customers available.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Customers</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">Seller ID</th>
                                                <th class="border-0">First Name</th>
                                                <th class="border-0">Middle Name</th>
                                                <th class="border-0">Last Name</th>
                                                <th class="border-0">Mobile Number</th>
                                                <th class="border-0">Email Address</th>
                                                <th class="border-0">User Name</th>
                                                <th class="border-0">Business Location</th>
                                                <th class="border-0">Pincode</th>
                                                <th class="border-0">Business Type</th>
                                                <th class="border-0">Creation Date</th>
                                                <th class="border-0">Status</th>
                                                <th class="border-0">Business Document</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($sellers)) : ?>
                                                <?php foreach ($sellers as $seller) : ?>
                                                    <tr>
                                                        <td><?php echo @$seller['SellerId']; ?></td>
                                                        <td><?php echo @$seller['SellerFirstName']; ?></td>
                                                        <td><?php echo @$seller['SellerMiddleName']; ?></td>
                                                        <td><?php echo @$seller['SellerLastName']; ?></td>
                                                        <td><?php echo @$seller['MobileNumber']; ?></td>
                                                        <td><?php echo @$seller['EmailAddress']; ?></td>
                                                        <td><?php echo @$seller['UserName']; ?></td>
                                                        <td><?php echo @$seller['BusinessLocation']; ?></td>
                                                        <td><?php echo @$seller['Pincode']; ?></td>
                                                        <td><?php echo @$seller['BusinessType']; ?></td>
                                                        <td><?php echo @$seller['CreationDate']; ?></td>
                                                        <td><?php echo @$seller['status']; ?></td>
                                                        <td><?php echo @$seller['businessdoc']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="13">No sellers available.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>
<script>
    // Get the canvas element
    var ctx = document.getElementById('revenue-chart').getContext('2d');

    // Data for the month-wise bar graph (you can customize this as needed)
    var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Monthly Revenue',
            data: [<?php echo @$janrevenue ?>, <?php echo @$febrevenue ?>, <?php echo @$marchrevenue ?>, <?php echo @$aprilrevenue ?>, <?php echo @$mayrevenue ?>, <?php echo @$junerevenue ?>, <?php echo @$julyrevenue ?>, <?php echo @$augrevenue ?>, <?php echo @$seprevenue ?>, <?php echo @$octrevenue ?>, <?php echo @$novrevenue ?>, <?php echo @$decrevenue ?>],
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    for (var i = 0; i < 12; i++) {
        if (data.datasets[0].data[i] === undefined) {
            data.datasets[0].data[i] = 0;
        }
    }

    // Create the month-wise bar chart
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    // Data for the pie chart (two fields: Seller and Customer)
    var pieData = {
        labels: ['Seller', 'Customer'],
        datasets: [{
            data: [<?php echo @$seller ?>, <?php echo @$customer ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)', // Color for Seller
                'rgba(54, 162, 235, 0.6)' // Color for Customer
            ]
        }]
    };

    // Get the canvas element for the pie chart
    var pieCtx = document.getElementById('pie-chart').getContext('2d');

    // Create the pie chart
    var pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: pieData
    });
</script>


</html>