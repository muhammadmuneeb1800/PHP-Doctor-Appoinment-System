<?php
include "config.php";
session_start();
if (!$_SESSION['email']) {
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>DAMS || Cancelled Appointment Detail</title>
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
					<!-- DOM dataTable -->
					<div class="col-md-12">
						<div class="widget">
							<header class="widget-header">
								<h4 class="widget-title">Cancelled Appointment</h4>
							</header><!-- .widget-header -->
							<hr class="widget-separator">
							<div class="widget-body">
								<div class="table-responsive">
									<table class="table table-bordered table-hover js-basic-example dataTable table-custom">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Appointment Number</th>
												<th>Patient Name</th>
												<th>Mobile Number</th>
												<th>Email</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$doc = "SELECT * FROM `doc`";
											$rest = mysqli_query($conn, $doc);
											$now = mysqli_fetch_assoc($rest);
											$sql4 = "SELECT * FROM `appointments` WHERE `specialization` = " . $now['specialization'] . " AND `status` = 'Cancelled'";
											$result4 = mysqli_query($conn, $sql4);
											if (mysqli_num_rows($result4) > 0) {
												$i = 1;
												while ($row = mysqli_fetch_assoc($result4)) {
											?>
													<tr>
														<td><?= $i++ ?></td>
														<td><?= $row['id'] ?></td>
														<td><?= $row['name'] ?></td>
														<td><?= $row['phone'] ?></td>
														<td><?= $row['email'] ?></td>
														<td><?= $row['status'] ?></td>
														<td><a href="view-appointment-detail.php?id=<?= $row['id'] ?>" class="btn btn-primary">View</a></td>
													</tr>
											<?php }
											} else {
												echo "<tr><td colspan='7'>No appointment found.</td></tr>";
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>S.No</th>
												<th>Appointment Number</th>
												<th>Patient Name</th>
												<th>Mobile Number</th>
												<th>Email</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
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