<?php
session_start();

require '..\script\php\db_conn.php';

if (isset($_SESSION['cart'])) {
   $destination = query("SELECT * FROM locations JOIN destinations USING (location_id) WHERE destination_id =" . $_SESSION['cart']['DES']);
   $accomodation = query("SELECT * FROM rooms JOIN accomodations USING (accomodation_id) WHERE room_id=" . $_SESSION['cart']['ROM']);

   $destination_name = $destination[0]['destination_name'];
   $destination_ticket = number_format($destination[0]['ticket_cost'], 0, '.', '');
   $destination_location = $destination[0]['city'] . ", " . $destination[0]['country'];

   $accomodation_name = $accomodation[0]['accomodation_name'];
   $accomodation_room_type = $accomodation[0]['room_type'];
   $accomodation_room_cost = number_format($accomodation[0]['rent_cost'], 0, '.', '');
} else {
   if (isset($_GET['DES'])) {
      $destination = query("SELECT * FROM locations JOIN destinations USING (location_id) WHERE destination_id =" . $_GET['DES']);

      $destination_name = $destination[0]['destination_name'];
      $destination_ticket = number_format($destination[0]['ticket_cost'], 0, '.', '');
      $destination_location = $destination[0]['city'] . ", " . $destination[0]['country'];

      $accomodation_room_cost = 0;
   }
   if (isset($_GET['ROM'])) {
      $accomodation = query("SELECT * FROM rooms JOIN accomodations USING (accomodation_id) JOIN locations USING (location_id) WHERE room_id=" . $_GET['ROM']);

      $destination_ticket = 0;
      $destination_location = $accomodation[0]['city'] . ", " . $accomodation[0]['country'];

      $accomodation_name = $accomodation[0]['accomodation_name'];
      $accomodation_room_type = $accomodation[0]['room_type'];
      $accomodation_room_cost = number_format($accomodation[0]['rent_cost'], 0, '.', '');
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

   <link rel="stylesheet" href="..\style\partials\header.css">
   <link rel="stylesheet" href="..\style\pages\payment.css">
</head>

<body>
   <?php include("..\partials\header.php") ?>
   <div class="container">
      <div class="wrapper">
         <div class="info">
            <h3>Username Plan</h3>
            <?php if (isset($_SESSION['cart']['DES']) || isset($_GET['DES'])) : ?>
               <div class="des-card">
                  <p class="title col-span">Destination</p>
                  <p class="label"><?= $destination_name ?></p>
                  <p class="label self-end"><?= "Rp" . $destination_ticket ?></p>
                  <p class="label"><?= $destination_location ?></p>
               </div>
            <?php endif ?>
            <?php if (isset($_SESSION['cart']['ROM']) || isset($_GET['ROM'])) : ?>
               <div class="acc-card">
                  <p class="title col-span">Accomodation</p>
                  <p class="label col-span"><?= $accomodation_name ?></p>
                  <p class="label"><?= $accomodation_room_type ?></p>
                  <p class="label self-end"><?= "Rp" . $accomodation_room_cost ?></p>
                  <p class="label"><?= $destination_location ?></p>
               </div>
            <?php endif ?>
         </div>
         <p class="label tag-label">PAYMENT METHOD</p>
         <div class="payment-method">
            <input type="radio" name="payment" id="payment1">
            <label for="payment1">Credit / Debit Card</label>
            <span class="material-symbols-outlined">credit_card</span>
         </div>
         <div class="payment-method">
            <input type="radio" name="payment" id="payment2">
            <label for="payment2">PayPal</label>
            <span class="material-symbols-outlined">paid</span>
         </div>
         <div class="payment-method">
            <input type="radio" name="payment" id="payment3">
            <label for="payment3">Pay Later</label>
            <span class="material-symbols-outlined">schedule</span>
         </div>
         <div class="payment-method">
            <input type="radio" name="payment" id="payment4">
            <label for="payment4">Merchants</label>
            <span class="material-symbols-outlined">local_convenience_store</span>
         </div>
      </div>
      <div class="bill">
         <p id="summary">Order Summary</p>
         <div class="bill-detail">
            <p class="label">Order ID</p>
            <p class="label self-end">#FJ399</p>
            <p class="label">Price</p>
            <p class="label self-end"><?= "Rp" . $destination_ticket + $accomodation_room_cost ?></p>
            <p class="label">Service Fee</p>
            <p class="label self-end">Rp10000</p>
            <input class="col-span" type="text" maxlength="10" placeholder="Code">
            <p class="label">Total Amount</p>
            <p class="label self-end"><?= "Rp" . $destination_ticket + $accomodation_room_cost + 10000 ?></p>
            <div class="total-amount col-span">
               <p>Grand Total</p>
               <p><?= "Rp" . $destination_ticket + $accomodation_room_cost + 10000 ?></p>
            </div>
            <a class="col-span" href="">Checkout</a>
            <p class="term col-span">Note: by completing this payment, i agree with Travello Term of service.</p>
         </div>
      </div>
   </div>
</body>

</html>