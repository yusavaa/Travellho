<?php
session_start();

require '..\script\php\db_conn.php';

$target_id = $_GET['ACM'];
$target = query("SELECT * FROM accomodations JOIN locations USING (location_id) WHERE accomodation_id =" . $target_id);
$rooms = query("SELECT * FROM rooms WHERE accomodation_id=" . $target_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <?php include("../partials/base.php") ?>

   <link rel="stylesheet" href="..\style\partials\header.css">
   <link rel="stylesheet" href="..\style\pages\accomodation_detail.css">
</head>

<body>
   <?php include("..\partials\header.php") ?>
   <div class="container">
      <div class="detail">
         <h1><?= $target[0]["accomodation_name"] ?></h1>
         <p><?= $target[0]["city"] . ", " . $target[0]["country"] ?></p>
         <p id="desc"><?= $target[0]["description"] ?></p>
         <p>Facility</p>
         <ul>
            <?php
            $string = $target[0]["facility"];
            $facilities = explode(", ", $string);
            foreach ($facilities as $facility) : ?>
               <li><?= $facility ?></li>
            <?php endforeach ?>
         </ul>
      </div>
      <aside>
         <img src="..\assets\hero2.jpg" alt="">
         <h2>Rooms</h2>
         <div class="card-box">
            <?php foreach ($rooms as $room) : ?>
               <div class="card">
                  <img src="..\assets\hero.jpg" alt="">
                  <div class="info">
                     <h3><?= $room["room_type"] ?></h3>
                     <p class="label"><?= $room["capacity"] ?> guests</p>
                     <div class="wrapper">
                        <ul class="facility">
                           <?php
                           $string = $room["facility"];
                           $facilities = explode(", ", $string);
                           foreach ($facilities as $facility) : ?>
                              <li class="label"><?= $facility ?></li>
                           <?php endforeach ?>
                        </ul>
                        <div class="booking">
                           <?php if (isset($_GET['DES'])) : ?>
                              <a href="accomodation.php?DES=<?= $_GET['DES'] ?>&ACM=<?= $target_id ?>&code=ROM&id=<?= $room['room_id'] ?>">Select</a>
                           <?php else : ?>
                              <a href="payment.php?ROM=<?= $room['room_id'] ?>">Book Now!</a>
                           <?php endif ?>
                           <p class="label">Inclusive for taxes</p>
                           <p class="label">/ room / night(s)</p>
                           <h3>Rp<?= number_format($room["rent_cost"], 0, '.', '') ?></h3>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endforeach ?>
         </div>
      </aside>
   </div>
</body>

</html>