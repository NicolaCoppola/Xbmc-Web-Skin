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

// Carico tutt i file php Richiesti 
require('config_freamwork.php');
require('json_call.php');
global $json;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- Includo il Css per in base al broswer  !-->
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
<!-- Includo il freamwork  !-->
	<script type="text/javascript" src="js/core.js"></script>
</head>
<body>

<?php 

include('function/scroll.php');


require('lingua_setting.php');

require ('../language/'.$lingua.'/'.$lingua.'.php');
?>

<div id="sfoglia_file_menu">
	
	
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="video.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/back.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_videos ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="video.php"></a></div>
					<div id="type"    ><a href="video.php"><img src="img/back.png" width="28" height="28"/></a></div>
					
	</div>
	
	
	<?php
	
	film();
	$curl    = film("$json");
	
	//echo $curl;
	
	$array   = json_decode($curl,true);
	$results = $array['result']["movies"];
	
	foreach ($results as $value){ 
		
		
		if (isset($value['thumbnail']) && (preg_match("/^special/", $value['thumbnail']) or preg_match("/^images/", $value['thumbnail']))) {
				
				$img_thumb         = '<img src="http://'.$host_img.'/'.$value['thumbnail'].'" width="18" height="28" />';
				$img_thumb_cambia  = 'http://'.$host_img.'/'.$value['thumbnail'].'';
				$img_sfondo_cambia = 'http://'.$host_img.'/'.$value['fanart'].'';
				
				
				
			}else{
				
				$img_thumb         = '<img src="img/DefaultAlbumCover.png" width="18" height="28" />';
				$img_thumb_cambia  = 'core/img/DefaultAlbumCover.png';
				$img_sfondo_cambia = 'css/img/video.jpg';
			}
		
		if (isset($_GET['Submit']) && $_GET['Submit'] == "Cerca"){
		
			$ricerca = $_GET['ricerca'];
			$ricerca2= ucfirst(strtolower($ricerca)); 
			
			if ( preg_match("%$ricerca%", $value['label']) or preg_match("%$ricerca2%", $value['label']) ) {
			
				$response='
				
				
				<div id="info_file">
				
					<div id="title"   >
					<a href="film_cerca.php" 
					onMouseOver="window.parent.document.getElementById(\'img_cambia\').src=(\'core/img/back.png\');" 
					onMouseOut="window.parent.document.getElementById(\'img_cambia\').src=(\'core/img/xbmc.png\');">&ensp;&ensp;&ensp; '.$t_back.'
					
					</a></div> 
					
					<div id="playlist"><a href="film_cerca.php"></a></div>
					<div id="type"    ><a href="film_cerca.php"><img src="img/back.png" width="28" height="28"/></a></div>
					
				</div>
				
				
				';
				
				echo ' 
				<div id="info_file">
					
						<div id="title"   ><a href="film_info.php?id='.$value['movieid'].'&title='.$value['label'].'" onClick="InfoApri()" target="info"  onMouseOver="CambiaImmagine(';
						
						echo "'$img_thumb_cambia','$img_sfondo_cambia'";
						echo');" onmouseout="RipritinaImmagine(';
						echo "'css/img/xbmc.png'";
						
						echo');">&ensp;&ensp;&ensp; '.$value['label'].'</a></div> 
						<div id="playlist"><a href="film_info.php?id='.$value['movieid'].'&title='.$value['label'].'" target="info" onClick="InfoApri()"></a></div>
						<div id="type"    ><a href="film_info.php?id='.$value['movieid'].'&title='.$value['label'].'" target="info" target="info" onClick="InfoApri()">';
						
						echo "$img_thumb";
						
						echo '</a></div>
						
				</div>
				';
				
			
			}
			
		}else{
		 
				//echo '<li class="cat"><a href="album_canzoni.php?&albumid='.$value['albumid'].'&title='.$value['album_title'].'">'.$img_thumb.' &nbsp;&nbsp;&nbsp; '.$value['album_title'].'</a></li>';
				
				echo ' 
				<div id="info_file">
					
						<div id="title"   ><a href="film_info.php?id='.$value['movieid'].'&title='.$value['label'].'" onClick="InfoApri()" target="info"  onMouseOver="CambiaImmagine(';
						
						echo "'$img_thumb_cambia','$img_sfondo_cambia'";
						echo');" onmouseout="RipritinaImmagine(';
						echo "'css/img/xbmc.png'";
						
						echo');">&ensp;&ensp;&ensp; '.$value['label'].'</a></div> 
						<div id="playlist"><a href="film_video.php?id='.$value['movieid'].'&title='.$value['label'].'" target="info" onClick="InfoApri()"><img src="img/video/movie_icon.png" width="28" height="28" /></a></div>
						<div id="type"    ><a href="film_info.php?id='.$value['movieid'].'&title='.$value['label'].'" target="info" target="info" onClick="InfoApri()">';
						
						echo "$img_thumb";
						
						echo '</a></div>
						
				</div>
				';
				
				
		
		}
		
	}
	
echo $response;
	
?>
</div>

</body>
</html>