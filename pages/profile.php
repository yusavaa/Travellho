<?php
session_start();

require '../script/php/db_conn.php';

$user = query("SELECT * FROM users WHERE user_id =" . $_SESSION["login"]["id"]);

if (isset($_POST['change'])) {
   $username = $_POST['username'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   mysqli_query($conn, "UPDATE users SET first_name = '$firstname', last_name = '$lastname', username = '$username', email = '$email', phone = '$phone' WHERE user_id =" . $_SESSION["login"]["id"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <?php include("../partials/base.php") ?>

   <link rel="stylesheet" href="..\style\partials\header.css">
   <link rel="stylesheet" href="..\style\pages\profile.css">
</head>

<body>
   <?php include("..\partials\header.php") ?>
   <div class="container">
      <div class="profile">
         <h3>Your Profile</h3>
         <img src="..\assets\gallery3.jpg" alt="">
         <p class="label"><?= $user[0]['first_name'] . " " . $user[0]['last_name'] ?></p>
         <p class="label"><?= $user[0]['username'] ?></p>
         <a id="sign-out" href="../script/php/clear_login_session.php">Sign Out</a>
      </div>
      <div class="edit-profile">
         <h3>Edit Your Personal Settings</h3>
         <form action="" method="post">
            <div class="profile-setting">
            <label for="firstname" class="label">Username</label>
               <input type="text" name="username" id="username" value="<?= $user[0]['username'] ?>">
               <label for="firstname" class="label">First Name</label>
               <input type="text" name="firstname" id="firstname" value="<?= $user[0]['first_name'] ?>">
               <label for="lastname" class="label">Last Name</label>
               <input type="text" name="lastname" id="lastname" value="<?= $user[0]['last_name'] ?>">
               <label for="email" class="label">Email</label>
               <input type="email" name="email" id="email" value="<?= $user[0]['email'] ?>">
               <label for="phone" class="label">Phone</label value="<?= $user[0]['phone'] ?>">
               <input type="tel" name="phone" id="phone">
            </div>
            <!-- <div class="password-setting">
               <label for="password" class="label">Current Password</label>
               <label for="password2" class="label">New Password</label>
               <input type="password" name="password" id="password">
               <input type="password" name="password2" id="password2">
            </div> -->
            <button type="submit" name="change">Change Profile</button>
         </form>
      </div>
      <div class="history">
         <h3>History</h3>
      </div>
   </div>
</body>

</html>