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

$titolo   = $_GET["title"];

$album_id = $_GET['albumid'];

$artist_id= $_GET['artistid'];

$play_id  = $_GET['id'];

$azione   = $_GET['azione'];




// Album ------------------------------------------------------- Album ------------------------------------------------------- Album

if ( $play_id != null and $album_id != null and $azione == "album" ){ 

$json1 = '{"jsonrpc": "2.0", "method": "AudioPlaylist.Clear", "id": 1}';
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_URL, $hostjsonrpc);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $json1);
$prova1 = curl_exec($ch1);
curl_close($ch1);


echo $prova1;


$json2 = '{"jsonrpc": "2.0", "method": "AudioPlaylist.Add", "params": { "item": { "albumid": '.$album_id.' } }, "id": 1}';




$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_URL, $hostjsonrpc);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $json2);
$prova2 = curl_exec($ch2);
curl_close($ch2);


echo $prova2;

$json = '{"jsonrpc":"2.0","method":"AudioPlaylist.Play","id ":2,"params":{"songid":'.$play_id.'}}';

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL, $hostjsonrpc);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

$prova = curl_exec($ch);
curl_close($ch);

echo $prova;

if (preg_match("/true/", $prova)) {
	
		echo '<li class="cat" ><a href="#"          >'.$titolo.' : In riproduzione</a></li>';
	
	}else{
		echo '<li class="cat" ><a href="#"          >'.$titolo.' : riproduzione non avviata correttamente</a></li>';
	}
	
	

}



// artisti ------------------------------------------------------- artisti ------------------------------------------------------- artisti



if ( $play_id != null and $artist_id != null and $azione == "artisti"){ 

$json1 = '{"jsonrpc": "2.0", "method": "AudioPlaylist.Clear", "id": 1}';
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_URL, $hostjsonrpc);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $json1);
$prova1 = curl_exec($ch1);
curl_close($ch1);


//echo $prova1;

$json2 = '{"jsonrpc": "2.0", "method": "AudioPlaylist.Add", "params": { "item": { "artistid": '.$artist_id.' } }, "id": 1}';

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_URL, $hostjsonrpc);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $json2);
$prova2 = curl_exec($ch2);
curl_close($ch2);


//echo $prova2;


$json = '{"jsonrpc":"2.0","method":"AudioPlaylist.Play","id ":2,"params":{"songid":'.$play_id.'}}';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL, $hostjsonrpc);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

$prova = curl_exec($ch);
curl_close($ch);

//echo $prova;

if (preg_match("/true/", $prova)) {
	
		echo '<li class="cat" ><a href="#"          >'.$titolo.' : In riproduzione</a></li>';
	
	}else{
		echo '<li class="cat" ><a href="#"          >'.$titolo.' : riproduzione non avviata correttamente</a></li>';
	}

}

// Canzoni ------------------------------------------------------- Canzoni ------------------------------------------------------- Canzoni

if ( $play_id != null and $azione == "test" ){ 

$json1 = '{"jsonrpc": "2.0", "method": "AudioPlaylist.Clear", "id": 1}';
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_URL, $hostjsonrpc);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $json1);
$prova1 = curl_exec($ch1);
curl_close($ch1);

//echo $prova1;

$json ='{"jsonrpc": "2.0", "method": "XBMC.Play", "params": { "songid": '.$play_id.' }, "id": 1}';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL, $hostjsonrpc);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

$prova = curl_exec($ch);
curl_close($ch);

//echo $prova;



}

?>

</ul>

<?php
include('remote.php');
?>	

</body>
</html>

