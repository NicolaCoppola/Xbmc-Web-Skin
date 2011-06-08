<?php 

//include('../core/config_freamwork.php');
include('core/config_freamwork.php');

$path_meteo="http://$host_name:$host_port/xbmcCmds/xbmcHttp?command=GetSystemInfoByName(weather.location;weather.temperature;weather.conditions)";


// 1 : imposto i dati per il curl della pagina che contiene i dati 
$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,$path_meteo);


curl_setopt($curl_handle,CURLOPT_USERPWD,"$username:$password"); 
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);

// 2 : Effettuo il download della pagina 
$risultato_curl = curl_exec($curl_handle);

// 3 : Chiudi il download
curl_close($curl_handle);



	$str1  = str_replace("<html>" , "" ,          $risultato_curl);
	$str2  = str_replace("</html>", "|",          $str1);
	// tolgo i marcatori per l'indice puntato con il marcatore 
	$str3  = str_replace("<li>"   , "|",          $str2);	
	$str4  = str_replace("°C"     , "" ,          $str3);
	$str5  = str_replace(","      , "|" ,          $str4);


// espolodo i valoro contenuti tra i marcatori in un array 
$array_meteo = explode('|', $str5);
$temperatura     = '<li> '.$array_meteo[3].' C°</li>' ;
$tempo_testo = $array_meteo[4];


// BELLO
if (preg_match('/^Bello/', $tempo_testo))                     { $temperatura_img = '<img src="css/img_meteo/sunny.png" title="'.$tempo_testo.'"/>'; };
// MOLTO CHIARO
if (preg_match('/^Molto Chiaro/', $tempo_testo))              { $temperatura_img = '<img src="css/img_meteo/sunny.png" title="'.$tempo_testo.'"/>'; };
//MOLTO SOLEGGIATO
if (preg_match('/^Molto Soleggiato/', $tempo_testo))          { $temperatura_img = '<img src="css/img_meteo/sunny.png" title="'.$tempo_testo.'"/>'; };
// ROVERSCI
if (preg_match('/^Rovesci/', $tempo_testo))                   { $temperatura_img = '<img src="css/img_meteo/lshowers.png" title="'.$tempo_testo.'"/>'; };
// POCO ROVESCI
if (preg_match('/^Poco Rovesci/', $tempo_testo))              { $temperatura_img = '<img src="css/img_meteo/lshowers.png" title="'.$tempo_testo.'"/>'; }; 

// Leggera Pioggia Tardi
if (preg_match('/^Leggera Pioggia/', $tempo_testo))     { $temperatura_img = '<img src="css/img_meteo/showers.png"   title="'.$tempo_testo.'"/>'; };
// Leggera Pioggi / Nebbia
//if (preg_match('/^Leggera Pioggia / Nebbia/', $tempo_testo))  { $temperatura_img = '<img src="css/img_meteo/showers.png"   title="'.$tempo_testo.'"/>'; };
// Nebbie
if (preg_match('/^Nebbie/', $tempo_testo))                    { $temperatura_img = '<img src="css/img_meteo/fog.png"   title="'.$tempo_testo.'"/>'; };
if (preg_match('/^Nebbia/', $tempo_testo))                    { $temperatura_img = '<img src="css/img_meteo/fog.png"   title="'.$tempo_testo.'"/>'; };
// Leggera Neve e Windy e Nebbia
if (preg_match('/^Leggera Neve/', $tempo_testo))              { $temperatura_img = '<img src="css/img_meteo/rainsnow.png"   title="'.$tempo_testo.'"/>'; };
// neve
if (preg_match('/^Neve/', $tempo_testo))                      { $temperatura_img = '<img src="css/img_meteo/snowshow.png"   title="'.$tempo_testo.'"/>'; };
// MOLTO NUVOLOSO
if (preg_match('/^Molto Nuvoloso/', $tempo_testo))            { $temperatura_img = '<img src="css/img_meteo/fog.png"   title="'.$tempo_testo.'"/>'; };






?>