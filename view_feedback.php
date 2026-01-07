<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Charity</title>
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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="./d_style.css">
    
	</head>
	<body>
		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="welcome_n.php">Helping Hands</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li  class="active">
								<a href="welcome_d.php">Home</a>
							</li>
							<li><a href="donation_req_d.php">Donation Request</a></li>
							<li><a href="profile_donor.php">Profile</a></li>
                            <li><a href="view_feedback.php">View Feedback</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="logout_d.php">Logout</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<?php
			include 'conn.php';
			
			session_start();
			$email = $_SESSION['email-id'];

			if(!isset($email))
			{
			header("location: login.php");
			}
		?>

        <div class="disp_name">
            <?php
                $select = mysqli_query($con, "SELECT * FROM `donor_registration` WHERE `email-id` = '$email' ");

                if(mysqli_num_rows($select) > 0)
                {
                    while($fetch = mysqli_fetch_assoc($select))
                    {
                        echo "Welcome " .$fetch['name'] ." " .$fetch['surname'];
                    }
                }
            ?>
        </div>

		<br><br>

		<div class="container">
		<div class="row justify-content-center">
				<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-body">
					<form action="code.php" method="POST">
						<table class="table table table-bordered table-striped">
							<tbody>
								<tr>
								<th style="width:10px; text-align:center;">request_id</th>
								<th style="width:10px; text-align:center;">Donor Email</th>
								<th style="width:10px; text-align:center;">NGO Email</th>
								<th style="width:10px; text-align:center;">Feedback</th>
								</tr>
							</tbody>
							<tbody>
								<?php
								$query =  "SELECT * FROM `feedback` WHERE `D_email` = '$email' ";
								$query_run = mysqli_query($con, $query);

								if(mysqli_num_rows($query_run) > 0)
								{
									foreach ($query_run as $raw) {
										?>
										<tr>
											<td style="width:10px; text-align:center;"><?= $raw['request_id'] ?></td>
											<td style="width:10px; text-align:center;"><?= $raw['D_email'] ?></td>
                                            <td style="width:10px; text-align:center;"><?= $raw['N_email'] ?></td>
											<td style="width:10px; text-align:center;"><?= $raw['item_detail'] ?></td>
										</tr>
                                        <?php
									}
								}
								else
								{
										?>
										<tr>
										<td collapse="4">No record Found</td>
										</tr>
										<?php
								}
								?>
							</tbody>
						</table>
						</form>
					</div>
				</div>
				</div>
		</div>
		</div>
		<br><br>

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