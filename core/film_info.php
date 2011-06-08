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
	<script type="text/javascript" src="js/flowplayer-3.2.6.min.js"></script>
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
					<a href="film.php" 
					onMouseOver="RipritinaImmagine('core/img/back.png');" 
					onMouseOut="RipritinaImmagine('core/img/xbmc.png');">&ensp;&ensp;&ensp; Film 
					
					</a></div> 
					
					<div id="playlist"><a href="film.php"></a></div>
					<div id="type"    ><a href="film.php"><img src="img/back.png" width="28" height="28"/></a></div>
					
	</div>
	!-->
	<?php
	
	film();
	$curl    = film("$json");
	
	//echo $curl;
	
	$array   = json_decode($curl,true);
	$results = $array['result']["movies"];
	
	foreach ($results as $value){ 

		
		if ($value['movieid'] == $_GET['id']){
		
		
			if (preg_match("/^special/", $value['thumbnail']) or preg_match("/^images/", $value['thumbnail'])) {
				$img_thumb = '<img src="http://'.$host_img.'/'.$value['thumbnail'].'" width="70" height="105" align="top" />';
			}else{
				$img_thumb = '<img src="css/DefaultAlbumCover.png" width="90" height="125" />';
			}
		
		//echo'<a href="play.php?metod=movieid&id='.$value['movieid'].'&title='.$value['label'].'" target="control">'.$img_thumb.'</a>';
		
		echo '
	
		
		<div id="info_file">
			
					<div id="titolo"   > &ensp;&ensp;&ensp; '.$value['label'].'</div> 
					<div id="playlist"></div>
					<div id="type"    ><a href="play.php?metod=movieid&id='.$value['file'].'&title='.$value['label'].'" target="control"><img src="img/play.png" width="28" height="28" /></a></div>
					
		</div>
		<div id="info_file">
			
					<div id="title"   > &ensp;&ensp;&ensp; '.$t_anno_videos.'    : '.$value['year'].'</div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
		</div>
		<div id="info_file">
			
					<div id="title"   > &ensp;&ensp;&ensp; '.$t_regista_videos.' : '.$value['director'].'</div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
		</div>
		<div id="info_file">
			
					<div id="title"   > &ensp;&ensp;&ensp; '.$t_genere_videos.' : '.$value['genre'].'</div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
		</div>
		<div id="info_file">
			<div id="trama"   >
				<a href="play.php?metod=movieid&id='.$value['file'].'&title='.$value['label'].'" target="control">'.$value['plot'].'</a>
			</div>
		</div>
		
		
			
		';
		
		
		}
		
	}
	
?>
</div>

</body>
</html>