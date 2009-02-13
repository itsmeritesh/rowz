 <?php

include 'logger.php';

class dbman{

 private $servername;
 private $username;
 private $password;
 private $connection;
 private $dbname;
 private $dblog;

function __construct($server,$user,$pass) {
	//print "Initialized";
        $this->servername=$server;
	$this->username=$user;
	$this->password=$pass;
	$this->dblog=new logger(2);
	}


function __destruct() {
	
       mysql_close($this->connection);
       print "destroyed";
   }

function make_connect($db){

$con = mysql_connect($this->servername,$this->username,$this->password);
if (!$con)
  {
    die('Could not connect: ' . mysql_error());
    $this->dblog->log_write(" Error Connection failed " . mysql_error());
  }
else {
$this->connection=$con;
$this->dbname=$db;
mysql_select_db($this->dbname);
$this->dblog->log_write(" Connected to " . $this->servername );
    }

}

/* generic selects,updates,truncates and deletes*/

function exec_query($text){

   $result = mysql_query($text);
   return $result;
   
}

/* Updates tablename with associate array valueset */

function exec_update($tablename,$valueset,$condition) {
$count=0;
$updatestring="";

foreach( $valueset as $key => $value){
	if($count==0){
		$updatestring=$updatestring.$key."=".$value;				
		$count=$count+10;	
	}
	else{
		$updatestring=$updatestring.",".$key."=".$value;
	
	}
		
}
if(empty($condition)){
$update_query="update ".$tablename." set ".$updatestring ;
}
else{

$update_query="update ".$tablename." set ".$updatestring." ".$condition ;
}
$this->dblog->log_write(" Updating ".$tablename.":".$update_query );
mysql_query($update_query);
//echo $update_query;
}

/*Inserts both named and unnamed unnamed type=1, unnamed type=2*/

function exec_insert($tablename,$type,$valueset){

$values="";
$count=0;
$cols="";
foreach( $valueset as $key => $value){

if($count==0){
	$cols=$cols.$key;
	$values=$values.$value;
	$count=$count+10;	
	}
	
	else{
	$cols="$cols".",".$key;
	$values=$values.",".$value;

	}

}
if($type==1){
$query= "insert into ".$tablename." values(".$values.")";
}
if($type==2){
$query="insert into ".$tablename."(".$cols.") values(".$values.")";
}
//echo $query;
$this->dblog->log_write(" Inserting to  ".$tablename.":".$query );
mysql_query($query);

}




}

?>