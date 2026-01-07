<!DOCTYPE html>

<?php	
	include 'conn.php';
	session_start();
	if(isset($_POST['login']))
	{
		$email=$_POST['eid'];
		$pwd=$_POST['pass'];

		$sql="SELECT * FROM `donor_registration` WHERE `email-id` = '$email' ";
		$query=mysqli_query($con,$sql);
		$count=mysqli_num_rows($query);
		if($count==1)
		{
			while($fetch=mysqli_fetch_assoc($query))
			{
				if(base64_encode($pwd)==$fetch['password'])
				{
					$_SESSION['email-id'] = $email;
					header("location: welcome_d.php");
				}	
				else
				{
?>
					<script> alert("Incorrect email-id and password..");</script>
<?php
				}
			}
		}
	}
	if(isset($_POST['login']))
	{
		$email=$_POST['eid'];
		$pwd=$_POST['pass'];

		$sql="SELECT * FROM `ngo_registration` WHERE `email-id` = '$email' ";
		$query=mysqli_query($con,$sql);
		$count=mysqli_num_rows($query);
		if($count==1)
		{
			while($row=mysqli_fetch_assoc($query))
			{
			if(base64_encode($pwd) == $row['password'])
			{
				$_SESSION['email-id'] = $email;
				header("location: welcome_n.php");
			}
			else
			{
?>
				<script> alert("Incorrect email-id and password..");</script>
<?php
			}
			}
		}
	}
?>

<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">

	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="index.html">Helping Hands</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li  class="active">
								<a href="index.html">Home</a>
							</li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/3.jpg);">
				<div class="desc animate-box">
					<h2><strong>LOGIN</strong></h2>
					<br>
				</div>
			</div>
		</div>

		<div id="fh5co-contact" class="animate-box">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Our Address</h3>
						<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
						<ul class="contact-info">
							<li><i class="icon-location-pin"></i>near old airport,NH-8B, chhaya, porbandar</li>
							<li><i class="icon-phone2"></i>+ 8200 1409 45</li>
							<li><i class="icon-mail"></i><a href="#">vibhu232004@gmail.com</a></li>
							<li><i class="icon-globe2"></i><a href="index.html">www.charity.com</a></li>
						</ul>
					</div>

					<form method="POST">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="email" name="eid" class="form-control" placeholder="Email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="password" name="pass" class="form-control" placeholder="Password">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" value="Login" name="login" class="btn btn-primary">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<a href="forgot.php">forget Password?</a>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<p>Don"t have account ? 	
											<p><a href="reg_ngo.php">Register as NGO</a> / <a href="reg_donor.php">Register as Donor</a></p>
										</p>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
        	</div>
        </div>

		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p><a href="#">Charity</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<!-- END fh5co-page -->
	</div>
	<!-- END fh5co-wrapper -->
	<!-- jQuery -->

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>

	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>