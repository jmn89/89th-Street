<?php
session_start();
require_once 'core/init.php';

function anti_injection($var) {
	$string = stripslashes($var);
	$string = strip_tags($string);
	$servername = "smcse.city.ac.uk";
	$username = "acnh542";
	$password = "150053175";
	$link = new mysqli($servername, $username, $password, "acnh542");
	$string2 = mysqli_real_escape_string($link, $string);
	return $string2;
}

$u = anti_injection($_POST['regUsername']);
$p = anti_injection(md5($_POST['regPassword']));
$e = anti_injection($_POST['regEmail']);
$t = anti_injection($_POST['regPhone']);
$n = anti_injection($_POST['regName']);
$a = anti_injection($_POST['regAddress']);

$sql = "SELECT * FROM customers WHERE Username = \"$u\"";
$query = $db -> query($sql);

if (mysqli_num_rows($query) == 0) {

	$sql = "INSERT INTO customers (Name, Email, Address, Tele, Username, Password) VALUES ('$n', '$e', '$a', '$t', '$u', '$p')";
	$query = $db -> query($sql);
	$_SESSION['Username'] = $u;
	$_SESSION['Password']	= $p;

	include 'includes/head.php';
	echo head();
	include 'includes/navigation.php';
	?>
  <div id="josh-green-card">
    <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
      <div class="card-header">Success!</div>
      <div class="card-body">
        <h4 class="card-title">Thanks for Registering!</h4>
        <a href='shop.php' class='btn btn-success' role='button'>Go Shopping</a>
      </div>
    </div>
  </div>
	<?php unset($_SESSION['Registered']);
	echo foot();

} else {
	include 'includes/head.php';
	echo head();
	include 'includes/navigation.php';
	?>
	<div id="josh-red-card">
		<div class="card text-white bg-danger mb-3" style="max-width: 60rem;">
			<div class="card-header">Whoops!</div>
			<div class="card-body">
				<h3 class="card-title">Your Username already exists!</h3>
				<a href='shop.php' class='btn btn-primary' role='button'>Go Shopping</a>
				<a href='register.php' class='btn btn-warning' role='button'>Try Again</a>
			</div>
		</div>
	</div>
<?php unset($_SESSION['Registered']);
echo foot();
} ?>
