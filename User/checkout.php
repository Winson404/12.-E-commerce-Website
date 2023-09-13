<?php 
	include 'topbar.php';
	include 'sweetalert_messages.php';


	$fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
	$row = mysqli_fetch_array($fetch); 

	// FETCH GRAND TOTAL ************************************************************************************************************
    $fetch_total = mysqli_query($conn, "SELECT SUM(cart_total) AS total_price FROM cart JOIN users ON cart.cart_user_Id=users.user_Id WHERE cart_user_Id='$id' AND checkout='Not confirmed'");
    $row_total = mysqli_fetch_array($fetch_total);

    $price = $row_total['total_price'];
    $grand_price = $price;
    $grand_price_text = (string)$grand_price; // convert into a string
    $grand_price_text = strrev($grand_price_text); // reverse string
    $arr = str_split($grand_price_text, "3"); // break string in 3 character sets

    $grand_price_new_text = implode(",", $arr);  // implode array with comma
    $grand_price_new_text = strrev($grand_price_new_text); // reverse string back
    //echo $grand_price_new_text; // will output 1,234
    //
    // END FETCH GRAND TOTAL ********************************************************************************************************
?>


	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="checkout.php">Checkout</a></li>
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
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please check the information before proceeding to checkout</p>
							<!-- Form -->
							<form class="form" method="post" action="#">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>First Name<span>*</span></label>
											<input type="text" name="name" placeholder="" required="required" value="<?php echo $row['fname']; ?>">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Last Name<span>*</span></label>
											<input type="text" name="name" placeholder="" required="required" value="<?php echo $row['lname']; ?>">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" name="email" placeholder="" required="required" value="<?php echo $row['email']; ?>">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="number" name="number" placeholder="" required="required" value="<?php echo $row['contact']; ?>">
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-12">
										<div class="form-group">
											<label>Address<span>*</span></label>
											<input type="text" name="address" placeholder="" required="required" value="<?php echo $row['address']; ?>">
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span>₱ <?php echo $grand_price_new_text; ?>.00</span></li>
										<!-- <li>(+) Shipping<span>$10.00</span></li> -->
										<li class="last">Total<span><b>₱ <?php echo $grand_price_new_text; ?>.00</b></span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="checkbox">
										<!-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> -->
										<label class="checkbox-inline" for="2"><input class="form-control" name="news" id="2" type="checkbox" value="Boat" required="required" required> Cash On Delivery</label>
										<!-- <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label> -->
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->


							<!-- <div class="single-widget payement">
								<div class="content">
									<img src="images/payment-method.png" alt="#">
								</div>
							</div> -->


							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="process_update.php?checkout_user_Id=<?php echo $id; ?>" class="btn">Proceed to Checkout</a>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
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
			
<?php include 'footer.php'; ?>