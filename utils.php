<?php
 
  function convert($str,$ky=''){
	if($ky=='')return $str;
	$ky=str_replace(chr(32),'',$ky);
	if(strlen($ky)<8)exit('key error');
	$kl=strlen($ky)<32?strlen($ky):32;
	$k=array();for($i=0;$i<$kl;$i++){
	$k[$i]=ord($ky{$i})&0x1F;}
	$j=0;for($i=0;$i<strlen($str);$i++){
	$e=ord($str{$i});
	$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e);
	$j++;$j=$j==$kl?0:$j;}
	return $str;
  } 

   function encryptUsername($username)
  	{
		 $key='rowzauthsecretkey'; // 8-32 characters without spaces
		 return convert($username,$key);
	}
  function decryptUsername($inputname)
	{
		$key='rowzauthsecretkey'; // 8-32 characters without spaces
	  	return convert($inputname,$key);
	}

?>
