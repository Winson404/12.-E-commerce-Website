<?php

    session_start();
    include '../config.php';
    
    if(isset($_SESSION['user_Id'])) {
        $id = $_SESSION['user_Id'];
        $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
        $row = mysqli_fetch_array($fetch);

    

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>SC E-commerce</title>
	<!-- Favicon -->
	<link rel="icon" type="../images/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../homepage-includes/css/bootstrap.css">
	<!-- Magnific Popup -->
  <link rel="stylesheet" href="../homepage-includes/css/magnific-popup.min.css">
	<!-- Font Awesome -->
  <link rel="stylesheet" href="../homepage-includes/css/fontawesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="../homepage-includes/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
  <link rel="stylesheet" href="../homepage-includes/css/themify-icons.css">
	<!-- Nice Select CSS -->
  <link rel="stylesheet" href="../homepage-includes/css/niceselect.css">
	<!-- Animate CSS -->
  <link rel="stylesheet" href="../homepage-includes/css/animate.css">
	<!-- Flex Slider CSS -->
  <link rel="stylesheet" href="../homepage-includes/css/flex-slider.min.css">
	<!-- Owl Carousel -->
  <link rel="stylesheet" href="../homepage-includes/css/owl-carousel.css">
	<!-- Slicknav -->
  <link rel="stylesheet" href="../homepage-includes/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="../homepage-includes/css/reset.css">
	<link rel="stylesheet" href="../homepage-includes/css/style.css">
  <link rel="stylesheet" href="../homepage-includes/css/responsive.css">

	<!-- Font Awesome -->
  <link rel="stylesheet" href="../homepage-includes/css/all.min.css">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/ba6fe04144.js" crossorigin="anonymous"></script>
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<!-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> -->
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
	<!-- 	<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
								<li><i class="ti-email"></i> support@shophub.com</li>
							</ul>
						</div>

					</div>
					<div class="col-lg-8 col-md-12 col-12">
						
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i> Store location </li>
								<li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
								<li><i class="ti-user"></i> <a href="#">My account</a></li>
								<li><i class="ti-power-off"></i><a href="login.html#">Login</a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div> -->
		<!-- End Topbar -->


		
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading"><a href="index.php"><b>SC E-commerce</b></a></h3>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li><a href="index.php?#product">Product</a></li>												
													<!-- <li><a href="#">Service</a></li>									
													<li><a href="#">Pages</a></li>		 -->							
													<li><a href="index.php?#hotitem">Hot items</a></li>
													<?php 
														$count = mysqli_query($conn, "SELECT cart_Id FROM cart WHERE cart_user_Id='$id' AND cart_status='Pending'");
														$a = mysqli_num_rows($count);

														// $checkout = mysqli_query($conn, "SELECT cart_Id FROM cart WHERE cart_user_Id='$id' AND checkout='Confirmed'");
														// $b = mysqli_num_rows($checkout);
													?>
													<li><a href="cart.php">Cart<span class="new"><?php echo $a; ?></span></a>
													<?php 
														$cart = mysqli_query($conn, "SELECT cart_Id FROM cart WHERE cart_user_Id='$id' AND cart_status='Confirmed' AND receivingStatus='On process'");
														if(mysqli_num_rows($cart) > 0) {
														$aa = mysqli_num_rows($cart);
													?>
													<li><a href="receivedItems.php">Checked out Items<span class="new"><?php echo $aa; ?></span></a>
													<?php } ?>
													<?php 
														$cartReceived = mysqli_query($conn, "SELECT * FROM cart WHERE cart_user_Id='$id' AND cart_status='Confirmed' AND receivingStatus='Received'");
														if(mysqli_num_rows($cartReceived) > 0) {
														$aaa = mysqli_num_rows($cartReceived);
													?>
													<li><a href="purchaseHistory.php">Purchase History<span class="new"><?php echo $aaa; ?></span></a>
													<?php } ?>
													<!-- <li><a href="checkout.php">Checked out</a> -->
													<!-- <li><a href="checkout.php">Checked out<span class="new"><?php //echo $b; ?></span></a>	 -->
													</li>
													<li style="position: absolute;right: 0;"><a href="#">Welcome, <?php echo $row['fname']; ?>!<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="about_me.php">My account</a></li>
															<li><a href="changepassword.php">Change password</a></li>
															<li onclick="logout()"><a href="#">Logout</a></li>
														</ul>
													</li>
													<li ></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->


<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../index.php');
    }
?>


<script src="sweetalert2.min.js"></script>
  <script>
    
      function logout() {
        swal({
				  title: 'Are you sure you want to logout?',
          text: "You won't be able to revert this!",
				  icon: "warning",
				  buttons: true,
				  // dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    window.location = "../logout.php";
				  } else {
				  }
				});
    }

  </script>