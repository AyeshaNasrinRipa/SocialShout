<?php
include("includes/connection.php");

	if (isset($_POST['submit'])) {
		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
		$otp = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
		$select_user = "select * from users where user_email='$email' AND OTP ='$otp'";
		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);
		if($check_user == 1){
    $update = "UPDATE `users` SET `status`='verified',`OTP`='' where user_email='$email'";
		$query= mysqli_query($con, $update);
			echo "<script>window.open('signin.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or OTP is incorrect')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Verify Account</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body{
		overflow-x: hidden;
	}
	.main-content{
		width: 50%;
		height: 40%;
		margin: 10px auto;
		background-color: #fff;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
	}
	.header{
		border: 0px solid #000;
		margin-bottom: 5px;
	}
	.well{
		background-color: #187FAB;
	}
	#signin{
		width: 60%;
		border-radius: 30px;
	}
	.overlap-text{
		position: relative;
	}
	.overlap-text a{
		position: absolute;
		top: 8px;
		right: 10px;
		font-size: 14px;
		text-decoration: none;
		font-family: 'Overpass Mono', monospace;
		letter-spacing: -1px;

	}
</style>
<body>
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><h1 style="color: white;">SocialShout</h1></center>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="header">
				<h3 style="text-align: center;"><strong>Verify your account to SocialShout</strong></h3>
			</div>
			<div class="l-part">
				<form action="" method="post">
					<input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
					<div class="overlap-text">
						<input type="text" name="pass" placeholder="OTP" required="required" class="form-control input-md"><br>
					</div>
					<a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="Create Account!" href="signup.php">Don't have an account?</a><br><br>

					<center><button id="signin" class="btn btn-info btn-lg" name="submit">Submit</button></center>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>