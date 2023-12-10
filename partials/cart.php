<?php if ($_SESSION['flag'] == true) : ?>
   <aside>
      <div class="progress">
         <div class="progress-step">
            <p class="step-number">1</p>
            <h3>Destination</h3>
            <p class="vertical-line"></p>
            <?php if (isset($carts['DES'])) : ?>
               <div class="progress-card">
                  <img src="..\assets\gallery2.jpg" alt="">
                  <div class="info">
                     <p class="label tag-name"><?= $des_target[0]['destination_name'] ?></p>
                     <p class="label"><?= $des_target[0]['city'] ?></p>
                     <p class="label"><?= number_format($des_target[0]['ticket_cost'], 0, '.', '') ?></p>
                  </div>
               </div>
            <?php else : ?>
               <div></div>
            <?php endif ?>
            <p class="step-number">2</p>
            <h3>Accomodation</h3>
            <p class="vertical-line"></p>
            <?php if (isset($carts['ROM'])) : ?>
               <div class="progress-card">
                  <img src="..\assets\gallery2.jpg" alt="">
                  <div class="info">
                     <p class="label tag-name"><?= $rom_target[0]['accomodation_name'] ?></p>
                     <p class="label"><?= $rom_target[0]['room_type'] ?></p>
                     <p class="label"><?= number_format($rom_target[0]['rent_cost'], 0, '.', '') ?></p>
                  </div>
               </div>
            <?php else : ?>
               <div></div>
            <?php endif ?>
            <p class="step-number">3</p>
            <h3>Payment</h3>
            <p class="vertical-line"></p>
            <div></div>
            <p class="step-number">4</p>
            <h3>Enjoy</h3>
         </div>
         <div class="progress-button">
            <?php if (isset($_SESSION['cart']['DES']) && count($_SESSION['cart']) == 4 ) : ?>
               <a class="button" href="accomodation.php?DES=<?= $carts['DES'] ?>">Next</a>
            <?php endif ?>
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) == 5) : ?>
            <a class="button payment-button" href="payment.php">Pay Now</a>
            <?php endif ?>
         </div>
      </div>
   </aside>
<?php endif ?>