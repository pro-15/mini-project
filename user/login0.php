<?php require('../config/autoload.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="assets/images/square-h.png">
	<title>Health Center</title>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="description" content="Health Center website">
	<meta name="keywords" content="Health Center">
	<meta name="author" content="John Doe">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/tooplate-style.css">

</head>

<body style="background:url('assets/images/2098/slider2.jpg');background-size: cover;">





<?php
	$dao = new DataAccess();

	if(isset($_SESSION['name']))
		echo "<script> location.replace('dash.php'); </script>";
	// header('location:student/index.php');

	$elements = array("email" => "", "password" => "");
	$form = new FormAssist($elements, $_POST);
	$rules = array(
		'email' => array('required' => true),
		'password' => array('required' => true),
	);
	$validator = new FormValidator($rules);

	if (isset($_POST['login'])) {
		if ($validator->validate($_POST)) {
			$data = array('uemail' => $_POST['email'], 'upassword' => $_POST['password']);
			if ($info = $dao->login($data, 'users')) {
				$_SESSION['email'] = $info['uemail'];
				$_SESSION['name'] = $info['uname'];
				$a = $_SESSION['email'];
				echo "<script> alert('$a');</script> ";
				echo "<script> location.replace('dash.php'); </script>";
				// header('location:student/index.html');
			} else {
				$msg = "invalid username or password";
				echo "<script> alert('Invalid username or password');</script> ";
			}
		}
	}
	?>





	<section id="login" data-stellar-background-ratio="3">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 center-block">
					<!-- <div class="brand-logo">
          <img src="assets/images/logo.svg">
        </div> -->
		  			<h2><i class="fa fa-h-square"></i>ealth Center</h2>
					<h4>Hello! let's get started</h4>
					<h5 class="text-muted">Sign in to continue.</h5>
					<form method="POST" class="form-group form-group-lg">
						<div class="col-md-12 col-sm-12">
							<?= $form->textBox('email', array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email')); ?>
                            <?= $validator->error('email'); ?>
							<!-- <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email"> -->
						</div>
						<div class="col-md-12 col-sm-12">
							<?= $form->textBox('email', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')); ?>
                            <?= $validator->error('email'); ?>
							<!-- <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"> -->
						</div>
						<div class="col-md-12 col-sm-12">
							<button id="cf-submit" class="btn btn-primary form-control" href="index.html">SIGN IN</button>
						</div>
						<!-- <div class="my-2 d-flex justify-content-between align-items-center"> -->
						<div class="my-2 justify-content-between align-items-center text-center">
							<!-- <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div> -->
							<a href="#" class="auth-link text-black">Forgot password?</a>
						</div>
						<div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="assets/vendors/js/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="assets/js/off-canvas.js"></script>
	<script src="assets/js/hoverable-collapse.js"></script>
	<script src="assets/js/misc.js"></script>
	<!-- endinject -->

	<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>

</html>