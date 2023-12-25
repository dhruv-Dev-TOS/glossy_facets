<?php
include 'db.php';
$error = "";
if (isset($_POST['submit'])) {
  $email = $_POST['user_name'];
 
  $sql1 = "SELECT * FROM admin WHERE username = '" . $email . "'";
  $result = mysqli_query($link, $sql1);
  $numrows = mysqli_num_rows($result);
  $admin_data = $result->fetch_assoc();

  if ($numrows > 0) {
    if ($admin_data != null) {
      $from = 'sgpc.india@gmail.com';
      //$to = 'info@skybirdlogistic.com';
      $to = 'sgpc.india@gmail.com';

      $subject = 'Forget Password';

      $headers = "From: " . strip_tags('sgpc.india@gmail.com') . "\r\n";
      $headers .= "Reply-To: " . strip_tags('sgpc.india@gmail.com') . "\r\n";

      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      $message = 'Your Password is <strong>' . $admin_data['password'] . '</strong>';

      // mail($row['email'], 'enquiry', 'Name: '.$name.'',$headers);    
      mail($to, $subject, $message, $headers);

      echo '<script> alert("Your Password sent to your Email Address successfully...")</script>';
      header("Location:auth-login.php");
?>
      <script>
        window.location.href = "auth-login.php";
      </script>
<?php
    } 
    else 
    {
     
   
            
    }
  }
  else{
    $error = "*Invalid Username!";

  }
}
else {
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.einfosoft.com/templates/admin/aegis/source/light/auth-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2022 10:56:20 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SilShine Trip   | Forget Password</title>
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


      background: url('assets/img/travel.jpg') no-repeat center center fixed;
      -webkit-background-size: contain;
      /* -moz-background-size: cover;
      -o-background-size: cover; */
      background-size: contain;
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
            <div class="card card-primary">
              <div class="card-header">
                <h4>Forgot Password</h4>
              </div>
              <div class="card-body">
                <form name="" action="" method="POST">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="user_name" type="text" class="form-control" name="user_name" tabindex="1" required autofocus>
                  </div>
                  <input name="submit" id="submit" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" value=" Get Your Password">
                  <a href="auth-login.php" name="" id="" type="" class="btn btn-info btn-lg btn-block" tabindex="4" value="">Back

                  </a>
                  <div class="row sm-gutters">
                  <div class="mt-5 text-muted text-center">
                    <!-- <h6 style="color:red;"><?php echo $error;?></h6> -->
                  </div>
              </div>
              </form>
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
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/aegis/source/light/auth-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2022 10:56:20 GMT -->

</html>

