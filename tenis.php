<!DOCTYPE html>
<html>
<head>

<?php session_start();
if (isset($_SESSION['user'])) echo "Trenutno ulogovani korisnik:".$_SESSION['user'];
else die("Uloguj se");
?>
<link rel="stylesheet" type="text/css" href="tenis.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script src="tenis.js"></script>

<meta charset="utf-8">
</head>
<title> Tenis </title>
<body id="bodi">

<img src="unmute.png" id="unmute" onClick="gas_muz()" ><img src="mute.png" id="mute" onClick="pali_muz()" >

<div id="meni">Izaberite:<br>
		
		
		<button id="singleplayer" onClick="startgame('singleplayer')"> Singleplayer </button>
		<button id="multyplayer" onClick="startgame('multiplayer')"> Multyplayer </button>

</div> 

<div id="okvir2" style="display:none"><div id="reket1"></div><div id="kuglica"></div><div id="reket2"></div>		

	<div id="okvir1">

		<span id="poeni1"><span>Prvi igrač: &nbsp <span id="poenix">0</span></span><span>&nbsp poena</span>
		<span>&nbsp Drugi igrač: &nbsp <span id="poeni">0</span></span><span>&nbsp poena </span></span>

	</div>

</div>



<div id="win">

<span id="prvi">
	<span id="prvi1">Prvi igrač je pobedio: &nbsp <span id="par1">0</span></span><span> &nbsp partija</span>
	<span>&nbsp Drugi igrač je pobedio: &nbsp <span id="par2">0</span></span><span> &nbsp partija </span>	
</span><br>

<span id="win1"></span><br><button id="otkrij" onClick="otkrivanje()"> Continue </button>
<button id="palac" onclick="natrag()">Back to main menu</button>

</div> 

<audio id="audio1" src="Billiard Balls Hit [SOUND EFFECT].mp3" id="ugasi1"></audio>
<audio autoplay loop src="10 Hours of Infinite Fractal and Falling Shepard's Tone_cut_cut.mp3" id="ugasi1"></audio>
</body>
</html>