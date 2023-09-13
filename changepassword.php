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
									<h3>Create new password</h3>
								</div>
								<form class="form" method="post" action="processes.php">
									<div class="row">
										<input type="hidden" class="form-control" name="user_Id" value="<?php echo $user_Id; ?>">
										<div class="col-lg-12 col-12">
											<div class="form-group">
												<label>New password<span>*</span></label>
												<input name="password" type="password" placeholder="New password" id="mynewpassword" required>
											</div>	
										</div>
										
										<div class="col-lg-12 col-12">
											<div class="form-group">
												<label>Re-type new password<span>*</span></label>
												<input name="cpassword" type="password" placeholder="Re-type new password" id="cpassword" required onkeyup="validate_password()">
											<small id="wrong_pass_alert"></small>	
											</div>
										</div>
										<div class="col-lg-12 col-12">
						                    <input type="checkbox" id="remember" onclick="myFunction()">
						                    <label for="remember">
						                      Show password
						                    </label>
					                    </div>
										<div class="col-lg-12">
											<p><a href="login.php"><b>Login</b></a></p>
										</div>
										<div class="col-lg-12 d-flex justify-content-center mt-3">
											<button type="submit" class="btn " name="changepassword_user" id="changepassword">Change password</button>
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
									<h3>Create new password</h3>
								</div>
								<form class="form" method="post" action="processes.php">
									<div class="row">
										<input type="hidden" class="form-control" name="admin_Id" value="<?php echo $admin_Id; ?>">
										<div class="col-lg-12 col-12">
											<div class="form-group">
												<label>New password<span>*</span></label>
												<input name="password" type="password" placeholder="New password" id="mynewpassword" required>
											</div>	
										</div>
										
										<div class="col-lg-12 col-12">
											<div class="form-group">
												<label>Re-type new password<span>*</span></label>
												<input name="cpassword" type="password" placeholder="Re-type new password" id="cpassword" required onkeyup="validate_password()">
											<small id="wrong_pass_alert"></small>	
											</div>
										</div>
										<div class="col-lg-12 col-12">
						                    <input type="checkbox" id="remember" onclick="myFunction()">
						                    <label for="remember">
						                      Show password
						                    </label>
					                    </div>
										<div class="col-lg-12">
											<p><a href="login.php"><b>Login</b></a></p>
										</div>
										<div class="col-lg-12 d-flex justify-content-center mt-3">
											<button type="submit" class="btn " name="changepassword_admin" id="changepassword">Change password</button>
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


<script>
  // SHOW/HIDE PASSWORDS
  function myFunction() {
    var x = document.getElementById("mynewpassword");
    var y = document.getElementById("cpassword");
    if (x.type === "password" || y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
 }

// VALIDATE - MATCHED OR NOT MATCHED PASSWORDS
function validate_password() {
    var pass = document.getElementById('mynewpassword').value;
    var confirm_pass = document.getElementById('cpassword').value;
    if(pass == "") {
      confirm_pass.disabled = true;
    } else if (pass != confirm_pass) {
      document.getElementById('wrong_pass_alert').style.color = 'red';
      document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
      document.getElementById('changepassword').disabled = true;
      document.getElementById('changepassword').style.opacity = (0.4);
    } else {
      document.getElementById('wrong_pass_alert').style.color = 'green';
      document.getElementById('wrong_pass_alert').innerHTML = '';
      document.getElementById('changepassword').disabled = false;
      document.getElementById('changepassword').style.opacity = (1);
    }
}
</script>
