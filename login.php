<!DOCTYPE HTML> 
<html>
<head>
<script src="tenis.js"></script>
<link rel="stylesheet" type="text/css" href="tenis.css">
<?php require 'funkcije.php';?>
</head>
<body id="sign_up"> 

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

Username<input type="text" name="username"><br>
Password<input type="password" name="password">
<input type="submit" name="submit">

<a href="signup.php"><input type="button" name="submit" value="sign up"></a>
</form>

<?php
session_start();
if (isset($_POST['submit'])){ //Ukoliko je sabmitovano, izvrsava se konekcija sa serverom i upit

$email=$_POST['username'];
$sifra=md5($_POST['password']);

$result=pristup("localhost", "root", "", "igra", "SELECT * FROM igrac WHERE email='$email' AND sifra='$sifra'");


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Dobrodosli ".$row['ime']." ".$row['prezime'];
		$_SESSION['user']=$row['email']; //Promenljiva 'user' dobija vrednost iz polja 'email' iz tabele, a koji dobija vrednost iz prom. $email, koja dobija vrednost iz clana 'username' asoc. niza $_POST['username'].
		echo $_SESSION['user'];
		echo "<a href='tenis.php'>Nastavi do igre</a>";//Ehuje se link ka stranici po izvrsavanju upita.
    }
} else {
    echo "Pogresna sifra ili username";
}



}

?>

</body>
</html>