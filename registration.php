<?php
include('config.php');
session_start(); 
if (isset($_POST['register'])) 
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	// $md5Password = MD5($password);
	$phone = $_POST['phone'];
	
	if(isset($_FILES['profile']))
    { 
    	$profile = $_FILES["profile"]["name"];
   		$profile_temp = $_FILES["profile"]["tmp_name"];   
    	$folder = "image/profiles/".$profile;

    	$add_data = "INSERT INTO `tbl_vendor` (`name`, `email`, `password`, `profile`, `phone`) VALUES ('$name', '$email', '$password', '$profile', '$phone')";
    	$result_detail_insert = mysqli_query($conn, $add_data);
    	move_uploaded_file($profile_temp, $folder)

    	header("location:login.php")
    	echo "<script>alert('Registered successfully');</script>";

    }else{
    	echo "<script>alert('Please Select Profile');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<?php
                    if(isset($error))
                {   ?>
                <div class="alert alert-light-danger color-danger" style="color:red;"><i class="bi bi-exclamation-circle"></i><?php echo $error;?></div>
                <?php } ?>
				<form method="POST" enctype="multipart/form-data" class="login100-form validate-form">
					<span class="login100-form-title p-b-70" style="padding-bottom: 0px;">Sign Up</span>
					
					<div class="wrap-input100 validate-input m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="name" placeholder="Username" required>
					</div>

					<div class="wrap-input100 validate-input m-b-35" data-validate = "Enter email">
						<input class="input100" type="text" name="email" placeholder="Email" required>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter phone">
						<input class="input100" type="tel" name="phone" placeholder="123-45-678" required>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter profile">
						<input class="input100" type="file" name="profile">
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="register" value="Sign Up">
					</div>
					<ul class="login-more p-t-190">
						<li>
							<span class="txt1">You have an account? </span>
							<a href="login.php" class="txt2">Login</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>
</html>