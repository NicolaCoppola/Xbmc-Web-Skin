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
			
				<div id="title"   >&ensp;&ensp;&ensp; <?php echo $t_sistem ; ?></div> 
				<div id="playlist"></div>
				<div id="type"    ></div>
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="lingua.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/system/World.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_lingua_sistem ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="lingua.php"></a></div>
					<div id="type"    ><a href="lingua.php"><img src="img/system/World.png" width="28" height="28"/></a></div>
					
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="host.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/system/Host.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_host_sistem ; ?>  
					
					</a></div> 
					
					<div id="playlist"><a href="host.php"></a></div>
					<div id="type"    ><a href="host.php"><img src="img/system/Host.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="#" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/system/Meteo.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_meteo_sistem ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="#"></a></div>
					<div id="type"    ><a href="#"><img src="img/system/Meteo.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="#" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/system/ImgSetting.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_image_sistem ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="#"></a></div>
					<div id="type"    ><a href="#"><img src="img/system/ImgSetting.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="#" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/system/AudioSetting.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_audio_sistem ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="#"></a></div>
					<div id="type"    ><a href="#"><img src="img/system/AudioSetting.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="#" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/system/VideoSetting.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_video_sistem ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="#"></a></div>
					<div id="type"    ><a href="#"><img src="img/system/VideoSetting.png" width="28" height="28"/></a></div>
					
	</div>
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="#" target="control" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/system/Skin.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_skin_sistem ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="#" target="control"></a></div>
					<div id="type"    ><a href="#" target="control"><img src="img/system/Skin.png" width="28" height="28"/></a></div>
					
	</div>
	<div id="info_file">
				
					<div id="title"   >
					<a href="about.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/system/About.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; <?php echo $t_about_sistem ; ?> 
					
					</a></div> 
					
					<div id="playlist"><a href="about.php"></a></div>
					<div id="type"    ><a href="about.php"><img src="img/system/About.png" width="28" height="28"/></a></div>
					
	</div>
	
</div>
</body>
</html>