<?php 

	session_start();
	include '../config.php';

	// UPDATE USER
	if(isset($_POST['update_user'])) {

		$user_Id = $_POST['user_Id'];
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
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE users SET fname='$firstname', mname='$middlename', lname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
		            if($save) {
                	$_SESSION['message'] = "User information has been updated!";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: users.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                }

		} else {

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
									header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE users SET fname='$firstname', mname='$middlename', lname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE user_Id='$user_Id'");
							            if($save) {
					                	$_SESSION['message'] = "User information has been updated!";
								            $_SESSION['text'] = "Updated successfully!";
										        $_SESSION['status'] = "success";
														header("Location: users.php");
					                } else {
					                  $_SESSION['message'] = "Something went wrong while updating the information.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: users.php");
					                }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: users.php");
                      }

				 }

		}

	}






	// CHANGE USER PASSWORD
	if(isset($_POST['password_user'])) {

    	$user_Id  = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['message']  = "Password does not matched. Please try again";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: users.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

			    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: users.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while changing the password.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                }
		    		}
    	} else {
    				$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: users.php");
    	}

    }






    // UPDATE ADMIN
	if(isset($_POST['update_admin'])) {

		$admin_Id    = $_POST['admin_Id'];
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
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE admin_Id='$admin_Id'");
		            if($save) {
			                $_SESSION['message']  = "Admin information has been updated!";
					            $_SESSION['text'] = "Updated successfully!";
							        $_SESSION['status'] = "success";
											header("Location: admin.php");                          
		            } else {
			                $_SESSION['message'] = "Something went wrong while saving the information.";
					            $_SESSION['text'] = "Please try again.";
							        $_SESSION['status'] = "error";
											header("Location: admin.php");
		            }

		} else {

				  // Check if image file is a actual image or fake image
		          $target_dir = "../images-admin/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");

                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE admin_Id='$admin_Id'");
				           
							            if($save) {
					                	$_SESSION['message'] = "Admin information has been updated!";
								            $_SESSION['text'] = "Updated successfully!";
										        $_SESSION['status'] = "success";
														header("Location: admin.php");
					                } else {
					                  $_SESSION['message'] = "Something went wrong while updating the information.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: admin.php");
					                }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: admin.php");
                      }

				 }

		}
	}




	// CHANGE ADMIN PASSWORD
	if(isset($_POST['password_admin'])) {

    	$admin_Id    = $_POST['admin_Id'];	
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM admin WHERE password='$OldPassword' AND admin_Id='$admin_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['message']  = "Password does not matched. Please try again";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: admin.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE admin SET password='$password' WHERE admin_Id='$admin_Id' ");

			    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: admin.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while changing the password.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                }
		    		}
    	} else {
    				$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: admin.php");
    	}

    }





      // UPDATE CATEGORY
	if(isset($_POST['update_category'])) {
		$cat_Id              = $_POST['cat_Id'];
		$categoryname        = $_POST['categoryname'];
		$categorydescription = $_POST['categorydescription'];

			$save = mysqli_query($conn, "UPDATE category SET cat_name='$categoryname', cat_description='$categorydescription' WHERE cat_Id='$cat_Id'");

      if($save) {
      	$_SESSION['message'] = "Category has been updated!";
        $_SESSION['text'] = "Updated successfully!";
        $_SESSION['status'] = "success";
				header("Location: category.php");
        // $_SESSION['success']  = "Admin information has been successfully saved!";
        // header("Location: admin.php");                                
      } else {
        // $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
        // header("Location: admin.php");
        $_SESSION['message'] = "Something went wrong while updating the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: category.php");
      }
	}




// UPDATE MENU
	if(isset($_POST['update_product'])) {
		$product_Id      = $_POST['product_Id'];
		$cat_Id          = $_POST['cat_Id'];
		$name            = $_POST['name'];
		$description     = $_POST['description'];
		$price           = $_POST['price'];
		$stock					 = $_POST['stock'];
		$file            = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

									$save = mysqli_query($conn, "UPDATE product SET product_cat_Id='$cat_Id', product_name='$name', product_description='$description', product_price='$price', product_stock='$stock' WHERE product_Id='$product_Id'");

									if($save) {

												$update = mysqli_query($conn, "UPDATE cart SET cart_total='$price' WHERE cart_product_Id='$product_Id'");

												if($update) {
			                  	$_SESSION['message'] = "Product has been updated!";
							            $_SESSION['text'] = "Updated successfully!";
									        $_SESSION['status'] = "success";
													header("Location: product.php");
			                    // $_SESSION['success']  = "Admin information has been successfully saved!";
			                    // header("Location: admin.php");                                
			                  } else {
			                    // $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
			                    // header("Location: admin.php");
			                    $_SESSION['message'] = "Something went wrong while updating the information.";
							            $_SESSION['text'] = "Please try again.";
									        $_SESSION['status'] = "error";
													header("Location: product.php");
			                  }

                  } else {
                    // $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
                    // header("Location: admin.php");
                    $_SESSION['message'] = "Something went wrong while updating the information.";
				            $_SESSION['text'] = "Please try again.";
						        $_SESSION['status'] = "error";
										header("Location: product.php");
                  }
		} else {

									// Check if image file is a actual image or fake image
				          $target_dir = "../images-product/";
				          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				          $uploadOk = 1;
				          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: product.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message'] = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: product.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     				
                     				$save = mysqli_query($conn, "UPDATE product SET product_cat_Id='$cat_Id', product_name='$name', product_description='$description', product_price='$price', product_stock='$stock', product_image='$file' WHERE product_Id='$product_Id'");

									          if($save) {
					                  	$_SESSION['message'] = "Product has been updated!";
									            $_SESSION['text'] = "Updated successfully!";
											        $_SESSION['status'] = "success";
															header("Location: product.php");
					                  } else {
					                    $_SESSION['message'] = "Something went wrong while updating the information.";
									            $_SESSION['text'] = "Please try again.";
											        $_SESSION['status'] = "error";
															header("Location: product.php");
					                  }

                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: product.php");
                      }
				 					}
							
		}
	}




?>