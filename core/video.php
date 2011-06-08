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
			
				<div id="title"   >&ensp;&ensp;&ensp; <?php echo $t_videos ; ?> </div> 
				<div id="playlist"></div>
				<div id="type"    ></div>
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="sfoglia_video.php?media=video&send=1" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/video/Sfoglia.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_sfoglia_videos ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="sfoglia_video.php?media=video&send=1"></a></div>
					<div id="type"    ><a href="sfoglia_video.php?media=video&send=1"><img src="img/video/Sfoglia.png" width="28" height="28"/></a></div>
					
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="cerca_video.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/video/Cerca.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_cerca_videos ; ?>   
					
					</a></div> 
					
					<div id="playlist"><a href="cerca_video.php"></a></div>
					<div id="type"    ><a href="cerca_video.php"><img src="img/video/Cerca.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="film.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/video/Film.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_film_videos ; ?>   
					
					</a></div> 
					
					<div id="playlist"><a href="film.php"></a></div>
					<div id="type"    ><a href="film.php"><img src="img/video/Film.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="stagionitv.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/video/Stagioni.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_stagioni_videos ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="stagionitv.php"></a></div>
					<div id="type"    ><a href="stagionitv.php"><img src="img/video/Stagioni.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="musicvideo.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/video/Musicvideo.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_musica_videos ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="musicvideo.php"></a></div>
					<div id="type"    ><a href="musicvideo.php"><img src="img/video/Musicvideo.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="tvvdr.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/video/Vdr.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_livetv_videos ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="tvvdr.php"></a></div>
					<div id="type"    ><a href="tvvdr.php"><img src="img/video/Vdr.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="play.php?metodo=file&id=dvd://1/&title=DVD Play" target="control" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/video/Dvd.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_dvd_videos ; ?>   
					
					</a></div> 
					
					<div id="playlist"><a href="play.php?metodo=file&id=dvd://1/&title=DVD Play" target="control"></a></div>
					<div id="type"    ><a href="play.php?metodo=file&id=dvd://1/&title=DVD Play" target="control"><img src="img/video/Dvd.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="artisti.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/video/BlueRay.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_blue_videos ; ?>   
					
					</a></div> 
					
					<div id="playlist"><a href="artisti.php"></a></div>
					<div id="type"    ><a href="artisti.php"><img src="img/video/BlueRay.png" width="28" height="28"/></a></div>
					
	</div>
	
</div>
</body>
</html>
