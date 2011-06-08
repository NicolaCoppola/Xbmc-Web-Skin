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
			
				<div id="title"   >&ensp;&ensp;&ensp; <?php echo $t_music ; ?> </div> 
				<div id="playlist"></div>
				<div id="type"    ></div>
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="sfoglia_musica.php?media=music&send=1" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/musica/Sfoglia.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_sfoglia_music ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="sfoglia_musica.php?media=music&send=1"></a></div>
					<div id="type"    ><a href="sfoglia_musica.php?media=music&send=1"><img src="img/musica/Sfoglia.png" width="28" height="28"/></a></div>
					
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="cerca_musica.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/musica/Cerca.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_cerca_music ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="cerca_musica.php"></a></div>
					<div id="type"    ><a href="cerca_musica.php"><img src="img/musica/Cerca.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="album.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/musica/Album.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_album_music ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="album.php"></a></div>
					<div id="type"    ><a href="album.php"><img src="img/musica/Album.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="artisti.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/musica/Artisti.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_artisti_music ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="artisti.php"></a></div>
					<div id="type"    ><a href="artisti.php"><img src="img/musica/Artisti.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="canzoni.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/musica/Canzoni.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_canzoni_music ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="canzoni.php"></a></div>
					<div id="type"    ><a href="canzoni.php"><img src="img/musica/Canzoni.png" width="28" height="28"/></a></div>
					
	</div>
</div>
</body>
</html>
