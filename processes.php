<?php 

	session_start();
	include 'config.php';
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/PHPMailer/src/Exception.php';
    require 'vendor/PHPMailer/src/PHPMailer.php';
    require 'vendor/PHPMailer/src/SMTP.php';

	// ADMIN / CUSTOMER LOGIN - LOGIN.PHP
	if(isset($_POST['login'])) {
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		$check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password' AND user_type='Admin'");
		if(mysqli_num_rows($check)===1) {

				$row = mysqli_fetch_array($check);
				if($row['email'] === $email && $row['password'] === $password) {
					$_SESSION['admin_Id'] = $row['admin_Id'];
					header("Location: Admin/dashboard.php");
				} else {
					$_SESSION['message'] = "Incorrect password.";
		            $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: login.php");
				}
			
		} else {
				
				$check2 = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
                if(mysqli_num_rows($check2)===1) {

					$row = mysqli_fetch_array($check2);
					if($row['email'] === $email && $row['password'] === $password) {
						$_SESSION['user_Id'] = $row['user_Id'];
						header("Location: User/index.php");
					} else {
						$_SESSION['message'] = "Incorrect password.";
			            $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: login.php");
					}
					
				} else {
						$_SESSION['message'] = "Incorrect password.";
			            $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: login.php");
		         }
         }
	}






	// SAVE USER - REGISTER.PHP
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
		if(mysqli_num_rows($check_email) > 0 ) {
						$_SESSION['message']  = "Email is already taken.";
			      $_SESSION['text'] = "Please try again.";
					  $_SESSION['status'] = "error";
						header("Location: register.php");
		} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
						      $_SESSION['text'] = "Please try again.";
								  $_SESSION['status'] = "error";
									header("Location: register.php");				
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
						      $_SESSION['text'] = "Please try again.";
								  $_SESSION['status'] = "error";
									header("Location: register.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (fname, mname, lname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
	                            $_SESSION['message']  = "User information has been successfully saved!";
												      $_SESSION['text'] = "Registration successful";
														  $_SESSION['status'] = "success";
															header("Location: register.php");                               
                            } else {
                              $_SESSION['message'] = "Something went wrong while saving the information. Please try again.";
												      $_SESSION['text'] = "Please try again.";
														  $_SESSION['status'] = "error";
															header("Location: register.php");
                            }
                      } else {
                            	$_SESSION['message'] = "There was an error uploading your file.";
												      $_SESSION['text'] = "Please try again.";
														  $_SESSION['status'] = "error";
															header("Location: register.php");
                      }
				 }

		}

	}




	// CHECK IF EMAIL EXISTS IN THE DATABASE - FORGOT-PASSWORD.PHP
	if(isset($_POST['search'])) {
      $email = $_POST['email'];
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      if(mysqli_num_rows($fetch) > 0) {
     	 $row = mysqli_fetch_array($fetch);
     	 $user_Id = $row['user_Id'];
     	 header ('Location: sendcode.php?user_Id='.$user_Id);
	  } else {
	  	  $fetch = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
	      if(mysqli_num_rows($fetch) > 0) {
	      	$row = mysqli_fetch_array($fetch);
	      	$admin_Id = $row['admin_Id'];
	      	header ('Location: sendcode.php?admin_Id='.$admin_Id);
		  } else {
		  		$_SESSION['message'] = "Email does not exist in the database.";
	            $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: forgot-password.php");
		  }
	  }
    }




	
	// SEND VERIFICATION CODE - SENDCODE.PHP
 	if(isset($_POST['sendcode'])) {

    $email = $_POST['email'];
    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($fetch) > 0) {

    $row  = mysqli_fetch_array($fetch);
    $user_Id = $row['user_Id'];
    $key  = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

      $check_code = mysqli_query($conn, "SELECT verification_code FROM users WHERE user_Id='$user_Id'");
      if($check_code == NULL || $check_code != NULL) {

        $insert_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE user_Id='$user_Id'");
        if($insert_code) {

          $get_code = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
          $row2 = mysqli_fetch_array($get_code);
          $code = $row2['verification_code'];

          $subject = 'Verification code';
          $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$code.'</b>. Please do not share this code to other people. Thank you!</p>
          <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

          $mail = new PHPMailer(true);                            
          try {
            //Server settings
            $mail->isSMTP();                                     
            $mail->Host = 'smtp.gmail.com';                      
            $mail->SMTPAuth = true;                             
            $mail->Username = 'goodsamaritan2k20@gmail.com';     
            $mail->Password = 'duxkxivrezeuguqe';              
            $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );                         
            $mail->SMTPSecure = 'ssl';                           
            $mail->Port = 465;                                   

            //Send Email
            $mail->setFrom('goodsamaritan2k20@gmail.com');

            //Recipients
            $mail->addAddress($email);              
            $mail->addReplyTo('goodsamaritan2k20@gmail.com');

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            	$_SESSION['message'] = "Verification code sent.";
	            $_SESSION['text'] = "Sent successfully.";
			    $_SESSION['status'] = "success";
				header("Location: verifycode.php?user_Id=".$user_Id);
			} catch (Exception $e) {
				$_SESSION['message'] = "Verification code not sent.";
	            $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: sendcode.php?user_Id=".$user_Id);
			} 
		} else {
			$_SESSION['message'] = "Something went wrong while generating verification code.";
            $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: sendcode.php?user_Id=".$user_Id);
		} } } else {

			// ADMIN TABLE
			$fetch = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
			$row  = mysqli_fetch_array($fetch);
		    $admin_Id = $row['admin_Id'];
		    $key  = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

		      $check_code = mysqli_query($conn, "SELECT verification_code FROM admin WHERE admin_Id='$admin_Id'");
		      if($check_code == NULL || $check_code != NULL) {

		        $insert_code = mysqli_query($conn, "UPDATE admin SET verification_code='$key' WHERE admin_Id='$admin_Id'");
		        if($insert_code) {

		          $get_code = mysqli_query($conn, "SELECT * FROM admin WHERE admin_Id='$admin_Id'");
		          $row2 = mysqli_fetch_array($get_code);
		          $code = $row2['verification_code'];

		          $subject = 'Verification code';
		          $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$code.'</b>. Please do not share this code to other people. Thank you!</p>
		          <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

		          $mail = new PHPMailer(true);                            
		          try {
		            //Server settings
		            $mail->isSMTP();                                     
		            $mail->Host = 'smtp.gmail.com';                      
		            $mail->SMTPAuth = true;                             
		            $mail->Username = 'goodsamaritan2k20@gmail.com';     
		            $mail->Password = 'duxkxivrezeuguqe';              
		            $mail->SMTPOptions = array(
		            'ssl' => array(
		            'verify_peer' => false,
		            'verify_peer_name' => false,
		            'allow_self_signed' => true
		            )
		            );                         
		            $mail->SMTPSecure = 'ssl';                           
		            $mail->Port = 465;                                   

		            //Send Email
		            $mail->setFrom('goodsamaritan2k20@gmail.com');

		            //Recipients
		            $mail->addAddress($email);              
		            $mail->addReplyTo('goodsamaritan2k20@gmail.com');

		            //Content
		            $mail->isHTML(true);                                  
		            $mail->Subject = $subject;
		            $mail->Body    = $message;

		            $mail->send();
		            	$_SESSION['message'] = "Verification code sent.";
			            $_SESSION['text'] = "Sent successfully.";
					    $_SESSION['status'] = "success";
						header("Location: verifycode.php?admin_Id=".$admin_Id);
					} catch (Exception $e) {
						$_SESSION['message'] = "Verification code not sent.";
			            $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: sendcode.php?admin_Id=".$admin_Id);
					} 
				} else {
					$_SESSION['message'] = "Something went wrong while generagfting verification code.";
		            $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: sendcode.php?admin_Id=".$admin_Id);
				} }
		}
	}







	// VERIFY CODE OF THE CUSTOMER - VERIFYCODE.PHP
	if(isset($_POST['verify_code_user'])) {
      $user_Id = $_POST['user_Id'];
      $email   = $_POST['email'];
      $code    = $_POST['code'];
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND verification_code='$code' AND user_Id='$user_Id'");
      if(mysqli_num_rows($fetch) > 0) {
      	$_SESSION['message'] = "Code verified successfully.";
        $_SESSION['text'] = "Verification success.";
	    $_SESSION['status'] = "success";
		header("Location: changepassword.php?user_Id=".$user_Id);
	  } else {
  	    $_SESSION['message'] = "Invalid verification code";
        $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
		header("Location: verifycode.php?user_Id=".$user_Id);
	  } 
	}


	// VERIFY CODE OF THE ADMIN - VERIFYCODE.PHP
	if(isset($_POST['verify_code_Admin'])) {
      $admin_Id = $_POST['admin_Id'];
      $email   = $_POST['email'];
      $code    = $_POST['code'];
      $fetch = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND verification_code='$code' AND admin_Id='$admin_Id'");
      if(mysqli_num_rows($fetch) > 0) {
      	$_SESSION['message'] = "Code verified successfully.";
        $_SESSION['text'] = "Verification success.";
	    $_SESSION['status'] = "success";
		header("Location: changepassword.php?admin_Id=".$admin_Id);
	  } else {
  	    $_SESSION['message'] = "Invalid verification code";
        $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
		header("Location: verifycode.php?admin_Id=".$admin_Id);
	  } 
	}




	// CHANGE PASSWORD FOR THE USER - CHANGEPASSWORD.PHP
	if(isset($_POST['changepassword_user'])) {
      $user_Id  = $_POST['user_Id'];
      $password = md5($_POST['password']);
      $update = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
      if($update) {
      	$_SESSION['message'] = "Password successfully changed. Please login.";
        $_SESSION['text'] = "Success";
	    $_SESSION['status'] = "success";
		header("Location: login.php");
	  } else {
  	    $_SESSION['message'] = "Something went wrong while updatin your password";
        $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
		header("Location: changepassword.php?user_Id=".$user_Id);
	  } 
	}




	// CHANGE PASSWORD FOR THE ADMIN - CHANGEPASSWORD.PHP
	if(isset($_POST['changepassword_admin'])) {
      $admin_Id  = $_POST['admin_Id'];
      $password = md5($_POST['password']);
      $update = mysqli_query($conn, "UPDATE admin SET password='$password' WHERE admin_Id='$admin_Id' ");
      if($update) {
      	$_SESSION['message'] = "Password successfully changed. Please login.";
        $_SESSION['text'] = "Success";
	    $_SESSION['status'] = "success";
		header("Location: login.php");
	  } else {
  	    $_SESSION['message'] = "Something went wrong while updatin your password";
        $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
		header("Location: changepassword.php?admin_Id=".$admin_Id);
	  } 
	}
	



?>