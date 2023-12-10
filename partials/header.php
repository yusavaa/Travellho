<header>
   <h3>Travello.</h3>
   <nav id="nav">
      <a href="/ProjectEXPO/index.php">Home</a>
      <a href="/ProjectEXPO/script/php/clear_cart_session.php?to=destination">Destinations</a>
      <a href="/ProjectEXPO/script/php/clear_cart_session.php?to=accomodation">Accomodation</a>
      <a href="/ProjectEXPO/pages/news.php">News</a>
      <a href="">About</a>
   </nav>
   <?php if (isset($_SESSION["login"])) : ?>
      <div class="button">
         <a class="label to-profile" href="\ProjectEXPO\pages\profile.php"><?= $_SESSION["login"]["username"] ?><span class="material-symbols-outlined">arrow_drop_down</span></a>
      </div>
   <?php else : ?>
      <div class="button">
         <a id="signin" href="\ProjectEXPO\pages\signin.php">Sign In</a>
         <a id="signup" href="\ProjectEXPO\pages\signup.php">Sign Up</a>
      </div>
   <?php endif ?>
   <span id="hamburger" class="material-symbols-outlined">menu</span>
   <script>
      const navBar = document.querySelector('#nav');

      document.querySelector('#hamburger').onclick = () => {
         navBar.classList.toggle('active');
      };
   </script>
</header>