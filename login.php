<?php include 'topbar.php'; ?>
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us mt-5 mb-5">
		<div class="container">
				<div class="contact-head">
					<div class="row d-flex justify-content-center">
						<div class="col-lg-4 col-12">
							<div class="form-main">
								<div class="title">
									<img src="homepage-includes/images/user.png" alt="" class="img-fluid d-block m-auto" width="75">
								</div>
								<form class="form" method="post" action="processes.php" autocomplete="off">
									<div class="row">
										
										<div class="col-lg-12 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input name="email" type="email" placeholder="Enter your E-mail" required>
											</div>	
										</div>
										
										<div class="col-lg-12 col-12">
											<div class="form-group">
												<label>Your Password<span>*</span></label>
												<input name="password" type="password" placeholder="Enter your password" required>
											</div>	
										</div>
										<div class="col-lg-12">
											<p>Don't have an account? <a href="register.php"><b>Click here!</b></a></p>
											<p><a href="forgot-password.php"><b>Forgot password?</b></a></p>

										</div>
										<div class="col-lg-12 d-flex justify-content-center">
											<button type="submit" class="btn " name="login">Login</button>
										</div>
										
									</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->


<?php include 'footer.php'; ?>