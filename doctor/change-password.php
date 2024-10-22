<?php
include "config.php";
session_start();
if (!$_SESSION['email']) {
  header("location: login.php");
}

if (isset($_POST['submit'])) {
  $email = $_SESSION['email'];
  $old_password = md5($_POST['currentpassword']);
  $new_password = md5($_POST['newpassword']);
  $confirm_password = md5($_POST['confirmpassword']);

  $sql = "SELECT `password` FROM `doc` WHERE `email` = '$email'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  print_r($row);
  $pass = $row['password'];
  if (isset($pass) === $old_password) {
    if ($new_password === $confirm_password) {
      $sql1 = "UPDATE `doc` SET `password` = '$new_password' WHERE `email` = '" . $_SESSION['email'] . "'";
      $result = mysqli_query($conn, $sql1);
      if ($result) {
        echo "<div class='alert alert-danger'>Your Current Password Is Incorrect.</div>";
      }
    } else {
      echo "<script>alert('New Password and Confirm Password does not match!');</script>";
    }
  } else {
    echo "<div class='alert alert-danger'>Your Current Password Is Incorrect.</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>DAMS - Change Password</title>

  <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
  <!-- build:css assets/css/app.min.css -->
  <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
  <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/core.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <!-- endbuild -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
  <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
  <!--============= start main area -->

  <?php include_once('includes/header.php'); ?>

  <?php include_once('includes/sidebar.php'); ?>

  <!-- APP MAIN ==========-->
  <main id="app-main" class="app-main">
    <div class="wrap">
      <section class="app-content">
        <div class="row">

          <div class="col-md-12">
            <div class="widget">
              <header class="widget-header">
                <h3 class="widget-title">Change Password</h3>
              </header><!-- .widget-header -->
              <hr class="widget-separator">
              <div class="widget-body">

                <form class="form-horizontal" name="changepassword" method="post">
                  <div class="form-group">
                    <label for="exampleTextInput1" class="col-sm-3 control-label">Current Password:</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="currentpassword" id="currentpassword" required='true'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="col-sm-3 control-label">New Password:</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="newpassword" class="form-control" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="col-sm-3 control-label">Confirm Password:</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required='true'>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button type="submit" class="btn btn-success" name="submit">Change</button>
                    </div>
                  </div>
                </form>
              </div><!-- .widget-body -->
            </div><!-- .widget -->
          </div><!-- END column -->

        </div><!-- .row -->
      </section><!-- #dash-content -->
    </div><!-- .wrap -->
    <!-- APP FOOTER -->
    <?php include_once('includes/footer.php'); ?>
    <!-- /#app-footer -->
  </main>
  <!--========== END app main -->

  <?php include_once('includes/customizer.php'); ?>

  <!-- SIDE PANEL -->


  <!-- build:js assets/js/core.min.js -->
  <script src="libs/bower/jquery/dist/jquery.js"></script>
  <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
  <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
  <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="libs/bower/PACE/pace.min.js"></script>
  <!-- endbuild -->

  <!-- build:js assets/js/app.min.js -->
  <script src="assets/js/library.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/app.js"></script>
  <!-- endbuild -->
  <script src="libs/bower/moment/moment.js"></script>
  <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="assets/js/fullcalendar.js"></script>
</body>

</html>