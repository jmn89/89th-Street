<?php
session_start();
$sql = "SELECT * FROM products_Categories";
$query = $db -> query($sql);
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-primary flex-row">
    <a href class="navbar-brand d-flex w-50 mr-0">
      <img src="images/logo.png" id="logo"/>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCenter">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100" id="navbarCenter">
      <ul class="navbar-nav mx-sm-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="shop.php?cat=0"> All Products </a>
              <?php while ($element = mysqli_fetch_assoc($query)) : ?>
                <a class="dropdown-item" href="shop.php?cat=<?php echo $element['ID']; ?> "> <?php echo $element['Name']; ?> </a>
              <?php endwhile; ?>
            </div>
        </li>
        <li class="nav-item">
          <div class="navabarCartDigit" id="cart">
            <a class="nav-link" href="cart4.php">Cart</a>
          </div>
        </li>

        <?php if (isset($_SESSION['isLoggedIn'])) { ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="my_account.php"> My Account </a>
                <a class="dropdown-item" href="index.php?action=logout"> Sign-Out </a>
            </div>
        </li>
        <?php } else { ?>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Register / Sign-In</a>
        </li>
        <?php } ?>
      </ul>
    </div>
    <div class="d-flex w-50"></div>
</nav><br>
