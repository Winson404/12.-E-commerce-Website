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
							<img src="../images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%;">
							<h2>Profile update</h2>
							<br><br>
							<!-- Form -->
							<form class="form" method="post" action="process_update.php" enctype="multipart/form-data">
								<input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
								<div class="row">
									<div class="col-lg-12 mb-2">
                      <div class="form-group" id="user_preview">
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
											<button class="btn" name="profile_picture" id="new_create">Change profile</button>
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
		
<?php include 'footer.php'; ?>


