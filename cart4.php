<?php
session_start();
require_once 'core/init.php';
include 'includes/head.php';
echo head();
include 'includes/navigation.php';

function hasValue($val) {
	foreach ($_SESSION["cart"] as $arr) {
		if ($arr['id'] == $val) {
			return true;
		}
	}
	return false;
}

$login_warning = false;
if(!empty($_GET["action"])) {

	switch($_GET["action"]) {

		case "add":
			$sql = "SELECT * FROM products WHERE ID = " . $_GET["code"];
			$query = $db -> query($sql);
			$productByCode = mysqli_fetch_assoc($query);
			$itemArray = array(
				'id'=>$productByCode['ID'],
				'name'=>$productByCode['Name'],
				'code'=>$productByCode['ID'],
				'quantity'=>1,
				'price'=>$productByCode['Price'],
				'category'=>$productByCode['Category'],
				'url'=>$productByCode['Image']
			);
			if(empty($_SESSION["cart"])) {
				echo "<script>console.log('" . "Cart is Empty..." . "');</script>";
				$_SESSION["cart"] = array($itemArray);

			} else if (hasValue($_GET["code"])) {
				echo "<script>console.log('" . "hasValue func == true!..." . "');</script>";
				for ($i = 0; $i < sizeof($_SESSION["cart"]); $i += 1) {
					if ($_SESSION["cart"][$i]['id'] == $_GET["code"]) {
						$_SESSION["cart"][$i]['quantity'] += 1;
					}
				}
			} else {
				echo "<script>console.log('" . "unique - adding to cart" . "');</script>";
				array_push($_SESSION["cart"], $itemArray);

			}
			break;

		case "update":
			for ($i = 0; $i < sizeof($_SESSION["cart"]); $i += 1) {
				echo "<script>console.log('" . "action == update." . "');</script>";
				if ($_SESSION["cart"][$i]['id'] == $_GET["code"]) {
					$_SESSION["cart"][$i]['quantity'] = $_POST['quantity'];
				}
			}
			if (sizeof($_SESSION['cart']) == 0) {
				unset($_SESSION['cart']);
			}
			break;

		case "remove":
			for ($i = 0; $i < sizeof($_SESSION["cart"]); $i += 1) {
				if ($_SESSION["cart"][$i]['id'] == $_GET["code"]) {
					unset($_SESSION["cart"][$i]);
				}
			}
			echo "<script>console.log('" . "action == remove." . "');</script>";
			if (sizeof($_SESSION['cart']) == 0) {
				unset($_SESSION['cart']);
			}
			break;

		case "empty":
			unset($_SESSION["cart"]);
			break;

		case "login":
			$login_warning = true;
			break;

		default:
			break;
	}
}
?>
<div class="row">
  <div class="col-md-12">
    <h3>My Cart</h3>
		<?php if ($login_warning) { ?>
		<div id="josh-red-card">
			<div class="card text-white bg-danger mb-3" style="max-width: 60rem;">
				<div class="card-header">Whoops!</div>
				<div class="card-body">
					<h5 class="card-title">You must Sign-In or Register before you checkout!</h5>
				</div>
			</div>
		</div>
    <?php
		}
    $cartHasItems = false;
    if(isset($_SESSION["cart"])) {
      $item_total = 0;
    	$subtotal = 0;
    ?>
  	<div class="panel panel-default">
    	<div class="panel-body">
    		<table class="table table-striped">
      		<thead class="thead-default">
        		<tr>
          		<th><strong>Image</strong></th>
          		<th><strong>Product Name</strong></th>
          		<th><strong>Quantity</strong></th>
          		<th><strong>Price</strong></th>
          		<th><strong>Subtotal</strong></th>
          		<th>Action</th>
        		</tr>
      		</thead>
      		<tbody>

          <?php foreach ($_SESSION["cart"] as $item) {
          ?>
            <tr>
              <form method="post" action="cart4.php?action=update&code=<?php echo $item['id'] ;?> ">
              <?php
              $subtotal = $item["price"] * $item['quantity'];
              $item_total += $subtotal;

              ?>
                <td><img src=" <?php echo $item['url']; ?> " alt="product" style="height:50px"/></td>
                <td><span class="small"><?php echo $item['name']; ?></span></td>
                <td><span class="small"><input type="text" name="quantity" value="<?php echo $item['quantity'];?>" style="width:30px" /></span></td>
                <td><span class="small"><?php echo "£ ".$item["price"]; ?></span></td>
                <td><span class="small"><?php echo "£ ".sprintf("%01.2f", $subtotal); ?></span></td>
                <td><span class="small"><input type="submit" class="btn btn-primary btn-xs" type="button" value="Update Quantity" />&nbsp;<a href="cart4.php?action=remove&code=<?php echo $item['id']; ?>" class="btn btn-danger btn-xs" type="button">Remove</a></span></td>
              </form>
            </tr>
            <?php
            $cartHasItems = true;
          }
          ?>
					<?php if (!empty($_SESSION["cart"])) { ?>
            <tr>
              <td colspan="6" align="center">
								<br>
                <h5><strong>Total : </strong> <?php echo "£ ".sprintf("%01.2f", $item_total); ?></h5><br/>
              </td>
            </tr>
            <tr>
              <td colspan="6" align="center"><a href="cart4.php?action=empty" class="btn btn-danger btn-lg" role="button"> Empty Cart </a> &nbsp <a href="shop.php" class="btn btn-warning btn-lg" role="button"> Continue Shopping </a> &nbsp <a href="checkout.php" class="btn btn-success btn-lg" role="button"> Check Out </a></td>
            </tr>
					<?php } ?>
            </tbody>
        </table>
    <?php }
    if (!$cartHasItems) {
          echo "<p align='center'><strong>Your cart is empty !</strong> <br><br> <a href='shop.php' class='btn btn-success' role='button'>Go Shopping</a></p>";
    }
    ?>
      </div>
    </div>
  </div>
</div>

<?php if ($_SESSION['isLoggedIn'] == false && sizeof($_SESSION["cart"]) != 0) { ?>
	<div id="josh-green-card">
	  <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
	    <div class="card-header">Sign-In to Check Out!</div>
	    <div class="card-body">
	      <!-- <h5 class="card-title">Success card title</h5> -->
	      <form action="signin_action.php" method="post">
	        <div class="form-row">
	          <div class="form-group col-md-6">
	            <label for="inputUsername">Username</label>
	            <input type="text" class="form-control" name="logUsername" placeholder="Username" required>
	          </div>
	          <div class="form-group col-md-6">
	            <label for="inputPassword">Password</label>
	            <input type="password" class="form-control" name="logPassword" placeholder="Password" required>
	          </div>
	        </div>
	        <a href="shop.php" class="btn btn-warning">Cancel</a>
	        <button type="submit" class="btn btn-success">Sign-In</button>
	      </form>
	    </div>
	  </div>
	</div>
<?php } ?>
<?php echo foot(); ?>
