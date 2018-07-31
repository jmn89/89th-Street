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

$productAdded = false;
$detailsUpdated = false;
$validURL = true;

if ($_SESSION['Username'] == "admin" && isset($_SESSION['Password'])) {
  if (isset($_GET['action'])) {

    if ($_GET['action'] == "add") {
      $n = anti_injection($_POST['name']);
      $m = anti_injection($_POST['manuf']);
      $c = anti_injection($_POST['categ']);
      $p = anti_injection($_POST['price']);
      $i = anti_injection($_POST['img']);
      $d = anti_injection($_POST['description']);
      $sql = "INSERT INTO products (Name, Manuf, Category, Price, Image, Description) VALUES ('$n', '$m', '$c', '$p', '$i', '$d')";
      $addToDB = $db -> query($sql);
      $productAdded = true;
    }

    if ($_GET['action'] == "update") {
      $prod_ID = substr($_POST['url'], -5);
      $sql = "SELECT * FROM products WHERE ID = " . $prod_ID;
      $query = $db -> query($sql);
      if ($query->num_rows == 1) {
        $validURL = true;
        $n = anti_injection($_POST['name']);
        $m = anti_injection($_POST['manuf']);
        $c = anti_injection($_POST['categ']);
        $p = anti_injection($_POST['price']);
        $img = anti_injection($_POST['img']);
        $d = anti_injection($_POST['description']);
        $vals = array($n, $m, $c, $p, $img, $d);
        $cols = array('Name', 'Manuf', 'Category', 'Price', 'Image', 'Description');
        for ($i = 0; $i < 6; $i += 1) {
          if ($vals[$i] != "") {
            $sql = "UPDATE products SET " . $cols[$i] . " = \"" . $vals[$i] . "\" WHERE ID = " . $prod_ID;
            echo "<script> console.log('" . $sql . "')</script>";
            $query = $db -> query($sql);
            $detailsUpdated = true;
          }
        }
      } else { $validURL = false; }
    }
  }

  include 'includes/head.php';
  echo head();
  include 'includes/navigation.php';

  if (!$validURL) { ?>
  <div id="josh-red-card">
    <div class="card text-white bg-danger mb-3" style="max-width: 60rem;">
      <div class="card-header">Whoops!</div>
      <div class="card-body">
        <h5 class="card-title">Invalid Product URL!</h5>
      </div>
    </div>
  </div>
  <?php }

  if ($productAdded) { ?>
  <div id="josh-green-card">
    <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
      <div class="card-header">Success</div>
      <div class="card-body">
        <h5 class="card-title">Product Added to Database</h5>
      </div>
    </div>
  </div>
  <?php }
  if ($detailsUpdated) { ?>
  <div id="josh-green-card">
    <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
      <div class="card-header">Success</div>
      <div class="card-body">
        <h5 class="card-title">Product Updated on Database</h5>
      </div>
    </div>
  </div>
  <?php } ?>

  <div id="josh-black-card">
    <h4><strong> Administrative Features </strong></h4>
    <br>
    <div class="card text-white bg-dark mb-3" style="max-width: 60rem;">
      <div class="card-header">Add New Product</div>
      <div class="card-body">
        <form action="admin_features.php?action=add" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" name="name" placeholder="Product Name" required>
            </div>
            <div class="form-group col-md-6">
              <label>Manufacturer</label>
              <input type="text" class="form-control" name="manuf" placeholder="Manufacturer" required>
            </div>
          </div>
          <hr/>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Category (enter Number)</label>
              <input type="number" class="form-control" name="categ" placeholder="1=DAW, 2=Outboard, 3=MIDI" required>
            </div>
            <div class="form-group col-md-6">
              <label>Price</label>
              <input type="number" step="0.01" class="form-control" name="price" placeholder="499.99" required>
            </div>
          </div>
          <hr/>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Image URL</label>
              <input type="text" class="form-control" name="img" placeholder="https://tinyurl.com/yd8vaalq" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label text-align="center">Description</label>
              <br>
              <textarea name="description" cols="80" rows="4" maxlength="500" placeholder="Up to 500 words" required></textarea>
            </div>
          </div>
          <a href="admin_features.php" class="btn btn-warning">Cancel</a>
          <button type="submit" class="btn btn-primary">Add to Database</button>
        </form>
      </div>
    </div>
  </div>

  <div id="josh-black-card">
    <div class="card text-white bg-dark mb-3" style="max-width: 60rem;">
      <div class="card-header">Edit Product</div>
      <div class="card-body">
        <!-- <h5 class="card-title">Success card title</h5> -->
        <form action="admin_features.php?action=update" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Product URL</label>
              <input type="text" class="form-control" name="url" placeholder="http://www.student.city.ac.uk/~acnh542/EC-Demo-1/shop-detailed.php?id=10011" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" name="name" placeholder="Product Name">
            </div>
            <div class="form-group col-md-6">
              <label>Manufacturer</label>
              <input type="text" class="form-control" name="manuf" placeholder="Manufacturer">
            </div>
          </div>
          <hr/>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Category (enter Number)</label>
              <input type="number" class="form-control" name="categ" placeholder="1=DAW, 2=Outboard, 3=MIDI">
            </div>
            <div class="form-group col-md-6">
              <label>Price</label>
              <input type="number" step="0.01" class="form-control" name="price" placeholder="499.99">
            </div>
          </div>
          <hr/>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Image URL</label>
              <input type="text" class="form-control" name="img" placeholder="https://tinyurl.com/yd8vaalq">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label text-align="center">Description</label>
              <br>
              <textarea name="description" cols="80" rows="4" maxlength="500" placeholder="Up to 500 words"></textarea>
            </div>
          </div>
          <a href="admin_features.php" class="btn btn-warning">Cancel</a>
          <button type="submit" class="btn btn-primary">Edit Product</button>
        </form>
      </div>
    </div>
  </div>

<?php } else {
  header('location:index.php');
  break;
}

echo foot();
?>
