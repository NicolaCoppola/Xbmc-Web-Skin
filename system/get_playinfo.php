<ul id="list">
<?php

/* ---------------------------------------------------------------
|
| INIZIO XBMC WEB ADMIN 
| AUTORE   : Nicola Coppola
| VERSIONE : 0.1
| 
| Supporto : mac86project.altervista.org/xmbc
|
--------------------------------------------------------------- */

require('../core/config_freamwork.php');
require('../core/json_call.php');

	
	statoplayer();
	$curl    = statoplayer("$json");
	
	//echo $curl;
	
	$array   = json_decode($curl,true);
	
	// prelevo le informazioni relative al player attivo 
	$audio   = $array['result']["audio"];
	$image   = $array['result']["picture"];
	$video   = $array['result']["video"];


if ( $curl == NULL ){

echo '
				
				<!-- --------------------------------------------------------------------------------------- START Info play --------------- !-->
					<div id="informazioni_play">
						<!-- inizio div logo xbmc !-->
							<div id="image_play">
								<img src="css/img/no_server.png">
							</div>
						<!-- fine   div logo xbmc !-->
							<!-- inizio pulsante spegnimento host !-->
								<div id="info_play1" ontouchstart="">
										<strong>Xbmc Status</strong> <em></em>
								</div>
							<!-- Fine  pulsante spegnimento host !-->
							<!-- inizio pulsante apertura preferiti !-->
								<div id="title_play" ontouchstart="">
										<strong>Not started</strong> <em></em>
								</div>
							<!-- fine  pulsante apertura preferiti !-->
						<!-- inizio div contenete preloder caricamento ajax !-->
							<div id="time_play">
							
								<strong>Host : '.$host.'</strong> <em></em>
								
							</div>
						<!-- Fine div contenete preloder caricamento ajax !-->
					</div>
				<!-- --------------------------------------------------------------------------------------- FINE  info play  --------------- !-->

				';
				


}


if ( ($audio+$image+$video) == 0 and $curl != NULL ){

echo '
				
				<!-- --------------------------------------------------------------------------------------- START Info play --------------- !-->
					<div id="informazioni_play">
						<!-- inizio div logo xbmc !-->
							<div id="image_play">
								<img src="css/img/no_play.png">
							</div>
						<!-- fine   div logo xbmc !-->
							<!-- inizio pulsante spegnimento host !-->
								<div id="info_play1" ontouchstart="">
										<strong>Xbmc Status</strong> <em></em>
								</div>
							<!-- Fine  pulsante spegnimento host !-->
							<!-- inizio pulsante apertura preferiti !-->
								<div id="title_play" ontouchstart="">
										<strong>OK</strong> <em></em>
								</div>
							<!-- fine  pulsante apertura preferiti !-->
						<!-- inizio div contenete preloder caricamento ajax !-->
							<div id="time_play">
							
								<strong>Nothing Playing</strong> <em></em>
								
							</div>
						<!-- Fine div contenete preloder caricamento ajax !-->
					</div>
				<!-- --------------------------------------------------------------------------------------- FINE  info play  --------------- !-->

				';
				


}

if ($audio == 1 ){
	
	
	
		playnowAudio();
		$curl    = playnowAudio("$json");
		
		//echo $curl;
		
		$array    = json_decode($curl,true);
		
		$results  = $array['result']["items"];
		
		$n_play   = $array['result']["state"];
		
		
		//echo $n_play['current'] ;
		
		
		$i =0 ;
			
			foreach ($results as $value){ 
			
				if ( $i == $n_play['current'] ) {
				
					
					if ( $value['thumbnail'] != NULL ){
						
							$img = 'http://'.$host_img.'/'.$value['thumbnail'].'';
						
						}else{
						
							$img = 'css/img/DefaultAudio.png';
						
					};
				
				
				echo '
				
				<!-- --------------------------------------------------------------------------------------- START Info play --------------- !-->
					<div id="informazioni_play">
						<!-- inizio div logo xbmc !-->
							<div id="image_play">
								<img src="'.$img.'">
							</div>
						<!-- fine   div logo xbmc !-->
							<!-- inizio pulsante spegnimento host !-->
								<div id="info_play1" ontouchstart="">
										<strong>'.$value['artist'].'</strong> <em></em>
								</div>
							<!-- Fine  pulsante spegnimento host !-->
							<!-- inizio pulsante apertura preferiti !-->
								<div id="title_play" ontouchstart="">
										<strong>'.$value['label'].'</strong> <em></em>
								</div>
							<!-- fine  pulsante apertura preferiti !-->
						<!-- inizio div contenete preloder caricamento ajax !-->
							<div id="time_play">
							
								<strong>'.$value['genre'].'</strong> <em></em>
								
							</div>
						<!-- Fine div contenete preloder caricamento ajax !-->
					</div>
				<!-- --------------------------------------------------------------------------------------- FINE  info play  --------------- !-->

				';
				
				}
				
				$i++;
				
				
			}
	
	
}

if ($video == 1 ){
	
	
	
		playnowVideo();
		$curl    = playnowVideo("$json");
		
		//echo $curl;
		
		$array    = json_decode($curl,true);
		
		$results  = $array['result']["items"];
		
		$n_play   = $array['result']["state"];
		
		
		//echo $n_play['current'] ;
		
		
		$i =0 ;
			
			foreach ($results as $value){ 
			
				if ( $i == $n_play['current'] ) {
				
					
					if ( $value['thumbnail'] != NULL ){
						
							$img = 'http://'.$host_img.'/'.$value['thumbnail'].'';
						
						}else{
						
							$img = 'css/img/DefaultVideo.png';
						
					};
				
				
				echo '
				
				<!-- --------------------------------------------------------------------------------------- START Info play --------------- !-->
					<div id="informazioni_play">
						<!-- inizio div logo xbmc !-->
							<div id="image_play">
								<img src="'.$img.'">
							</div>
						<!-- fine   div logo xbmc !-->
							<!-- inizio pulsante spegnimento host !-->
								<div id="info_play1" ontouchstart="">
										<strong>'.$value['year'].'</strong> <em></em>
								</div>
							<!-- Fine  pulsante spegnimento host !-->
							<!-- inizio pulsante apertura preferiti !-->
								<div id="title_play" ontouchstart="">
										<strong>'.$value['label'].'</strong> <em></em>
								</div>
							<!-- fine  pulsante apertura preferiti !-->
						<!-- inizio div contenete preloder caricamento ajax !-->
							<div id="time_play">
							
								<strong>'.$value['genre'].'</strong> <em></em>
								
							</div>
						<!-- Fine div contenete preloder caricamento ajax !-->
					</div>
				<!-- --------------------------------------------------------------------------------------- FINE  info play  --------------- !-->

				';
				
				}
				
				$i++;
				
				
			}
	
	
}	
	
	
	
?>
</ul>