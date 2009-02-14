<?php
#filename: addtorepo.php

 include_once "auth.php";
 include_once "dbman.php";

  $title = $_REQUEST['title'];
  $data = $_REQUEST['data'];
  $question = $_REQUEST['question'];
  $con = new dbman("localhost","ner","ner");
  $con->make_connect("rowz");	
 $con->log("inserting : ".$question );

 
 if(!empty($title)  && !empty($data))
 {

	$query= " insert into rowz_store values (NULL,'".$_SESSION['rowzusername']."',NOW(),'".$title."','".$data."',0)";	
	$con->exec_query($query);
	echo 'Added Success';
 }	


	//header("location:entity.php?EntityTypeID=".$EntityTypeID."&EntityInstanceID=".$EntityInstanceID);
   //testurl for repo additions: http://localhost/rowz/addtorepo.php?title=thisisatesttitle&data=sampledata&qflag=0
   //testurl for question addition : http://localhost/rowz/addtorepo.php?question=thisisasamplequestion
?>

