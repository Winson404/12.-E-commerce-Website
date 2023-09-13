<?php 
	session_start();
	include '../config.php';

	// DELETE USER
	if(isset($_POST['delete_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "User information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
	      }
	}


	// DELETE ADMIN
	if(isset($_POST['delete_admin'])) {
		$admin_Id = $_POST['admin_Id'];

		$delete = mysqli_query($conn, "DELETE FROM admin WHERE admin_Id='$admin_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Admin information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: admin.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: admin.php");
	      }
	}




	// DELETE PRODUCT
	if(isset($_POST['delete_product'])) {
		$product_Id = $_POST['product_Id'];

		$delete = mysqli_query($conn, "DELETE FROM product WHERE product_Id='$product_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Product has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: product.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: product.php");
	      }
	}




	// DELETE CATEGORY
	if(isset($_POST['delete_category'])) {
		$cat_Id = $_POST['cat_Id'];

		$delete = mysqli_query($conn, "DELETE FROM category WHERE cat_Id='$cat_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Category has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: category.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: category.php");
	      }
	}



?>