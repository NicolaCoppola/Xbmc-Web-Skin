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
			
					<div id="title"   >&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Modifica Lingua</div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
	</div>



<?php

if ($_GET['lingua'] == NULL){

	if ( $handle = opendir ( '../language' )) { 
	
		echo '<form id="form" name="form" method="get" action="lingua.php">';
		echo '<br/>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<select name="lingua">';
		
		if (file_exists('lingua_setting.php')) {
   				 include('lingua_setting.php');
				 echo '<option value="'. $lingua.'">'. $lingua.'</option>';
				 echo '<option value="">------------</option>';
				 
		}
		
		
		while ( false !== ( $file = readdir ( $handle ))) { 
			
				if ( $file == "." or $file ==".." or $file ==".DS_Store"){
				
					
				}else{
				
					echo '<option value="'. $file.'">'. $file.'</option>';
					
				}
			} 
		
		echo '</select>';
		echo '&ensp;&ensp;&ensp;<input type="submit" name="Submit" value="Imposta" />
		</form>';
	
		closedir ( $handle ); 
		} 

}else{

$lingua_write = $_GET['lingua'] ;

$filename     = 'lingua_setting.php';
$filecontenet = '<?php $lingua="'.$lingua_write.'"; ?>';

$fh = fopen($filename, 'w'); 
	if ( fwrite($fh, $filecontenet)){
	
	
		}else{
		

		$error = "yes" ;
	
			if ( $handle = opendir ( '../language' )) { 
		
				echo '<form id="form" name="form" method="get" action="lingua.php">';
				echo '<br/>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<select name="lingua">';
				
					while ( false !== ( $file = readdir ( $handle ))) { 
					
						if ( $file == "." or $file ==".." or $file ==".DS_Store"){
						
							
						}else{
						
							echo '<option value="'. $file.'">'. $file.'</option>';
							
						}
					} 
				
				echo '</select>';
				echo '&ensp;&ensp;&ensp;<input type="submit" name="Submit" value="Imposta" />
				</form>';
		
			closedir ( $handle ); 
			} 
	
	} 



}


if (file_exists('lingua_setting.php')) {
		
		include('lingua_setting.php');
		
		if ($_GET['lingua'] != NULL){
			
			if ($error != "yes"){
			$label = "Lingua aggiornata con successo";
			$link  = "javascript:window.parent.location.reload()";
			}else{
			$label = "La invitiamo a riprovare , lingua in uso: ";
			$link ="#";
			}
			
			
			
		}else{
		
			$label = "Lingua in uso :";
			
		}
		
		$img_thumb         = '<img src="../language/'.$lingua.'/'.$lingua.'.png" width="28" height="28"/>';
		$img_thumb_cambia  = 'language/'.$lingua.'/'.$lingua.'.png';
		echo ' 
				<div id="info_file">
					
						<div id="title"   ><a href="'.$link.'" onMouseOver="window.parent.document.getElementById(\'img_cambia\').src=(';
						
						echo "'$img_thumb_cambia'";
						echo');" onmouseout="window.parent.document.getElementById(\'img_cambia\').src=(';
						echo "'css/img/xbmc.png'";
						
						echo');">&ensp;&ensp;&ensp; '.$label.' </a></div> 
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