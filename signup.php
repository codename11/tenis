<?php require 'funkcije.php';?>
<?php
// define variables and set to empty values
$istesifre="";
$nig=array("err"=>"","prom"=>"","greska"=>0);
$nix=array("err"=>"","prom"=>"","greska"=>0);
$nit=array("err"=>"","prom"=>"","greska"=>0);
$nis=array("err"=>"","prom"=>"","greska"=>0);
$nip=array("err"=>"","prom"=>"","greska"=>0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$greska=0;
	
   $nig=(proverai($_POST["ime"]));
   $greska+=$nig["greska"];
   $nix=(proverai($_POST["prezime"]));
   $greska+=$nix["greska"];
   $nit=(proverae($_POST["email"]));
   $greska+=$nit["greska"];
   $nis=(proveras($_POST["sifra"]));
   $greska+=$nis["greska"];
   $nip=(proveras($_POST["ponsifra"]));
   $greska+=$nip["greska"];
    echo "Forma ima ".$greska." gresaka u ".$greska." polja forme.";
	
   if ($nis["prom"]!=$nip["prom"]){	   
	   $istesifre="Sifre nisu iste";
	   $greska++;
	   
   }
      
}
if (isset($greska) && $greska==0){
$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$email=$_POST['email'];
$sifra=$_POST['sifra'];
$sifra=md5($sifra);
	
pristup("localhost", "root", "", "igra", "INSERT INTO igrac (ime, prezime, email, sifra) VALUES ('$ime', '$prezime', '$email', '$sifra')");
header('Location: login.php'); 
}
?>

<!DOCTYPE HTML> 
<html>
<head>
<script src="tenis.js"></script>
<link rel="stylesheet" type="text/css" href="tenis.css">
</head>
<body id="sign_up"> 

<p><span id="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

   Ime: <input type="text" name="ime" value="<?php echo $nig["prom"];?>" id="ime">
   <span id="error">* <?php echo $nig["err"];?></span>
   <br><br>
   prezime: <input type="text" name="prezime" value="<?php echo $nix["prom"];?>" id="prezime">
   <span id="error">* <?php echo $nix["err"];?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $nit["prom"];?>" id="email">
   <span id="error">* <?php echo $nit["err"];?></span>
   <br><br>
   Sifra: <input type="password" name="sifra" value="<?php echo $nis["prom"];?>" id="sifra">
   <span id="error">* <?php echo $nis["err"];?></span>
   <br><br>
   Ponovljena sifra: <input type="password" name="ponsifra" value="<?php echo $nip["prom"];?>" id="ponsifra">
   <span id="error">* <?php echo $nip["err"];?></span><br>
   <span id="error">* <?php echo $istesifre;?></span>
   <br><br>
  
	<input type="submit" name="submit" value="Submit"> 
</form>


</body>
</html>