 <!DOCTYPE html>
 <html lang="en">


 <head>
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
     <title>Admin - Techenergo</title>
     <link rel="stylesheet" href="assets/css/app.min.css">
     <link rel="stylesheet" href="assets/bundles/jqvmap/dist/jqvmap.min.css">
     <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons.min.css">
     <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons-wind.min.css">
     <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="assets/css/components.css">
     <link rel="stylesheet" href="assets/css/custom.css">
     <link rel="icon" type="image/png" href="assets/img/Techenergo_fevicon.webp">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

 </head>

 <body>
     <div class="loader"></div>
     <div id="app">
         <div class="main-wrapper main-wrapper-1">

             <!-- Header - Slidebar  -->
             <?php
                include 'header.php';
                include 'sidebar.php';
                ?>
             <!-- End Header - Slidebar  -->

             <!-- Main Content -->
             <div class="main-content">
                 <section class="section">
                     <div class="row ">
                         <?php
                            require_once 'db.php';
                            $sql = mysqli_query($link, 'SELECT id FROM users');
                            $numrows_users = mysqli_num_rows($sql);

                            $sql_products = mysqli_query($link, 'SELECT id FROM products WHERE is_active = "yes" ');
                            $numrows_products = mysqli_num_rows($sql_products);


                            $sql_orders = mysqli_query($link, 'SELECT * FROM orders');
                            $numrows_orders = mysqli_num_rows($sql_orders);



                            $sql_processing_orders = mysqli_query($link, 'SELECT * FROM orders WHERE order_status = "processing"');
                            $numrows_processing_orders = mysqli_num_rows($sql_processing_orders);

                            $sql_delivered_orders = mysqli_query($link, 'SELECT * FROM orders WHERE order_status = "delivered"');
                            $numrows_delivered_orders = mysqli_num_rows($sql_delivered_orders);





                            ?>
                         <div class="col-xl-3 col-lg-6">
                             <a href="watch_authentication">
                                 <div class="card l-bg-green-dark">
                                     <div class="card-statistic-3" style="padding-bottom: 50px;">
                                         <div class="card-icon card-icon-large"><i class="fa-solid fa-clock"></i></div>
                                         <div class="card-content">
                                             <h4 class="card-title" style="padding-bottom: 10px;">Total Customers</h4>
                                             <span>Total Customers: <span style="font-size: 18px; font-weight: 700;"><?php echo $numrows_users; ?></span></span>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>



                         <div class="col-xl-3 col-lg-6">
                             <a href="watch_authentication">
                                 <div class="card l-bg-cyan-dark">
                                     <div class="card-statistic-3" style="padding-bottom: 50px;">
                                         <div class="card-icon card-icon-large"><i class="fa-solid fa-clock"></i></div>
                                         <div class="card-content">
                                             <h4 class="card-title" style="padding-bottom: 10px;">Total Products</h4>
                                             <span>Total Products: <span style="font-size: 18px; font-weight: 700;"><?php echo $numrows_products; ?></span></span>
                                             <!-- echo $row['total_watch_authenticated'] -->
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>

                         <div class="col-xl-3 col-lg-6">
                             <a href="watch_authentication">
                                 <div class="card l-bg-orange-dark">
                                     <div class="card-statistic-3" style="padding-bottom: 50px;">
                                         <div class="card-icon card-icon-large"><i class="fa-solid fa-clock"></i></div>
                                         <div class="card-content">
                                             <h4 class="card-title" style="padding-bottom: 10px;">Total Orders</h4>
                                             <span>Total Orders: <span style="font-size: 18px; font-weight: 700;"><?php echo $numrows_orders; ?></span></span>
                                             <!-- echo $row['total_watch_authenticated'] -->
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>

                         <div class="col-xl-3 col-lg-6">
                             <a href="watch_authentication">
                                 <div class="card l-bg-orange-dark">
                                     <div class="card-statistic-3" style="padding-bottom: 50px;">
                                         <div class="card-icon card-icon-large"><i class="fa-solid fa-clock"></i></div>
                                         <div class="card-content">
                                             <h4 class="card-title" style="padding-bottom: 10px;">Total Processing Orders</h4>
                                             <span>Total Processing Orders: <span style="font-size: 18px; font-weight: 700;"><?php echo $numrows_processing_orders; ?></span></span>
                                             <!-- echo $row['total_watch_authenticated'] -->
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>

                         <div class="col-xl-3 col-lg-6">
                             <a href="watch_authentication">
                                 <div class="card l-bg-green-dark">
                                     <div class="card-statistic-3" style="padding-bottom: 50px;">
                                         <div class="card-icon card-icon-large"><i class="fa-solid fa-clock"></i></div>
                                         <div class="card-content">
                                             <h4 class="card-title" style="padding-bottom: 10px;">Total Delivered Orders</h4>
                                             <span>Total Delivered Orders: <span style="font-size: 18px; font-weight: 700;"><?php echo $numrows_delivered_orders; ?></span></span>
                                             <!-- echo $row['total_watch_authenticated'] -->
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>

                         <div class="col-xl-3 col-lg-6">
                             <a href="watch_authentication">
                                 <div class="card l-bg-cyan-dark">
                                     <div class="card-statistic-3" style="padding-bottom: 50px;">
                                         <div class="card-icon card-icon-large"><i class="fa-solid fa-clock"></i></div>
                                         <div class="card-content">
                                             <h4 class="card-title" style="padding-bottom: 10px;">Total Revenue</h4>
                                             <span>Total Revenue: <span style="font-size: 18px; font-weight: 700;">1</span></span>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>

                         <div class="col-xl-3 col-lg-6">
                             <a href="watch_authentication">
                                 <div class="card l-bg-orange-dark">
                                     <div class="card-statistic-3" style="padding-bottom: 50px;">
                                         <div class="card-icon card-icon-large"><i class="fa-solid fa-clock"></i></div>
                                         <div class="card-content">
                                             <h4 class="card-title" style="padding-bottom: 10px;">This Month Revenue</h4>
                                             <span>This Month Revenue: <span style="font-size: 18px; font-weight: 700;">1</span></span>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>


                     </div>
                 </section>
                 <section>
                     <h4>Recent Orders</h4>
                     <table id="example" class="table dataTable   table-bordered table-striped" data-filtering="true" data-sorting="true" data-paging="true" data-paging-size="15">
                         <thead>
                             <tr>
                                 <th data-breakpoints="">No&nbsp;</th>
                                 <th data-breakpoints="">User&nbsp;</th>
                                 <th data-breakpoints="">Details&nbsp;</th>
                                 <th data-breakpoints="">Order Value&nbsp;</th>
                                 <th data-breakpoints="">Date&nbsp;</th>
                                 <th data-breakpoints="">Invoice&nbsp;</th>
                                 <th data-breakpoints="">Action&nbsp;</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                require_once 'db.php';
                                $sql = 'SELECT * FROM orders';
                                $result = mysqli_query($link, $sql);
                                $j = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $userid =  $row['user_id'];
                                    $result_name = mysqli_query($link, 'SELECT fname,lname FROM users WHERE id  = ' . $userid . ' LIMIT 5');
                                    $row_name = mysqli_fetch_assoc($result_name);
                                    $full_name = $row_name['fname'] . ' ' . $row_name['lname'];
                                    echo '<tr>
                                                  <td>' . $j . '</td>
                                                  <td>' . $full_name . '</td>
                                                  <td><a class="btn btn-primary">View Order Details</a></td>
                                                  <td>$' . $row['total_value'] . '</td>
                                                  <td>' . date("d-m-Y", strtotime($row['order_date'])) . '</td>
                                                  <td><a class="btn btn-primary">View Invoice</a></td>
                                                  <td> <button class="btn btn-danger" onclick="javascript:delte_order(' . $row['id'] . ');">Delete</button> </td>
                                                  </tr>';
                                    $j++;
                                }
                                ?>

                         </tbody>
                     </table>
                 </section>

             </div>

             <!-- Footer -->
             <?php
                include "footer.php";
                ?>
             <!-- End Footer -->

         </div>
     </div>
     <script src="assets/js/app.min.js"></script>
     <script src="assets/bundles/echart/echarts.js"></script>
     <script src="assets/bundles/chartjs/chart.min.js"></script>
     <script src="assets/js/page/index.js"></script>
     <script src="assets/js/scripts.js"></script>
     <script src="assets/js/custom.js"></script>
 </body>

 </html>