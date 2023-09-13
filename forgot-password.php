<?php include 'topbar.php'; ?>
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us mt-5 mb-5">
		<div class="container">
				<div class="contact-head">
					<div class="row d-flex justify-content-center">
						<div class="col-lg-4 col-12">
							<div class="form-main">
								<div class="title text-center">
									<h3>Find your account</h3>
								</div>
								<form class="form" method="post" action="processes.php">
									<div class="row">
										<div class="col-lg-12 col-12">
										<p class="text-center text-sm">Forgot your password? Here you can request for vefication code through email</p>
											<div class="form-group">
												<label></label>
												<input name="email" type="email" placeholder="email@gmail.com" required>
											</div>	
										</div>
										<div class="col-lg-12 mb-3">
											<p>Already have an account? <a href="login.php"><b>Login!</b></a></p>
										</div>
										<div class="col-lg-12 d-flex justify-content-center">
											<button type="submit" class="btn " name="search">Search</button>
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