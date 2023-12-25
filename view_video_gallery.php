<?php
include 'session.php';

?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Namasya FinAdvice | Blogs</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">

    <!-- Table  CSS -->
    <link rel="stylesheet" href="assets/bundles/footable-bootstrap/css/footable.bootstrap.min.css">
    <link rel="stylesheet" href="assets/bundles/footable-bootstrap/css/footable.standalone.min.css">
    <link rel="stylesheet" href="../../../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Sweet Alert  -->
    <link href="plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <script src="plugins/sweet-alert2/sweetalert2.all.min.js"></script>
    <script src="plugins/sweet-alert2/sweet-alert.init.js"></script>

    <!-- Custom style CSS -->
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


            <!-- Sidebar Content -->
            <?php
            include 'sidebar.php';
            ?>

            <div class="main-content">
                <section class="section">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="justify-content: space-between;">
                                <h4>Video Gallery</h4>
                                <div>
                                    <td><a class="btn  btn-primary" onclick="" data-bs-toggle="modal" data-bs-target="#ModelData">Add new Video</a></td>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table dataTable   table-bordered table-striped" data-filtering="true" data-sorting="true" data-paging="true" data-paging-size="15">
                                        <thead>
                                            <tr>
                                                <th data-breakpoints="">No&nbsp;</th>
                                                <th data-breakpoints="">Image&nbsp;</th>
                                                <th data-breakpoints="">Caption&nbsp;</th>
                                                <th data-breakpoints="">Action&nbsp;</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once 'db.php';
                                            $sql = 'SELECT * FROM video_gallery';
                                            $result = mysqli_query($link, $sql);
                                            $j = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<tr>
                                               <td>' . $j . '</td>
                                               <td><a target="_blank" href="' . $row['video'] . '" class="btn btn-primary">View Video</a></td>
                                               <td>' . $row['caption'] . '</td>
                          
                                               <td> <a href="edit_video_gallery.php?video_id='.$row['id'].'" class="btn btn-primary">Edit</a>
                                               <button style="margin-left: 5px;" onclick="javascript:delete_vid(' . $row['id'] . ');" class="btn btn-danger">Delete</button></td>
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

                <script>
                    function delete_vid(id) {
                        swal.fire({
                            title: 'Are you sure?',
                            text: "You want to Delete this video ?",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, I am sure!',
                            cancelButtonText: "No, cancel it!"
                        }).then(function(isConfirm) {

                            if (isConfirm.value) {
                                window.location = 'api/delete_video_gallery.php?id=' + id;
                                swal.fire(
                                    'Deleted!',
                                    'This video has been Deleted.',
                                    'success'
                                );

                            } else {

                            }

                        });
                    }
                </script>



                <div class="modal fade bd-example-modal-lg show" id="ModelData" tabindex="-1" role="dialog" aria-labelledby="ModelDataTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg  " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h6 class="modal-title" id="ModelDataTitle">Add New Petrol Pump<span class="text-muted" id="motor_policy_id"></span></h6> -->
                                <h6 class="modal-title" id="ModelDataTitle">Add Image</h6>

                                <div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>

                            <hr style="margin: 0.25rem !important;">
                            <div class="modal-body">
                                <form action="">

                                    <div class="form-group">
                                        <label for="blog_title">Video Link</label>
                                        <input type="text" class="form-control" name="video_link" id="video_link" />


                                    </div>

                                    <div class="form-group">
                                        <label for="blog_title">Video Caption</label>
                                        <input type="text" class="form-control" name="video_caption" id="video_caption" />

                                    </div>



                                </form>
                                <button id="publish_video" class="btn btn-primary text-right">Publish Video</button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <!-- Footer -->
            <?php
            include 'footer.php';
            ?>
            <!-- End Footer -->
        </div>
    </div>

    <script>
        $('#publish_video').click(function() {
            let video_link = $('#video_link').val();
            let video_caption = $('#video_caption').val();


            $.ajax({
                type: 'POST',
                url: 'api/add_video_gallery.php', // Your server-side script to handle file upload
                data: {
                    video_gallery_link: video_link,
                    video_name: video_caption


                },

                success: function(response2) {
                    console.log(response2);

                    let res = JSON.parse(response2);
                    if (res.error_flag == 0) {
                        swal.fire({
                            title: 'Video Posted successfully!',
                            text: '',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',

                        }).then(function(isConfirm) {

                            if (isConfirm.value) {
                                window.location = 'view_video_gallery.php';

                            } else {

                            }

                        });


                    }
                },
                error: function(error) {
                    console.error('Error uploading file:', error);
                }
            });
        });
    </script>



    <!-- General JS Scripts -->
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

    <!-- JS Libraies -->
    <!-- <script src="assets/bundles/sweetalert/sweetalert.min.js"></script> -->
    <!-- Page Specific JS File -->
    <!-- <script src="assets/js/page/sweetalert.js"></script> -->


    <!-- Delete function -->
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


<!-- Mirrored from www.einfosoft.com/templates/admin/aegis/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2022 10:54:30 GMT -->

</html>