<?php
  include_once "utils.php";

  if(!isset($_COOKIE["rowzauthenticationcookie"]))
   {
	location('header:login.php');
	//after authenticating user	
   }
 else
  {
	$cookievalue = $HTTP_COOKIE_VARS["rowzauthenticationcookie"];		
	$username =  decryptUsername($cookievalue);
	
	unset($_SESSION['rowzusername']);
	session_start();	
	$_SESSION['rowzusername'] = $username;
   }
?>

