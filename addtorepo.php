<?php
#filename: addtorepo.php

 include "auth.php";
 include "dbman.php";

  $title = $_REQUEST['title'];
  $data = $_REQUEST['data'];
  $dispurl = $_REQUEST['dispurl'];


  $dbcon->make_connect("rowz");	
 //$dbcon->log("inserting : ".$question );

 
 if(!empty($title)  && !empty($data))
 {

	$query= " insert into rowz_store values (NULL,'".$_SESSION['rowzusername']."',NOW(),NULL,'".$title."','".$data."','".$dispurl."',0)";	
	$dbcon->exec_query($query);
	echo 'Done :)';
 }	


	//header("location:entity.php?EntityTypeID=".$EntityTypeID."&EntityInstanceID=".$EntityInstanceID);
   //testurl for repo additions: http://localhost/rowz/addtorepo.php?title=thisisatesttitle&data=sampledata&dispurl=http://blah
   //testurl for question addition : http://localhost/rowz/addtorepo.php?question=thisisasamplequestion
  //bookmarklet javascript:if(navigator.userAgent.indexOf('Safari')%20>=%200){Q=getSelection();}else{Q=document.selection?document.selection.createRange().text:document.getSelection();}location.href='http://localhost/rowz/addtorepo.php?title='+document.title+'&data='+encodeURIComponent(Q)+'&dispurl='+encodeURIComponent(location.href);





