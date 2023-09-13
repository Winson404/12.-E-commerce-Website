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
									<h3>Enter security code</h3>
								</div>
								<form class="form" method="post" action="processes.php">
									<div class="row">
										<div class="col-lg-12 col-12">
										<p class="text-center text-sm">Please check your email for a message with your code. Your code is 6 numbers long.</p>
											<input type="hidden" class="form-control" value="<?php echo $user_Id; ?>" name="user_Id">
                    						<input type="hidden" class="form-control" value="<?php echo $row['email']; ?>" name="email">
										</div>
										<div class="col-lg-12 col-12 mt-3">
											<div class="form-group">
												<label>Enter code<span>*</span></label>
												<input type="number" placeholder="Enter code here.." name="code" minlength="6" required>
											</div>	
											<p>We sent your code to: <b><?php echo $row['email']; ?></b></p>
										</div>
										
										<div class="col-lg-12 mt-4 d-flex justify-content-center">
											<button type="submit" class="btn " name="verify_code_user">Continue</button> 
										</div>
										<div class="col-lg-12 d-flex justify-content-center">
											<p class="mt-1"><a href="sendcode2.php?user_Id=<?php echo $user_Id; ?>" class="mt-1">Didn't get a code?</a></p>  
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
									<h3>Enter security code</h3>
								</div>
								<form class="form" method="post" action="processes.php">
									<div class="row">
										<div class="col-lg-12 col-12">
										<p class="text-center text-sm">Please check your email for a message with your code. Your code is 6 numbers long.</p>
											<input type="hidden" class="form-control" value="<?php echo $admin_Id; ?>" name="admin_Id">
                    						<input type="hidden" class="form-control" value="<?php echo $row['email']; ?>" name="email">
										</div>
										<div class="col-lg-12 col-12 mt-3">
											<div class="form-group">
												<label>Enter code<span>*</span></label>
												<input type="number" placeholder="Enter code here.." name="code" minlength="6" required>
											</div>	
											<p>We sent your code to: <b><?php echo $row['email']; ?></b></p>
										</div>
										
										<div class="col-lg-12 mt-4 d-flex justify-content-center">
											<button type="submit" class="btn " name="verify_code_Admin">Continue</button> 
										</div>
										<div class="col-lg-12 d-flex justify-content-center">
											<p class="mt-1"><a href="sendcode2.php?admin_Id=<?php echo $admin_Id; ?>" class="mt-1">Didn't get a code?</a></p>  
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