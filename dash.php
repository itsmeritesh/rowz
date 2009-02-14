<?php
 include_once "auth.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
 <head>
     <title>Rowz Search - </title>
	<script language="javascript" src="js/default.js"></script>
	<link href="css/default.css" rel="stylesheet" type="text/css" />
        <script language="javascript">
       document.onkeydown = checkKeycode
	function validateSearch()
	{
	  if(isEmpty(document.getElementById("query")))
			{
				alert("Search for something!!");
				return;
			}
	  document.searchform.submit();
	}

      function checkKeycode(e) 
        {
          var keycode;
         if (window.event) keycode = window.event.keyCode;
          else if (e) keycode = e.which;
         if(keycode == 13)
            {
              validateSearch();
            }
         }

	
	 </script>
 </head>
 <body >
    <div style="width:100%" >

	    <div style="width:100%"  valign="top">

		<form name="searchform" action="search.php" method="POST" style="margin:0px">
		<table >
		<tr><td valign="top" rowspan="2">
		   		<img src="rowzfinal.JPG" border="0">
			<td valign="top"><input type="text" size="50" style="" name="query" id="query"></input><br><font color="lightgray" style="font-size:110%"><i>Sample query:  java.util.date formatting for dd/mm/yyyy</i> </font>
	<td valign="top">		    <input type="button" value="Search" onClick="validateSearch()"> 
	<td valign="top" align="right" style="width:90%"><a href="logout.php">Logout</a>
		  <tr><td valign="top"><td>
		</table>
	       </form> 
	    </div>
    <hr color="#f0f0f0">
   </div>
 </body>
 </html>
