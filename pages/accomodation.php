<?php
session_start();

require '..\script\php\db_conn.php';
require '..\script\php\cart_function.php';

if (!isset($_SESSION['flag'])) {
   if (isset($_POST['submit'])) {
      $_SESSION['flag'] = true;
   } else {
      $_SESSION['flag'] = false;
   }
} else {
   if (isset($_POST['submit'])) {
      $_SESSION['flag'] = true;
   }
}

if (isset($_GET['DES'])) {
   $accomodations = query("SELECT * FROM locations JOIN accomodations USING (location_id) WHERE destination_id =" . $_GET['DES']);
   $anchor = "DES=" . $_GET['DES'] . "&";
} else {
   $accomodations = query("SELECT * FROM locations JOIN accomodations USING (location_id)");
   $anchor = "";
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
   <link rel="stylesheet" href="..\style\pages\accomodation.css">
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
         <h2><?= count($accomodations) ?> Accomodations For You</h2>
         <div class="card-box">
            <?php foreach ($accomodations as $accomodation) : ?>
               <div class="card">
                  <img src="..\assets\gallery2.jpg" alt="">
                  <div class="col2">
                     <h2><?= $accomodation["accomodation_name"] ?></h2>
                     <p class="icon label"><span class="material-symbols-outlined">luggage</span>Hotel</p>
                     <p class="icon label"><span class="material-symbols-outlined">location_on</span><?= $accomodation["city"] . ", " . $accomodation["country"] ?></p>
                     <ul class="facility">
                        <?php
                        $string = $accomodation["facility"];
                        $facilities = explode(", ", $string);
                        foreach ($facilities as $facility) : ?>
                           <li class="label"><?= $facility ?></li>
                        <?php endforeach ?>
                     </ul>
                  </div>
                  <div class="col3">
                     <a href="accomodation_detail.php?<?= $anchor . 'ACM=' . $accomodation["accomodation_id"] ?>">Select Room</a>
                     <p class="price">Price</p>
                  </div>
               </div>
            <?php endforeach ?>
         </div>
      </main>
      <?php include("..\partials\cart.php"); ?>
   </div>
</body>

</html>