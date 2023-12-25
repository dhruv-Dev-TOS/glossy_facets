<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Namasya FinAdvice | Blogs</title>
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/bundles/footable-bootstrap/css/footable.bootstrap.min.css">
    <link rel="stylesheet" href="assets/bundles/footable-bootstrap/css/footable.standalone.min.css">
    <link rel="stylesheet" href="../../../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <script src="plugins/sweet-alert2/sweetalert2.all.min.js"></script>
    <script src="plugins/sweet-alert2/sweet-alert.init.js"></script>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
    <style>
        .dataTables_paginate,
        .dataTables_info,
        .dataTables_filter input {
            display: none !important;
        }
    </style>

</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Header Content -->
            <?php
            include 'header.php';
            ?>
            <!-- End Header Content -->


            <?php
            include 'sidebar.php';
            ?>


            <div class="main-content">
                <section class="section">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="justify-content: space-between;">
                                <h4>All Orders</h4>
                                <div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
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
                                                $result_name = mysqli_query($link, 'SELECT fname,lname FROM users WHERE id  = ' . $userid . '');
                                                $row_name = mysqli_fetch_assoc($result_name);
                                                $full_name = $row_name['fname'] . ' ' . $row_name['lname'];
                                                echo '<tr>
                                                  <td>' . $j . '</td>
                                                  <td>' . $full_name . '</td>
                                                  <td><a class="btn btn-primary">View Order Details</a></td>
                                                  <td>$' . $row['total_value'] . '</td>
                                                  <td>' . date("d-m-Y", strtotime($row['order_date'])) . '</td>
                                                  <td><a class="btn btn-primary">View Invoice</a></td>
                                                  <td> <button class="btn btn-danger" onclick="javascript:delte_order('.$row['id'].');">Delete</button> </td>
                                                  </tr>';
                                                $j++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php
            include 'footer.php';
            ?>
        </div>
    </div>
    <script>
        function delte_order(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You want to Delete this order ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!"
            }).then(function(isConfirm) {

                if (isConfirm.value) {
                    window.location = 'api/delete_order.php?order_id=' + id;
                    swal.fire(
                        'Deleted!',
                        'This Order has been Deleted.',
                        'success'
                    );

                } else {

                }

            });
        }
    </script>
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/echart/echarts.js"></script>
    <script src="assets/bundles/chartjs/chart.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    <!-- JS Libraies -->
    <script src="assets/bundles/footable-bootstrap/js/footable.js"></script>
    <script src="assets/bundles/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="assets/bundles/jqvmap/dist/maps/jquery.vmap.world.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/js/page/footable-data.js"></script>
    <script src="assets/js/page/index2.js"></script>


    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 15, 25, 50, 100, -1],
                    [10, 15, 25, 50, 100, "All"]
                ],
                "iDisplayLength": 500000000000000000000000000000000000,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel'
                ]

            });
            $('#example1').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 15, 25, 50, 100, -1],
                    [10, 15, 25, 50, 100, "All"]
                ],
                "iDisplayLength": 500000000000000000000000000000000000,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel'
                ]

            });
            $('#example2').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 15, 25, 50, 100, -1],
                    [10, 15, 25, 50, 100, "All"]
                ],
                "iDisplayLength": 500000000000000000000000000000000000,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel'
                ]

            });
            $('#example3').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 15, 25, 50, 100, -1],
                    [10, 15, 25, 50, 100, "All"]
                ],
                "iDisplayLength": 500000000000000000000000000000000000,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel'
                ]

            });
            $('#example4').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 15, 25, 50, 100, -1],
                    [10, 15, 25, 50, 100, "All"]
                ],
                "iDisplayLength": 500000000000000000000000000000000000,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel'
                ]

            });



            $('.btn-copy').click(function() {
                $('.buttons-copy').trigger('click');
            });
            $('.btn-csv').click(function() {
                $('.buttons-csv').trigger('click');
            });
            $('.btn-excel').click(function() {
                $('.buttons-excel').trigger('click');
            });
            $('.btn-pdf').click(function() {
                $('.buttons-pdf').trigger('click');
            });
            $('.btn-print').click(function() {
                $('.buttons-print').trigger('click');
            });
        });
    </script>

    <script>
        function myFunction(blog_id) {

            swal.fire({
                title: 'Are you sure?',
                text: "You want to Delete this Blog ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!"
            }).then(function(isConfirm) {

                if (isConfirm.value) {
                    window.location = 'api/delete_blog.php?blogid=' + blog_id;
                    swal.fire(
                        'Deleted!',
                        'This Blog Request has been Deleted.',
                        'success'
                    );

                } else {

                }

            });
        }
    </script>






</body>



</html>