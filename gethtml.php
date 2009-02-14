<?php
 include "logger.php";
 $log = new logger(2);

$type=$_REQUEST['type'];


if($type=='repo'){
 $title = $_REQUEST['title'];
 $log->log_write("called gethtml with:".$type." and title =".$title);
$html="<table style='position:relative;left:40'>
<tr><td>Add this as your Question <br><textarea name='question' id='question' rows=4 cols=50>".strip_tags($title)."</textarea></td></tr>
<tr><td><input type='button' value='Add as Question' onclick='send_question()'/>&nbsp;&nbsp;<input type='button' value='Cancel' onclick='call_hide(1)'/></td></tr>";
echo $html;

}

?>
