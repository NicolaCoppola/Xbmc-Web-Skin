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
					<a href="stagioni_id_id.php?season=<?php echo $_GET['season']; ?>&episodes=<?php echo $_GET['episodes']; ?>" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/back.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_episoditv  ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="stagioni_id_id.php?season=<?php echo $_GET['season']; ?>&episodes=<?php echo $_GET['episodes']; ?>"></a></div>
					<div id="type"    ><a href="stagioni_id_id.php?season=<?php echo $_GET['season']; ?>&episodes=<?php echo $_GET['episodes']; ?>"><img src="img/back.png" width="28" height="28"/></a></div>
					
	</div>
	
	<?php
	
	stagioniepisodifile();
	$curl    = stagioniepisodifile("$json");
	
	//echo $curl;
	
	$array   = json_decode($curl,true);
	$results = $array['result']["episodes"];
	
	foreach ($results as $value){ 

		
		if ($value['episodeid'] == $_GET['id']){
		
	
		echo '
	
		
		<div id="info_file">
			
					<div id="titolo"   > &ensp;&ensp;&ensp; '.$value['label'].'</div> 
					<div id="playlist"></div>
					<div id="type"    ><a href="play.php?metod=episodeid&id='.$value['file'].'&title='.$value['label'].'" target="control"><img src="img/play.png" width="28" height="28" /></a></div>
					
		</div>
		<div id="info_file">
			
					<div id="title"   > &ensp;&ensp;&ensp; '.$t_stagione_videos.' : '.$value['season'].'</div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
		</div>
		<div id="info_file">
			<div id="trama"   >
				<a href="play.php?metod=episodeid&id='.$value['file'].'&title='.$value['label'].'" target="control">'.$value['plot'].'</a>
			</div>
		</div>
		
		
			
		';
		
		
		}
		
	}
	
?>
</div>

</body>
</html>