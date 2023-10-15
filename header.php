<?php require("config/autoload.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="user/assets/images/square-h.png">
	<title>Health Center</title>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="description" content="Health Center website">
	<meta name="keywords" content="Health Center">
	<meta name="author" content="John Doe">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="user/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="user/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="user/assets/css/animate.css">
	<link rel="stylesheet" href="user/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="user/assets/css/owl.theme.default.min.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="user/assets/css/tooplate-style.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

	<!-- PRE LOADER -->
	<section class="preloader">
		<div class="spinner">

			<span class="spinner-rotate"></span>

		</div>
	</section>


	<!-- MENU -->
	<section class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">

			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<i class="fa fa-bars" style="font-size: larger;"></i>
					<!-- <span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span> -->
				</button>

				<!-- lOGO TEXT HERE -->
				<a href="index.php" class="navbar-brand" title="Health Center">
					<i class="fa fa-h-square"></i>ealth Center
				</a>
			</div>

			<!-- MENU LINKS -->
			<div class="menu collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#about" class="smoothScroll" title="About Us">About Us</a></li>
					<li><a href="#team" class="smoothScroll" title="Doctors">Doctors</a></li>
					<li><a href="#news" class="smoothScroll" title="News">News</a></li>
					<li><a href="user/book.php" title="Book an Appointment"><b>Book Now</b></a></li>
					<li>
					<?php 
						if(isset($_SESSION['pid'])) {
							echo "<a href='#' id='proffile' title='Profile' onclick='openList1(this);'>
								<i class='fa fa-user fa-space'></i>".$_SESSION['name'].
							"</a>";
							echo "<div class='prof-drop' style='display: none;'>
								<ul>
									<li>
										<a href='user/dash.php' title='Dashboard'>Dashboard</a>
									</li>
									<li>
										<a href='config/signout.php' title='Sign Out'>Sign Out</a>
									</li>
								</ul>
							</div>";
							// echo "<a class='dropdown-toggle' title='Profile' id='dropdownMenuButton' data-toggle='dropdown'>
							// 	<i class='fa fa-user'></i>".$_SESSION['name'].
							// "</a>";
							// echo "<div class='dropdown'>
							// 	<div class='dropdown-menu'>
							// 		<a class='dropdown-item' href='user/dash.php' title='Dashboard'>Dashboard</a>
							// 		<a class='dropdown-item' href='config/signout.php' title='Sign out'>Sign out</a>
							// 	</div>
							// </div>";
						}
						else echo "<a href='user/signin.php' title='Sign in'>Sign In</a>";
					?>
					</li>
				</ul>
			</div>

		</div>
	</section>