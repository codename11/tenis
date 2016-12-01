<?php require 'funkcije.php';?>


<!DOCTYPE HTML> 
<html>
<head>
<script src="tenis.js"></script>
<link rel="stylesheet" type="text/css" href="tenis.css">
</head>
<body id="sign_up"> 


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

 
   E-mail: <input type="text" name="username" id="username">
  
   Sifra: <input type="password" name="password" id="password">
  
   <br><br>
  
	<input type="submit" name="submit" value="Submit"> 
</form>


</body>
</html>
<?php




$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
	
pristup("localhost", "root", "", "skola", "INSERT INTO supus (username, password) VALUES ('$username', '$password')");





?>