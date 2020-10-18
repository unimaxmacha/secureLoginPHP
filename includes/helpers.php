<?php
function pr($arr,$die='')
{
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
	if(!empty($die)) die();
}
	
function redirect($url)
{
   if(headers_sent()){
	   echo "<script>window.location.href='$url';</script>"; 
	   exit;
   }else{
	   session_write_close();
	   header("Location:$url");
	   exit; 
   }
}	

function check($field)
{   $db  =   new Database();
	$field   = trim($field);
	$field   = stripslashes($field); 
	$field   = strip_tags($field);
	$field   = mysqli_real_escape_string($db,$field);
	return $field; 
}

function base_url($add='')
{
	return ('http://').$_SERVER['HTTP_HOST'].''.PROJECT.$add;
}

function base_url_admin($add='')
{
	return ('http://').$_SERVER['HTTP_HOST'].''.PROJECT.ADMIN.$add;
}
?>