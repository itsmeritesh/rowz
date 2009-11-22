<?php
$type=$_REQUEST['type'];
if($type=='repo'){

$html="<table style='position:relative;left:40'>
<tr><td>Add this as your Question <br><textarea name='question' id='question' rows=4 cols=50></textarea></td></tr>
<tr><td><input type='button' value='Add as Question' onclick='send_question()'/>&nbsp;&nbsp;<input type='button' value='Cancel' onclick='call_hide(1)'/></td></tr>";
echo $html;

}
if($type=='ques_con'){
$html="<h3>Your Request was successful</h3>";
echo $html;
}
?>

<?php
include 'dbman.php';
$dbcon->make_connect('rowz');

function pop_store(){

$user_sql="select a.sid , s.title, a.name , a.entry_date , a.type from ( select store_id as sid, name,entry_date, 'Annotation' as type from rowz_annotations,rowz_users where user_id = uid UNION select sid, name,entry_date, case when (q_type=1) then 'Question' else 'Entry' end as type from rowz_store, rowz_users where user_id = uid) a, rowz_store s where a.sid = s.sid order by entry_date desc limit 0,12";
$result=$dbcon->exec_query($sql);

while($row = mysql_fetch_assoc($result)){
  if($row['type']=='Entry'){
     
      $toprint="<p><h4>".$row['name']."</h4> added an entry <br><a href=details.php?type=entry&&sid=".$rows['sid'].">".$rows['title']."</a></p>";
  }
  if($row['type']=='Anotation'){

      $toprint="<p><h4>".$row['name']."</h4> commented on <br><a href=details.php?type=annotation&&sid=".$rows['sid'].">".$rows['title']."</a></p>";
  }
echo $toprint;
}
}


?>
