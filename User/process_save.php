<?php

	session_start();
	include '../config.php';
	date_default_timezone_set('Asia/Manila');
	$date_added  = date('Y-m-d');


	if(isset($_GET['product_Id']) && isset($_GET['user_Id']) && isset($_GET['product_price'])) {

		$user_Id       = $_GET['user_Id'];
		$product_Id    = $_GET['product_Id'];
		$product_price = $_GET['product_price'];

		// $fetch_price = mysqli_query($conn, "SELECT * FROM menu WHERE menu_Id='$menu_Id'");
		// $row = mysqli_fetch_array($fetch_price);
		// $total = $row['menu_price']*$quantity;
		

		$stock = mysqli_query($conn, "SELECT * FROM product WHERE product_Id='$product_Id'");
		$row_stock = mysqli_fetch_array($stock);
		$available_stock = $row_stock['product_stock'];
		$subtract = $available_stock-1;

		$fetch = mysqli_query($conn, "SELECT * FROM cart WHERE cart_product_Id='$product_Id' AND cart_user_Id='$user_Id' AND cart_status='Pending'");
		if(mysqli_num_rows($fetch) > 0) {
			$_SESSION['message'] = "You have already added this product to your cart.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: index.php?#product");
		} else {
			$save = mysqli_query($conn, "INSERT INTO cart (cart_product_Id, cart_user_Id, cart_total, date_added) VALUES ('$product_Id', '$user_Id', '$product_price', '$date_added') ");
			if($save) {
					$update = mysqli_query($conn, "UPDATE product SET product_stock='$subtract' WHERE product_Id='$product_Id' ");
					if($update) {
						// $_SESSION['message'] = "Product added to cart";
				  //       $_SESSION['text'] = "Added successfully";
				  //       $_SESSION['status'] = "success";
						header("Location: index.php?#product");
					} else {
						// $_SESSION['message'] = "Something went wrong while adding the product to cart.";
				  //       $_SESSION['text'] = "Please try again.";
				  //       $_SESSION['status'] = "error";
						header("Location: index.php?#product");
					}
			} else {
				// $_SESSION['message'] = "Something went wrong while adding the product to cart.";
		  //       $_SESSION['text'] = "Please try again.";
		  //       $_SESSION['status'] = "error";
				header("Location: index.php?#product");
			}
		}

	}





	if(isset($_GET['detailsproduct_Id']) && isset($_GET['detailsuser_Id']) && isset($_GET['detailsproduct_price'])) {

		$user_Id       = $_GET['detailsuser_Id'];
		$product_Id    = $_GET['detailsproduct_Id'];
		$product_price = $_GET['detailsproduct_price'];

		// $fetch_price = mysqli_query($conn, "SELECT * FROM menu WHERE menu_Id='$menu_Id'");
		// $row = mysqli_fetch_array($fetch_price);
		// $total = $row['menu_price']*$quantity;
		

		$stock = mysqli_query($conn, "SELECT * FROM product WHERE product_Id='$product_Id'");
		$row_stock = mysqli_fetch_array($stock);
		$available_stock = $row_stock['product_stock'];
		$subtract = $available_stock-1;

		$fetch = mysqli_query($conn, "SELECT * FROM cart WHERE cart_product_Id='$product_Id' AND cart_user_Id='$user_Id' AND cart_status='Pending'");
		if(mysqli_num_rows($fetch) > 0) {
			$_SESSION['message'] = "You have already added this product to your cart.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: product-details.php?product_Id=".$product_Id);
		} else {
			$save = mysqli_query($conn, "INSERT INTO cart (cart_product_Id, cart_user_Id, cart_total, date_added) VALUES ('$product_Id', '$user_Id', '$product_price', '$date_added') ");
			if($save) {
					$update = mysqli_query($conn, "UPDATE product SET product_stock='$subtract' WHERE product_Id='$product_Id' ");
					if($update) {
						// $_SESSION['message'] = "Product added to cart";
				  //       $_SESSION['text'] = "Added successfully";
				  //       $_SESSION['status'] = "success";
						header("Location: product-details.php?product_Id=".$product_Id);
					} else {
						// $_SESSION['message'] = "Something went wrong while adding the product to cart.";
				  //       $_SESSION['text'] = "Please try again.";
				  //       $_SESSION['status'] = "error";
						header("Location: product-details.php?product_Id=".$product_Id);
					}
			} else {
				// $_SESSION['message'] = "Something went wrong while adding the product to cart.";
		  //       $_SESSION['text'] = "Please try again.";
		  //       $_SESSION['status'] = "error";
				header("Location: product-details.php?product_Id=".$product_Id);
			}
		}

	}





	// DELETE CART
	if(isset($_POST['delete'])) {
		$cart_Id = $_POST['cart_Id'];

		$delete = mysqli_query($conn, "DELETE FROM cart WHERE cart_Id='$cart_Id'");
		if($delete) {
			echo '<script> alert ("Successfully deleted.");
	        		window.location = "cart.php"
	        	  </script>';
		} else {
			echo '<script> alert ("Something went wrong while deleting the record. Please try again.");
	        		window.location = "cart.php"
	        	  </script>';
		}
	}




	// UPDATE CART
	if(isset($_POST['update_cart'])) {
		$cart_Id    = $_POST['cart_Id'];
		$menu_price = $_POST['menu_price'];
		$quantity   = $_POST['quantity'];

		$total = $menu_price*$quantity;

		if($quantity == 0 || $quantity < 0) {
			echo '<script> alert ("Invalid input.");
		        		window.location = "cart.php"
		        	  </script>';
		} else {

			$save = mysqli_query($conn, "UPDATE cart SET cart_quantity='$quantity', cart_total='$total' WHERE cart_Id='$cart_Id'");
			if($save) {
				echo '<script> alert ("Successfully updated.");
		        		window.location = "cart.php"
		        	  </script>';
			} else {
				echo '<script> alert ("Something went wrong while updating the record. Please try again.");
		        		window.location = "cart.php"
		        	  </script>';
			}

		}
	}




	// CHECKOUT
	if(isset($_POST['checkout'])) {

		$user_Id    = $_POST['user_Id'];
		$eventname  = $_POST['eventname'];
		$eventvenue = $_POST['eventvenue'];
		$eventdate  = $_POST['eventdate'];
		$eventtime  = $_POST['eventtime'];


		$check_pending_checkout = mysqli_query($conn, "SELECT * FROM checkout WHERE checkout_user_Id='$user_Id' AND status='Pending'");
		if(mysqli_num_rows($check_pending_checkout) > 0) {

			echo '<script> alert ("You still have a pending checkout. Please wait for the Admin to confirm it. Thank you!");
		        		window.location = "checkout.php"
		        	  </script>';

		} else {


			$save = mysqli_query($conn, "INSERT INTO checkout (checkout_user_Id, event_name, event_venue, event_date, event_time) VALUES ('$user_Id', '$eventname', '$eventvenue', '$eventdate', '$eventtime')");
			if($save) {
					$update = mysqli_query($conn, "UPDATE cart SET cart_status='Confirmed' WHERE cart_user_Id='$user_Id'");
					if($update) {
						echo '<script> alert ("You have successfully checked out.");
				        		window.location = "checked_out.php"
				        	  </script>';
					} else {
						echo '<script> alert ("Something went wrong.");
				        		window.location = "checkout.php"
				        	  </script>';
					}
			} else {
				echo '<script> alert ("Something went wrong.");
		        		window.location = "checkout.php"
		        	  </script>';
			}


		}

		

	}






	if(isset($_POST['cancel_checkout'])) {

		$user_Id     = $_POST['user_Id'];
		$checkout_Id = $_POST['checkout_Id'];

		$delete = mysqli_query($conn, "DELETE FROM checkout WHERE checkout_Id='$checkout_Id'");
		if($delete) {

			$fetch_pending = mysqli_query($conn, "SELECT * FROM cart WHERE cart_status='Confirmed' AND cart_user_Id='$user_Id'");
			if(mysqli_num_rows($fetch_pending) > 0 ) {

				$update = mysqli_query($conn, "UPDATE cart SET cart_status='Pending' WHERE cart_user_Id='$user_Id'");
				if($update) {

					echo '<script> alert ("You have cancelled your checked out menu.");
	        				window.location = "cart.php"
        	  			  </script>';	

				} else {
					echo '<script> alert ("Something went wrong. Please try again.");
			        		window.location = "cart.php"
			        	  </script>';

				}

			} else {

				echo '<script> alert ("Something went wrong. Please try again.");
		        		window.location = "cart.php"
		        	  </script>';

			}

			
		} else {
			echo '<script> alert ("Something went wrong while deleting the record. Please try again.");
	        		window.location = "cart.php"
	        	  </script>';
		}
	}

?>