<?php
include 'includes/db.php';
include 'includes/sidebar.php';
?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4">View Reports</h3>
                <form>
                    <h6 class="mb-4">Select Reports</h6>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="report" id="report_name">
                        <option selected>--choose a report type--</option>
                        <option value="Orders per Day">Orders Per Day</option>
                        <option value="Orders per Month">Orders per Month</option>
                        <option value="All Restaurant Selling">Most Selling Products</option>
                        <option value="4">All Products Selling</option>
                    </select>
                    
                    <h6 class="mb-4">Select Product</h6>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category" id="category_name">
                        <option selected>--select product--</option>
                          <?php
                        $cquery = "SELECT * FROM products";
                        $cresult = $con->query($cquery);
                        if ($cresult->num_rows > 0) {
                            $options = mysqli_fetch_all($cresult, MYSQLI_ASSOC);
                        }
                        ?>
			  <?php
                        foreach ($options as $option) {

                            echo' <option value="' . $option['product_id'] . '">' . $option['product_title'] . '</option>';
                        }
                        ?>
                    </select>

                    <button type="submit" class="btn btn-primary" id="submit" name="generate">Generate</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">

                <?php
                if (isset($_GET['generate'])) {
                    $reportName = $_GET["report"];
                    $category_id = $_GET["category"];
                    
                      echo "<h4 class='card-title'>";
                    echo $reportName;
                    //echo $category_id;
                    echo "</h4>
                    
                            <div class='table-responsive m-t-40'>
                            <table id='myTable' class='table table-bordered table-striped'>";
                    
                     if($reportName === "Orders per Day")
                         {

                            echo"
                            <thead>
                                <tr>
                                <th>Order Id</th>
                                <th>Order Date</th>
                                <th>Order status</th>
                                <th>Count</th>
                                </tr>
                                
                            
                            </thead>
                            <tbody>";
                            
                               $sql ="SELECT customer_orders.*,customer_orders.order_date as d ,count(customer_orders.order_id) AS 'counted' 
                                    from customer_orders
                               
                                    group by customer_orders.order_date
                                    ORDER BY customer_orders.order_date";
                            $query=mysqli_query($con,$sql);
                            while($rows=mysqli_fetch_array($query))
                            {
                               echo "
                                <tr>
                                    <td>";
                                    echo $rows['order_id'];
                                    echo "</td><td>";
                                    echo $rows['d'];
                                    echo "</td><td>";
                                    echo $rows['order_status'];
                                    echo "</td><td>";
                                    echo $rows['counted'];
                                    echo "</td>
                                    </tr>";
                            }


                            echo "</tbody>";
                       }
                       else if($reportName === "Orders per Month")
                         {

                            echo"
                            <thead>
                                <tr>
                                <th>Restaurant Id</th>
                                <th>Restaurant Name</th>
                                <th>Total Orders</th>
                                <th>Date </th>
                                <th>Month</th>
                                </tr>
                                
                            
                            </thead>
                            <tbody>";


                            $sql ="SELECT users_orders.* ,restaurant.* ,MONTH(users_orders.user_orders_date) as 'monthname' , count(*) AS 'counted' 
                                    from users_orders , restaurant 
                                    where users_orders.rs_id = '$rest_id'  AND users_orders.rs_id = restaurant.rs_id 
                                    
                                    group by users_orders.rs_id , MONTH(users_orders.user_orders_date)
                                    ORDER BY counted";
                            $query=mysqli_query($con,$sql);
                            while($rows=mysqli_fetch_array($query))
                            {
                               echo "
                                <tr>
                                    <td>";
                                    echo $rows['rs_id'];
                                    echo "</td><td>";
                                    echo $rows['title'];
                                    echo "</td><td>";
                                    echo $rows['counted'];
                                    echo "</td><td>";
                                    echo $rows['user_orders_date'];
                                    echo "</td><td>";
                                    echo $rows['monthname'];
                                    echo "</td>
                                    </tr>";
                            }


                            echo "</tbody>";
                       }
                       else if($reportName === "All Restaurant Selling")
                       {

                          echo"
                          <thead>
                              <tr>
                              <th>Restaurant Id</th>
                              <th>Restaurant Name</th>
                              <th>Total Amount</th>
                              
                              </tr>
                              
                          
                          </thead>
                          <tbody>";

                        //   select StudentName,
                        //    sum(StudentMathScore) AS TOTAL_SCORE
                        //    from countRowValueDemo
                        //    group by StudentName
                        //    order by sum(StudentMathScore) desc;

                          $sql ="SELECT users_orders.rs_id,restaurant.title , SUM(total_food_price) as 'totalprice' 
                                  from users_orders , restaurant
                                  where users_orders.rs_id = restaurant.rs_id  
                                  group by users_orders.rs_id
                                  ;";
                          $query=mysqli_query($db,$sql);
                          while($rows=mysqli_fetch_array($query))
                          {
                             echo "
                              <tr>
                                  <td>";
                                  echo $rows['rs_id'];
                                  echo "</td><td>";
                                  echo $rows['title'];
                                  echo "</td><td>";
                                  echo $rows['totalprice'];
                                  echo "</td>
                                  
                                  </tr>";
                          }


                          echo "</tbody>";
                     }



                           echo "</table>
                            </div>";
                        }
  ?>             
                    
<!--                <h3 class="mb-4">View Reports</h3>
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total Orders</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Total Sales</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Pending Orders</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Delivered Orders</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>-->
            </div>
        </div>
    </div>
</div>
