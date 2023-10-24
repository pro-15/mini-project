<?php
    require("../config/autoload.php");
    //if(!isset($_SESSION['pid'])) echo "<script>location.replace('signin.php');</script>";
	//header("Location : signin.php");
?>
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
		"did" => "",
		"date_bok" => date("Y-m-d"),
		"slot" => ""
	);
	if(isset($_GET['id'])) $elements += array("id" => $_GET['id']);
	else $elements += array("id" => '');

	$form = new FormAssist($elements, $_POST);
	//$file=new FileUpload();
	$labels = array(
		'id' => '',
		'did' => '',
        'date_bok' => '',
        'slot' => ''
    );

	$rules = array(
		"id" => array("required" => true),
		"did" => array("required" => true),
		"date_bok" => array("required" => true),
		"slot" => array("required" => true)
	);

	$validator = new FormValidator($rules, $labels);

	if (isset($_POST['book'])) {
		if ($validator->validate($_POST)) {
			// code for insertion 

			$data = array(
				'pid' => $_SESSION['pid'],
				'did' => $_POST['did'],
				'date_gen' => date("Y-m-d H:i:s"),
				'date_bok' => $_POST['date_bok'],
				'slot' => $_POST['slot']
			);
			if ($dao->insert($data, 'book')) {
                echo "<script> alert('Booking Completed'); </script>";
                echo "<script> location.replace('../index.php'); </script>";
            }
			else
                echo "<script> alert('Failed'); </script>";
		}
	}

?>



<!-- tooplate-style.css -->

<section id="book-form" data-stellar-background-ratio="3">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 center-block">
					<div class="col-md-12 col-sm-12">
						<h2 class="brand">
							<a href="../index.php">
								<i class="fa fa-h-square"></i>ealth Center
							</a>
						</h2>
						<h4>Meet you doctor</h4>
						<h5 class="text-muted">Book a slot to meet your doctor</h5>
					</div>
					<form method="POST" class="form-group form-group-lg">
                        <div class="col-md-6 col-sm-6">
							<label for='id'>Specialization</label>
                            <?= "<span class='err-msg'>".$validator->error('id')."</span>" ?>
							<?=
								$form->dropDownList(
									'id',
									array(
										'id' => 'id',
										'class' => 'form-control',
										'onchange' => 'cellChange()'
									),
									$dao->createOptions(
										'dept',
										'id',
										'dept'
									)
								);
							?>
						</div>
                        <div class="col-md-6 col-sm-6">
							<label for='did'>Doctor</label>
                            <?= "<span class='err-msg'>".$validator->error('did')."</span>" ?>
							<?php
								$dept = '0';
								if(isset($_GET['id'])) $dept = $_GET['id'];
								echo $form->dropDownList(
									'did',
									array(
										'id' => 'did',
										'class' => 'form-control'
									),
									$dao->createOptions(
										'dname',		// Label
										'did',			// Value
										'doc',			// Table
										"id = $dept"	// Condition
									)
								);
							?>
						</div>
						<div class="col-md-6 col-sm-6">
							<label for='date_dob'>Date</label>
                            <?= "<span class='err-msg'>".$validator->error('date_bok')."</span>" ?>
							<?=
								$form->inputBox(
									'date_bok',
									array(
										'id' => 'date_bok',
										'class' => 'form-control',
										'min' => date('Y-m-d'),
										'max' => date('Y-m-d', strtotime('+30 days'))
									),
									'date'
								);
							?>
						</div>
                        <div class="col-md-6 col-sm-6">
							<label for='slot'>Slot</label>
							<?= "<span class='err-msg'>".$validator->error('slot')."</span>" ?>
                            <?=
								$form->dropDownList(
									'slot',
									array(
										'id' => 'slot',
										'class' => 'form-control'
									),
									array(
										'9:00AM - 10:00AM' => 'A',
										'10:00AM - 11:00AM' => 'B',
										'11:00AM - 12:00PM' => 'C',
										'12:00PM - 1:00PM' => 'D',
										'2:00PM - 3:00PM' => 'E',
										'3:00PM - 4:00PM' => 'F',
										'4:00PM - 5:00PM' => 'G',
										'5:00PM - 6:00PM' => 'H'
									)
								);
							?>
						</div>
						<div class="col-md-12 col-sm-12">
							<button id="book" class="btn btn-primary form-control" name="book">SIGN UP</button>
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

	<!-- OPTION SELECTOR REFRESH -->
	<script>
		function cellChange() {
			var x = document.getElementById("id").value;
			location.replace("book.php?id="+x);
		}
	</script>

</body>

</html>