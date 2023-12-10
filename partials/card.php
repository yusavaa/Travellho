<a href="destination_detail.php?id=<?= $destination["destination_id"] ?>">
   <div class="card">
      <img src="..\assets\gallery1.jpg" alt="">
      <div class="info">
         <p class="label name"><?= $destination["destination_name"] ?></p>
         <p class="label location"><span class="material-symbols-outlined">location_on</span><?= $destination["city"] ?></p>
         <p class="label"><?= "Rp" . number_format($destination["ticket_cost"], 0, '.', '') ?></p>
      </div>
   </div>
</a>