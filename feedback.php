<?php 
	include('conn.php');
	session_start();
	$email = $_SESSION['email-id'];
	if(!isset($email))
	{
	header("location: login.php");
	}

	if(isset($_POST['submit'])) {
		$r_id = $_POST['rid'];
		$email = $_POST['email'];
		$nemail = $_POST['nemail'];
		$message = $_POST['body'];
		$sql = "INSERT INTO `feedback`(`request_id`, `N_email`, `D_email`, `item_detail`) 
                            VALUES ($r_id,'$email','$nemail','$message')";
		$query1= mysqli_query($con, $sql);
		if($query1)
		{
?>
			<script>
				alert("Your feedback send successfully.");
			</script>
<?php
		}
		else
		{  
?>
			<script>
				alert("Your feedback will not send due to some reason.");
			</script>
<?php 		
		}   
	}

	if(isset($_POST['btn_feedback']))
	{
		$all_id = $_POST['check_select_req'];
		$extract_id = implode(',' , $all_id);
	}
?>

<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Feedback</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
	<header id="fh5co-header-section" class="sticky-banner">
		<div class="container">
			<div class="nav-header">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
				<h1 id="fh5co-logo"><a href="">Helping Hands</a></h1>
				<!-- START #fh5co-menu-wrap -->
				<nav id="fh5co-menu-wrap" role="navigation">
					<ul class="sf-menu" id="fh5co-primary-menu">
						<li class="active">
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div class="fh5co-hero">
		<div class="fh5co-overlay"></div>
		<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/7.jpg);">
			<div class="desc animate-box">
				<h2><strong>Feedback</strong></h2>
			</div>
		</div>
	</div>	
	<div id="fh5co-contact" class="animate-box">
		<div class="container">
			<form method="post">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Our Address</h3>
						<ul class="contact-info">
							<li><i class="icon-location-pin"></i>near old airport,NH-8B, chhaya, porbandar</li>
							<li><i class="icon-phone2"></i>+ 8200 1409 45</li>
							<li><i class="icon-mail"></i><a href="#">vibhu232004@gmail.com</a></li>
							<li><i class="icon-globe2"></i><a href="#">www.yoursite.com</a></li>
						</ul>
					</div>
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="rid" id="rid" class="form-control" placeholder="Request_id">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="email" id="email" class="form-control" value="<?=$email ?>" placeholder="your Email">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<input type="text" name="nemail" id="nemail" class="form-control" placeholder="Donor Email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="body" class="form-control" id="body" cols="30" rows="7" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" name="submit"  value="Send Feedback" class="btn btn-primary">
								</div>							
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
            {
                caller.css('border', '');
                return true;
            }
        }
    </script>
	<!-- END fh5co-contact -->
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

