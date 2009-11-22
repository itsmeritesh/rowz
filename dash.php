<?php
 include_once "auth.php";
 include "dbman.php";



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
 <head>
     <title>Rowz Search - </title>
	<link rel="search" type="application/opensearchdescription+xml" title="Rowz" href="http://riteshnayak.com/rowz/ffplugin.xml">
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
    <div style="width:100%" align="center" >

	    <div style="width:768px"  valign="top" align="left">

		<form name="searchform" action="search.php" method="POST" style="margin:0px">
		<table >
		<tr><td valign="top" rowspan="2">
		   		<a href="dash.php" style="text-decoration:none"><img src="rowzfinal.JPG" border="0"></a>
			<td valign="top"><input type="text" size="50" style="" name="query" id="query"></input><br><font color="lightgray" style="font-size:110%"><i>Sample query:  php cache or networkx python </i> </font>
	<td valign="top">		    <input type="button" value="Search" onClick="validateSearch()"> 
	<td valign="top" align="right" style="width:90%"><a href="logout.php">Logout</a>
		  <tr><td valign="top"><td>
		</table>
	       </form> 
	    </div>
    <hr color="#f0f0f0">
<!-- start of the dash board -->
<div style="width:768px;">
    <table style="width:100%;height:100%;" cellpadding="0" cellspacing="0">
<tr><td style="width:75%;" valign="top">

<?php
$user_sql="select a.sid , s.title, a.name , a.entry_date , a.type from ( select store_id as sid, name,entry_date, 'Annotation' as type from rowz_annotations,rowz_users where user_id = uid and data<>'' UNION select sid, name,entry_date, case when (q_type=1) then 'Question' else 'Entry' end as type from rowz_store, rowz_users where user_id = uid ) a, rowz_store s where a.sid = s.sid and title<>'' order by entry_date desc limit 0,12";
$result=$dbcon->exec_query($user_sql);

while($row = mysql_fetch_assoc($result)){
  if($row['type']=='Entry'){
     
      $toprint="<table style='width:100%' ><tr><td style='width:32px'><img src='./".$row['type'].".png' border='0'></img><td valign='top' style='padding:10px;color:black' >".$row['name']." added an entry <br><a href=details.php?type=entry&sid=".$row['sid']." style='color:#005DB3'>".$row['title']."</a></table>";
  }
  if($row['type']=='Annotation'){

      $toprint="<table style='width:100%' ><tr><td style='width:32px'><img src='./".$row['type'].".png' border='0'></img><td valign='top' style='padding:10px;color:black' >".$row['name']." commented on the entry  <br><a href=details.php?type=entry&&sid=".$row['sid']." style='color:#005DB3'>".$row['title']."</a></table>";
  }
  if($row['type']=='Question'){
     
      $toprint="<table style='width:100%' ><tr><td style='width:32px'><img src='./".$row['type'].".png' border='0'></img><td valign='top' style='padding:10px;color:black' >".$row['name']." posted a new question <br><a href=details.php?type=entry&&sid=".$row['sid']." style='color:#005DB3'>".$row['title']."</a></table>";
  }

echo $toprint;
}

?>
<!-- start of shoutbox  -->
<td valign="top" style="width:25%">
 <div>
  <div  style="width:100%;background-color:#F9F9F9;border:2px solid #5195CE " >
  <div style="background-color:#5195CE;color:white;padding:5px" align="center"><b>Quick Tools </b> </div>
	Firefox / Flock / IE7+ users add rowz to your browser <br>
	You can use <a href="javascript:if(navigator.userAgent.indexOf('Safari')%20>=%200){Q=getSelection();}else{Q=document.selection?document.selection.createRange().text:document.getSelection();}location.href='http://riteshnayak.com/rowz/addtorepo.php?title='+document.title+'&data='+encodeURIComponent(Q)+'&dispurl='+encodeURIComponent(location.href);
">this bookmarklet</a> to highlight and store bits of info on the web.
   </div>	
 </div>
  <div  style="width:100%;background-color:#F9F9F9;border:2px solid #5195CE " >
  <div style="background-color:#5195CE;color:white;padding:5px" align="center"><b>Shoutbox </b> </div>
	<?php 
	    
    $sql="select name,data,entry_date from shouts,rowz_users where uid=user_id order by entry_date desc limit 0,5";
    $result=$dbcon->exec_query($sql);
    while($row = mysql_fetch_assoc($result)){

         $toprint="<div style='padding:2px;'><p><font color='#5BC236' >".$row['name']."</font><br><font style='margin-left:5px'>".$row['data']."</font></p></div>";
         echo $toprint;
    }
	 ?>
</div>

<br>
<!-- start of recent searches -->
 <div  style="width:100%;background-color:#F9F9F9;border:2px solid #5195CE " >
  <div style="background-color:#5195CE;color:white;padding:5px" align="center"><b>Recent Queries </b> </div>
	<?php 
	    
    $sql="select name, query from queries, rowz_users where rowz_users.uid=queries.uid order by entry_date desc limit 0,5;";
    $result=$dbcon->exec_query($sql);
    while($row = mysql_fetch_assoc($result)){

         $toprint="<div style='padding:2px;'><p><font color='#5BC236' >".$row['name']."</font><br><font style='margin-left:5px'><a href='search.php?query=".$row['query']."'  style='color:#005DB3' >".$row['query']."</a></font></p></div>";
         echo $toprint;
    }
	 ?>
</div>

</td></tr>
 </table>
</div>
   </div>
 </body>
 </html>
<?php
  function pop_shoutbox(){
 //  $con = new dbman("localhost",
 


}
?>
