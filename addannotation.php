<?php
#filename: addtorepo.php

 include_once "auth.php";
 include_once "dbman.php";
 
  $sid = $_REQUEST['sid'];
  $comment = $_REQUEST['comment'];
  $from = $_REQUEST['from'];



 if(!empty($sid)  && !empty($comment))
 {
	
	$query= " insert into rowz_annotations values ('".$comment."','".$_SESSION['rowzusername']."',NOW(),".$sid.")";
	$dbcon->exec_query($query);
	if($from != null)
	$redirecturl = "location:details.php?entry=".$_REQUEST['type']."&sid=".$sid;
	header($redirecturl);
	//echo $redirecturl;
	//echo "Success<br><input type='button' onClick='call_hide(1)' value='Done'>";
 }	


if(empty($sid) && $from==null)
 {
	  $title = $_REQUEST['title'];
	  $data = $_REQUEST['data'];
	  $dispurl = $_REQUEST['dispurl'];

  	//insert into store
	$query= " insert into rowz_store values (NULL,'".$_SESSION['rowzusername']."',NOW(),NULL,'".$title."','".$data."','".$dispurl."',0)";	
 	 $dbcon->exec_query($query);
	
	//get the max sid for relating to the comment
	$results = $dbcon->exec_query("select max(sid) from rowz_store");

	if(mysql_num_rows($results) == 1)
	{
	 $row = mysql_fetch_array($results);
	 $sid = $row[0];
	 $query= " insert into rowz_annotations values ('".$comment."','".$_SESSION['rowzusername']."',NOW(),".$sid.")";
	mysql_query($query);
	echo "Success<br><input type='button' onClick='call_hide(1)' value='Done'>";
	}
        
 }	
	
	
	//header("location:entity.php?EntityTypeID=".$EntityTypeID."&EntityInstanceID=".$EntityInstanceID);
   //testurl: http://localhost/rowz/addannotation.php?title=testtitle&data=sampledata&dispurl=http://blah.com&comment=samplecomment
?>
