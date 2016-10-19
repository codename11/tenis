<?php
function pristup($servername, $username, $password, $dbname, $sql){

	$conn=new mysqli($servername, $username, $password, $dbname);
	
	if($conn->connect_error){
	
		die("Neuspela konekcija: ".$conn->connect_error);
	
	}
	
	$result = $conn->query($sql);
	if ($result  == TRUE) {
    echo "Uspešan unos: ";
} else {
    echo "Neuspešan unos: " . $conn->error;
}
	return $result;

	$conn->close();
	
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function proverai($prom){
	
	$niz=array("err"=>"","prom"=>"","greska"=>0);
	if (empty($prom)) {
     $niz["err"] = "Potrebno je uneti ime ili prezime.";
	 $niz["prom"] ="";
	 $niz["greska"]++;
   } else {
     $prom = test_input($prom);
     if (!preg_match("/^[a-zA-Z ]*$/",$prom)) {
       $niz["err"] = "Dozvoljena su samo slova i prazna mesta."; 
	   $niz["prom"] ="";
	   $niz["greska"]++;
     }
	 $niz["prom"] =$prom;
   }
	return $niz;
}

function proverae($prom){
	
	$niz=array("err"=>"","prom"=>"","greska"=>0);
	if (empty($prom)) {
     $niz["err"] = "Potrebno je uneti email.";
	 $niz["prom"] ="";
	 $niz["greska"]++;
   } else {
     $prom = test_input($prom);
     if (!filter_var($prom, FILTER_VALIDATE_EMAIL)) {
       $niz["err"] = "Nepravilno unet email."; 
	   $niz["prom"] ="";
	   $niz["greska"]++;
     }
	 $niz["prom"] =$prom;
   }
	return $niz;
}

function proveras($prom){
	
	$niz=array("err"=>"","prom"=>"","greska"=>0);
	if (empty($prom)) {
     $niz["err"] = "Potrebno je uneti sifru.";
	 $niz["prom"] ="";
	 $niz["greska"]++;
   } else {
     $prom = test_input($prom);
     if (!preg_match("/^[a-zA-Z0-9 ]*$/",$prom)) {
       $niz["err"] = "Dozvoljena su slova, brojevi i prazna mesta."; 
	   $niz["prom"] ="";
	   $niz["greska"]++;
     }
	 $niz["prom"]= $prom;
   }
	return $niz;
}

?>
