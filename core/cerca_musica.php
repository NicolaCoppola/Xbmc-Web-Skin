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
					<a href="music.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/back.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_music ; ?>   
					
					</a></div> 
					
					<div id="playlist"><a href="music.php"></a></div>
					<div id="type"    ><a href="music.php"><img src="img/back.png" width="28" height="28"/></a></div>
					
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="album_cerca.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/musica/cerca_album.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_cerca_album ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="album_cerca.php"></a></div>
					<div id="type"    ><a href="album_cerca.php"><img src="img/musica/cerca_album.png" width="28" height="28"/></a></div>
					
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="artisti_cerca.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/musica/cerca_artisti.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_cerca_artista ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="artisti_cerca.php"></a></div>
					<div id="type"    ><a href="artisti_cerca.php"><img src="img/musica/cerca_artisti.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="canzoni_cerca.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/musica/cerca_canzoni.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_cerca_canzone ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="canzoni_cerca.php"></a></div>
					<div id="type"    ><a href="canzoni_cerca.php"><img src="img/musica/cerca_canzoni.png" width="28" height="28"/></a></div>
					
	</div>
	
</div>
</body>
</html>
