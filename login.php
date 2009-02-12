<?php 
  include_once "utils.php";
  //include_once "database.php";
  if(isset($_COOKIE["rowzauthenticationcookie"]))
   {
	$cookievalue = $HTTP_COOKIE_VARS["rowzauthenticationcookie"];	
	$username =  decryptUsername($cookievalue);
	//write authentication type
	if($username=='ritesh') 
	{
	 	header("location:dash.php");	
	}
	echo "cookie =".$cookievalue;
	echo "<br> decrpted value=".$username;
	$encuname = encryptUsername("ritesh");
	echo "<br> encrypted username =".$encuname;
   }  

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
 
   //write authentication code
   $cookievalue =   encryptUsername($username);
  if(!isset($_COOKIE["rowzauthenticationcookie"]))
      setcookie("rowzauthenticationcookie",$cookievalue, time()+3600);
?>  
<html>
 <head>
    <title>Login </title>

<script language="javascript">
	   
	   document.onkeydown = checkKeycode

		function isEmpty(Obj)
		{
			var Val = Obj.value;
	
			if(Val.length==0) return true;
	
			for(var i=0; i< Val.length; i++)
			{
					if( " \t\n".indexOf( Val.charAt(i)) == -1 ) 
					return false;
			}
			return true;
		}
		
		
		function loginAction()
		{
			if(isEmpty(document.getElementById("username")))
			{
				alert("You did not provide your Username");
				return;
			}
			if(isEmpty(document.getElementById("password")))
			{
				alert("You did not provide your Password");
				return;
			}
			document.rowzloginform.submit();
		}

		function checkKeycode(e) 
		        {
		          var keycode;
		          if (window.event) keycode = window.event.keyCode;
		             else if (e) keycode = e.which;
		          if(keycode == 13)
		             {
		               loginAction();
		            }
		         }

	 
	 </script>
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
