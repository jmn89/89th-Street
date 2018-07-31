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

if ($_SESSION['Username'] == "admin") {
	header('location:admin_features.php');
}

$detailsUpdated = false;
$isUsernameUnique = true;
$username = $_SESSION['Username'];
$sql = "SELECT * FROM customers WHERE Username = \"" . $username . "\"";
$query = $db -> query($sql);
$ele = mysqli_fetch_assoc($query);

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'update':
      $u = anti_injection($_POST['regUsername']);
			$sql = "SELECT * FROM customers WHERE Username = \"$u\"";
			$query = $db -> query($sql);
			if (mysqli_num_rows($query) == 0) {
	      $p = anti_injection(md5($_POST['regPassword']));
	      $e = anti_injection($_POST['regEmail']);
	      $t = anti_injection($_POST['regPhone']);
	      $n = anti_injection($_POST['regName']);
	      $a = anti_injection($_POST['regAddress']);
	      $vals = array($n, $e, $a, $t, $u, $p);
	      $cols = array('Name', 'Email', 'Address', 'Tele', 'Username', 'Password');
	      for ($i = 0; $i < 6; $i += 1) {
	        if ($vals[$i] != "") {
	          $sql = "UPDATE customers SET " . $cols[$i] . " = \"" . $vals[$i] . "\" WHERE ID = " . $ele['ID'];
	          $query = $db -> query($sql);
						$detailsUpdated = true;
	        }
	      }
			} else {
				$isUsernameUnique = false;
			}
	    break;

    default:
      break;
  }
}

include 'includes/head.php';
echo head();
include 'includes/navigation.php';

$sql = "SELECT * FROM customers WHERE Username = \"" . $username . "\"";
$query = $db -> query($sql);
$ele = mysqli_fetch_assoc($query);

if ($isUsernameUnique) {
	if ($detailsUpdated) { ?>
	  <div id="josh-green-card">
	    <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
	      <div class="card-header">Success!</div>
	      <div class="card-body">
	        <h4 class="card-title">Details Updated!</h4>
	      </div>
	    </div>
	  </div>
	<?php }
} else { ?>
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
	<?php } ?>

<div id="josh-green-card">
  <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
    <div class="card-header">Edit Your Details</div>
    <div class="card-body">
      <form action="my_account.php?action=update" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Username</label>
            <input type="text" class="form-control" name="regUsername" placeholder="<?php echo $ele['Username'] ?>">
          </div>
          <div class="form-group col-md-6">
            <label>Password</label>
            <input type="password" class="form-control" name="regPassword" placeholder="Enter either current password or a new one" required>
          </div>
        </div>
				<hr/>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" name="regEmail" placeholder="<?php echo $ele['Email'] ?>">
          </div>
          <div class="form-group col-md-6">
            <label>Phone</label>
            <input type="text" class="form-control" name="regPhone" placeholder="<?php echo $ele['Tele'] ?>">
          </div>
        </div>
				<hr/>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Name</label>
            <input type="text" class="form-control" name="regName" placeholder="<?php echo $ele['Name'] ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label text-align="center">Address</label>
            <br>
            <textarea name="regAddress" cols="80" rows="4" maxlength="400" placeholder="<?php echo $ele['Address'] ?>"></textarea>
          </div>
        </div>
        <a href="shop.php" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-success">Update Details</button>
      </form>
    </div>
  </div>
</div>

<?php
$sql = "SELECT * FROM sales542 WHERE Customer_ID = \"" . $ele['ID'] . "\"";
$query = $db -> query($sql);
?>
<div class="card bg-light mb-3" style="max-width: 60rem;">
  <div class="card-header"> Past Purchases </div>
  <div class="card-body">
		<?php while ($sale = mysqli_fetch_assoc($query)) :
			$sql2 = "SELECT * FROM products WHERE ID = " . $sale['Product_ID'];
			$query2 = $db -> query($sql2);
			$product = mysqli_fetch_assoc($query2);
			?>
			<h5 class="card-title"> <?php echo $product['Name'] . " (x" . $sale['Quantity'] . ")" ?></h5>
	    <p class="card-text"><?php echo $sale['DateOfSale'] ?></p>
			<img id="pastPurchasesImg" src=" <?php echo $product['Image']; ?> "/>
			<hr/>
		<?php endwhile; ?>
  </div>
</div>
<?php echo foot(); ?>
