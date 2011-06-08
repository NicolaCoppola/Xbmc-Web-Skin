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
	
$send        = $_GET['send'];
$back_folder = $_GET['back'];

if ($send == "1" ){

	media();
	$curl    = media("$json");

	//echo $curl;

	$array   = json_decode($curl,true);
	$results = $array['result']["shares"];
	
	foreach ($results as $value){ 
				
		$img_thumb_cambia  = 'core/img/video/Folder.png';
		 
			echo ' 
					<div id="info_file">
						
							<div id="title"   ><a href="?media=video&send='.($send+1).'&directory='.$value['file'].'&back=1" onMouseOver="window.parent.document.getElementById(\'img_cambia\').src=(';
							
							echo "'$img_thumb_cambia'";
							echo');" onmouseout="window.parent.document.getElementById(\'img_cambia\').src=(';
							echo "'css/img/xbmc.png'";
							
							echo');">&ensp;&ensp;&ensp; '.$value['label'].'</a></div> 
							<div id="playlist"><a href="?media=video&send='.($send+1).'&directory='.$value['file'].'&back=1"></a></div>
							<div id="type"    ><a href="?media=video&send='.($send+1).'&directory='.$value['file'].'&back=1">';
							
							echo "$img_thumb";
							
							echo '</a></div>
							
					</div>
			';
		
	}
	
	dirmedia();
	$curl1    = dirmedia("$json");

	$array1   = json_decode($curl1,true);
	$result1 = $array1['result']["files"];
	

	
	foreach ($results1 as $value){ 
				
		$img_thumb_cambia  = 'core/img/video/Video.png';
		 
			echo ' 
					<div id="info_file">
						
							<div id="title"   ><a href="play.php?metodo=file&id='.$value['file'].'&title='.$value['label'].'" target="control" onMouseOver="window.parent.document.getElementById(\'img_cambia\').src=(';
							
							echo "'$img_thumb_cambia'";
							echo');" onmouseout="window.parent.document.getElementById(\'img_cambia\').src=(';
							echo "'css/img/xbmc.png'";
							
							echo');">&ensp;&ensp;&ensp; '.$value['label'].'</a></div> 
							<div id="playlist"><a href="play.php?metodo=file&id='.$value['file'].'&title='.$value['label'].'" target="control"></a></div>
							<div id="type"    ><a href="play.php?metodo=file&id='.$value['file'].'&title='.$value['label'].'" target="control">';
							
							echo "$img_thumb";
							
							echo '</a></div>
							
					</div>
			';
		
	}
	



}else{
	
	
	
	
	echo '
	<div id="info_file">
				
					<div id="title"   >
					<a href="?media=video&send='.($send-1).'&directory='.$back_folder.'" 
					onMouseOver="window.parent.document.getElementById(\'img_cambia\').src=(\'core/img/back.png\');" 
					onMouseOut="window.parent.document.getElementById(\'img_cambia\').src=(\'core/img/xbmc.png\');">&ensp;&ensp;&ensp; '.$t_indietro.' 
					
					</a></div> 
					
					<div id="playlist"><a href="?media=video&send='.($send-1).'&directory='.$back_folder.'"></a></div>
					<div id="type"    ><a href="?media=video&send='.($send-1).'&directory='.$back_folder.'"><img src="img/back.png" width="28" height="28"/></a></div>
	
	';
	
	
	
	
	dirmedia();
	$curl    = dirmedia("$json");

	//echo $curl;
	
	$array   = json_decode($curl,true);
	$results = $array['result']["directories"];

	
	foreach ($results as $value){ 
				
		$img_thumb_cambia  = 'core/img/video/Folder.png';
		 
			echo ' 
					<div id="info_file">
						
							<div id="title"   ><a href="?media=video&send='.($send+1).'&directory='.$value['file'].'&back='.$_GET['directory'].'" onMouseOver="window.parent.document.getElementById(\'img_cambia\').src=(';
							
							echo "'$img_thumb_cambia'";
							echo');" onmouseout="window.parent.document.getElementById(\'img_cambia\').src=(';
							echo "'css/img/xbmc.png'";
							
							echo');">&ensp;&ensp;&ensp; '.$value['label'].'</a></div> 
							<div id="playlist"><a href="?media=video&send='.($send+1).'&directory='.$value['file'].'&back='.$_GET['directory'].'"></a></div>
							<div id="type"    ><a href="?media=video&send='.($send+1).'&directory='.$value['file'].'&back='.$_GET['directory'].'">';
							
							echo "$img_thumb";
							
							echo '</a></div>
							
					</div>
			';
		
	}

	$results = $array['result']["files"];

	
	foreach ($results as $value){ 
				
		$img_thumb_cambia  = 'core/img/video/Video.png';
		 
			echo ' 
					<div id="info_file">
						
							<div id="title"   ><a href="play.php?metodo=file&id='.$value['file'].'&title='.$value['label'].'" target="control" onMouseOver="window.parent.document.getElementById(\'img_cambia\').src=(';
							
							echo "'$img_thumb_cambia'";
							echo');" onmouseout="window.parent.document.getElementById(\'img_cambia\').src=(';
							echo "'css/img/xbmc.png'";
							
							echo');">&ensp;&ensp;&ensp; '.$value['label'].'</a></div> 
							<div id="playlist"><a href="play.php?metodo=file&id='.$value['file'].'&title='.$value['label'].'" target="control"></a></div>
							<div id="type"    ><a href="play.php?metodo=file&id='.$value['file'].'&title='.$value['label'].'" target="control">';
							
							echo "$img_thumb";
							
							echo '</a></div>
							
					</div>
			';
		
	}
	
}


	
?>
</div>

</body>
</html>