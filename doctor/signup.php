<?php
include "config.php";

session_start();
if (isset($_SESSION['email'])) {
	header("location: dashboard.php");
}

if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);;
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$password = md5($_POST['password']);
	$specialization = mysqli_real_escape_string($conn, $_POST['specialization']);

	$sql1 = "INSERT INTO doc (`name`,`email`,`phone`,`specialization`,`password`) VALUES ('$name','$email','$phone','$specialization','$password')";
	$result1 = mysqli_query($conn, $sql1);
	if ($result1) {
		header("location: dashboard.php");
	} else {
		echo "query failed";
	}
}
?>

<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>DAMS - Login Page</title>
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>

<body class="simple-page">
	<div id="back-to-home">
		<a href="../index.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">

			<span style="color: white"><i class="fa fa-gg"></i></span>
			<span style="color: white">DAMS</span>

		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
			<h4 class="form-title m-b-xl text-center">Sign Up With Your DAMS Account</h4>
			<form action="" method="post">
				<div class="form-group">
					<input id="fname" type="text" class="form-control" placeholder="Full Name" name="name" required="true">
				</div>

				<div class="form-group">
					<input id="email" type="email" class="form-control" placeholder="Email" name="email" required="true">
				</div>
				<div class="form-group">
					<input id="mobno" type="text" class="form-control" placeholder="Mobile" name="phone" maxlength="10" pattern="[0-9]+" required="true">
				</div>
				<div class="form-group">
					<select class="form-control" name="specialization">
						<option value="" disabled selected>Choose Specialization</option>
						<?php
						$sql = "SELECT * FROM `special`";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<option value='" . $row['id'] . "'>" . $row['specialization'] . "</option>";
							}
						}
						?>
					</select>

				</div>

				<div class="form-group">
					<input id="password" type="password" class="form-control" placeholder="Password" name="password" required="true">
				</div>

				<input type="submit" class="btn btn-primary" value="Register" name="submit">
			</form>
		</div><!-- #login-form -->

		<div class="simple-page-footer">
			<p>
				<small>Do you have an account ?</small>
				<a href="login.php">SIGN IN</a>
			</p>
		</div>


	</div><!-- .simple-page-wrap -->
</body>

</html>