<?php

    session_start();
    require_once 'config_DBO.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['is_error'] = true;
        $_SESSION['error_message'] = "Check validation of Email";
        header('Location: /login.php');
    }
    $user = $db->prepare("SELECT * FROM `users` WHERE `email` = :email");
    $user->execute([
        "email" => $email,
    ]);

    $user = $user->fetch();

    if (!$user){
        $_SESSION['is_error'] = true;
        $_SESSION['error_message'] = "User with this email is not found";
        header('Location: /login.php');
    } else if(password_verify($password, $user["password"]) !== true){
        $_SESSION['is_error'] = true;
        $_SESSION['error_message'] = "Password incorrect";
        header('Location: /login.php');
    } else{
        $_SESSION["auth"] = true;
        $_SESSION["user"] = [
            "id" => $user["id"],
            "username" => $user["username"],
            "email" => $user["email"]
        ];
        header('Location: /profile.php');
    }
?>

