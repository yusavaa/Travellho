<?php

function addToCart()
{
   if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      if (!isset($_SESSION['cart'][$_GET['id']])) {
         $_SESSION["cart"][$_GET['code']] = $_GET['id'];
      } else {
         $_SESSION["cart"]['des'] = $_GET['id'];
      }
   }
   return $_SESSION['cart'] ?? null;
}
