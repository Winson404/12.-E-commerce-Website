<?php 
	include 'topbar.php';
	include 'sweetalert_messages.php';


	$fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
	$row = mysqli_fetch_array($fetch); 
?>


	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="about_me.php">Profile</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-6 col-12">
						<div class="checkout-form">
							<h2>Account security</h2>
							<br><br>
							<!-- Form -->
							<form class="form" method="post" action="process_update.php" enctype="multipart/form-data">
								<input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
								<div class="row">
									<div class="col-lg-12 col-md-3 col-12">
										<div class="form-group">
											<label>Old password<span>*</span></label>
											<input type="password" name="OldPassword" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-12 col-md-3 col-12">
										<div class="form-group">
											<label>New password<span>*</span></label>
											<input type="password" name="password" placeholder="" required="required" id="new_password">
										</div>
									</div>
									<div class="col-lg-12 col-md-3 col-12">
										<div class="form-group">
											<label>Confirm password<span>*</span></label>
											<input type="password" name="cpassword" placeholder="" required="required" onkeyup="new_validate_password()" id="new_cpassword">
											<small id="new_wrong_pass_alert"></small>
										</div>
									</div>
									
								</div>
								<div class="single-widget get-button">
									<div class="content">
										<div class="button">
											<button class="btn" name="password_user" id="new_create">Change password</button>
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
		
		<!-- Start Shop Services Area  -->
		<!-- <section class="shop-services section home">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-service">
							<i class="ti-rocket"></i>
							<h4>Free shiping</h4>
							<p>Orders over $100</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-service">
							<i class="ti-reload"></i>
							<h4>Free Return</h4>
							<p>Within 30 days returns</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-service">
							<i class="ti-lock"></i>
							<h4>Sucure Payment</h4>
							<p>100% secure payment</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-service">
							<i class="ti-tag"></i>
							<h4>Best Peice</h4>
							<p>Guaranteed price</p>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!-- End Shop Services -->
		
		<!-- Start Shop Newsletter  -->
		<!-- <section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!-- End Shop Newsletter -->
<script>
    function new_validate_password() {

      var pass = document.getElementById('new_password').value;
      var confirm_pass = document.getElementById('new_cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('new_wrong_pass_alert').style.color = 'red';
        document.getElementById('new_wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('new_create').disabled = true;
        document.getElementById('new_create').style.opacity = (0.4);
      } else {
        document.getElementById('new_wrong_pass_alert').style.color = 'green';
        document.getElementById('new_wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('new_create').disabled = false;
        document.getElementById('new_create').style.opacity = (1);
      }
    }

</script>			
<?php include 'footer.php'; ?>


