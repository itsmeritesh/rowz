<?php
#filename: addtorepo.php

 include_once "auth.php";
 include_once "dbman.php";
 
  $sid = $_REQUEST['sid'];
  $comment = $_REQUEST['comment'];
$title = $_REQUEST['title'];
  $data = $_REQUEST['data'];


  $dbcon->make_connect("rowz");	
 if(!empty($sid)  && !empty($data))
 {
	
	$query= " insert into rowz_annotations values ('".$data."','".$_SESSION['rowzusername']."',NOW(),".$sid.")";
	echo $query;
	$dbcon->exec_query($query);
	echo "Success<br><input type='button' onClick='call_hide(1)' value='Done'>";
 }	


if(empty($sid))
 {
  	//insert into store
	$query= " insert into rowz_store values (NULL,'".$_SESSION['rowzusername']."',NOW(),'".$title."','".$data."',0)";	
 	 $dbcon->exec_query($query);
	
	//get the max sid for relating to the comment
	$results =exec_query("select max(sid) from rowz_store");

	if(mysql_num_rows($results) == 1)
	{
	 $row = mysql_fetch_assoc($result);
	 $sid = $row[0];
	 $query= " insert into rowz_annotations values ('".$comment."','".$_SESSION['rowzusername']."',NOW(),".$sid.")";
	echo "Success<br><input type='button' onClick='call_hide(1)' value='Done'>";
	}
        
 }	
	
	
	//header("location:entity.php?EntityTypeID=".$EntityTypeID."&EntityInstanceID=".$EntityInstanceID);
   //testurl: http://localhost/rowz/addannotation.php?sid=1&data=sampledata
?>
