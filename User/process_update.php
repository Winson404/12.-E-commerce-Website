<?php 
	session_start();
	include '../config.php';

	// DELETE USER
	if(isset($_GET['cart_Id'])) {
		$cart_Id = $_GET['cart_Id'];

		$delete = mysqli_query($conn, "DELETE FROM cart WHERE cart_Id='$cart_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Deleted";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: cart.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: cart.php");
	      }
	}


	// UPDATE QTY
	if(isset($_POST['update_qty'])) {
  
		$cart_Id  = $_POST['cart_Id'];
		$qty      = $_POST['qty'];

		$a = mysqli_query($conn, "SELECT * FROM product JOIN cart ON product.product_Id=cart.cart_product_Id WHERE cart_Id='$cart_Id'");
		$row = mysqli_fetch_array($a);

		$total = $row['product_price']; //fetch to get the CART TOTAL by multiplying qty and price
		$stock = $row['product_stock'];
		$cart_qty = $row['cart_quantity'];
		$product_Id = $row['product_Id'];

		$sub_total = $qty * $total; // formula to get the CART TOTAL FROM cart

		$add = $qty - $cart_qty;
		$get_stock = $stock - $add;

		$minus = $cart_qty - $qty;
		$get_stock2 = $stock + $minus;

		// if($get_stock == 0 || $get_stock < 0) {
		// 	header('Location: cart.php');
		// } else {
		// 	$update = mysqli_query($conn, "UPDATE cart SET cart_quantity='$qty', cart_total='$sub_total' WHERE cart_Id='$cart_Id'");
		// 	if($update) {
		// 		$update_stock = mysqli_query($conn, "UPDATE product SET product_stock='$get_stock' WHERE product_Id='$product_Id'");
		// 		if($update_stock) {
		// 			header('Location: cart.php');
		// 		} else {
		// 			header('Location: cart.php');
		// 		}
		// 	} else {
		// 		header('Location: cart.php');
		// 	}
		// }
		
		if($cart_qty < $qty) {

			$update = mysqli_query($conn, "UPDATE cart SET cart_quantity='$qty', cart_total='$sub_total' WHERE cart_Id='$cart_Id'");
			if($update) {
				$update_stock = mysqli_query($conn, "UPDATE product SET product_stock='$get_stock' WHERE product_Id='$product_Id'");
				if($update_stock) {
					header('Location: cart.php');
				} else {
					header('Location: cart.php');
				}
			} else {
				header('Location: cart.php');
			}

		} elseif($cart_qty > $qty) {

			$update = mysqli_query($conn, "UPDATE cart SET cart_quantity='$qty', cart_total='$sub_total' WHERE cart_Id='$cart_Id'");
			if($update) {
				$update_stock = mysqli_query($conn, "UPDATE product SET product_stock='$get_stock2' WHERE product_Id='$product_Id'");
				if($update_stock) {
					header('Location: cart.php');
				} else {
					header('Location: cart.php');
				}
			} else {
				header('Location: cart.php');
			}

		} else {
			header('Location: cart.php');
		}
	}





	if(isset($_GET['checkout_user_Id'])) {
		$id = $_GET['checkout_user_Id'];

		$update = mysqli_query($conn, "UPDATE cart SET cart_status='Confirmed', checkout='Confirmed' WHERE cart_user_Id='$id'");
		if($update) {
			$_SESSION['message'] = "You have successfully checked out your products.";
	        $_SESSION['text'] = "Check out successful";
	        $_SESSION['status'] = "success";
			header("Location: cart.php");
		} else {
			$_SESSION['message'] = "Something went wrong while checking out the product.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: cart.php");
		}
	}




	if(isset($_GET['receivedItems_user_Id'])) {
		$id = $_GET['receivedItems_user_Id'];

		$update = mysqli_query($conn, "UPDATE cart SET receivingStatus='Received', archive=1 WHERE cart_user_Id='$id'");
		if($update) {
			$_SESSION['message'] = "Items you checked out are successfully received.";
		        $_SESSION['text'] = "Received successful";
		        $_SESSION['status'] = "success";
			header("Location: index.php?#product");
		} else {
			$_SESSION['message'] = "Something went wrong while receiving the product.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
			header("Location: index.php?#product");
		}
	}






	




	// UPDATE user
	if(isset($_POST['update_user'])) {

		$user_Id    = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix    = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		// $file       = basename($_FILES["fileToUpload"]["name"]);

		$save = mysqli_query($conn, "UPDATE users SET fname='$firstname', mname='$middlename', lname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
        if($save) {
                $_SESSION['message']  = "Your information has been updated!";
		        $_SESSION['text'] = "Updated successfully!";
		        $_SESSION['status'] = "success";
				header("Location: about_me.php");                          
        } else {
                $_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: about_me.php");   
        }

		
	}






	// CHANGE user PASSWORD
	if(isset($_POST['password_user'])) {

    	$user_Id     = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

	    			if($update_password) {
	    					$_SESSION['message']  = "Password has been changed.";
					        $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
							header("Location: changepassword.php");     
	    			} else {
	    					$_SESSION['message']  = "Something went wrong while changing the password.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: changepassword.php");  
	    			}
    	} else {
    		$_SESSION['message']  = "Old password is incorrect.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: changepassword.php"); 
    	}

    }





    // UPDATE PICTURE
	if(isset($_POST['profile_picture'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		  // Check if image file is a actual image or fake image
	      $target_dir = "../images-users/";
	      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	      $uploadOk = 1;
	      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


	      // Allow certain file formats
	      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	      $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
          $_SESSION['text'] = "Please try again.";
          $_SESSION['status'] = "error";
		  header("Location: update_picture.php");  
	      $uploadOk = 0;
	      }

	      // Check if $uploadOk is set to 0 by an error
	      if ($uploadOk == 0) {
	      $_SESSION['message']  = "Your file was not uploaded.";
          $_SESSION['text'] = "Please try again.";
          $_SESSION['status'] = "error";
		  header("Location: update_picture.php");  
	      // if everything is ok, try to upload file
	      } else {

	          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	              	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
		            if($save) {
	    					$_SESSION['message']  = "Your information has been updated!";
					        $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
							header("Location: update_picture.php");     
	    			} else {
	    					$_SESSION['message']  = "Something went wrong while saving the information.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: update_picture.php");  
	    			}
	          } else {
	                $_SESSION['message']  = "There was an error uploading your file.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: update_picture.php");  

	          }

		 }

		
	}




?>