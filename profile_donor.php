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
					<h1 id="fh5co-logo"><a href="welcome_d.php">Helping Hands</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
                        <ul class="sf-menu" id="fh5co-primary-menu">
							<li  class="active">
								<a href="welcome_d.php">Home</a>
							</li>
							<li><a href="donation_req_d.php">Donation</a></li>
							<li><a href="profile_donor.php">Profile</a></li>
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

        <br><br>

        <h2 class="text-uppercase text-center mb-5">Profile</h2>
        <div class="profile_data">
            <?php
                $select = mysqli_query($con, "SELECT * FROM `donor_registration` WHERE `email-id` = '$email' ");
                // $query = mysqli_query($con, $sql2);

                if(mysqli_num_rows($select) > 0)
                {
                    while($fetch = mysqli_fetch_assoc($select))
                    {
            ?>
        <form method="POST" action="./update_profile_donor.php">
        <div class="container py-5 h-100">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="form-outline">
                    <input type="text" id="did" name="id" Readonly value="<?php echo $fetch['D_id']; ?>" class="form-control form-control-lg" />
                    <label class="form-label" for="did">Your Id</label>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-outline">
                    <input type="text" id="fname" Readonly value="<?php echo $fetch['name']; ?>" class="form-control form-control-lg" />
                    <label class="form-label" for="fname">First name</label>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-outline">
                    <input type="text" id="sname" Readonly value="<?php echo $fetch['surname']; ?>" class="form-control form-control-lg" />
                    <label class="form-label" for="sname">Last name</label>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-4">
            <input type="email" name="eid" id="eid" Readonly value="<?php echo $fetch['email-id']; ?>" class="form-control form-control-lg" Required/>
            <label class="form-label" for="eid">Email</label>
            </div>

            <div class="form-outline mb-4">
            <input type="tel" name="pno" id="pno" Readonly value="<?php echo $fetch['phone_no']; ?>" class="form-control form-control-lg" name="pno" Required pattern="[6-9]{1}[0-9]{9}" title="enter only 10 numbers and first number should be 6,7,8 or 9"/>
            <label class="form-label" for="pno">Phone no</label>
            </div>

            <div class="form-outline mb-4">
            <input type="address" name="address"id="address" Readonly value="<?php echo $fetch['address']; ?>" class="form-control form-control-lg" Required/>
            <label class="form-label" for="address">Address</label>
            </div>

            <div class="form-outline mb-4">
            <input type="address" name="city" id="city" Readonly value="<?php echo $fetch['city']; ?>" class="form-control form-control-lg" pattern=".{1,}[A-Za-z]" Required/>
            <label class="form-label" for="city">City</label>
            </div>

            <div class="form-outline mb-4">
            <input type="address" name="state" id="state" Readonly value="<?php echo $fetch['state']; ?>" class="form-control form-control-lg" pattern=".{1,}[A-Za-z]" Required/>
            <label class="form-label" for="state">State</label>
            </div>
    
            <br>
            <div class="d-flex justify-content-center">
                <button type="submit" name="update_profile" class="btn btn-warning btn-lg ms-2">Update Profile</button>
            </div>
        </div>
        </form>
        <?php
                    }
                }
            ?>
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