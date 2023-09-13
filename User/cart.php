<?php 
	include 'topbar.php'; 
	include 'sweetalert_messages.php';
?>
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="cart.php">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php 

								// FETCH GRAND TOTAL ************************************************************************************************************
	                            $fetch_total = mysqli_query($conn, "SELECT SUM(cart_total) AS total_price FROM cart JOIN users ON cart.cart_user_Id=users.user_Id WHERE cart_user_Id='$id' AND cart_status='Pending'");
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
                           

								$a = mysqli_query($conn, "SELECT * FROM cart JOIN users ON cart.cart_user_Id=users.user_Id JOIN product ON cart.cart_product_Id=product.product_Id WHERE cart_user_Id='$id' AND cart_status='Pending'");
								while ($b = mysqli_fetch_array($a)) {

								// TO ADD COMMA FOR PRICE
	                            $price = $b['product_price'];
	                            $price_text = (string)$price; // convert into a string
	                            $price_text = strrev($price_text); // reverse string
	                            $arr = str_split($price_text, "3"); // break string in 3 character sets

	                            $price_new_text = implode(",", $arr);  // implode array with comma
	                            $price_new_text = strrev($price_new_text); // reverse string back
	                            //echo $price_new_text; // will output 1,234
	                            



	                            $qty = $b['cart_quantity'];
	                            $total = $price * $qty;

	                            // TO ADD COMMA FOR PRICE
	                            $total_price = $total;
	                            $price_texts = (string)$total_price; // convert into a string
	                            $price_texts = strrev($price_texts); // reverse string
	                            $arrs = str_split($price_texts, "3"); // break string in 3 character sets

	                            $price_new_texts = implode(",", $arrs);  // implode array with comma
	                            $price_new_texts = strrev($price_new_texts); // reverse string back
	                            //echo $price_new_text; // will output 1,234
							?>
							<tr>
								<td class="image" data-title="No"><img src="../images-product/<?php echo $b['product_image']; ?>" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#"><?php echo $b['product_name']; ?></a></p>
									<p class="product-des"><?php echo $b['product_description']; ?></p>
								</td>
								<td class="price" data-title="Price"><span>₱ <?php echo $price_new_text; ?>.00 </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<!-- <div class="button minus">
											<button type="submit" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]" id="minus">
												<i class="ti-minus"></i>
											</button>
										</div> -->
										<form action="process_update.php" method="POST">
										<input type="hidden" name="cart_Id" class="input-number"  data-min="1" data-max="100" value="<?php echo $b['cart_Id']; ?>">
										<input type="number" name="qty" class="input-number"  data-min="1" data-max="100" value="<?php echo $b['cart_quantity']; ?>" required>
										<!-- <form id="form<?php //echo $b['cart_Id']; ?>">
											<input type="hidden" name="cart_Id" class="input-number"  data-min="1" data-max="100" value="<?php //echo $b['cart_Id']; ?>" id="cart_Id">
											<input type="hidden" name="user_Id" value="<?php //echo $id; ?>">
											<input type="number" name="qty" class="input-number"  data-min="1" data-max="100" value="<?php //echo $b['cart_quantity']; ?>" onchange="updateqty(<?php //echo $b['cart_Id']; ?>)" onkeyup="updateqty(<?php //echo $b['cart_Id']; ?>)" id="qty">
										</form> -->
										<div class="button plus">
											<button type="submit" class="btn btn-primary" name="update_qty"><i class="fa-solid fa-pen-to-square"></i></button>
											<!-- <button type="submit" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]" id="plus" name="update_qty">
												<i class="ti-plus"></i>
											</button> -->
										</div>
										</form>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>₱ <?php echo $price_new_texts; ?>.00</span></td>
								<td class="action" data-title="Remove"><a href="process_delete.php?cart_Id=<?php echo $b['cart_Id']; ?>"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>

			

			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<!-- <div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div> -->
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>₱ <?php echo $grand_price_new_text; ?>.00</span></li>
										<!-- <li>Shipping<span>Free</span></li>
										<li>You Save<span>$20.00</span></li> -->
										<li class="last">You Pay<span><b>₱ <?php echo $grand_price_new_text; ?>.00</b></span></li>
										
									</ul>
									<div class="button5">
										<a href="checkout.php" class="btn">Checkout</a>
										<a href="index.php?#product" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<!-- <section class="shop-services section">
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
	<!-- End Shop Newsletter -->
	
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


<script>
    $(document).ready(function() {

        $("#minus").click(function() {
          var total = $("#value").val();
          console.log(total);
        })



        $("#pplus").click(function() {
          var total = $("#value").val();
          console.log(total);
        })


    });
</script>



<script>

	  function updateqty(cart_Id) {
    	   $.ajax( {
            url: "ajaxdata.php",
            method: "POST",
            data: $("#form"+cart_Id).serialize(),
            success: function(data) {
              $("#ajax-table").html(data);
            }
          });
        }
    // $(document).ready(function() {

    //     $("#plus").click(function() {
    //       var qty = $("#qty").val();
    //       var cart_Id = $("#cart_Id").val();
	   //        $.ajax( {
	   //          url: "ajaxdata.php",
	   //          method: "POST",
	   //          data: {cart_Id: cart_Id},
	   //          success: function(data) {
	   //            // $("#fee").html(data);
	   //          }
	   //        })
    //     })

      




    // });
</script>