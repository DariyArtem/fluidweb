<?php
  session_start();
  if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true ){
      header('Location: profile.php');
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/my.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Registration</title>
</head>
<body>
  <form method="post" action="assets/reg.php">
  <div class="container">
    <h3>Registration</h3>
    <p>Please fill in this form to create an account.</p>
   

    <label for="email"><b>Email</b></label>
    <br>
    <input class="registerinput" type="text" placeholder="Enter Email" name="email"  required>
    <br/>

    <label  for="password"><b>Password</b></label>
    <br>
    <input class="registerinput" type="password" placeholder="Enter Password" name="password" required>
    <br>

    <label  for="password_confirmation"><b>Confirm Password</b></label>
    <br>
    <input class="registerinput" type="password" placeholder="Confirm Password" name="password_confirmation" required>
    <br>

    <label  for="username"><b>Username</b></label>
    <br>
    <input class="registerinput" type="text" placeholder="Enter Username" name="username" required>
    <br>

    <button class="button" type="submit">
      <a>Register</a>
    </button>
    <br>
  </div>

    <?php
      if (isset($_SESSION['is_error']) && $_SESSION['is_error'] === true){
        ?>
        <div class="alert">
          <?= $_SESSION['error_message'] ?>
        </div>
        <?php
      }
      unset($_SESSION['is_error']);
      unset($_SESSION['error_message']);

    ?>


  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
  
</body>
</html>