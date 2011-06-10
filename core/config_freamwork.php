<?php
if (file_exists('host_setting.php')) {
	include('host_setting.php');	
}else{
	$host_name ="localhost"; 
	$host_port ="8080";
	$host_user ="xbmc";
	$host_pass ="xbmc";
}
if ( $host_port != NULL ){
	$http_ip      = $host_name.':'.$host_port; 
}else{
	$http_ip      = $host_name;
}
$hostjsonrpc  = "$http_ip/jsonrpc";
$host_http    = "http://$http_ip/";
$host         = "$http_ip/";
$host_img     = "$http_ip/vfs";
$username     = $host_user;
$password     = $host_pass;
//echo $hostjsonrpc ;
?>