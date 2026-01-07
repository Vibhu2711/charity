<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>NGO</title>
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

    <style>
        .radio_tag #otheranswer{
            display: none;
        }

        .radio_tag #other:checked ~ #otheranswer{
            display: flex;
        }

        .img-logo img{
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

    </style>
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
                                <a href="welcome_n.php">Home</a>
                            </li>
                            <li><a href="donation_req_n.php">Donation Request</a></li>
                            <li><a href="profile_ngo.php">Profile</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="logout_n.php">Logout</a></li>
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

            if(isset($_POST['donate_req']))
            {
                $nid= $_POST['id'];
                $donor=$_POST['donors'];
                if(isset($_POST['d_type']))
                {
                    $item=$_POST['d_type'];
                }
                foreach ($donor as $donor_list) {
                    // $sql = "INSERT INTO `donation_req_donor` (`N_id`, `email-id`, `N_email`, `item_detail`,) VALUES 
                    //     ($did, '$eid', '$ngo_list', '$item')";
                        
                    $sql = "INSERT INTO `donation_req_ngo`(`N_id`, `email-id`, `D_email`, `item_detail`) 
                            VALUES ($nid,'$email','$donor_list','$item')";    
                    
                    $query1= mysqli_query($con, $sql);
                    if($query1)
                    {
        ?>
                        <script>
                            alert("Your request send successfully.");
                        </script>
        <?php
                        // $messages[] = '<div class="alert alert-success alert-dismissible fade show" role="alert"> Data send to ngo
                        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                    }
                    else
                    {  
        ?>
                        <script>
                            alert("Your request will not send due to some reason.");
                        </script>
        <?php 
                        // $message[] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Data not send to ngo
                        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
                    }   
                }
            }
        ?>

        <br><br>
        <h2 class="text-uppercase text-center mb-5">Request for Donation</h2>
        <div class="profile_data">
            <?php
                $select = mysqli_query($con, "SELECT * FROM `ngo_registration` WHERE `email-id` = '$email' ");
                // $query = mysqli_query($con, $sql2);

                if(mysqli_num_rows($select) > 0)
                {
                    while($fetch = mysqli_fetch_assoc($select))
                    {
            ?>
        <form method="POST">
        <div class="container py-5 h-100">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="form-outline">
                    <input type="text" id="nid" name="id" Readonly value="<?php echo $fetch['N_id']; ?>" class="form-control form-control-lg" />
                    <label class="form-label" for="nid">Your Id</label>
                    </div>
                </div>
                <div class="col-md-8 mb-4">
                    <div class="form-outline">
                    <input type="text" id="fname" name="fname" Readonly value="<?php echo $fetch['name']; ?>" class="form-control form-control-lg" />
                    <label class="form-label" for="fname">NGO name</label>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-4">
            <input type="email" name="eid" id="eid" Readonly value="<?php echo $fetch['email-id']; ?>" class="form-control form-control-lg" Required/>
            <label class="form-label" for="eid">Email</label>
            </div>
            <hr>
            
            <div class="form-outline mb-4">
                <div class="radio_tag">
                    <label class="form-label" for="d_type">Type of donation: </label><br>
                    <input type="radio" name="d_type" id="food" value="food">
                    <label for="food_type">Food</label><br>
                    <input type="radio" name="d_type" id="cloth" value="cloth">
                    <label for="cloth_type">Cloths</label><br>
                    <input type="radio" name="d_type" id="book" value="book">
                    <label for="book_type">Books</label><br>
                    <input type="radio" name="d_type" id="other" value="other">
                    <label for="other">Other</label><br>
                    <input type="text" name="d_ty" id="otheranswer">
                </div>
            </div>  
            <hr>
            <div class="form-outline mb-4">
            
                <label class="form-label" for="ngos">Donor: </label>
                <br>
                <select name="donors[]" id="my-select" multiple="multiple" Required>
                <option values="All">All</option>
                <?php
                    $select = mysqli_query($con, " SELECT * FROM `donor_registration` ");
                    if(mysqli_num_rows($select) > 0)
                    {
                        while($fetch = mysqli_fetch_assoc($select))
                        {
                ?>
                <option><?php echo $fetch['email-id']; ?></option>
                <?php
                        }
                    }
                ?>
            </div>
            
            <div class="form-outline mb-4">
            <input type="hidden"/>
            <!-- <label class="form-label" for="e_date">Expiry Date</label> -->
            </div>
            
            <br><br>
            <div class="d-flex justify-content-center">
            <button type="submit" name="donate_req" class="btn btn-success btn-lg ms-2">Make a Request</button>
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
							<p>Copyright 2016 Free Html5 <a href="#">Charity</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
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