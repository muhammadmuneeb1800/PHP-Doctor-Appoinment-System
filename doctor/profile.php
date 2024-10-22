<?php
include "config.php";

session_start();
if (!$_SESSION['email']) {
  header("location: login.php");
}

$sql = "SELECT * FROM doc";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $specialization = $_POST['specialization'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $sql = "UPDATE doc SET `name`='$name', `specialization`='$specialization', `email`='$email', `phone`='$phone' WHERE `id`= " . $row['id'] . "";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: dashboard.php");
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>DAMS - Doctor Profile</title>

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
                <h3 class="widget-title">Doctor Profile</h3>
              </header><!-- .widget-header -->
              <hr class="widget-separator">
              <div class="widget-body">
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <label for="exampleTextInput1" class="col-sm-3 control-label">Employee ID:</label>
                    <div class="col-sm-9">
                      <input id="fname" type="text" class="form-control" placeholder="Full Name" name="name" required="true" value="<?= $row['name'] ?>">
                    </div>
                  </div>


                  <div class=" form-group">
                    <label for="email2" class="col-sm-3 control-label">Email:</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>" required='true'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="col-sm-3 control-label">Contact Number:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email2" name="phone" value="<?= $row['phone'] ?>" required='true' maxlength='10'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="col-sm-3 control-label">Specialization:</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="specialization">
                        <?php
                        $sql1 = "SELECT * FROM `special`";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                          while ($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                            <option value="<?php echo $row1['id']; ?>" <?php if ($row['specialization'] == $row1['id']) echo "selected"; ?>><?php echo $row1['specialization']; ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="col-sm-3 control-label">Regsitration Date:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email2" name="" value="<?= $row['date'] ?>" readonly="true">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button type="submit" class="btn btn-success" name="update">Update</button>
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