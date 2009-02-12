<?php
#filename: database.php

/********mysql connection*********************/
$link = mysql_connect("localhost","ner","ner")
    or die('Could not connect: ' . mysql_error());
#echo 'Connected successfully';
mysql_select_db('rowz') or die('Could not select database');
/********************************************/

?>
