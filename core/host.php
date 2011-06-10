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
$error = 'no';
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

?>

<div id="sfoglia_file_menu">
	
	
	<div id="info_file">
				
					<div id="title"   >
					<a href="system.php" 
					onMouseOver="window.parent.document.getElementById('img_cambia').src=('core/img/back.png');" 
					onMouseOut="window.parent.document.getElementById('img_cambia').src=('core/img/xbmc.png');">&ensp;&ensp;&ensp; Setting 
					
					</a></div> 
					
					<div id="playlist"><a href="system.php"></a></div>
					<div id="type"    ><a href="system.php"><img src="img/back.png" width="28" height="28"/></a></div>
					
	</div>
	

	
	<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Change Host Connection Details</div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
	</div>


<?php
if (!isset($_GET['host_name'])){

	if (file_exists('host_setting.php')) {
	
		include('host_setting.php');
	
	}
	
	echo '<form id="form" name="form" method="get" action="host.php">';
	
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="host_name" name="host_name" value="'.$host_name.'"/></div> 
					<div id="playlist"></div>
					<div id="type"    >XBMC IP</div>
					
		  </div>';
		  
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="host_name" name="host_port" value="'.$host_port.'"/></div> 
					<div id="playlist"></div>
					<div id="type"    >XBMC Port</div>
					
		  </div>';
	
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="host_name" name="host_user" value="'.$host_user.'"/></div> 
					<div id="playlist"></div>
					<div id="type"    >USERNAME</div>
					
		  </div>';
		  
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="password" name="host_pass" value="'.$host_pass.'"/></div> 
					<div id="playlist"></div>
					<div id="type"    >PASSWORD</div>
					
		  </div>';
		  
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="submit" name="Submit" value="Update" /></div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
		  </div>';
		  
	
	echo '</form>';
	

}else{

$host_name = $_GET['host_name'] ;
$host_port = $_GET['host_port'] ;
$host_user = $_GET['host_user'] ;
$host_pass = $_GET['host_pass'] ;

$filename     = 'host_setting.php';
$filecontenet = '<?php 

$host_name ="'.$host_name.'"; 
$host_port ="'.$host_port.'";
$host_user ="'.$host_user.'";
$host_pass ="'.$host_pass.'";

?>';


$fh = fopen($filename, 'w'); 
	if ( fwrite($fh, $filecontenet)){
	
	
	}else{
	
	$error = "yes" ;
	
		if (file_exists('host_setting.php')) {
	
		include('host_setting.php');
	
	}
	
	echo '<form id="form" name="form" method="get" action="host.php">';
	
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="host_name" name="host_name" value="'.$host_name.'"/></div> 
					<div id="playlist"></div>
					<div id="type"    >Host Remoto</div>
					
		  </div>';
		  
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="host_name" name="host_port" value="'.$host_port.'"/></div> 
					<div id="playlist"></div>
					<div id="type"    >Porta d\'ascolto</div>
					
		  </div>';
	
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="host_name" name="host_user" value="'.$host_user.'"/></div> 
					<div id="playlist"></div>
					<div id="type"    >Utente</div>
					
		  </div>';
		  
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="host_name" name="host_pass" value="'.$host_pass.'"/></div> 
					<div id="playlist"></div>
					<div id="type"    >Password</div>
					
		  </div>';
		  
	echo '<div id="info_file">
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="submit" name="Submit" value="Modifica" /></div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
		  </div>';
		  
	
	echo '</form>';
	
	}

}


if (file_exists('host_setting.php')) {
		
		include('host_setting.php');
		
		if (isset($_GET['host_name']) && $_GET['host_name'] != NULL){
			
			if ($error != "yes"){
			$label = "Details successfully updated";
			$link  = "javascript:window.parent.location.reload()";
			}else{
			$label = "La invitiamo a riprovare , Host in uso";
			$link ="#";
			}
			
			
			
		}else{
		
			$link ="#";
			$label = "Current host";
			
		}
		
		$img_thumb         = '<img src="img/system/Host_icon.png" width="28" height="28"/>';
		$img_thumb_cambia  = 'core/img/system/Host_icon.png';
		echo ' 
				<div id="info_file">
					
						<div id="title"><a href="'.$link.'" onMouseOver="window.parent.document.getElementById(\'img_cambia\').src=(';
						
						echo "'$img_thumb_cambia'";
						echo');" onmouseout="window.parent.document.getElementById(\'img_cambia\').src=(';
						echo "'css/img/xbmc.png'";
						
						echo');">&ensp;&ensp;&ensp; '.$label.': '.$host_name.'</a></div> 
						<div id="playlist"><a href="#"></a></div>
						<div id="type"    ><a href="#">';
						
						echo "$img_thumb";
						
						echo '</a></div>
						
				</div>
		';
}

?>


</div>

</body>
</html>