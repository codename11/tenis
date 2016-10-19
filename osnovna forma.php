<?php
include 'funkcije.php';

session_start();
if (isset($_POST['submit'])){ //Ukoliko je sabmitovano, izvrsava se konekcija sa serverom i upit

$email=$_POST['email'];
$password=md5($_POST['password']);
pristup("localhost", "root", "", "testx", "INSERT INTO tabela(email, password) VALUES('$email', '$password')");

}
?>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form role="form" action="<?php echo test_input($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>



