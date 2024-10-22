<?php
include "config.php";

if (isset($_POST['submit'])) {
  if (!isset($_GET['id'])) {
    header("location: all-appointment.php");
  } else {
    $id = $_GET['id'];
  }
  $status = $_POST['status'];
  $remark = $_POST['remark'];
  $date = date("d M Y");

  $sqll = "UPDATE `appointments` SET `status` = '$status' , `remark` = '$remark' , `update_date` = '$date' WHERE `id` = '$id'";
  $result1 = mysqli_query($conn, $sqll);
  if ($result1) {
    header("location: all-appointment.php");
  } else {
    echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <title>DAMS|| View Appointment Detail</title>

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
  <!-- <script>
		Breakpoints();
	</script> -->

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
          <!-- DOM dataTable -->
          <div class="col-md-12">
            <div class="widget">
              <header class="widget-header">
                <h4 class="widget-title" style="color: blue">Appointment Details</h4>
              </header><!-- .widget-header -->
              <hr class="widget-separator">
              <div class="widget-body">
                <div class="table-responsive">
                  <table border="1" class="table table-bordered mg-b-0">
                    <?php
                    if (!isset($_GET['id'])) {
                      header("Location: all-appointment.php");
                    } else {
                      $id = $_GET['id'];
                    }
                    $sql4 = "SELECT * FROM `appointments` WHERE `id` = '$id'";
                    $result4 = mysqli_query($conn, $sql4);
                    if (mysqli_num_rows($result4) > 0) {
                      while ($row = mysqli_fetch_assoc($result4)) {
                    ?>
                        <tr>
                          <th>Appointment Number</th>
                          <td><?= $row['id'] ?></td>
                          <th>Patient Name</th>
                          <td><?= $row['name'] ?></td>
                        </tr>
                        <tr>
                          <th>Mobile Number</th>
                          <td><?= $row['phone'] ?></td>
                          <th>Email</th>
                          <td><?= $row['email'] ?></td>
                        </tr>
                        <tr>
                          <th>Appointment Date</th>
                          <td><?= $row['appoint_Date'] ?></td>
                          <th>Appointment Time</th>
                          <td><?= $row['appoint_time'] ?></td>
                        </tr>
                        <tr>
                          <th>Apply Date</th>
                          <td><?= $row['apply_date'] ?></td>
                          <th>Appointment Final Status</th>
                          <td colspan="4"><?= $row['status'] ?></td>
                        </tr>
                        <tr>
                          <th>Remark</th>
                          <td><?= $row['remark'] ?></td>
                      <?php }
                    } ?>
                  </table>
                  <br>
                  <p align="center" style="padding-top: 20px">
                    <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button>
                  </p>
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-bordered table-hover data-tables">
                            <form method="post" name="submit">
                              <tr>
                                <th>Remark :</th>
                                <td>
                                  <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea>
                                </td>
                              </tr>
                              <tr>
                                <th>Status :</th>
                                <td>
                                  <select name="status" class="form-control wd-450" required="true">
                                    <option value="Approved" selected="true">Approved</option>
                                    <option value="Cancelled">Cancelled</option>
                                  </select>
                                </td>
                              </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div><!-- .widget-body -->
              </div><!-- .widget -->
            </div><!-- END column -->
          </div><!-- .row -->
      </section><!-- .app-content -->
    </div><!-- .wrap -->
    <!-- APP FOOTER -->
    <?php include_once('includes/footer.php'); ?>
    <!-- /#app-footer -->
  </main>
  <!--========== END app main -->
  <!-- APP CUSTOMIZER -->
  <?php include_once('includes/customizer.php'); ?>
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