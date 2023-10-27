<?php 
include 'includes/sidebar.php';
include 'includes/db.php';
?>
<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">View Category</h6>
<!--                        <a href="">Show All</a>-->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col"> Category Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                              <tbody>
                                <?php
                                $i = 0;

                                $get_pro = "select * from category";
                                //$get_c = "select * from sellers";
                                $run_pro = mysqli_query($connection, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $category_id = $row_pro['category_id'];

                                    $category_name = $row_pro['category_name'];

                                    $pro_date = $row_pro['date'];

                                    $i++;
                                    ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $category_name; ?></td>

                                        <!--<td> <?php //echo $pro_keywords;  ?> </td>-->

                                        <td><?php echo $pro_date; ?></td>

                                        <td>

                                            <a href="delete_category.php?delete_category=<?php echo $category_id; ?>">

                                                <i class="fa fa-trash-o"> </i> Delete

                                            </a>

                                        </td>

                                        <td>

                                            <a href="edit_category.php?edit_category=<?php echo $category_id; ?>">

                                                <i class="fa fa-pencil"> </i> Edit

                                            </a>

                                        </td>

                                    </tr>

<?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
</div>
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
                                                text: "Top Selling Category"
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
                                                        {y: 4181563, indexLabel: "Toys"},
                                                        {y: 2175498, indexLabel: "Study Essentials"},
                                                        {y: 3125844, indexLabel: "Baby Healthcare"},
                                                        {y: 1176121, indexLabel: "Baby Cotume"}
//                                                        {y: 1727161, indexLabel: "PSP"},
//                                                        {y: 4303364, indexLabel: "Nintendo 3DS"},
//                                                        {y: 1717786, indexLabel: "PS Vita"}
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
</div>
