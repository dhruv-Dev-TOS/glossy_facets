<?php
include 'session.php';
$image_id = $_GET['image_id'];
require_once 'db.php';
$sql = mysqli_query($link, 'SELECT * FROM gallery WHERE id = ' . $image_id . '');
$row = mysqli_fetch_assoc($sql);
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
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
            <?php
            include 'header.php';
            ?>
            <?php
            include 'sidebar.php';
            ?>

            <div class="main-content">
                <section class="section">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="justify-content: space-between;">
                                <h4>Edit Blogs</h4>
                                <div>


                                </div>
                            </div>
                            <div class="card-body">
                                <form action="">

                                    <div class="form-group">

                                        <div class="row">
                                            <label for="blog_title">Current Image</label>
                                            <div class="col-md-6">
                                                <center> <img src="uploads/<?php echo $row['image']; ?>" height="300px" width="300px" alt=""></center>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="blog_title">Change Blog Image</label>
                                                <input type="file" name="blog_image" id="updated_image" class="dropify" />
                                            </div>
                                        </div>
 
                                    </div>

                                    <div class="form-group">
                                        <label for=" ">Image Caption</label>
                                        <input type="text" name="" class="form-control" id="image_caption" value="<?php echo $row['caption'];?>">
                                    </div>

                                    <input style="display: none;" type="text" name="" id="old_image" value="<?php echo $row['image']; ?>">
                                    <input style="display: none;" type="text" name="" id="image_id" value="<?php echo $image_id; ?>">
                                </form>
                                <button id="edit_gallery" class="btn btn-primary text-right">Edit Blog</button>
                            </div>
                        </div>
                    </div>


                </section>

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
        let final_gallery_image;
        let image_caption;
        
        let image_id = $("#image_id").val();
        $('#edit_gallery').click(function() {
            image_caption = $('#image_caption').val();
 

            var fileInput1 = $('#updated_image')[0];
            var file1 = fileInput1.files[0];

            if (file1) {
                if (file1.size < 210000) {
                    var formData = new FormData();

                    formData.append('file1', file1);

                    $.ajax({
                        type: 'POST',
                        url: 'api/upload_img.php',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            let res = JSON.parse(response);
                            if (res.error_flag == 0) {
                                final_gallery_image = res.file_name_1;
                                update_blog();

                            }
                        },
                        error: function(error) {
                            console.error('Error uploading file:', error);
                        }
                    });
                } else {
                    alert('File size must be less than 200 Kb');
                }
            } else {
                final_gallery_image = $('#old_image').val();
                update_blog();
            }



        });

        function update_blog() {
            console.log('updated_blog'+final_gallery_image);

 
            $.ajax({
                type: 'POST',
                url: 'api/update_image_gallery.php',
                data: {
                    gallery_id: image_id,
                    image_name: final_gallery_image,
                    image_caption: image_caption


                },

                success: function(response2) {
                    console.log(response2);

                    let res = JSON.parse(response2);
                    if (res.error_flag == 0) {
                        swal.fire({
                            title: 'Image updated successfully!',
                            text: '',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',

                        }).then(function(isConfirm) {

                            if (isConfirm.value) {
                                window.location = 'view_image_gallery.php';

                            } else {

                            }

                        });


                    }
                },
                error: function(error) {
                    console.error('Error uploading file:', error);
                }
            });

        }
    </script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/bundles/echart/echarts.js"></script>
    <script src="assets/bundles/chartjs/chart.min.js"></script>
    <script src="assets/js/page/index.js"></script>
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

    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
    </script>
    <script>
        $('.dropify').dropify();
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