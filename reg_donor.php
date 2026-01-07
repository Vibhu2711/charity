<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Donor</title>
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

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->
	
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
		<br><br>
		<?php
			// $con=mysqli_connect("localhost","root","");
			// $my=mysqli_select_db($con,"server");
			include 'conn.php';
			if(isset($_POST['submit']))
			{
				$uname=$_POST['fname'];
				$sname=$_POST['sname'];
				$eid=$_POST['eid'];
				$phone=$_POST['pno'];
				$add=$_POST['address'];
				$city=$_POST['city'];
				$state=$_POST['state'];
				$pass=$_POST['pss'];
				$encoded=base64_encode($pass);
				$cpass=$_POST['pass'];
				if($pass != $cpass)
				{
		?>
					<script>
						alert("ERROR! conform password dont match!");
					</script>
		<?php
					// $message[] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> ERROR! conform password dont match!
					// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>'; 
				}
				else
				{
					$sql="INSERT INTO `donor_registration` (`name`, `surname`, `email-id`,`phone_no`, `address`, `city`, `state`, `password`) VALUES ('$uname', '$sname', '$eid', '$phone', '$add', '$city', '$state', '$encoded')";
					
					$query1=mysqli_query($con,$sql);
					if($query1)
					{
						// $message[] = 'now you can login'; 
						header("location: login.php");
					}
					else
					{
		?>
						<script>
							alert("Registration failed!");
						</script>
		<?php
						// $message[] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Registration failed.
						// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
					}
				}
			}
		?>


		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col">
				<div class="card card-registration my-4">
				<div class="row g-0">
					<div class="col-xl-6">
					<div class="card-body p-md-5 text-black">
						<h3 class="mb-5 text-uppercase">Donor Registration</h3>
						<form method="post">
						<div class="row">
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" id="fname" name="fname" class="form-control form-control-lg" pattern=".{1,}[A-Za-z]" title="Enter Only Characters." Required/>
							<label class="form-label" for="fname">First name</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" id="sname" name="sname" class="form-control form-control-lg" pattern=".{1,}[A-Za-z]" title="Enter Only Characters." Required/>
							<label class="form-label" for="sname">Last name</label>
							</div>
						</div>
						</div>

						<div class="form-outline mb-4">
						<input type="email" name="eid" id="eid" class="form-control form-control-lg" Required/>
						<label class="form-label" for="eid">Email</label>
						</div>

						<div class="form-outline mb-4">
						<input type="tel" name="pno" id="pno" class="form-control form-control-lg" name="pno" Required pattern="[6-9]{1}[0-9]{9}" title="enter only 10 numbers and first number should be 6,7,8 or 9"/>
						<label class="form-label" for="pno">Phone no</label>
						</div>

						<div class="form-outline mb-4">
						<input type="address" name="address"id="address" class="form-control form-control-lg" Required/>
						<label class="form-label" for="address">Address</label>
						</div>

						<div class="form-outline mb-4">
						<input type="address" name="city" id="city" class="form-control form-control-lg" pattern=".{1,}[A-Za-z]" Required/>
						<label class="form-label" for="city">City</label>
						</div>

						<div class="form-outline mb-4">
						<input type="address" name="state" id="state" class="form-control form-control-lg" pattern=".{1,}[A-Za-z]" Required/>
						<label class="form-label" for="state">State</label>
						</div>

						<div class="form-outline mb-4">
						<input type="password" name="pss" id="pss" class="form-control form-control-lg" Required/>
						<label class="form-label" for="pss">Password</label>
						</div>

						<div class="form-outline mb-4">
						<input type="password" name="pass" id="pass" class="form-control form-control-lg" Required/>
						<label class="form-label" for="pass">Repeat your password</label>
						</div>
				
						<div class="d-flex justify-content-center">
						<button type="reset" class="btn btn-light btn-lg">Reset all</button>
						<button type="submit" name="submit" onclick="fill_up_d()" class="btn btn-warning btn-lg ms-2">Submit form</button>
						</div>

						<p class="text-center text-muted mt-5 mb-0">Have already an account?
						<a href="login.php" class="fw-bold text-body"><u>Login here</u></a>
						</p>
						</form>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>

		<script>
			function fill_up_d()
			{
				var uname = document.getElementById('fname').value;
				var sname = document.getElementById('sname').value;
				var eid = document.getElementById('eid').value;
				var pno = document.getElementById('pno').value;
				var address = document.getElementById('address').value;
				var city = document.getElementById('city').value;
				var state = document.getElementById('state').value;
				var pss = document.getElementById('pss').value;
				var pass = document.getElementById('pass').value;
				if(uname=="" || uname==null)
				{
					alert("Please fill up Name");
				}
				else if(sname=="" || sname==null)
				{
					alert("Please fill up Sername");
				}
				else if(eid=="" || eid==null)
				{
					alert("Please fill up Email-id");
				}
				else if(pno=="" || pno==null)
				{
					alert("Please fill up Phone no");
				}
				else if(address=="" || address==null)
				{
					alert("Please fill up Address field");
				}
				else if(city=="" || city==null)
				{
					alert("Please fill up City field");
				}
				else if(state=="" || state==null)
				{
					alert("Please fill up State field");
				}
				else if(pss=="" || pss==null)
				{
					alert("Please fill up Password field");
				}
				else if(pass=="" || pass==null)
				{
					alert("Please fill up Confirm Password field");
				}
			}
		</script>

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
	
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
	</body>
</html>