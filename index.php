<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <?php include("partials/base.php") ?>

   <link rel="stylesheet" href="style\partials\header.css">
   <link rel="stylesheet" href="style\pages\index.css">
</head>

<body>
   <?php include("partials\header.php") ?>
   <div class="container-hero">
      <div class="hero">
         <div class="info">
            <h3>Enjoy your trip &</h3>
            <h1 class="tagline">Discover the <br><span id="auto-type"></span></h1>
            <p>Over hundreds of destinations and accommodations for you to explore, have an unforgettable experience.</p>
         </div>
      </div>
      <p id="package-sign">Find a Package</p>
      <section class="package-wrapper">
         <form action="pages/destination.php" method="post">
            <div class="package-form">
               <div class="column">
                  <span class="material-symbols-outlined">location_on</span>
                  <div class="input">
                     <label for="location">Location</label><br>
                     <select name="location" id="location">
                        <option value="">Indonesia</option>
                     </select>
                  </div>
               </div>
               <div class="column">
                  <span class="material-symbols-outlined">account_balance_wallet</span>
                  <div class="input">
                     <label for="budget">Budget</label><br>
                     <select name="budget" id="budget">
                        <option value="999999999">Unlimited</option>
                        <option value="500000">Rp500.000</option>
                        <option value="1000000">Rp1.000.000</option>
                        <option value="1500000">Rp1.500.000</option>
                     </select>
                  </div>
               </div>
               <div class="column">
                  <span class="material-symbols-outlined">calendar_month</span>
                  <div class="input">
                     <label for="checkin">Check In</label><br>
                     <input type="date" name="checkin" id="checkin">
                  </div>
               </div>
               <div class="column">
                  <span class="material-symbols-outlined">calendar_month</span>
                  <div class="input">
                     <label for="checkout">Check Out</label><br>
                     <input type="date" name="checkout" id="checkout">
                  </div>
               </div>
               <button type="submit" name="submit">Find</button>
            </div>
         </form>
      </section>
   </div>
   <div class="container-content">
      <h2>Wonderful Indonesia</h2>
      <section class="gallery">
         <div class="row">
            <div class="img-large">
               <img src="assets\gallery1.jpg" alt="">
               <p>Destination Name</p>
            </div>
            <div class="img-small">
               <img src="assets\gallery2.jpg" alt="">
               <p>Destination Name</p>
            </div>
         </div>
         <div class="row">
            <div class="img-small">
               <img src="assets\gallery3.jpg" alt="">
               <p>Destination Name</p>
            </div>
            <div class="img-large">
               <img src="assets\gallery4.jpg" alt="">
               <p>Destination Name</p>
            </div>
         </div>
      </section>
   </div>

   <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
   <script>
      var typed = new Typed("#auto-type", {
         strings: ["Sedih Ga EXPO", "Capek Banget"],
         typeSpeed: 150,
         backSpeed: 150,
         loop: true
      })
   </script>
</body>

</html>