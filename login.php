<?php 
  include_once "utils.php";
   include_once "dbchecks.php";

  if(isset($_COOKIE["rowzauthenticationcookie"]))
   {	
	$cookievalue = $HTTP_COOKIE_VARS["rowzauthenticationcookie"];		
	$username =  decryptUsername($cookievalue);
	//write authentication type
	if(check_user($username)) 
	{
	 	header('location:./dash.php');			
	}
	else
	{
	    echo  "Login to access the service";
	}
	/*echo "cookie =".$cookievalue;
	echo "<br> decrpted value=".$username;
	$encuname = encryptUsername("ritesh");
	echo "<br> encrypted username =".$encuname; */
   }  
 else
   {
     $username = $_REQUEST['username'];
     $password = $_REQUEST['password'];
 
     if(!empty($username) && !empty($password))
     {
      //write authentication code
      $cookievalue =   encryptUsername($username);
      setcookie("rowzauthenticationcookie",$cookievalue, time()+3600);
      header('location:./dash.php');
     }
   }

?>  
<html>
 <head>
    <title>Login </title>
   <script language="javascript" src="js/default.js"></script>

 </head>
 <body>
    <h2></h2>
        <form name="rowzloginform" action=""  method="POST">
	 <table>
  	<tr><td align="right">	Username <td  align="left"><input id="username" type="text"  name="username"></input>
	<tr><td align="right">	Password <td align="left"> <input id="password" type="password" name="password"></input>
	<tr><td colspan="2"> <input type="button" onClick="loginAction()" value="Let me in .."></input>
 	</table>
	</form>
 </body>
</html>
