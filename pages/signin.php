<?php
session_start();

require '../script/php/db_conn.php';

$username_flag = true;
$password_flag = true;

if (isset($_POST["login"])) {
   $username = $_POST["username"];
   $password = $_POST["password"];

   $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

   if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])) {
         $_SESSION["login"]["id"] = $row["user_id"];
         $_SESSION["login"]["username"] = $row["username"];
         header("Location: /ProjectEXPO/index.php");
         exit;
      } else {
         $password_flag = false;
      }
   } else {
      $username_flag = false;
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

   <link rel="stylesheet" href="..\style\pages\signin.css">
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
            <input type="text" name="username" id="username"><br>
            <label class="label" for="password">Password</label><br>
            <input type="password" name="password" id="password"><br>
            <?php if ($username_flag == false) : ?>
               <p class="label error">username not found!</p>
            <?php endif ?>
            <?php if ($password_flag == false) : ?>
               <p class="label error">wrong Password!</p>
            <?php endif ?>
            <button type="submit" name="login">Sign In</button>
         </form>
         <p id="to-login" class="label">Don't have an account? <a href="signup.php">Register now!</a></p>
      </div>
      <div class="hero-img">
      </div>
   </div>
</body>

</html>