//ovo je komentar

	document.addEventListener("keydown", function(e) {handleKeyDown(e)}, false);
	document.addEventListener("keydown", function(e) {handleKeyDown1(e)}, false);

var kuglicatop=270;   // Y koordinata kuglice.
var kuglicaleft=15;  // X koordinata kuglice.
var pravacY=0;      // Promeljiva čija vrednost ulazi u sastav rutine za kretanje kuglice po Y osi.
var pravacX=0;		// Promeljiva čija vrednost ulazi u sastav rutine za kretanje kuglice po X osi.
var reket1Top=270;		// Y koordinata reket1a.
var reket1Left=0;
var reket2Top=270;
var reket2Left=482;
var poeni2=0;
var poeni1=0;
var level=0;
var game_type;
var par1=0;
var par2=0;

function funk1(pokret){
	var audio1=document.getElementById("audio1");
	
		if(reket1Top<=540) reket1Top += pokret; 
		if(reket1Top>540) reket1Top =539;
		
		
		if(reket1Top<=0) reket1Top =0;
		
		
	  // U element sa id-jem "klak" se ispisuje vrednost promenljive reket1Top koja sadrži koordinate reket1a po X osi. 
	
	 									  // Parametar pokret koji dodaje +20 ili -20 na vrednost parametra reket1Top preko onclick eventa u HTML kodu. 
	
	 								 
	
	
	reket1Left += 0;
	document.getElementById('reket1').style.top=reket1Top+"px"; // Zatim se manipuliše pozicijom elementa sa id-jem "reket1" preko promenljive "reket1Top" koja u css na position-top postavlja vrednost preuzete iz ove promenljive.
	document.getElementById('reket1').style.left=reket1Left+"px";														   
			
}


function funk2(pokret1){
	
	
	
	var audio1=document.getElementById("audio1");
	if (game_type=="singleplayer") reket2Top=kuglicatop; // Kada se pozove funkcija iz onclick-a u html-u iz batona sa parametrom p_tip i dodeli joj se vrednost "singleplayer", onda drugi reket mačuje koordinate sa lopticom. 
															// Kada se pozove funkcija iz onclick-a u html-u iz batona sa parametrom p_tip i dodeli joj se vrednost "multyplayer", onda drugi reket dobija vrednost iz parametra pokret1. 
														// Da bi kompjuter znao kad koji parametar da upotrebi definisano je u 48 redu za prvo, i u 143 za drugo. U 143-em redu se postavlja da je parametar funkcije=0, te time zamenjuje, tj. kuglicatop mu ne daje vrednost
	
	
		if (game_type=="multiplayer") {					// Kada se pozove funkcija iz onclick-a u html-u iz batona sa parametrom p_tip i dodeli joj se vrednost "multyplayer", onda drugi reket dobija vrednost iz parametra pokret1. 
														// Da bi kompjuter znao kad koji parametar da upotrebi definisano je u 48 redu za prvo, i u 143 za drugo. U 143-em redu se postavlja da je parametar funkcije=0, te je time zamenjuje, tj. kuglicatop mu ne daje vrednost.
	if(reket2Top<=540) reket2Top += pokret1; 
	
	
	
	}
		if(reket2Top>540) reket2Top =539;
		
		
		if(reket2Top<=0) reket2Top =0;
	
	
	 
	 									  
	document.getElementById('reket2').style.top=reket2Top+"px"; 
	document.getElementById('reket2').style.left=reket2Left+"px";													   
	
	
}



function kuglicamove(){

	// Mora se uzeti u obzir border-i, te udaljenost body-ja od html-a prilikom odredjivanja sledećih uslova.
	document.getElementById("poeni").innerHTML=poeni2;
	document.getElementById("poenix").innerHTML=poeni1;
	
	
	
	if(kuglicatop==270 && kuglicaleft==15){
		
		pravacX=1;
		pravacY=-1;
		
	}
	
	if (kuglicaleft<2){ //levo Ukoliko je uslov ispunjen, tj. da je kuglica na udaljenosti manjoj od 10px od leve strane, promenljivoj će se dodeliti označena vrednost.
		pravacX=1;
	
		poeni2+=1; 
		
		
		   
		kuglicaleft=480;
		
		resetAll();
		
	}	   
	
	if (kuglicaleft>485){  //desno
	
		pravacX=1;
		poeni1+=1;
		  
		kuglicaleft=15;
		
		resetAll();
		
	}
	if (kuglicatop<2) pravacY=1;	  //gore
	if (kuglicatop>585) pravacY=-1;   //dole
		 
	
	
	/* Ono što se razlikuje od uslova do uslova je da ne sme biti negativna vrednost u promenljivoj za onu stranu, ako time kuglica dospeva van okvira igre. 
	Npr. ako je kuglica uz okvir, a u promenljivoj stoji -1. U ovom slučaju pošto je div udaljen nekih 10px, 
	to bi bila nulta koordinatna tačka koju ne sme preći kuglica. */
	
	/* Pravac kojim će "putovati" kuglica koji zavisi od prethodnih uslova, tj. ako je odbijena. 
	Te vrednosti se zatim dodaju u promenljive "kuglicatop" i "kuglicaleft" preko promenljivih "pravacY" i "pravacX". */
	
	kuglicatop=kuglicatop+pravacY;
	kuglicaleft=kuglicaleft+pravacX;
  
	
	
	/* Ovde zatim vrednosti iz "kuglicatop" i "kuglicaleft" služe za "pomeranje", tj. animaciju pomeranja kuglice preko pozicije(position) left i top u css-u. */
	
	document.getElementById('kuglica').style.top=kuglicatop+"px";
	document.getElementById('kuglica').style.left=kuglicaleft+"px";
	
	if(kuglicatop+15>=reket2Top && kuglicatop<=reket2Top+60 && kuglicaleft>=reket2Left-16){ 
	senka();
	audio1.play();
	pravacX=-1;	
	
	}
	
	
    if(kuglicatop+15>reket1Top && kuglicatop<reket1Top+60 && kuglicaleft<reket1Left+16){ 
	
	audio1.play();
	senka();
	pravacX=1;
	
	} /* Gleda se gornja strana reket1a i donja strana reket1a, 
	te ako kuglica po koordinatama odgovara reket1u + 25px zbog širine reket1a i njegove udaljenosti od body-ja. To je dato otprilike, čisto da se vidi odbijanje. */
  
	
	funk2(0);
	
  
setTimeout(function(){kuglicamove()},10); // Vremenski(u milisekundama) izraženo ponavljanje ove funkcije, te se tako postiže efekat kretanja objekta po ekranu.

}


function handleKeyDown(event)
    {
        if (event.keyCode == 83) funk1(20); //40
      if (event.keyCode == 87) {funk1(-20);} //38
    }
	
function handleKeyDown1(event1)
    {
        if (event.keyCode == 40) funk2(20);
      if (event.keyCode == 38) {funk2(-20);}
    }


/*function follow(evtx) {
	if (evtx.pageY<=600-60) 
		reket2Top=evtx.pageY;document.getElementById('reket2').style.top=reket2Top+"px";
	
	}

	document.onmousemove = follow;*/

	
function resetAll(){
	
	
		kuglicatop=270;   
		
		
		document.getElementById('reket1').style.top=270+"px";
		reket1Top=270;
		
		document.getElementById('reket2').style.top=270+"px";
		reket2Top=270;
		
		document.getElementById('reket2').style.left=482+"px";
		reket2Left=482;
	
		if(poeni1==10){
			
			document.getElementById('win1').innerHTML="Pobedio je Prvi igrač";
			sakrivanje();
			par1+=1;
		}
		
		if(poeni2==10){
			
			document.getElementById('win1').innerHTML="Pobedio je Drugi igrač";
			sakrivanje();
			par2+=1;
		}
		
		
		
		document.getElementById("par1").innerHTML=par1;
		document.getElementById("par2").innerHTML=par2;
}

function sakrivanje(){

	
	document.getElementById('win').style.display='block';
	document.getElementById('okvir2').style.display='none';
	level++;
}

function otkrivanje(){
	
	document.getElementById('win').style.display='none';
	document.getElementById('okvir2').style.display='block';
	poeni1=0; 
	poeni2=0;
	
	if(level==1){
	
	document.getElementById('okvir2').style.backgroundImage="url('soccerfield.png')";
	
	}
	if(level==2){
	
	document.getElementById('okvir2').style.backgroundImage="";
	level=0;
	}
	
	resetAll();	
}


function senka(){
	
		document.getElementById('kuglica').setAttribute("class", "animacija");
		setTimeout(function(){document.getElementById('kuglica').setAttribute("class", "");},1000);
	
}

function startgame(p_tip){
	
	if (p_tip=="singleplayer") game_type="singleplayer";
		if (p_tip=="multiplayer") game_type="multiplayer";
	resetAll();
	document.getElementById('meni').style.display='none';
	document.getElementById('okvir2').style.display='block';
	kuglicamove();
	
}

function natrag(){
	
	window.location.href="tenis.html";
}

