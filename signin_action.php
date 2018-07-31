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

$success = false;
$_SESSION['isLoggedIn'] = $success;
unset($_SESSION['Username']);
unset($_SESSION['Password']);
$u = anti_injection($_POST['logUsername']);
$p = anti_injection(md5($_POST['logPassword']));

$sql = "SELECT * from customers WHERE Username = \"$u\"";
$query = $db -> query($sql);
$ele = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) == 1) {
	if ($ele['Username'] == $u && $ele['Password'] == $p) {
		$_SESSION['Username'] = $u;
		$_SESSION['Password'] = $p;
		$_SESSION['isLoggedIn'] = true;
		$success = true;
	}
}

include 'includes/head.php';
echo head();
include 'includes/navigation.php';
if ($success) {
	if ($_SESSION['Username'] == "admin") {
		header("location:admin_features.php");
	} else { ?>
		<div id="josh-green-card">
		  <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
		    <div class="card-header">Success!</div>
		    <div class="card-body">
		      <h4 class="card-title">You are now Signed In!</h4>
		      <a href='cart4.php' class='btn btn-success' role='button'>Go To My Cart</a>
		      <a href='shop.php' class='btn btn-success' role='button'>Go Shopping</a>
		    </div>
		  </div>
		</div>
	<?php }
} else { ?>
	<div id="josh-red-card">
		<div class="card text-white bg-danger mb-3" style="max-width: 60rem;">
			<div class="card-header">Whoops!</div>
			<div class="card-body">
				<h3 class="card-title">Username / Password credentials are wrong!</h3>
				<a href='shop.php' class='btn btn-primary' role='button'>Go Shopping</a>
				<a href='register.php' class='btn btn-warning' role='button'>Try Again</a>
			</div>
		</div>
	</div>
	<?php
}
echo foot(); ?>
