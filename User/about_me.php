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
					<div class="col-lg-12 col-12">
						<div class="checkout-form">
							<img src="../images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%;">
							<a href="update_picture.php"><i class="fa-solid fa-pen-to-square"></i></a>
									
							<h2>Account profile</h2>

							<br><br>
							<!-- Form -->
							<form class="form" method="post" action="process_update.php" enctype="multipart/form-data">
								<input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-12">
										<div class="form-group">
											<label>First Name<span>*</span></label>
											<input type="text" name="firstname" placeholder="" required="required" value="<?php echo $row['fname']; ?>">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-12">
										<div class="form-group">
											<label>Middle Name<span>*</span></label>
											<input type="text" name="middlename" placeholder="" required="required" value="<?php echo $row['mname']; ?>">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-12">
										<div class="form-group">
											<label>Last Name<span>*</span></label>
											<input type="text" name="lastname" placeholder="" required="required" value="<?php echo $row['lname']; ?>">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-12">
										<div class="form-group">
											<label>Suffix</label>
											<input type="text" name="suffix" placeholder=""  value="<?php echo $row['suffix']; ?>">
										</div>
									</div>
									<div class="col-lg-4 col-md-6 col-12">
										<div class="form-group">
											<?php                           
			                                      $gender  = mysqli_query($conn, "SELECT DISTINCT gender FROM users");
			                                      $id = $row['user_Id'];
			                                      $all_gender = mysqli_query($conn, "SELECT * FROM users  where user_Id = '$id' ");
			                                      $row = mysqli_fetch_array($all_gender);
			                                  ?>
			                                  <label>Gender</label>
			                                  <select class="custom-select custom-select-sm" name="gender" id="company" required>
			                                      <?php foreach($gender as $rows):?>
			                                            <option value="<?php echo $rows['gender']; ?>"  
			                                                <?php if($row['gender'] == $rows['gender']) echo 'selected="selected"'; ?> 
			                                                 > <!--/////   CLOSING OPTION TAG  -->
			                                                <?php echo $rows['gender']; ?>                                           
			                                            </option>

			                                     <?php endforeach;?>
			                                   </select> 
										</div>
									</div>
									<div class="col-lg-5 col-md-6 col-12">
										<div class="form-group">
											<label>Date of birth<span>*</span></label>
											<input type="date" name="dob" placeholder="" required="required" value="<?php echo $row['dob']; ?>">
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12">
										<div class="form-group">
											<label>Age<span>*</span></label>
											<input type="number" name="age" placeholder="" required="required" value="<?php echo $row['age']; ?>">
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
											<input type="number" name="contact" placeholder="" required="required" value="<?php echo $row['contact']; ?>">
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-12">
										<div class="form-group">
											<label>Address<span>*</span></label>
											<input type="text" name="address" placeholder="" required="required" value="<?php echo $row['address']; ?>">
										</div>
									</div>
								</div>
								<div class="single-widget get-button">
									<div class="content">
										<div class="button">
											<button class="btn" name="update_user">Update profile</button>
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
			
<?php include 'footer.php'; ?>