<?php
	session_start();
	require_once 'config_DBO.php';

	$email = $_POST['email'];
	$email_check = '';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirmation = $_POST['password_confirmation'];
	$user_check = $db->prepare("SELECT * FROM `users` WHERE `email` = :email");
	$user_check->execute([
	"email" => $email_check,
	]);

	$user_check = $user_check->fetch();

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['is_error'] = true;
		$_SESSION['error_message'] = "Check validation of Email";
		header('Location: /register.php');
	}else if($password !== $password_confirmation){
		$_SESSION['is_error'] = true;
		$_SESSION['error_message'] = "Passwords mismatch";
		header('Location: /register.php');

	}else if($email === $email_check){
		$_SESSION['is_error'] = true;
		$_SESSION['error_message'] = "The email you entered is already taken";
		header('Location: /register.php');
	} else{
	$store_users = $db->prepare("INSERT INTO `users` (`email`, `username`, `password`) 
								VALUES (:email, :username, :password)");
	$store_users->execute([
	"email" => $email,
	"username" => $username,
	"password" => password_hash($password, PASSWORD_DEFAULT) ,
	]);

	$_SESSION['is_success_register'] = true;
	$_SESSION['success_message'] = "Registration is complete. Log in using the form below ";
	header('Location: /login.php');
	}

?>
