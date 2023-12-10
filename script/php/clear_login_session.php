<?php

session_start();
unset($_SESSION["login"]);

header("Location: /ProjectEXPO/index.php");
exit;