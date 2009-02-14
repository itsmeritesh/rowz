<?php
#filename: addtorepo.php

 include_once "auth.php";
 include_once "dbman.php";


 
  $title = $_REQUEST['title'];
  $data = $_REQUEST['data'];
  $qflag =$_REQUEST['qflag'];

 if(!empty($title)  && !empty($data))
 {
	$dbcon->make_connect("rowz");	
	$query= " insert into rowz_store values (NULL,'".$_SESSION['rowzusername']."',NOW(),'".$title."','".$data."',".$qflag.")";
	echo $query;
	$dbcon->exec_query($query);
 }	
	
	
	
	//header("location:entity.php?EntityTypeID=".$EntityTypeID."&EntityInstanceID=".$EntityInstanceID);
   //testurl: http://localhost/rowz/addtorepo.php?title=thisisatesttitle&data=sampledata&qflag=0
?>
