<?php
 session_start();
 unset($_SESSION['silverfishUser']);
  setcookie ("rowzauthenticationcookie", "", time() - 3600);
 header("location:index.php");

?>
