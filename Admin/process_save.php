<?php 
	session_start();
	include '../config.php';

	// SAVE USER
	if(isset($_POST['create_user'])) {

		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
      $_SESSION['message'] = "Email is already taken.";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: users.php");
		} else {

			if($password != $cpassword) {
        $_SESSION['message'] = "Password does not matched.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: users.php");
			} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "../images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message'] = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (fname, mname, lname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
									          	$_SESSION['message'] = "User information has been successfully saved!";
									            $_SESSION['text'] = "Saved successfully!";
											        $_SESSION['status'] = "success";
															header("Location: users.php");
									          } else {
									            $_SESSION['message'] = "Something went wrong while saving the information.";
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

	}








	// SAVE ADMIN
	if(isset($_POST['create_admin'])) {

		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix         = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);


		$check_email = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
			$_SESSION['message']  = "Email is already taken.";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: admin.php");
		} else {

			if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: admin.php");
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
                     	
                      	$save = mysqli_query($conn, "INSERT INTO admin (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
									          	$_SESSION['message'] = "Admin information has been successfully saved!";
									            $_SESSION['text'] = "Saved successfully!";
											        $_SESSION['status'] = "success";
															header("Location: admin.php");
									          } else {
									            $_SESSION['message'] = "Something went wrong while saving the information.";
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

	}





// CREATE CATEGORY
	if(isset($_POST['create_category'])) {
		$categoryname        = $_POST['categoryname'];
		$categorydescription = $_POST['categorydescription'];
		$date_added          = date('Y-m-d');

			$fetch = mysqli_query($conn, "SELECT * FROM category WHERE cat_name='$categoryname'");
			if(mysqli_num_rows($fetch) > 0) {
          $_SESSION['message'] = "Category already exists.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: category.php");
			} else {

					$save = mysqli_query($conn, "INSERT INTO category (cat_name, cat_description, date_created) VALUES ('$categoryname', '$categorydescription', '$date_added')");
          if($save) {
          	$_SESSION['message'] = "Category has been added!";
            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
						header("Location: category.php");
          } else {
            $_SESSION['message'] = "Something went wrong while saving the information.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: category.php");
          }
			}
	}




	// CREATE MENU
	if(isset($_POST['create_product'])) {
		$cat_Id          = $_POST['cat_Id'];
		$name            = $_POST['name'];
		$description     = $_POST['description'];
		$price           = $_POST['price'];
		$stock					 = $_POST['stock'];
		$file            = basename($_FILES["fileToUpload"]["name"]);

		$fetch = mysqli_query($conn, "SELECT * FROM product WHERE product_name='$name'");

			if(mysqli_num_rows($fetch) > 0) {
          $_SESSION['message'] = "Product already exists.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: product.php");
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
             	
                  	$save = mysqli_query($conn, "INSERT INTO product (product_cat_Id, product_name, product_description, product_price, product_stock, product_image) VALUES ('$cat_Id', '$name', '$description', '$price', '$stock', '$file')");

					          if($save) {
                    	$_SESSION['message'] = "Product information has been successfully saved!";
					            $_SESSION['text'] = "Saved successfully!";
							        $_SESSION['status'] = "success";
											header("Location: product.php");
                      // $_SESSION['success']  = "Admin information has been successfully saved!";
                      // header("Location: admin.php");                                
                    } else {
                      // $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
                      // header("Location: admin.php");
                      $_SESSION['message'] = "Something went wrong while saving the information.";
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




	if(isset($_POST['hot_item_product'])) {

		$product_Id = $_POST['product_Id'];

		$fetch = mysqli_query($conn, "SELECT * FROM hot_item WHERE hot_product_Id='$product_Id'");
		if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "Product has been added to hot items.";
        $_SESSION['text'] = "Added to hot items.";
        $_SESSION['status'] = "success";
				header("Location: product.php");
		} else {

				$save = mysqli_query($conn, "INSERT INTO hot_item (hot_product_Id) VALUES ('$product_Id') ");
				if($save) {
        	$_SESSION['message'] = "Product has been added to hot items.";
	        $_SESSION['text'] = "Added to hot items.";
	        $_SESSION['status'] = "success";
					header("Location: product.php");                               
        } else {
          $_SESSION['message'] = "Something went wrong.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: product.php");
        }
		}
	}



?>