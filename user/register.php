<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Purple Site</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="assets/images/favicon.ico" />

	<!-- Date picker -->
	<link rel="stylesheet" href="reg/vendor/datepicker/daterangepicker.css">

</head>

<body>





	<?php
	require('../config/autoload.php');
	$dao = new DataAccess();
	$elements = array(
		"fname" => "",
		"lname" => "",
		"email" => "",
		"mobile" => "",
		"pass" => "",
		"cpass" => ""
	);

	$form = new FormAssist($elements, $_POST);
	//$file=new FileUpload();
	$labels = array('fname' => "First Name", 'lname' => "Last Name", "email" => "Email Id", "mobile" => "Mobile Number", "pass" => "Password", "cpass" => "Confirm Password");

	$rules = array(
		"fname" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaspaceonly" => true),
		"lname" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaspaceonly" => true),
		"email" => array("required" => true, "email" => true),
		"mobile" => array("required" => true, "integeronly" => true, "minlength" => 10, "maxlength" => 10),
		"pass" => array("required" => true),
		"cpass" => array("required" => true, "compare" => array("comparewith" => "pass", "operator" => "=")),
	);

	$validator = new FormValidator($rules, $labels);

	if (isset($_POST['register'])) {
		if ($validator->validate($_POST)) {
			// code for insertion 

			$data = array(
				'fname' => $_POST['fname'],
				'lname' => $_POST['lname'],
				'mobile' => $_POST['mobile'],
				'uemail' => $_POST['email'],
				'upass' => $_POST['pass'],
			);
			if ($dao->insert($data, 'userdat'))
				$msg = "Inserted Successfully";
			else
				$msg = "Insertion failed";
			echo "<script> alert('$msg'); </script>";
		}
	}

	if (isset($_POST['home'])) {
		echo "<script> location.replace('displaycategory.php'); </script>";
	}

	?>





	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth">
				<div class="row flex-grow">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left p-5">
							<div class="brand-logo">
								<img src="assets/images/logo.svg">
							</div>
							<h4>New here?</h4>
							<h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
							<form class="pt-3" action="" method="POST">
								<div class="form-group">

									<!-- First Name -->

									<?= $form->textBox('fname', array("class" => "form-control form-control-lg", "placeholder" => "First Name")); ?>
									<span class="valErr">
										<?= $validator->error('fname'); ?>
									</span>


								</div>
								<div class="form-group">

									<!-- Last Name -->

									<?= $form->textBox('lname', array("class" => "form-control form-control-lg", "placeholder" => "Last Name")); ?>
									<span class="valErr">
										<?= $validator->error('lname'); ?>
									</span>


								</div>
								<div class="form-group">

									<!-- Email -->

									<?= $form->textBox('email', array("class" => "form-control form-control-lg", "id" => "exampleInputEmail1", "placeholder" => "Email")); ?>
									<span class="valErr">
										<?= $validator->error('email'); ?>
									</span>


								</div>
								<div class="form-group">

									<!-- Mobile -->

									<?= $form->textBox('mobile', array("class" => "form-control", "id" => "exampleInputMobile", "placeholder" => "Mobile Number")); ?>
									<span class="valErr">
										<?= $validator->error('mobile'); ?>
									</span>


								</div>
								<div class="form-group">

									<!-- Password -->

									<?= $form->passwordbox('pass', array("class" => "form-control", "id" => "exampleInputPassword1", "placeholder" => "Password")); ?>
									<span class="valErr">
										<?= $validator->error('pass'); ?>
									</span>


								</div>
								<div class="form-group">

									<!-- Confirm Password -->

									<?= $form->passwordbox('cpass', array("class" => "form-control", "id" => "exampleInputConfirmPassword1", "placeholder" => "Confirm Password")); ?>
									<span class="valErr">
										<?= $validator->error('cpass'); ?>
									</span>


								</div>
								<!-- <div class="form-group">

									<_!-- Date of birth --_>


									<input class="form-control js-datepicker" type="text" placeholder="Date of Birth" name="birthday">
									<_!-- <i class="mdi mdi-calendar input-icon js-btn-calendar"></i> --_>


								</div> -->
								<div class="mb-4">
									<div class="form-check">
										<label class="form-check-label text-muted">
											<input type="checkbox" class="form-check-input">
											I agree to all Terms & Conditions
										</label>
									</div>
								</div>
								<div class="mt-3">
									<!-- <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"> -->
										<button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium" name="register" type="submit">SIGN UP</button>
									<!-- </a> -->
								</div>
								<div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>



	<!-- Jquery JS-->
	<script src="reg/vendor/jquery/jquery.min.js"></script>
	<!-- Vendor JS-->
	<script src="reg/vendor/select2/select2.min.js"></script>
	<script src="reg/vendor/datepicker/moment.min.js"></script>
	<script src="reg/vendor/datepicker/daterangepicker.js"></script>

	<!-- Main JS-->
	<script src="reg/js/global.js"></script>



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
</body>

</html>