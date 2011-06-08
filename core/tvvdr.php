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
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="tvvdr_cerca.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/vdr/Cerca.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_cerca_livetv ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="tvvdr_cerca.php"></a></div>
					<div id="type"    ><a href="tvvdr_cerca.php"><img src="img/vdr/Cerca.png" width="28" height="28"/></a></div>
					
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="canali.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/vdr/CanaliVdr.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_canali_livetv ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="canali.php"></a></div>
					<div id="type"    ><a href="canali.php"><img src="img/vdr/CanaliVdr.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="rec.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/vdr/RecVdr.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_rec_livetv ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="rec.php"></a></div>
					<div id="type"    ><a href="rec.php"><img src="img/vdr/RecVdr.png" width="28" height="28"/></a></div>
					
	</div>
	
</div>

</body>
</html>
