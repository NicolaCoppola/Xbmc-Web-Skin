<script type="text/javascript">

/*

REMOTE CONTROL FOR WEB  

Versione 0.1

Autore = Nicola Coppola 



*/

// ---------------------------------------------------------------------------- control player ALL

function Rewind() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=SeekPercentageRelative(-5)","control")
} 

function Prev() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(15)","control")
} 

// Fix the play windows for restart the vision with the last vision . <<-- use the remote arrows for restart the vision if you want .
function Play() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=SendKey(0xF050)","control")
} 

// fix the bug with the play control -- pause if you want don't use . use play for go to pause .
function Pause() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(12)","control")
} 

function Stop() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(13)","control")
} 

function Next() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(14)","control")
} 

function Forward() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=SeekPercentageRelative(5)","control")
  
} 


// ---------------------------------------------------------------------------- open close info and dialog

function ShowInfo() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=SendKey(0xF049)","control")
} 

function Esc() {
 window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(51)","control")
} 

// ---------------------------------------------------------------------------- control remote

function Left() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(1)","control")
} 

function Right() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(2)","control")
} 

function Up() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(3)","control")
  
} 

function Down() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(4)","control")
} 

function Back() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(9)","control")
} 

function BackMenu() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(10)","control")
} 

function SelectItem() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(7)","control")
} 

// ---------------------------------------------------------------------------- open close fullscreen player mode -- TAB button

function ShowGui() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(18)","control")
} 


// ---------------------------------------------------------------------------- Volume control 

function VolUp() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(88)","control")
} 

function VolDown() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=Action(89)","control")
} 

function Mute() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=setvolume&parameter=00","control")
} 

function MaxVol() {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=setvolume&parameter=100","control")
}

function VolSet(volume_parametro) {
  window.open("<?php echo $host_http ; ?>xbmcCmds/xbmcHttp?command=setvolume&parameter="+volume_parametro,"control")
} 



</script>

