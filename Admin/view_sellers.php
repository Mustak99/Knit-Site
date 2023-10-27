<?php
include 'includes/sidebar.php';
include 'includes/db.php';
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">View Sellers</h6>
            <!--                        <a href="">Show All</a>-->
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">

                <thead><!-- thead Starts -->

                    <tr>

                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <!-- <th>Country</th> -->
                        <!-- <th>City</th> -->
                        <th>Phone Number</th>
                        <th>Delete</th>


                    </tr>

                </thead><!-- thead Ends -->


                <tbody><!-- tbody Starts -->

                    <?php
                    $i = 0;

                    $get_c = "select * from sellers";

                    $run_c = mysqli_query($con, $get_c);

                    while ($row_c = mysqli_fetch_array($run_c)) {

                        $c_id = $row_c['seller_id'];

                        $c_name = $row_c['seller_name'];

                        $c_email = $row_c['seller_email'];

                        $c_image = $row_c['seller_image'];

// $c_country = $row_c['seller_country'];
//$c_city = $row_c['seller_city'];

                        $c_contact = $row_c['seller_contact'];

                        $i++;
                        ?>

                        <tr>

                            <td><?php echo $i; ?></td>

                            <td><?php echo $c_name; ?></td>

                            <td><?php echo $c_email; ?></td>

                            <td><img src="../admin_area/admin_images/<?php echo $c_image; ?>" width="60" height="60" ></td>

        <!-- <td><?php echo $c_country; ?></td> -->

        <!-- <td><?php echo $c_city; ?></td> -->

                            <td><?php echo $c_contact; ?></td>

                            <td>

                                <a href="delete_sellers.php?delete_sellers=<?php echo $c_id; ?>" >

                                    <i class="fa fa-trash-o" ></i> Delete

                                </a>


                            </td>


                        </tr>

                    <?php } ?>


                </tbody><!-- tbody Ends -->
            </table>
        </div>
    </div>
</div>
<!--
<div class="card mr-5">
    <div class="card-body">
        <div class="container-fluid">

            <div class="row">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                <!DOCTYPE HTML>
                <html>
                    <head>
                        <script type="text/javascript">
                            window.onload = function () {
                                var chart = new CanvasJS.Chart("chartContainer",
                                        {
                                            title: {
                                                text: "Gaming Consoles Sold in 2012"
                                            },
                                            legend: {
                                                maxWidth: 350,
                                                itemWidth: 120
                                            },
                                            data: [
                                                {
                                                    type: "pie",
                                                    showInLegend: true,
                                                    legendText: "{indexLabel}",
                                                    dataPoints: [
                                                        {y: 4181563, indexLabel: "PlayStation 3"},
                                                        {y: 2175498, indexLabel: "Wii"},
                                                        {y: 3125844, indexLabel: "Xbox 360"},
                                                        {y: 1176121, indexLabel: "Nintendo DS"},
                                                        {y: 1727161, indexLabel: "PSP"},
                                                        {y: 4303364, indexLabel: "Nintendo 3DS"},
                                                        {y: 1717786, indexLabel: "PS Vita"}
                                                    ]
                                                }
                                            ]
                                        });
                                chart.render();
                            }
                        </script>
                        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </head>
                    <body>
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </body>
                </html>

            </div></div>

    </div>
</div>-->
