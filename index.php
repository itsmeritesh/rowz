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
      setcookie("rowzauthenticationcookie",$cookievalue, time()+360000);
      header('location:./dash.php');
     }
   }

?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
 <head>
     <title>Rowz Search - </title>
	<script language="javascript" src="js/default.js"></script>
	<script type="text/javascript" src="js/mootools.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
	<link href="css/default.css" rel="stylesheet" type="text/css" />
        <script language="javascript">
 
	function validateSearch()
	{
	  if(isEmpty(document.getElementById("query")))
			{
				alert("Search for something!!");
				return;
			}
	  document.searchform.submit();
	}

 
	  


	
	 </script>
 </head>
 <body>
    <div id='mainbody' style="background-color:#FFFFFF;width:100%;height:100%">



	    <div style="width:100%"  valign="top">
			
		<img src="rowzfinal.JPG" border="0">
		<br>
		<table style="width:100%"><tr rowspan="2"><td style="width:75%">

<br>
<br>
<div>
<img src="./Question.png" border="0" />&nbsp;&nbsp; <b>Ask Questions based on your search results</b> 
</div>
<br>
<div>
<img src="./Entry.png" border="0" />&nbsp;&nbsp; <b>Save your search queries forever, and share your results with your team</b>
</div>
<br>
<div>
<img src="./Annotation.png" border="0" />&nbsp;&nbsp; <b>View and add comments to the questions your team mates pose</b> 
</div>

</td><td style="width:75%">
		<form  name="rowzloginform" action=""  method="POST">
	 <table style="background-color:#f0f0f0;">
	<tr><td colspan="2" align="center" style="background-color:lightgray" align="center"> Existing Users    
  	<tr><td align="right">	Username <td  align="left"><input id="username" type="text"  name="username"></input>
	<tr><td align="right">	Password <td align="left"> <input id="password" type="password" name="password"></input>
	<tr><td colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onClick="loginAction()" value="Let me in .."></input>
 	</table>
	</form>
	
	</td>
	</tr>
	<td style="width:75%"></td><td style="width:75%">
	<br><br><br>
		<form  name="signupform" action="signup.php"  method="POST">
	 <table style="background-color:#f0f0f0;">
	<tr><td colspan="2" align="center" style="background-color:lightgray" align="center"> New Users Signup    
  	<tr><td align="right">	Username <td  align="left"><input id="susername" type="text"  name="susername"></input>
	<tr><td align="right">	Password <td align="left"> <input id="spassword" type="password" name="spassword"></input>
	<tr><td align="right">	Full Name <td align="left"> <input id="sfullname" type="text" name="sfullname"></input>
	<tr><td colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onClick="signupaction()" value="Sign Me Up"></input>
	<tr><td colspan="2" align="center"> <i>Note: You will be added to the default group. Creation of groups will be done shortly :)</i>
 	</table>
	</form>
	
	</td>
			
	</table>	
			
					
	    </div>
</div>
 </body>
</html>
