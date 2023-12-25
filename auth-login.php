<?php
include 'db.php';

session_start();

$message = "";
if (count($_POST) > 0) {

  $result_admin = mysqli_query($link, "SELECT * FROM admin WHERE username='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "' ");
  $row  = mysqli_fetch_array($result_admin);
  if (is_array($row)) {
?>
    <!-- <script>

    $('.tst').removeattr('id');

    </script> -->

    <?php

    $_SESSION["adminid"] = $row['id'];
    $user = $row['id'];
    ?>
    <script>
      alert("Login Successfully!");
    </script>
  <?php
  } else {
    $message = "*Invalid Email ID or Password!";
  ?>
    <script>
      // function Geeks() {
        // alert("Invalid Email ID or Password!");
        //$('#tst').attr('id','toastr-4');
        // $(".tst").prop('tst', 'toastr-4');
        //$('tst').attr('id', $("toastr-4").text());
      // }
    </script>
<?php
  }
}


if (isset($_SESSION["adminid"])) {

  header("Location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.einfosoft.com/templates/admin/aegis/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2022 10:54:30 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SilShine Trip  | Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />


  <style>
    @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');

    body {
      /* background-image: url('assets/img/4.webp');
      background-size: contain;
      background-repeat: no-repeat; */


      opacity: 100%;
      -webkit-animation: slidein 100s;
      animation: slidein 100s;

      -webkit-animation-fill-mode: forwards;
      animation-fill-mode: forwards;

      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite;

      -webkit-animation-direction: alternate;
      animation-direction: alternate;


      background: url('assets/img/bg1.jpg') no-repeat center center fixed;
       -webkit-background-size: cover;
      /* -moz-background-size: cover;
      /*-o-background-size: cover; */
      background-size: cover;
    }


    /* @media screen and (min-width: 769px) {
      @-webkit-keyframes slidein {
        from {
          background-position: top;
          background-size: 1800px;
        }

        to {
          background-position: -100px 0px;
          background-size: 2750px;
        }
      }
    } */


    /* @media screen and (max-width:768px) {
      @-webkit-keyframes slidein {
        from {
          background-position: top;
          background-size: 1500px;
        }

        to {
          background-position: -100px 0px;
          background-size: 2000px;
        }
      }
    } */


    /* @media screen and (min-width: 769px) {
      @keyframes slidein {
        from {
          background-position: top;
          background-size: 1800px;
        }

        to {
          background-position: -100px 0px;
          background-size: 2750px;
        }

      }

    } */

    /* @media screen and (max-width:768px) {
      @keyframes slidein {
        from {
          background-position: top;
          background-size: 1500px;
        }

        to {
          background-position: -100px 0px;
          background-size: 2000px;
        }

      }

    } */



    .center {
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      margin: auto;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      /* background: rgba(75, 75, 250, 0.3); */
      border-radius: 3px;
    }

    .center h1 {
      text-align: center;
      color: white;
      font-family: 'Source Code Pro', monospace;
      text-transform: uppercase;
    }
  </style>
</head>

<body>
  <div class="loader"></div>
  <div class="center"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-info">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="" name="" class="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required="" autofocus>
                    <!-- <div class="invalid-feedback">
                      *Please enter your <strong>Admin ID</strong>
                    </div> -->
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <!-- <a href="auth-forgot-password.php" style="color:#0c99db !important;" class="text-small">
                          Forgot Password?
                        </a> -->
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required="" autofocus>
                    <!-- <div class="invalid-feedback">
                      *Please enter your<strong> Password</strong>
                    </div> -->
                  </div>
                  <div class="form-group">
                    <!-- <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div> -->
                  </div>
                  <div class="form-group">
                    <button style="background-color:#0c99db !important;" onclick="" type="submit" id="" value="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <!-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div> -->
                <div class="row sm-gutters">
                  <div class="mt-5 text-muted text-center">
                    <h6 style="color:red;"><?php echo $message;?></h6>
                  </div>
                </div>
                <div class="row sm-gutters">
                  <div class="mt-5 text-muted text-center">
                    <h6> WELCOME TO <a>Namasya FinAdvice !</a></h6>
                  </div>
                  <!-- <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div> -->
                  <!-- <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div> -->
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>


  <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
  <script src="assets/js/page/toastr.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/aegis/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2022 10:54:30 GMT -->

</html>