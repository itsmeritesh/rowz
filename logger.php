<?php

class logger{

private $type;

function __construct($logtype) {
       $this->type=$logtype;
  }    

function log_write($text){
        if($this->type == 2){
	    
	    $fh = fopen("./Logs/dblog.txt", 'a') or die("can't open file");
	    $stringData = "DBMan :".$text."\n";
	    fwrite($fh, $stringData);
	    fclose($fh);

	  }	   
 }

}

?>
