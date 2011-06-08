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
	<script type="text/javascript" src="js/flowplayer.ipad-3.2.2.min.js"></script>
</head>
</head>
<body>

<?php 

//include('function/scroll.php');

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
			
					<div id="title"   > &ensp;&ensp;&ensp; Trailer</div> 
					<div id="playlist"></div>
					<div id="type"    ></div>
					
		</div>
		
		';
		
			
		
?>

<?php 

$file = urlencode($value['file']);
system('/bin/sh videoplayer/test.sh '.$file.''); 


?>

</div>

<br />		

<div align="center">

<!-- setup player container  -->
<div id="player" style="display:block;width:600px;height:453px;"></div>

<!-- install flowplayer into container -->
<script>
$f("player", "http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf", {

	clip: { 
	   url: 'http://localhost/xbmc10-b1/core/videoplayer/prova.mp',
	   
	   // this style of configuring the cover image was added in audio
	   // plugin version 3.2.3
	   coverImage: { url: 'http://releases.flowplayer.org/data/national.jpg', scaling: 'orig' } 
	}

});
</script>

		
		<!-- player container-->
<a 
	href="http://localhost/xbmc10-b1/core/videoplayer/prova.mp4" 
	style="display:block;width:500px;height:300px;" 
	id="ipad">
</a>
		
<script type="text/javascript">		


	$f("ipad", "play/flowplayer-3.2.7.swf").ipad();



</script>

<!-- setup player container named "lighty" -->
<a class="player" id="lighty">
	<img src="http://static.flowplayer.org/img/player/btn/showme.png"  />
</a>


<script type="text/javascript">	
$f("lighty", "http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf", {

	// configure clip to use "lighthttpd" plugin for providing video data
	clip: {
		url: 'http://localhost/xbmc10-b1/core/videoplayer/prova.mp4',
		provider: 'lighttpd'
	},

	// streaming plugins are configured normally under the plugins node
	plugins: {
		lighttpd: {
			url: 'flowplayer.pseudostreaming-3.2.7.swf'
		}
	}
});
</script>

</div>
		
<?php

	}
		
}

?>


</body>
</html>