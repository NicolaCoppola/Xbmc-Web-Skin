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
	
	<!--
	<div id="info_file">
				
					<div id="title"   >
					<a href="album.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/back.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; Album 
					
					</a></div> 
					
					<div id="playlist"><a href="album.php"></a></div>
					<div id="type"    ><a href="album.php"><img src="img/back.png" width="28" height="28"/></a></div>
					
	</div>
	!-->
	<?php
	
	album();
	$curl    = album("$json");
	
	//echo $curl;
	
	$array   = json_decode($curl,true);
	$results = $array['result']["albums"];
	
	foreach ($results as $value){ 

		
		if ($value['albumid'] == $_GET['albumid']){
		
		
			if (preg_match("/^special/", $value['thumbnail']) or preg_match("/^images/", $value['thumbnail'])) {
				$img_thumb = '<img src="http://'.$host_img.'/'.$value['thumbnail'].'" width="28" height="28" align="top" />';
			}else{
				$img_thumb = '<img src="core/img/DefaultAlbumCover.png" width="28" height="28" />';
			}
		
		echo '
	
		
		<div id="info_file">
			
					<div id="title"   > &ensp;&ensp;&ensp; '.$t_artista_music.' : '.$value['artist'].'</div> 
					<div id="playlist"></div>
					<div id="type"    >'.$img_thumb.'</div>
					
		</div>
		';
		
		}
	
	}
	
	albumcanzoni();
	$curl    = albumcanzoni("$json");	
	//echo $curl;
	
	$array   = json_decode($curl,true);
	$results = $array['result']["songs"];
	
	foreach ($results as $value){ 
	
		echo '
				
				
				<div id="info_file">
			
					<div id="title"   ><a href="play_musica.php?azione=album&albumid='.$_GET['albumid'].'&id='.$value['songid'].'&title='.$value['label'].'" target="control"> &ensp;&ensp;&ensp; '.$value['title'].'</a></div> 
					<div id="playlist"></div>
					<div id="type"    ><img src="img/play.png" width="28" height="28" /></div>
					
				</div>
				
				
		';
	
	}
	
	
?>


</div>

</body>
</html>
