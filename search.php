<?php
 include_once "auth.php";
 include_once "dbman.php";
 $inputQuery = $_REQUEST['query'];
 $dbcon->make_connect("rowz");
 if($inputQuery!=null && !Empty($inputQuery))
   {
	$dbcon->exec_query("insert into queries values('".$inputQuery."',NOW(),'".$_SESSION['rowzusername']."')");
   }

$searchQuery = rawurlencode(stripslashes($inputQuery));
$count = $_REQUEST['count'];
$Appid = "7kw4a.zIkY0haAtP0OuTRNKIdMzYNLljVaxU";   ///////    Add your Appid here, its that easy
$Site="";   /////// Make this empty if you are building a generic web search, add your URL for site search

if(!empty($searchQuery))
 {
   if(!empty($count))
     {
      $count +=10;      
	  $results = new SimpleXMLElement('http://boss.yahooapis.com/ysearch/web/v1/'.$searchQuery.$Site.'?appid='.$Appid.'&count=10&format=xml&start='.$count,NULL,TRUE);
     }
   else
     {
      $count=10;
	  $results = new SimpleXMLElement('http://boss.yahooapis.com/ysearch/web/v1/'.$searchQuery.$Site.'?appid='.$Appid.'&count=10&format=xml',NULL,TRUE);
     }
 }
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
		  <tr><td valign="top"><td>
		</table>
	       </form> 
	    </div>
    <hr color="#f0f0f0">



    <!-- start of BOSS results  -->
<table style="width:100%">
 <?php
if(!empty($searchQuery))
  {
   foreach ($results->resultset_web->result as $result) {
?>
 
<tr><td style="padding:10px"> <b><a href=" <?=$result->clickurl?>" target="_blank" style="color:#005DB3"> 
   <?=$result->title?></a></b><br>
  <span style="color:gray"> <?=$result->abstract?></span><br>
  <span style="color:#5195CE"><?=$result->dispurl?></span>
  <br>
   <!-- start of the actions section -->
  <div id="actions"> 
     &nbsp; &nbsp;&nbsp;
      <a href="#" style="color:#5BC236">Add to repository</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" style="color:#5BC236">Add a comment</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" style="color:#5BC236">Favorite this Site</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" style="color:#5BC236">Post as Question</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
<?php
}

 if(count($results->resultset_web->result)==0)
   echo ' No results found';
}
?>

</table>
<?php
if(!empty($searchQuery))
 {
  $nextpage=$results->nextpage;
   if(!empty($nextpage)) 
    {
?>

 <br><div style="width:90%;" align="center"> 
       <a style="color:brown;margin:5px" href="ss.php?query=<?=$searchQuery?>&count=<?=$count?> "><b> Next Results >>> </b></a>
     </div>
<?php
    }
 }
?>
   </div>
 </body>
</html>
