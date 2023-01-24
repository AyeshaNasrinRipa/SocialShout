<?php
session_start();
error_reporting(0);
include("includes/connection.php");

	if (isset($_POST['login'])) {

		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
		
		//$pass=password_hash($pass, PASSWORD_DEFAULT);
		//$select_user = "select * from users where user_email='$email' AND user_pass='$pass' AND status='verified'";
		$select_user = "select * from users where user_email='$email' AND status='verified'";
		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);
		$password=$row['user_pass'];
		// if($check_user == 1){
			if( password_verify($pass, $password)){
			$_SESSION['user_email'] = $email;

			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or Password is incorrect')</script>";
		}
	}
?>