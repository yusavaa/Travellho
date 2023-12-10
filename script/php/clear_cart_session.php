<?php

session_start();
unset($_SESSION["flag"]);
unset($_SESSION["cart"]);

if ($_GET['to'] == 'destination') {
   header("location: /ProjectEXPO/pages/destination.php");
} else {
   header("location: /ProjectEXPO/pages/accomodation.php");
}
exit;
