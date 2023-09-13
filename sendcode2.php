<?php 
	include 'topbar.php'; 
	if(isset($_GET['user_Id'])) {
      $user_Id = $_GET['user_Id'];
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
      $row = mysqli_fetch_array($fetch);
?>

  
	<section id="contact-us" class="contact-us mt-5 mb-5">
		<div class="container">
				<div class="contact-head">
					<div class="row d-flex justify-content-center">
						<div class="col-lg-4 col-12">
							<div class="form-main">
								<div class="title text-center">
									<h3>Reset password</h3>
								</div>
								<form class="form" method="post" action="processes.php">
									<div class="row">
										<div class="col-lg-12 col-12">
										<p class="text-center text-sm">A verification code will be sent to your email once you <b>continue</b>.</p>
											<div class="form-group mt-4">
												<img src="images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
											</div>
											<p class="text-center mb-4"><?php echo ' '.$row['fname'].' '.$row['mname'].' '.$row['lname'].' '.$row['suffix'].' '; ?></p>	
											<p>Send code via email? <b><?php echo $row['email']; ?></b></p>
											<input type="hidden" name="email" value="<?php echo $row['email']; ?>">
										</div>
											
										<div class="col-lg-12 mt-4 d-flex justify-content-center">
											<button type="submit" class="btn " name="sendcode">Continue</button> 
										</div>
										<div class="col-lg-12 d-flex justify-content-center">
											<p class="mt-1"><a href="forgot-password.php" class="text-center">Not you?</a></p>  
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
	</section>

	<?php } elseif(isset($_GET['admin_Id'])) {
      $admin_Id = $_GET['admin_Id'];
      $fetch = mysqli_query($conn, "SELECT * FROM admin WHERE admin_Id='$admin_Id'");
      $row = mysqli_fetch_array($fetch);
    ?>

	<section id="contact-us" class="contact-us mt-5 mb-5">
		<div class="container">
				<div class="contact-head">
					<div class="row d-flex justify-content-center">
						<div class="col-lg-4 col-12">
							<div class="form-main">
								<div class="title text-center">
									<h3>Reset password</h3>
								</div>
								<form class="form" method="post" action="processes.php">
									<div class="row">
										<div class="col-lg-12 col-12">
										<p class="text-center text-sm">A verification code will be sent to your email once you <b>continue</b>.</p>
											<div class="form-group mt-4">
												<img src="images-admin/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
											</div>
											<p class="text-center mb-4"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></p>	
											<p>Send code via email? <b><?php echo $row['email']; ?></b></p>
											<input type="hidden" name="email" value="<?php echo $row['email']; ?>">
										</div>
											
										<div class="col-lg-12 mt-4 d-flex justify-content-center">
											<button type="submit" class="btn " name="sendcode">Continue</button> 
										</div>
										<div class="col-lg-12 d-flex justify-content-center">
											<p class="mt-1"><a href="forgot-password.php" class="text-center">Not you?</a></p>  
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
	</section>

	<?php } else { ?>

	<br>
	<br>
	<br>
	<section id="contact-us" class="contact-us mt-5 mb-5">
		<div class="container">
				<div class="contact-head">
					<div class="row d-flex justify-content-center">
						<div class="col-lg-4 col-12">
							<div class="form-main">
								<div class="title text-center">
									<h3>404 Not Found</h3>
								</div>
								<p>
					             We could not find the page you were looking for.
					             Meanwhile, you may <a href="login.php"><b>return to login</b></a>.
					            </p>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<?php } ?>




<?php include 'footer.php'; ?>