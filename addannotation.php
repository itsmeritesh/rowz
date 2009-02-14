<?php
#filename: addtorepo.php

 include_once "auth.php";
 include_once "dbman.php";
 
  $sid = $_REQUEST['sid'];
  $data = $_REQUEST['data'];


 if(!empty($sid)  && !empty($data))
 {
	$dbcon->make_connect("rowz");	
	$query= " insert into rowz_annotations values ('".$data."','".$_SESSION['rowzusername']."',NOW(),".$sid.")";
	echo $query;
	$dbcon->exec_query($query);
 }	
	
	
	
	//header("location:entity.php?EntityTypeID=".$EntityTypeID."&EntityInstanceID=".$EntityInstanceID);
   //testurl: http://localhost/rowz/addannotation.php?sid=1&data=sampledata
?>
