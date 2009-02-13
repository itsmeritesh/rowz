<?php
include 'dbman.php';
function auth_user($username,$password){
    $dbcon=new dbman("localhost","ner","ner");
    $dbcon->make_connect("rowz");
    $query = "select uid from rowz_users where uid='".$username."' and password=password('".$password."')";
    //echo $query;
    $result=$dbcon->exec_query($query);
    if($result==null){
        return -1;
    }
    else{
    $row = mysql_fetch_assoc($result);
     return $row['uid'];
    }
}
function check_user($username){
   $dbcon=new dbman("localhost","ner","ner");
   $dbcon->make_connect("rowz");
   $query = "select uid from rowz_users where uid='".$username."'";
   $result=$dbcon->exec_query($query);
    if($result!=null&&mysql_num_rows($result)==1){
        return 1;
    }
   else return -1;
}


?>
