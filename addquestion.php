<?php
#filename: addtorepo.php
  include "logger.php";
  include "auth.php";

  $mylog = new logger(2);
  $question = $_REQUEST['question'];
if(!empty($question))
 {
	$link = mysql_connect("localhost","ner","ner")
	   or die('Could not connect: ' . mysql_error());
        #echo 'Connected successfully';
        mysql_select_db('rowz') or die('Could not select database');
 	$mylog->log_write("time=".$_REQUEST['time']);
	$query= " insert into rowz_store values (NULL,'".$_SESSION['rowzusername']."',NOW(),NULL,'".$question."',NULL,NULL,1)";	
	//$con->exec_query($query);
        mysql_query($query);
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Success&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' onClick='call_hide(1)' value='Done'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

 }	
?>
