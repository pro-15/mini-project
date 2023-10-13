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

<body style="background:url('assets/images/2098/slider1.jpg');background-size: cover;">





<?php

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
		"lname" => array("required" => true, "minlength" => 1, "maxlength" => 30, "alphaspaceonly" => true),
		"email" => array("required" => true, "email" => true),
		"mobile" => array("required" => true, "integeronly" => true, "minlength" => 10, "maxlength" => 10),
		"pass" => array("required" => true),
		"cpass" => array("required" => true, "compare" => array("comparewith" => "pass", "operator" => "=")),
	);

	$validator = new FormValidator($rules, $labels);

	if (isset($_POST['signup'])) {
		if ($validator->validate($_POST)) {
			// code for insertion 

			$data = array(
				'fname' => $_POST['fname'],
				'lname' => $_POST['lname'],
				'mobile' => $_POST['mobile'],
				'email' => $_POST['email'],
				'pass' => $_POST['pass']
			);
			if ($dao->insert($data, 'userdat')) {
                echo "<script> alert('Sign in to continue'); </script>";
                echo "<script> location.replace('signin.php'); </script>";
            }
			else
                echo "<script> alert('Insertion failed'); </script>";
		}
	}

?>



<!-- tooplate-style.css -->

<section id="signup-form" data-stellar-background-ratio="3">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 center-block">
					<div class="col-md-12 col-sm-12">
						<h2 class="brand">
							<a href="../index.php">
								<i class="fa fa-h-square"></i>ealth Center
							</a>
						</h2>
						<h4>New here?</h4>
						<h5 class="text-muted">Signing up is easy. It only takes a few steps</h5>
					</div>
					<form method="POST" class="form-group form-group-lg">
                        <div class="col-md-6 col-sm-6">
                            <?= $validator->error('fname'); ?>
							<?= $form->textBox('fname', array('id' => 'fname', 'class' => 'form-control', 'placeholder' => $labels['fname'])); ?>
						</div>
                        <div class="col-md-6 col-sm-6">
                            <?= $validator->error('lname'); ?>
							<?= $form->textBox('lname', array('id' => 'lname', 'class' => 'form-control', 'placeholder' => $labels['lname'])); ?>
						</div>
						<div class="col-md-6 col-sm-6">
                            <?= $validator->error('email'); ?>
							<?= $form->textBox('email', array('id' => 'email', 'class' => 'form-control', 'placeholder' => $labels['email'])); ?>
						</div>
                        <div class="col-md-6 col-sm-6">
							<?= $validator->error('mobile'); ?>
                            <?= $form->textBox('mobile', array('id' => 'mobile', 'class' => 'form-control', 'placeholder' => $labels['mobile'])); ?>
						</div>
						<div class="col-md-6 col-sm-6">
							<?= $validator->error('pass'); ?>
                            <?= $form->passwordBox('pass', array('id' => 'pass', 'class' => 'form-control', 'placeholder' => $labels['pass'])); ?>
						</div>
                        <div class="col-md-6 col-sm-6">
							<?= $validator->error('cpass'); ?>
                            <?= $form->passwordBox('cpass', array('id' => 'cpass', 'class' => 'form-control', 'placeholder' => $labels['cpass'])); ?>
						</div>
						<div class="col-md-12 col-sm-12">
							<button id="signup" class="btn btn-primary form-control" name="signup">SIGN UP</button>
						</div>
						<div class="text-center">
							<a href="signin.php">Already have an account?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>



	<!-- SCRIPTS -->
	<script src="user/assets/js/2098/jquery.js"></script>
	<script src="user/assets/js/2098/bootstrap.min.js"></script>
	<script src="user/assets/js/2098/jquery.sticky.js"></script>
	<script src="user/assets/js/2098/jquery.stellar.min.js"></script>
	<script src="user/assets/js/2098/wow.min.js"></script>
	<script src="user/assets/js/2098/smoothscroll.js"></script>
	<script src="user/assets/js/2098/owl.carousel.min.js"></script>
	<script src="user/assets/js/2098/custom.js"></script>
	<script src="user/assets/js/2098/valid.js"></script>

</body>

</html>