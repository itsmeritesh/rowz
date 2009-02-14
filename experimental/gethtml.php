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