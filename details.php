<?php
include "dbman.php";
$type=$_REQUEST['type'];
$sid=$_REQUEST['sid'];
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
		   		<a href="dash.php" style="text-decoration:none"><img src="rowzfinal.JPG" border="0"></a>
			<td valign="top"><input type="text" size="50" style="" name="query" id="query"></input><br><font color="lightgray" style="font-size:110%"><i>Sample query:  php cache or networkx python</i> </font>
	<td valign="top">		    <input type="button" value="Search" onClick="validateSearch()"> 
	<td valign="top" align="right" style="width:90%"><a href="logout.php">Logout</a>
		  <tr><td valign="top"><td>
		</table>
	       </form> 
	    </div>
    <hr color="#f0f0f0">
<?php
/*Details on comments*/
//$dbcon->make_connect("rowz");
$url="";
$article="select name,title, case when (q_type=0) then 'Entry' else 'Question' end as type,UNIX_TIMESTAMP(entry_date) as time from rowz_store,rowz_users where user_id=uid and sid=".$sid;

    $result=$dbcon->exec_query($article);
    $row = mysql_fetch_assoc($result);
     $storetype = $row['type'];
//    $mainarticle = array("name" => $row['name'], "article" => $row['title'],"type" => $row['type']);
    $currdate = date("j F,Y",$row['time']);
    echo "<font color='gray'>".$currdate."</font><br><hr color='gray'><table style='width:100%' ><tr><td style='width:32px' valign='top'><img src='".$row['type'].".png' border='0'></img><td valign='top' style='padding:10px;color:black' >".$row['name']." added an entry<br><a href='#' style='color:#005DB3'>".$row['title']."</a><br>";

if($storetype=='Entry')
 {
  $entrysql="select name,data,dispurl,entry_date from rowz_store,rowz_users where user_id=uid and sid=".$sid;
   
    $return_entry=$dbcon->exec_query($entrysql);
    $values = mysql_fetch_assoc($return_entry);
    echo "<font color='gray'>".$values['data']."</font><br><font color='#5195CE'>".$values['dispurl']."</font>";
    $url=$values['dispurl'];	
 }


     //prnt related annotations  
    $sql = "select user_id,name,data from rowz_annotations,rowz_users where user_id=uid and store_id=".$sid;     
    $result2=$dbcon->exec_query($sql);
    while($row2 = mysql_fetch_assoc($result2)){

        $toprint="<br><br> <table style='width:100%' ><tr><td style='width:32px' valign='top'><img src='Annotation.png' border='0'><td><a style='color:#005DB3'  href='details.php?type=user&name=".$row2['name']."&uid=".$row2['user_id']."'>".$row2['name']."</a></h4> said <br>".$row2['data']."</table>";
	echo $toprint;
      } 
     



/*Details on users*/
?>
</table>
<form name="annotationform" action="addannotation.php" method="POST" style="margin:0px">
<font style='color:gray;font-size:120%'>  Add Comment  </font><br>
  <textarea name="comment" rows="4" cols="80"></textarea>
  <input type="hidden" name="sid" value="<?=$sid?>">
  <input type="hidden"  name="from" value="details">
  <input type="hidden" name="type" value"<?=$type?>">
  <br>
  <input type="submit" value="Add Comment">
</form>
<?php
if($storetype=='Entry')
 { 
  if(substr($url,0,4)!="http") 
   {  $url = "http://".$url; }
?>
<hr color='gray'>
<font style='color:gray;font-size:120%'>Preview: <?=$url?></font>
<hr color='gray'>
<iframe src="<?=$url?>" width="100%" height="768px"><iframe> 
<?php
}
?>
 </div>
</body>
</html>
