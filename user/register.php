<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Purple Admin</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="../admin/assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../admin/assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="../admin/assets/css/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="../admin/assets/images/favicon.ico" />
</head>

<body>





	<?php
	require('../config/autoload.php');
	$dao = new DataAccess();
	$elements = array(
		"name" => "",
		"email" => "",
		"mobile" => "",
		"pass" => "",
		"cpass" => ""
	);


	$form = new FormAssist($elements, $_POST);
	//$file=new FileUpload();
	$labels = array('name' => "Name", "email" => "Email Id", "mobile" => "Mobile Number", "pass" => "Password", "cpass" => "Confirm pass");

	$rules = array(
		"name" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaspaceonly" => true),
		"email" => array("required" => true, "email" => true, "unique" => array("field" => "uemail", "table" => "users")),

		"mobile" => array("required" => true, "integeronly" => true, "minlength" => 10, "maxlength" => 10),

		"pass" => array("required" => true),
		"cpass" => array("required" => true, "compare" => array("comparewith" => "pass", "operator" => "=")),
	);


	$validator = new FormValidator($rules, $labels);

	if (isset($_POST['register'])) {
		if ($validator->validate($_POST)) {
			// code for insertion 
	
			$data = array(
				'name' => $_POST['name'],
				'mobile' => $_POST['mobile'],
				'uemail' => $_POST['email'],
				'upass' => $_POST['pass'],
				'status' => 1
			);
			if ($dao->insert($data, 'users46')) {
				$msg = "Inserted Successfully";
			} else
				$msg = "insertion failed";
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
								<img src="../admin/assets/images/logo.svg">
							</div>
							<h4>New here?</h4>
							<h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
							<form class="pt-3" action="">
								<div class="form-group">

									<!-- Name -->

									<?= $form->textBox('name', array("class" => "form-control form-control-lg", "id" => "exampleInputName1", "placeholder" => "Name")); ?>
									<span class="valErr">
										<?= $validator->error('name'); ?>
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

									<?= $form->passwordbox('pass', array("class"=>"form-control", "id"=>"exampleInputPassword1","placeholder" => "Password")); ?>
									<span class="valErr">
										<?= $validator->error('pass'); ?>
									</span>

								
								</div>
								<div class="form-group">

								<!-- Confirm Password -->

									<?= $form->passwordbox('cpass', array("class"=>"form-control", "id"=>"exampleInputConfirmPassword1","placeholder" => "Confirm Password")); ?>
									<span class="valErr">
										<?= $validator->error('cpass'); ?>
									</span>
		
								
								</div>
								<div class="mb-4">
									<div class="form-check">
										<label class="form-check-label text-muted">
											<input type="checkbox" class="form-check-input"> I agree to all Terms &
											Conditions
										</label>
									</div>
								</div>
								<div class="mt-3">
									<a
										class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN
										UP</a>
								</div>
								<div class="text-center mt-4 font-weight-light"> Already have an account? <a
										href="login.html" class="text-primary">Login</a>
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
	<script src="../admin/assets/vendors/js/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="../admin/assets/js/off-canvas.js"></script>
	<script src="../admin/assets/js/hoverable-collapse.js"></script>
	<script src="../admin/assets/js/misc.js"></script>
	<!-- endinject -->
</body>

</html>