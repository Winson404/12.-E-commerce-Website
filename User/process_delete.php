<?php 
	session_start();
	include '../config.php';

	// DELETE USER
	if(isset($_GET['cart_Id'])) {
		$cart_Id = $_GET['cart_Id'];

		$qty = mysqli_query($conn, "SELECT * FROM product JOIN cart ON product.product_Id=cart.cart_product_Id WHERE cart_Id='$cart_Id'");
		$row = mysqli_fetch_array($qty);
		$cart_quantity = $row['cart_quantity'];
		$available_stock = $row['product_stock'];
		$add_stock_back = $cart_quantity + $available_stock;
		$product_Id = $row['product_Id'];

		$delete = mysqli_query($conn, "DELETE FROM cart WHERE cart_Id='$cart_Id'");
		if($delete) {
		      	$update = mysqli_query($conn, "UPDATE product SET product_stock='$add_stock_back' WHERE product_Id='$product_Id'");
				if($update) {
			      	// $_SESSION['message'] = "Deleted";
			       //  $_SESSION['text'] = "Deleted successfully!";
			       //  $_SESSION['status'] = "success";
					header("Location: cart.php");
			      } else {
			        // $_SESSION['message'] = "Something went wrong while deleting the record";
			        // $_SESSION['text'] = "Please try again.";
			        // $_SESSION['status'] = "error";
					header("Location: cart.php");
			      }
	      } else {
	        // $_SESSION['message'] = "Something went wrong while deleting the record";
	        // $_SESSION['text'] = "Please try again.";
	        // $_SESSION['status'] = "error";
			header("Location: cart.php");
	      }
	}


?>