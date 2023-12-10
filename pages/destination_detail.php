<?php
session_start();

require '..\script\php\db_conn.php';

$target_id = $_GET['id'];
$target = query("SELECT * FROM destinations JOIN locations USING (location_id) WHERE destination_id =" . $target_id);
$destinations = query("SELECT DISTINCT * 
                        FROM locations 
                        JOIN destinations USING (location_id)
                        ORDER BY RAND()
                        LIMIT 4;");
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
   <link rel="stylesheet" href="..\style\pages\destination_detail.css">
</head>

<body>
   <?php include("..\partials\header.php") ?>
   <div class="container">
      <div class="detail">
         <h1><?= $target[0]["destination_name"] ?></h1>
         <p class="icon"><span class="material-symbols-outlined">location_on</span><?= $target[0]["city"] . ", " . $target[0]["country"] ?></p>
         <img src="..\assets\hero2.jpg" alt="">
         <h3>Overview</h3>
         <p><?= $target[0]["description"] ?></p>
         <div class="recomend-des">
            <h3>Recomend for you</h3>
            <div class="card-box">
               <?php foreach ($destinations as $destination) {
                  include("..\partials\card.php");
               } ?>
            </div>
         </div>
      </div>
      <aside>
         <p class="icon"><span class="material-symbols-outlined">ios_share</span>Share</p>
         <div class="booking">
            <p id="onsale">ON SALE |</p>
            <h3><?= $target[0]["destination_name"] ?></h3>
            <p class="label">from</p>
            <h1><?= "Rp" . number_format($target[0]["ticket_cost"], 0, '.', '') ?><span>/person</span></h1>
            <p class="label">Trip Code <?= $target[0]["code_id"] . $target_id ?></p>
            <?php if ($_SESSION['flag'] == true) : ?>
               <a href="destination.php?code=DES&id=<?= $target_id ?>">Select</a>
            <?php else : ?>
               <a href="payment.php?DES=<?= $target_id ?>">Book Now!</a>
            <?php endif ?>
            <p id="offers">Special Offers</p>
            <p class="label">Save 10% | Payment using Mandiri Debit Card</p>
            <p class="label">Exires in 7 days</p>
         </div>
      </aside>
   </div>
</body>

</html>