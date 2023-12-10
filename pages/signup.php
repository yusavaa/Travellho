<?php
require '..\script\php\db_conn.php';

$password_flag = true;

if (isset($_POST["register"])) {
   if (register($_POST) > 0) {
   } else {
      $password_flag = false;
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <?php include("../partials/base.php") ?>

   <link rel="stylesheet" href="..\style\pages\signup.css">
</head>

<body>
   <div class="container">
      <div class="register-form">
         <a href="/ProjectEXPO/index.php" id="to-home">back</a>
         <header>
            <h2>Travello.</h2>
            <p>More than Thousand Locations for customized just for you. You can start now.</p>
         </header>
         <form action="" method="post">
            <label class="label" for="username">Username</label><br>
            <input type="text" name="username" id="username" required><br>
            <label class="label" for="email">Email</label><br>
            <input type="email" name="email" id="email" required><br>
            <label class="label" for="password">Password</label><br>
            <input type="password" name="password" id="password" required><br>
            <label class="label" for="password2">Confirm Password</label><br>
            <input type="password" name="password2" id="password2" required><br>
            <?php if ($password_flag == false) : ?>
               <p class="label error">password and confirm password do not match</p>
            <?php endif ?>
            <button type="submit" name="register">Start Journey</button>
         </form>
         <p id="to-login" class="label">Have an account? <a href="signin.php">Login now!</a></p>
      </div>
      <div class="hero-img">
      </div>
   </div>
</body>

</html>