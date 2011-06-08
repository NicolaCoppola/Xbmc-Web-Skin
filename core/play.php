<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>.: Xbmc Web control :.</title>
<!-- Includo il Css per in base al broswer  !-->
	<link href="css/blackberry.css" rel="stylesheet" type="text/css"/>
	<link href="css/menu_style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<ul>
					<li class="title">Xbmc BlackBerry Remote</li>
					<li class="back"><a href="index.php  ">Home</a></li>

<?php 

/* ---------------------------------------------------------------
|
| INIZIO FREAMWORK 
| AUTORE   : Nicola Coppola
| VERSIONE : 0.1
| 
| Supporto : mac86project.altervista.org/xmbc
|
--------------------------------------------------------------- */
 
require('config_freamwork.php');

$id       = urlencode($_GET["id"]);
$titolo   = $_GET["title"];
$metodo   = $_GET["metod"];

// avvio riproduzione in base all'id

if ( $metodo != "" ){

$path_play=''.$host.'xbmcCmds/xbmcHttp?command=PlayFile('.$id.')';


// 1 : imposto i dati per il curl della pagina che contiene i dati 
$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,$path_play);


curl_setopt($curl_handle,CURLOPT_USERPWD,"$username:$password"); 
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);

// 2 : Effettuo il download della pagina 
$risultato_curl = curl_exec($curl_handle);
curl_close($ch);


	if (preg_match("/OK/", $risultato_curl)) {
	
		echo '<li class="cat" ><a href="#"          >'.$titolo.' : In riproduzione</a></li>';
	
	}else{
		echo '<li class="cat" ><a href="#"          >'.$titolo.' : riproduzione non avviata correttamente</a></li>';
	}


}else{

// avvio riproduzione FILE


$path_play=''.$host.'xbmcCmds/xbmcHttp?command=PlayFile('.$id.')';


// 1 : imposto i dati per il curl della pagina che contiene i dati 
$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,$path_play);


curl_setopt($curl_handle,CURLOPT_USERPWD,"$username:$password"); 
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);

// 2 : Effettuo il download della pagina 
$risultato_curl = curl_exec($curl_handle);


	if (preg_match("/OK/", $risultato_curl)) {
		
		echo '<li class="cat" ><a href="#"          >'.$titolo.' : In riproduzione</a></li>';
	
	}else{
		echo '<li class="cat" ><a href="#"          >'.$titolo.' : riproduzione non avviata correttamente </a></li>';
	}


}


?>

</ul>
	
</body>
</html>

