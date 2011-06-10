<?php

// Fix Bug Ip

if (file_exists('../core/host_setting.php')) {
	include('../core/host_setting.php');


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

	// control of status

	// 1 : imposto i dati per il curl della pagina che contiene i dati
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,$hostjsonrpc);
	if(!empty($username)&&!(empty($password))){
		curl_setopt($curl_handle,CURLOPT_USERPWD,"$username:$password");
	}
	curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	// 2 : Effettuo il download della pagina
	$risultato_curl = curl_exec($curl_handle);
	// Chiudo il download
	curl_close($curl_handle);

	if ($risultato_curl != NULL ){ 
		$host_status = 1;  
	}
}else{
	$host         = "Please set your ip";
	$host_status  = 0;
}

//echo $hostjsonrpc ;
//include('core/config_freamwork.php');
if (isset($NumRow) && $NumRow!=0){
	echo '<!-- start #info_text -->
	        <div id="info_text">
	            <li class="riproduzione">Attention!</li>
	            <li class="album">Problem with AJAX</li>
	        </div>
	        <!-- end #info_text -->

	        <!-- start #info_image -->
	        <div id="info_image">
	            <img src="css/img_menu/no_photo.png" class="reflect"/>
	        </div>
			<!-- end #info_image -->
			';
}else{

	$path_info_play="http://$host_name:$host_port/xbmcCmds/xbmcHttp?command=GetCurrentlyPlaying()?nocache='%20+%20new%20Date().getTime();";

	// 1 : imposto i dati per il curl della pagina che contiene i dati
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,$path_info_play);

	if(!empty($username)&&!(empty($password))){
		curl_setopt($curl_handle,CURLOPT_USERPWD,"$username:$password");
	}
	curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);

	// 2 : Effettuo il download della pagina
	$risultato_curl = curl_exec($curl_handle);

	// Chiudo il download
	curl_close($curl_handle);

	//<li class="album">Selezionare un file dal menu</li>

	$str2  = str_replace("<html>"  ,'<li class="start_file">', $risultato_curl);
	$str3  = str_replace("<li>"    ,'</li><li class="', $str2);
	$str4  = str_replace(":"       ,'">', $str3);
	$str5  = str_replace("</html>" ,'</li>', $str4);

	$str6  = str_replace("File size" ,'File_size', $str5);

	// parte per il brano


	// tolgo i tag html
	$str1  = str_replace("<html>" , "" ,          $risultato_curl);
	$str2  = str_replace("</html>", "|",          $str1);
	// tolgo i punti e virgola e li sostituisco con un marcatore
	$str3  = str_replace(";"      , "|",          $str2);
	// tolgo i marcatori per l'indice puntato con il marcatore
	$str4  = str_replace("<li>"   , "|",          $str3);

	// espolodo i valoro contenuti tra i marcatori in un array
	$array_risultato = explode('|', $str4);
	// conto i dati dell'array
	$conto_dati      = count($array_risultato);

	$no_url   = str_replace("URL:/" , "|"    , $array_risultato[1]);
	$no_tag   = str_replace("/" , "|"       , $no_url);

	$file_risultato = explode('|', $no_tag);
	$conto_file_dati= count($file_risultato);

	$n_brano = ($conto_file_dati-1);
	$name = $file_risultato[$n_brano];

	//echo '<pre>';print_r($array_risultato);echo '</pre>';// lavoro sul tempo e durata

	if($conto_dati>6){
		$photo_file  = ($conto_dati-7);
		$time        = ($conto_dati-6);
		$duration    = ($conto_dati-5);
		$percentuale = ($conto_dati-4);


		$foto    = str_replace("Thumb:"       , "" ,$array_risultato[$photo_file]);
		$tempo   = str_replace("Time:"       , "" , $array_risultato[$time]);
		$durata  = str_replace("Duration:"   , "" , $array_risultato[$duration]);
		$percen  = str_replace("Percentage:" , "" , $array_risultato[$percentuale]);
	} else {
		$foto = '';
	}
	// controllo sulla foto
	if (!preg_match("/DefaultAlbumCover/", $foto)) {
		$path_foto   = 'http://'.$host_img.'/'.$foto.'';
	} else {
		$path_foto   = 'css/img_menu/no_photo.gif';
	}

	if ( $host_status == 0) {

		$img_load = '<img src="css/img_menu/no_server.png"/>' ;
		$response = 'Checking the connection to the server.';
		$response1= 'Unable to connect to: '.$host.'';

	}else{
		$img_load = '<img src="css/img_menu/no_play.png"/>' ;
		$response = 'Nothing Playing';
		$response1= 'Connection Status : OK';
	}

	// The "i" after the pattern delimiter indicates a case-insensitive search
	if (!preg_match("[Nothing Playing]", $name)) {
		if ( $host_status == 1) {

			echo'
	<!-- start #info_text -->
			<div id="info_text">
				<li class="riproduzione">Now Playing</li>
				'.$str6.'
				<li class="canzone">'.$name.'</li>
				<li class="tempo">'.$tempo.'/'.$durata.' - ( '.$percen.'% )</li>
			</div>
			<!-- end #info_text -->

			<!-- start #info_image -->
			<div id="info_image">
				<img src="'.$path_foto.'"/>
			</div>
	<!-- end #info_image -->
	';
		}
	}
	echo'
	<!-- start #info_text -->
        <div id="info_text" >
            <li class="riproduzione">'.$response.'</li>
			<li class="canzone"></li>
			<li class="tempo">'.$response1.'</li>
        </div>
    <!-- end #info_text -->

    <!-- start #info_image -->
        <div id="info_image" >'.$img_load.'</div>
	<!-- end #info_image -->
';

	// chiudo controllo
}
?>
