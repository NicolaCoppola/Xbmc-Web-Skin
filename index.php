<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php if(!extension_loaded('curl')){echo "<script>alert('cURL not found. Please make sure your web server is compatible with cURL and it is enabled.')</script>";} ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>.: Xbmc Web control :.</title>

<!-- Includo il Css per in base al broswer  !-->
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />

<!-- Includo il freamwork  !-->

<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.7.custom.min.js"></script>
<!-- <script type="text/JavaScript" src="js/jquery.curvycorners.source.js"></script> !-->
<script type="text/JavaScript" src="js/jquery.simplemodal.js"></script>


<?php 

require('system/show_data.php');
require('system/show_meteo.php');
require('system/config_url.php');
global $temperatura_img, $temperatura;

// includo parte riguardante remote control

if (file_exists('core/lingua_setting.php')) {
	require('core/lingua_setting.php');
}else{
	$lingua = "English";
	$filename     = 'core/lingua_setting.php';
	$filecontenet = '<?php $lingua="'.$lingua.'"; ?>';

	$fh = fopen($filename, 'w'); 
	fwrite($fh, $filecontenet);	
	fclose($fh);
}
require ('language/'.$lingua.'/'.$lingua.'.php');
require('core/config_freamwork.php');
require('core/telecomando.php');
?>
<script>
// script per chiudere le info
function InfoChiudi(){

$("#menu_laterale_info")        .fadeOut("slow");
$("#menu_laterale_info_chiudi") .fadeOut("slow");
$("#remote_control2")           .fadeIn("slow");

document.getElementById('img_sfoglia').style.left   = "75%";
document.getElementById('img_sfoglia').style.bottom  = "12%";

}

</script>



<script>
// script per fermare la chiamata alla pagina di cosa si sta ascoltando 

var mosso    = true;
var playInfo = true;
document.onmousemove=riparti;
function riparti() {

  if(mosso) clearTimeout(mosso);
  mosso = setTimeout("inattivo()",1*500000); // 1 minuto
  playInfo = true;
}

function inattivo() {
playInfo = false;
MenuLaterale('indietro');
$("#menu_laterale").fadeOut("fast");
$("#info_play").fadeOut("fast");
$("#remote_control").fadeOut("fast");
$("#dialog").modal({focus:false});
}

</script>



<script type="text/javascript">

function getHTTPObject(){
	if (window.ActiveXObject) 
		return new ActiveXObject("Microsoft.XMLHTTP");
	else if (window.XMLHttpRequest) 
		return new XMLHttpRequest();
	else {
		alert("Il tuo broswer non supporta AJAX .");
		return null;
	}
}

var inc=0;

function callPHP(){

//alert(playInfo);

	if (playInfo == true){
		// inizio chiamata
		inc++;
		httpObject = getHTTPObject();
		if (httpObject != null) {
			httpObject.open("GET", "system/get_playinfo.php?="+inc, true);
			httpObject.send(null);
			httpObject.onreadystatechange = setDiv;	
		}
		//fine chiamata
	}
	setTimeout("callPHP()", 1000);
}

function setDiv(){
	if(httpObject.readyState == 4){
		document.getElementById('info_play').innerHTML = httpObject.responseText;
	}
}

window.onload=callPHP();



</script>



<script type="text/javascript">
function	 CambiaSfondo(bg_image) {	
	
	
	    
		if ( bg_image == "meteo"){
		
		document.getElementById('body').style.background='url(css/img/meteo.jpg)';
		document.getElementById('body').style.backgroundPosition = "right";
		document.getElementById('body').style.backgroundPosition = "top";
		
		};
		
		if ( bg_image == "image"){
		
		document.getElementById('body').style.background='url(css/img/image.jpg)';
		document.getElementById('body').style.backgroundPosition = "right";
		document.getElementById('body').style.backgroundPosition = "top";
		};
		
		if ( bg_image == "music"){
	
		document.getElementById('body').style.background='url(css/img/music.jpg)';
		document.getElementById('body').style.backgroundPosition = "right";
		document.getElementById('body').style.backgroundPosition = "top";
		
		};
		
		if ( bg_image == "video"){
		
		document.getElementById('body').style.background='url(css/img/video.jpg)';
		document.getElementById('body').style.backgroundPosition = "right";
		document.getElementById('body').style.backgroundPosition = "top";
		};
		
		if ( bg_image == "remot"){
		
		document.getElementById('body').style.background='url(css/img/remot.jpg)';
		document.getElementById('body').style.backgroundPosition = "right";
		document.getElementById('body').style.backgroundPosition = "top";
		};
		
		if ( bg_image == "siyst"){
		
		document.getElementById('body').style.background='url(css/img/siyst.jpg)';
		document.getElementById('body').style.backgroundPosition = "right";
		document.getElementById('body').style.backgroundPosition = "top";
		};
		
		
		
}	
</script>


<!-- start codice java per la risoluzione del menu  !-->
<script type="text/javascript">



winWidth=document.documentElement.clientWidth;
winHeight=document.documentElement.clientHeight;


if (winWidth <= 800 && winHeight <=600)
{
	document.write('<link rel="stylesheet" type="text/css" href="css/menu/menu_home_800x600.css">');
}

if (winWidth > 800 && winWidth <= 1024 && winHeight <=768 )
{
	document.write('<link rel="stylesheet" type="text/css" href="css/menu/menu_home_1024x768.css">');
}

if (winWidth > 1024 && winWidth <= 1280 && winHeight <=1024 )
{
	document.write('<link rel="stylesheet" type="text/css" href="css/menu/menu_home_1280x1024.css">');
}

if (winWidth > 1280 && winWidth <= 1680 && winHeight >=700 )
{
	document.write('<link rel="stylesheet" type="text/css" href="css/menu/menu_home_1600x900.css">');
}

if (winWidth > 1680 && winHeight >850 )
{
	document.write('<link rel="stylesheet" type="text/css" href="css/menu/menu_home_fullhd.css">');
}

// stlye per piccoli nettbook
if (winWidth <= 1024 && winHeight <= 600 )
{
	document.write('<link rel="stylesheet" type="text/css" href="css/menu/menu_home_notebook.css">');
}


</script>
<!-- end codice java per la risoluzione del menu  !-->


<SCRIPT LANGUAGE="JavaScript">
function HeureCheckEJS()
	{
	krucial = new Date;
	heure = krucial.getHours();
	min = krucial.getMinutes();
	sec = krucial.getSeconds();
	jour = krucial.getDate();
	mois = krucial.getMonth()+1;
	annee = krucial.getFullYear();
	if (sec < 10)
		sec0 = "0";
	else
		sec0 = "";
	if (min < 10)
		min0 = "0";
	else
		min0 = "";
	if (heure < 10)
		heure0 = "0";
	else
		heure0 = "";
	DinaHeure = heure0 + heure + ":" + min0 + min ;
	which = DinaHeure
	if (document.getElementById){
		document.getElementById("ejs_heure").innerHTML=which;
		document.getElementById("ora_sfoglia").innerHTML=which;
	}
	setTimeout("HeureCheckEJS()", 1000)
	}


</SCRIPT>


<script>
	function closeinfo()
	{
	
	 $("#info_play")      .fadeOut("fast");
     $("#img_sfoglia")    .fadeIn("slow");
	
	}

	function loadinfo()
	{
	 $("#img_sfoglia")    .fadeOut("fast");
	 $("#info_play")      .fadeIn("slow");
	
	}
</script>


<!-- start codice java per ascoltare audio  !-->
<script language="javascript" type="text/javascript">
function	 MenuLaterale(azione,finestra) {	 
		 
var iframeSet = finestra ;

if ( finestra == "meteo"){ document.getElementById("meteo").style.display='inline' ;}
if ( finestra == "image"){ document.getElementById('image').style.display='inline' ;}
if ( finestra == "music"){ document.getElementById('music').style.display='inline' ;}
if ( finestra == "video"){ document.getElementById('video').style.display='inline' ;}
if ( finestra == "remot"){ document.getElementById('remot').style.display='inline' ;}
if ( finestra == "siyst"){ document.getElementById('siyst').style.display='inline' ;}

 
if ( azione == "chiudi"){
		
			 $("#menu_laterale")  .fadeOut("slow");
			 $("#menu_home")      .fadeOut("slow");
			 $("#logo")           .fadeOut("slow");
			 $("#alto")           .fadeOut("slow");
			 $("#basso")          .fadeOut("slow");
			 
			 // testing 
			 $("#info_play")      .fadeOut("slow");
			 $("#remote_control") .fadeOut("slow");		
			 
			 document.getElementById('img_cambia').src=('core/img/xbmc.png');
			 document.getElementById('img_sfoglia').style.height=('25%');
			 
				 		 
		     $("#sfoglia_alto")   .fadeIn("slow");
			 $("#sfoglia")        .fadeIn("slow");
			 
			 $("#img_sfoglia")    .fadeIn("slow");
			 
			 $("#sfoglia_ora")    .fadeIn("slow");	
			 $("#sfondo_sfoglia") .fadeIn("fast");
			 $("#remote_control2") .fadeIn("slow");	
			
};
		 
		 
		 if ( azione == "apri"){
	
			 $("#menu_laterale")  .fadeIn("slow");
			 $("#menu_home")      .fadeIn("slow");
			 $("#logo")           .fadeIn("slow");
			 $("#alto")           .fadeIn("slow");
			 $("#basso")          .fadeIn("slow");
			 
			 
			 // testing 
			 $("#info_play")      .fadeIn("slow");
			 $("#remote_control") .fadeIn("slow");
			 
			 //("#info_play")      .corner();
			 // avvio la funzione per postare l'orario
			 HeureCheckEJS();
			 
			 
			 
			 
			 
		 
		 };
		 
		 
		 if ( azione == "indietro"){
		 
		 
		     
		 
		 	 $("#sfoglia_alto")  .fadeOut("slow");
			 $("#sfoglia")       .fadeOut("slow");
	
			 $("#img_sfoglia")   .fadeOut("slow");
			 $("#sfoglia_ora")   .fadeOut("slow");
			 $("#sfondo_sfoglia").fadeOut("slow");
		 
		 
			
			 $("#menu_laterale") .fadeIn("slow");
			 $("#menu_home")     .fadeIn("slow");
			 $("#logo")          .fadeIn("slow");
			 $("#alto")          .fadeIn("slow");
			 $("#basso")         .fadeIn("slow");
			 
			 
			 // testing 
			 $("#info_play")     .fadeIn("slow");
			 $("#remote_control").fadeIn("slow");
			 $("#remote_control2").fadeOut("slow");	
			 
			 document.getElementById("meteo").style.display='none' ;
             document.getElementById('image').style.display='none' ;
             document.getElementById('music').style.display='none' ;
             document.getElementById('video').style.display='none' ;
             document.getElementById('remot').style.display='none' ;
             document.getElementById('siyst').style.display='none' ;
			 
			
	
			 
			
			
			 
		 };
		 
}	
</script>
<script>
function Scrolliframe(tasto)
	{
	 
	var keydown = tasto.keyCode ;
	 
		 if(keydown == 38)  
		{
			
			
			
			//window.datamain.scrollBy(0, -80);
			if ( document.getElementById("meteo").style.display == 'inline'){ window.meteo.scrollBy(0,-80); }
			if ( document.getElementById("image").style.display == 'inline'){ window.image.scrollBy(0,-80); }
			if ( document.getElementById("music").style.display == 'inline'){ window.music.scrollBy(0,-80); }
			if ( document.getElementById("video").style.display == 'inline'){ window.video.scrollBy(0,-80); }
			if ( document.getElementById("remot").style.display == 'inline'){ window.remot.scrollBy(0,-80); }
			if ( document.getElementById("siyst").style.display == 'inline'){ window.siyst.scrollBy(0,-80); }
		};
		
		 if(keydown == 40)  
		{
			
			//window.datamain.scrollBy(0, -80);
			if ( document.getElementById("meteo").style.display == 'inline'){ window.meteo.scrollBy(0,80); }
			if ( document.getElementById("image").style.display == 'inline'){ window.image.scrollBy(0,80); }
			if ( document.getElementById("music").style.display == 'inline'){ window.music.scrollBy(0,80); }
			if ( document.getElementById("video").style.display == 'inline'){ window.video.scrollBy(0,80); }
			if ( document.getElementById("remot").style.display == 'inline'){ window.remot.scrollBy(0,80); }
			if ( document.getElementById("siyst").style.display == 'inline'){ window.siyst.scrollBy(0,80); }
			
		};
	
	}
</script>
<!-- end  codice java per ascoltare audio  !-->



</head>
<body onload="MenuLaterale('apri')" onkeydown="Scrolliframe(event)" id="body">
<!-- start #xbmcremotesite : SITO HOME PAGE-->
<div id="xbmcremotesite">


 <!-- inzio schermata menu -->


	<!-- start #logo -->
    <div id="logo"></div>
    <!-- end #logo -->
    

    <!-- start #alto -->
    <div id="alto">
    
    <!-- start #info_tempo -->
        <div id="info_tempo">
        
              <?php echo $temperatura_img ; ?>
              <?php echo $temperatura ; ?>
              
                 
        </div>
        <!-- end #info_tempo -->
        
        <!-- start #info_data -->
        <div id="info_data">
        
              
              <li><?php echo ("$giornosettimana[$settimana]" . " " . "$giorno" . " " . "$nomemese[$mese]" . " " . "$anno");?><span> | </span><span id="ejs_heure">|</span></li>
           
        
        </div>
        <!-- end #info_data -->
        
    
    </div>
    <!-- end #alto -->
    
    <!-- start #menu -->
    <div id="menu_laterale">
    
      
       <ul id="menu_home">
       
       	<li><a href="#nogo" onMouseOver="CambiaSfondo('meteo');" onmouseout="CambiaSfondo('normale');" onClick="MenuLaterale('chiudi','meteo' )" class=""><?php echo $t_meteo ;   ?></a></li>
        <li><a href="#nogo" onMouseOver="CambiaSfondo('image');" onmouseout="CambiaSfondo('normale');" onClick="MenuLaterale('chiudi','image' )" class=""><?php echo $t_immagini ;?></a></li>
        <li><a href="#nogo" onMouseOver="CambiaSfondo('music');" onmouseout="CambiaSfondo('normale');" onClick="MenuLaterale('chiudi','music' )" class=""><?php echo $t_musica ;  ?></a></li>
        <li><a href="#nogo" onMouseOver="CambiaSfondo('video');" onmouseout="CambiaSfondo('normale');" onClick="MenuLaterale('chiudi','video' )" class=""><?php echo $t_video ;   ?></a></li>
        <li><a href="#nogo" onMouseOver="CambiaSfondo('remot');" onmouseout="CambiaSfondo('normale');" onClick="MenuLaterale('chiudi','remot' )" class=""><?php echo $t_remote ;  ?></a></li>
        <li><a href="#nogo" onMouseOver="CambiaSfondo('siyst');" onmouseout="CambiaSfondo('normale');" onClick="MenuLaterale('chiudi','siyst' )" class=""><?php echo $t_sistema ; ?></a></li>
       
       </ul>
    
    </div>
    <!-- end #menu -->
    
    <!-- start #basso -->
    <div id="basso">
    
        
    </div>
    <!-- end #basso -->


 <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- inzio schermata sfoglia elementi -->

	
    <!-- start #sfoglia -->
    <div id="sfoglia_alto">
    
       <a href="#nogo" onClick="MenuLaterale('indietro')"><img src="css/img_menu/home.png"/></a>
    
    </div>
    <!-- end #sfoglia -->
	
	 <!-- start #sfoglia_ora -->
    <div id="sfoglia_ora">
    
       <li><span id="ora_sfoglia">whait</span></li>
    
    </div>
    <!-- end #sfoglia_ora -->
    
    
    <!-- start #sfoglia -->
    <div id="sfoglia">
    
  	   <!-- includo iframe : codice sorgente del menu sfoglia 
       
       	<ul id="sfogli_file">
        <li><a href="#"><strong>01. Uomini di mare - Anch'io.mp3 </strong></a></li>
        
        
         <a href="javascript:window.parent.datamain.scrollBy(0, -100);">Scroll Up</a>
         <a href="javascript:window.parent.datamain.scrollBy(0, 100);">Scroll Down</a>   
        
       	</ul>
       
        -->
       


       
       <iframe id="meteo" width="100%" height="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true" style="display:none" src="<?php echo $meteo_url; ?>"></iframe>
       <iframe id="image" width="98%"  height="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true" style="display:none" src="<?php echo $image_url; ?>"></iframe>
       <iframe id="music" width="98%"  height="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true" style="display:none" src="<?php echo $music_url; ?>"></iframe>
       <iframe id="video" width="98%"  height="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true" style="display:none" src="<?php echo $video_url; ?>"></iframe>
       <iframe id="remot" width="98%"  height="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true" style="display:none" src="<?php echo $remot_url; ?>"></iframe>
       <iframe id="siyst" width="100%" height="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true" style="display:none" src="<?php echo $siyst_url; ?>"></iframe>
   
        
        
    
    </div>
	<!-- end #sfoglia -->
    
    <!-- start #img_sfoglia   -->
    <div id="img_sfoglia">
    
     
		<img src="css/img/xbmc.png" width="100%" height="100%" id="img_cambia" />
      
    
    
    </div>
    <!-- end #img_sfoglia -->
    
    <!-- start #sfondo_sfoglia -->
    <div id="sfondo_sfoglia">
    
        
    
    </div>
    <!-- end #sfondo_sfoglia -->
	
	
	<!-- start #menu informazioni menu-->
    <div id="menu_laterale_info">
    
      
       <iframe id="info" width="100%" height="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true" src=""></iframe>
      
    
    </div>
    <!-- end #menu informazioni menu -->
	
	<!-- start #menu informazioni menu-->
    <div id="menu_laterale_info_chiudi">
    
      
      	<a onclick="InfoChiudi()"    href="#"><img src="<?php echo 'language/'.$lingua.'/chiudi.png'?>"/></a>
      
    
    </div>
    <!-- end #menu informazioni menu -->


 <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- inzio schermata info play -->
 	
	<!-- start #Volumecontrol -->
    <div id="volume_control" align="center" >
    
	
		<a onclick="VolDown()" href="#"><img src="css/img_menu/remove.png"   width="40" height="40"  align="center"/></a>
	
		<a onclick="VolSet(10)"    href="#"><img src="css/img_menu/10.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(20)"    href="#"><img src="css/img_menu/20.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(30)"    href="#"><img src="css/img_menu/30.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(40)"    href="#"><img src="css/img_menu/40.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(50)"    href="#"><img src="css/img_menu/50.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(60)"    href="#"><img src="css/img_menu/60.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(70)"    href="#"><img src="css/img_menu/70.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(80)"    href="#"><img src="css/img_menu/80.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(90)"    href="#"><img src="css/img_menu/90.png"      width="35" height="35"  align="center"/></a>
		<a onclick="VolSet(100)"   href="#"><img src="css/img_menu/100.png"      width="35" height="35"  align="center"/></a>
		

	
        <a onclick="VolUp()"  href="#"><img src="css/img_menu/add.png"    width="40" height="40"  align="center"/></a>
		<a onclick='$("#volume_control")   .fadeOut("slow")'  href="#"><img src="css/img_menu/close.png"  width="40" height="40"  align="center" style="margin-top:-60px; margin-right:-35px;"/></a>
	
		
    
    </div>
    <!-- end #remote_control -->
	
	
	<!-- start #remote_control -->
    <div id="remote_control" align="center" >
	
		
    
        <a onclick="Rewind()"  href="#"><img src="css/img_menu/rewind.png"    width="40" height="40"  align="center"/></a>
		<a onclick="Prev()"    href="#"><img src="css/img_menu/prev.png"      width="40" height="40"  align="center"/></a>
		<a onclick="Pause()"   href="#"><img src="css/img_menu/play.png"      width="40" height="40"  align="center"/></a>
		<a onclick="Stop()"    href="#"><img src="css/img_menu/stop.png"      width="40" height="40"  align="center"/></a>
		<a onclick="Next()"    href="#"><img src="css/img_menu/next.png"      width="40" height="40"  align="center"/></a>
		<a onclick="Forward()" href="#"><img src="css/img_menu/forward.png"   width="40" height="40"  align="center"/></a>
		
		
		
		<a onclick="VolUp()"   href="#"><img src="css/img_menu/volume_up.png"   width="40" height="40"  align="right"/></a>
		<a onclick="VolDown()" href="#"><img src="css/img_menu/volume_down.png"   width="40" height="40"  align="right"/></a>
		<a onclick="Mute()"    href="#"><img src="css/img_menu/mute.png"      width="40" height="40"  align="right"/></a>
		<a onClick='$("#volume_control")   .fadeIn("slow")' href="#"><img src="css/img_menu/volume.png"      width="40" height="40"  align="right"/></a>
		
    
    </div>
    <!-- end #remote_control -->
	
	<!-- start #remote_control -->
    <div id="remote_control2" align="center" >
	
		
    
        <a onclick="Rewind()"  href="#"><img src="css/img_menu/rewind.png"    width="40" height="40"  align="center"/></a>
		<a onclick="Prev()"    href="#"><img src="css/img_menu/prev.png"      width="40" height="40"  align="center"/></a>
		<a onclick="Pause()"   href="#"><img src="css/img_menu/play.png"      width="40" height="40"  align="center"/></a>
		<a onclick="Stop()"    href="#"><img src="css/img_menu/stop.png"      width="40" height="40"  align="center"/></a>
		<a onclick="Next()"    href="#"><img src="css/img_menu/next.png"      width="40" height="40"  align="center"/></a>
		<a onclick="Forward()" href="#"><img src="css/img_menu/forward.png"   width="40" height="40"  align="center"/></a>

		
    </div>
    <!-- end #remote_control -->
 

     <!-- start #info_play -->
    <div id="info_play" >
        
        
        
        
        
    </div>
    <!-- end #info_play -->
    
     <!-- start #info_play -->
    <div id="dialog" style="display:none">
        
        
       <a href="#nogo" onClick="$.modal.close();)" onmousemove='$.modal.close();$("#info_play").fadeIn("slow");$("#menu_laterale").fadeIn("slow");'><div align="center"><img src="css/img_menu/no_photo.gif" width="80%" height="90%"></div></a>
        
        
    </div>
    <!-- end #info_play -->




</div>
<!-- end #xbmcremotesite : SITO HOME PAGE-->
</body>
</html>
