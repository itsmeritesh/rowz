<?php
#filename: addtorepo.php
  include_once "utils.php";
 include_once "dbman.php";
 
  $username = $_REQUEST['susername'];
  $password = $_REQUEST['spassword'];
  $fullname = $_REQUEST['sfullname'];




 if(!empty($username)  && !empty($password) && !empty($fullname))
 {
	$query ="select * from rowz_users where uid='".$username."'";
	$checkonce = $dbcon->exec_query($query);

	$rownum = mysql_num_rows($checkonce);
  	if($rownum!=0)
	{
		   echo "Username already exists, choose another!!";
	}
	else
	{
        $query= " insert into rowz_users values ('".$username."','".$fullname."',password('".$password."'),1)";
	  $dbcon->exec_query($query);
	$cookievalue =   encryptUsername($username);
      setcookie("rowzauthenticationcookie",$cookievalue, time()+3600);
      header('location:./dash.php');

	}
	
	
	
 }	
