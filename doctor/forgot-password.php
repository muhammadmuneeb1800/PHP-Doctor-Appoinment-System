<?php
include "config.php";
session_start();
if ($_SESSION['email']) {
	header("location: dashboard.php");
}
?>
<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>DAMS - Forgot Page</title>


	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<!-- <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script> -->
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
			<h4 class="form-title m-b-xl text-center">Reset Your Password</h4>
			<form method="post" name="chngpwd" onSubmit="return valid();">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Email Address" required="true" name="email">
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="mobile" placeholder="Mobile Number" required="true">
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="newpassword" placeholder="New Password" required="true" />
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />
				</div>


				<input type="submit" class="btn btn-primary" name="submit" value="RESET">
			</form>
		</div><!-- #login-form -->

		<div class="simple-page-footer">
			<p style="color: white">Do you have an account ?<a href="login.php"> SIGN IN</a></p>

		</div><!-- .simple-page-footer -->


	</div><!-- .simple-page-wrap -->
</body>

</html>