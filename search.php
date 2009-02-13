<?php
$searchQuery = rawurlencode(stripslashes($_REQUEST['query']));
$count = $_REQUEST['count'];
$Appid = "";   ///////    Add your Appid here, its that easy
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
	function validateSearch()
	{
	  if(isEmpty(document.getElementById("query")))
			{
				alert("Search for something!!");
				return;
			}
	  document.searchform.submit();
	}
	
	 </script>
 </head>
 <body >
    <div style="width:100%" >

	    <div style="width:100%" >
		<form name="searchform" action="search.php" method="POST" style="margin:0px">
		    Rowz Search <input type="text" size="50" style="" name="query" id="query"></input>
		    <input type="button" value="Search" onClick=""> 
	       </form> 
	    </div>
    <hr color="#f0f0f0">



    <!-- start of BOSS results  -->
 <?php
if(!empty($searchQuery))
  {
   foreach ($results->resultset_web->result as $result) {
?>
 <b><a href=" <?=$result->clickurl?>" target="_blank" style="color:#005DB3"> 
   <?=$result->title?></a></b><br>
  <span style="color:gray"> <?=$result->abstract?></span><br>
  <span style="color:#5195CE"><?=$result->dispurl?></span>
  <br><br>
<?php
}
 if(count($results->resultset_web->result)==0)
   echo ' No results found';
}

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
