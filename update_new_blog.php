<?php
include 'session.php';
$blog_id = $_GET['blog_id'];

?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SilShine Trip | update Blog</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">

    <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

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

    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* The message box is shown when the user clicks on the password field */
        #message {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }

        #message p {
            padding: 10px 35px;
            font-size: 18px;
        }

        #message1 {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }

        #message1 p {
            padding: 10px 35px;
            font-size: 18px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        .valid1 {
            color: green;
        }

        .valid1:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }

        .invalid1 {
            color: red;
        }

        .invalid1:before {
            position: relative;
            left: -35px;
            content: "✖";
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
                    <div class="section-body">


                        <?php
                        include 'db.php';
                        $query = "select * from blogs where blog_id = '$blog_id' ";
                        $fetch_blog = mysqli_query($link, $query);
                        $selectdata = $fetch_blog->fetch_assoc();
 
                        ?>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">

                                <div class="card">
                                    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                        <div class="card-header" style="justify-content: space-between;">
                                            <h4>Update blog</h4>
                                            <a href="blogs.php" class="btn btn-icon btn-primary"><i class="fas fa-angle-left"></i>&nbsp;Back</a>

                                        </div>
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Blog Title</label>
                                                        <input type="text" class="form-control" id="btitle" name="btitle" value="<?php echo $selectdata['title']; ?>">

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Short Descripition</label>
                                                        <input type="text" class="form-control" id="descripition" name="descripition" value="<?php echo $selectdata['short_desc']; ?>">

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Detailed Descripition</label>

                                                        <textarea style="border-color: #198ae3;" class="form-control" id="editor2" rows="8" name="long_descripition" value="" required="">
                                                        <?php echo $selectdata['long_desc']; ?>
                                                        </textarea>


                                                    </div>



                                                    <div class="form-group">
                                                        <label>Blog Image</label>
                                                        <input type="file" class="form-control" id="image" name="image" value="<?php echo $selectdata['image']; ?>">
                                                        <a target='_blank' href="uploads/<?php echo $selectdata['image']; ?>"><img style='height: 100px; width: 100px;' src='uploads/<?php echo $selectdata['image']; ?>' alt='Not Found'></a>

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="card-footer text-start">
                                            <button type="submit" name="submit" id="submit" class="btn btn-primary">SUBMIT</button>

                                        </div>
                                </div>
                                </form>
                            </div>

                        </div>

                    </div>
            </div>
            </section>

        </div>
        <!-- Footer -->
        <?php
        include 'footer.php';
        ?>
        <!-- End Footer -->
    </div>
    </div>
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

    <script src="assets/bundles/cleave-js/dist/cleave.min.js"></script>
    <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
    <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <script src="assets/js/page/forms-advanced-forms.js"></script>

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

</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/aegis/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2022 10:54:30 GMT -->

</html>



<?php

if (isset($_POST['submit'])) {

    $bid = $_GET['blog_id'];
    $title = $_POST['btitle'];
    $descripition = $_POST['descripition'];
    $long_descripition = $_POST['long_descripition'];
    date_default_timezone_set("Asia/Calcutta");
    $datetime   = new DateTime();
    $last_updated = date('Y-m-d G:i:s');


    $image = $_FILES['image'];
    $new_image = null;
    if ($image['name'] == '') {
        $new_image = $selectdata['image'];
    } else {
        $new_image = null;
    }
    if ($image['name'] != null) {
        // print_r($image['name']);
        // $file = $_FILES['file'];
        $fileName1 = $image['name'];
        $fileTmpName1 = $image['tmp_name'];
        $fileSize1 = $image['size'];
        $fileError1 = $image['error'];
        $fileType1 = $image['type'];
        $today1 = date('d/m/Y');
        $fileExt1 = explode('.', $fileName1);
        $fileActualext1 = strtolower(end($fileExt1));
        $allowed1 = array('jpg', 'jpeg', 'png', 'webp', 'JPEG', 'PNG', 'JPG', 'webp');
        $errimg1 = 0;
        if (in_array($fileActualext1, $allowed1)) {

            # code...
            if ($fileError1 === 0) {
                # code... 
                if ($fileSize1 < 20000000) {
                    # code...
                    $new_image = uniqid('', true) . "." . $fileActualext1;
                    $fileDestination1 = 'uploads/' . $new_image;

                    move_uploaded_file($fileTmpName1, $fileDestination1);
                } else {
                }
            } else {
                $error1 = "There was an error uploading the file";
                $errimg1 = 1;
            }
        } else {
            $error1 = "Wrong Extension File";
            $errimg1 = 1;
        }
    }


    $sql = "UPDATE blogs 
    SET
    image = '" . $new_image . "',
    title = '" . $title . "',
    short_desc = '" . $descripition . "',
    long_desc = '" . $long_descripition . "',
    last_updated ='" . $last_updated . "'
  
    WHERE
    blog_id = $bid
    ";



    if (mysqli_query($link, $sql)) {
        echo "<script>
    swal.fire({
        text: 'Blog Updated Succesfully',
        type: 'Success',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Okay',
        cancelButtonText: 'No, cancel it!'
    }).then(function(isConfirm) {
    
        if (isConfirm.value) {
            window.location.href = 'blogs.php';
     
    
        } else {
    
        }
    
    });
    </script>";
    }
}


?>