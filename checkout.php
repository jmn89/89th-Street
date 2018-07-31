<?php
session_start();
require_once 'core/init.php';

if (!isset($_SESSION['Username']) || !isset($_SESSION['Password'])) {
  header('location:cart4.php?action=login');
  break;
} else {
  $user = $_SESSION['Username'];
  $sql = "SELECT * from customers WHERE Username = \"$user\"";
  $query = $db -> query($sql);
  $user = mysqli_fetch_assoc($query);
  foreach ($_SESSION["cart"] as $item) {
    $cust = $user['ID'];
    $date = date("Y-m-d H:i:s");
    $id = $item['id'];
    $quantity = $item['quantity'];
    $sql = "INSERT INTO sales542 (Customer_ID, DateOfSale, Product_ID, Quantity) VALUES ('$cust', '$date', '$id', '$quantity')";
  	$query = $db -> query($sql);
  }
  include 'includes/head.php';
  echo head();
  include 'includes/navigation.php';
  ?>
    <div id="josh-green-card">
      <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
        <div class="card-header">Success! Your Purchase is Complete!</div>
        <div class="card-body">
          <h4 class="card-title">Your Products below:</h4>
          <?php foreach ($_SESSION["cart"] as $item) {
            $n = $item['name'];
            $q = $item['quantity'];
            ?>
            <p class="card-text"> <?php echo $n; if ($q > 1) echo " (x" . $q . ")"; ?></p>
          <?php } ?>
          <h4 class="card-title">will be sent to:</h4>
          <p class="card-text"> <?php echo $user['Address']; ?></p>
          <a href='shop.php' class='btn btn-warning' role='button'>Shop Again</a>
          <a href='my_account.php' class='btn btn-success' role='button'>Go To My Account</a>
          <br><br>
          <a href="https://twitter.com/intent/tweet?screen_name=89thstreetokc&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-size="large" data-text="just sold me a great product!" data-dnt="true" data-show-count="false">Tweet to @89thstreetokc</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
  <?php
  unset($_SESSION['cart']);
  }
  echo foot(); ?>
