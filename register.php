<?php 
	include 'topbar.php';
	include 'sweetalert_messages.php';
?>

		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-12 col-12">
						<div class="checkout-form">
							<h2>Register</h2>
							<p>Fill in the required fields</p>
							<!-- Form -->
							<form class="form" method="post" action="processes.php" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-12 mb-2">
					                      <div class="form-group" id="user_preview">
					                      </div>
					                </div>
								</div>	
								<br>	
								<div class="row">

									<div class="col-lg-3 col-md-3 col-12">
										<div class="form-group">
											<label>First Name<span>*</span></label>
											<input type="text" name="firstname" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-12">
										<div class="form-group">
											<label>Middle Name<span>*</span></label>
											<input type="text" name="middlename" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-12">
										<div class="form-group">
											<label>Last Name<span>*</span></label>
											<input type="text" name="lastname" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-12">
										<div class="form-group">
											<label>Suffix</label>
											<input type="text" name="suffix" placeholder="">
										</div>
									</div>
									<div class="col-lg-4 col-md-6 col-12">
										<div class="form-group">
			                                  <label>Gender</label>
			                                  <select name="gender" required="required">
			                                  	  <option selected disabled>Select gender</option>
			                                      <option value="Male">Male</option>
			                                      <option value="Female">Female</option>
			                                  </select> 
										</div>
									</div>
									<div class="col-lg-5 col-md-6 col-12">
										<div class="form-group">
											<label>Date of birth<span>*</span></label>
											<input type="date" name="dob" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12">
										<div class="form-group">
											<label>Age<span>*</span></label>
											<input type="number" name="age" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" name="email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="number" name="contact" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-12">
										<div class="form-group">
											<label>Address<span>*</span></label>
											<input type="text" name="address" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Password<span>*</span></label>
											<input type="password" name="password" placeholder="" id="new_password" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Confirm password<span>*</span></label>
											<input type="password" name="cpassword" placeholder="" required="required" onkeyup="new_validate_password()" id="new_cpassword">
											<small id="new_wrong_pass_alert"></small>
										</div>
									</div>
									<div class="col-lg-12 col-md-3 col-12">
										<div class="form-group">
											<label>Select picture<span>*</span></label>
											<input type="file" name="fileToUpload" onchange="newgetImagePreview(event)" required="required">
											
										</div>
									</div>
								</div>
								<div class="single-widget get-button">
									<div class="content">
										<div class="button">
											<button class="btn" name="create_user" id="new_create">Register</button>
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
   function newgetImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('user_preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="190";
    newimg.height="190";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }

</script>


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




    function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }

</script>			
<?php include 'footer.php'; ?>