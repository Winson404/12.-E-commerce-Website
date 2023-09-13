<?php 
	include 'topbar.php'; 
	include 'sweetalert_messages.php';
	if(isset($_GET['category_Id']))
	$category_Id = $_GET['category_Id'];
?>


	<!-- Slider Area -->
	<section class="hero-slider bg-dark" >
		<!-- Single Slider -->
		<div class="single-slider"  style="background-image: url('homepage-includes/images/04.png'); background-size: cover; background-repeat: no-repeat;" >
			<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-9 offset-lg-3 col-12">
						<div class="text-inner">
							<div class="row">
								<div class="col-lg-7 col-12">
									<div class="hero-text">
										<h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
										<p>High quality T-Shirt</p>
										<div class="button">
											<a href="index.php?#product" class="btn">Shop Now!</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->


	<!-- Start Product Area -->
    <div class="product-area section" id="product">

            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" href="product_category_all.php">All</a></li>
									<?php 
										$fetch = mysqli_query($conn, "SELECT * FROM category");
										while ($row = mysqli_fetch_array($fetch)) {
									?>
									<li class="nav-item"><a class="nav-link" href="product_category2.php?category_Id=<?php echo $row['cat_Id']; ?>" role="tab"><?php echo $row['cat_name']; ?></a></li>
									<?php } ?>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php 
												$fetch = mysqli_query($conn, "SELECT * FROM product JOIN category ON product.product_cat_Id=category.cat_Id WHERE product_cat_Id='$category_Id' AND product_stock > 0");
												while ($row = mysqli_fetch_array($fetch)) {
												// TO ADD COMMA FOR PRICE
					                            $price = $row['product_price'];
					                            $price_text = (string)$price; // convert into a string
					                            $price_text = strrev($price_text); // reverse string
					                            $arr = str_split($price_text, "3"); // break string in 3 character sets

					                            $price_new_text = implode(",", $arr);  // implode array with comma
					                            $price_new_text = strrev($price_new_text); // reverse string back
					                            //echo $price_new_text; // will output 1,234
											?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img" src="images-product/<?php echo $row['product_image']; ?>" alt="#" style="height: 250px;">
															<img class="hover-img" src="images-product/<?php echo $row['product_image']; ?>" alt="#" style="height: 250px;">
														</a>
														<div class="button-head">
															<div class="product-action">
																<!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a> -->
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="login.php">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a type="button"><b><?php echo $row['product_name']; ?></b></a></h3>
														<div class="product-price">
															<span>₱ <?php echo $price_new_text; ?>.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a type="button">Stock: <b><?php echo $row['product_stock']; ?></b></a></span>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
											
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->





	<!-- Start Midium Banner  -->
	<!-- <section class="midium-banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Man's Collectons</p>
							<h3>Man's items <br>Up to<span> 50%</span></h3>
							<a href="index.php?#product">Shop Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>shoes women</p>
							<h3>mid season <br> up to <span>70%</span></h3>
							<a href="index.php?#product" class="btn">Shop Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- End Midium Banner -->




	
	<!-- Start Most Popular -->
	<div class="product-area most-popular section" id="hotitem">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
						<?php 
							$fetch = mysqli_query($conn, "SELECT * FROM product JOIN hot_item ON product.product_Id=hot_item.hot_product_Id WHERE product_stock > 0");

							while ($row = mysqli_fetch_array($fetch)) {
							// TO ADD COMMA FOR PRICE
                            $price = $row['product_price'];
                            $price_text = (string)$price; // convert into a string
                            $price_text = strrev($price_text); // reverse string
                            $arr = str_split($price_text, "3"); // break string in 3 character sets

                            $price_new_text = implode(",", $arr);  // implode array with comma
                            $price_new_text = strrev($price_new_text); // reverse string back
                            //echo $price_new_text; // will output 1,234
						?>
						<div class="single-product">
							<div class="product-img">
								<a href="product-details.html">
									<img class="default-img" src="images-product/<?php echo $row['product_image']; ?>" alt="#" style="height: 250px;">
									<img class="hover-img" src="images-product/<?php echo $row['product_image']; ?>" alt="#" style="height: 250px;">
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a> -->
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="login.php">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.html"><b><?php echo $row['product_name']; ?></b></a></h3>
								<div class="product-price">
									<!-- <span class="old">$60.00</span> -->
									<span>₱ <?php echo $price_new_text; ?>.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a type="button">Stock: <b><?php echo $row['product_stock']; ?></b></a></span>
								</div>
							</div>
						</div>
						<?php } ?>
						<!-- End Single Product -->
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
	




	<!-- Start Cowndown Area -->
	<section class="cown-down">
		<div class="section-inner ">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 col-12 padding-right">
						<div class="image">
							<img src="homepage-includes/images/06.jpg" alt="#">
						</div>	
					</div>	
					<div class="col-lg-6 col-12 padding-left">
						<div class="content">
							<div class="heading-block">
								<!-- <p class="small-title">Deal of day</p> -->
								<h3 class="title">High Quality T-Shirt For Men</h3>
								<p class="text">Shop Now!</p>
								<!-- <h1 class="price">$1200 <s>$1890</s></h1> -->
								<div class="coming-time">
									<!-- <div class="clearfix" data-countdown="2021/02/30"></div> -->
								</div>
							</div>
						</div>	
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- /End Cowndown Area -->



<?php include 'footer.php'; ?>