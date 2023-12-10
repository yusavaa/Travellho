<?php
session_start();

require '..\script\php\db_conn.php';
require '..\script\php\cart_function.php';

if (!isset($_SESSION['flag'])) {
   if (isset($_POST['submit'])) {
      $_SESSION['flag'] = true;
      $_SESSION['cart']['budget'] = $_POST['budget'];
      $_SESSION['cart']['checkin'] = $_POST['checkin'];
      $_SESSION['cart']['checkout'] = $_POST['checkout'];
   } else {
      $_SESSION['flag'] = false;
   }
} else {
   if (isset($_POST['submit'])) {
      $_SESSION['flag'] = true;
      $_SESSION['cart']['budget'] = $_POST['budget'];
      $_SESSION['cart']['checkin'] = $_POST['checkin'];
      $_SESSION['cart']['checkout'] = $_POST['checkout'];
   }
}

if ($_SESSION['flag'] == true) {
   $destinations = query("SELECT * FROM locations JOIN destinations USING (location_id) WHERE ticket_cost <=" . $_SESSION['cart']['budget']);
} else {
   $destinations = query("SELECT * FROM locations JOIN destinations USING (location_id)");
}

$carts = addToCart();
if (isset($carts['DES'])) {
   $des_target = query("SELECT * FROM locations JOIN destinations USING (location_id) WHERE destination_id =" . $carts['DES']);
}
if (isset($carts['ROM'])) {
   $rom_target = query("SELECT * FROM rooms JOIN accomodations USING (accomodation_id) WHERE room_id=" . $carts['ROM']);
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
   <link rel="stylesheet" href="..\style\partials\card.css">
   <link rel="stylesheet" href="..\style\partials\cart.css">
   <link rel="stylesheet" href="..\style\pages\destination.css">
</head>

<body>
   <?php include("..\partials\header.php") ?>
   <div class="container">
      <?php if ($_SESSION['flag'] === true) : ?>
         <style>
            main {
               padding-left: 5%;
            }
         </style>
      <?php endif ?>
      <main>
         <h2><?= count($destinations) ?> Destinations For You</h2>
         <div class="card-box">
            <?php foreach ($destinations as $destination) {
               include("..\partials\card.php");
            } ?>
         </div>
      </main>
      <?php if ($_SESSION['flag'] === true) {
         include("..\partials\cart.php");
      } ?>
   </div>
</body>

</html>