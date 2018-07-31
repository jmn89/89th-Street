<?php
session_start();
require_once 'core/init.php';
include 'includes/head.php';
echo head();
include 'includes/navigation.php';
?>

<div id="josh-green-card">
  <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
    <div class="card-header">Sign-In</div>
    <div class="card-body">
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

<div id="josh-green-card">
  <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
    <div class="card-header">Register</div>
    <div class="card-body">
      <form action="register_action.php" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Username</label>
            <input type="text" class="form-control" name="regUsername" placeholder="Username" required>
          </div>
          <div class="form-group col-md-6">
            <label>Password</label>
            <input type="password" class="form-control" name="regPassword" placeholder="Password" required>
          </div>
        </div>
        <hr/>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" name="regEmail" placeholder="ab@email.com" required>
          </div>
          <div class="form-group col-md-6">
            <label>Phone</label>
            <input type="text" class="form-control" name="regPhone" placeholder="0797*******">
          </div>
        </div>
        <hr/>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Real Name</label>
            <input type="text" class="form-control" name="regName" placeholder="Steve Jobs" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label text-align="center">Address</label>
            <br>
            <textarea name="regAddress" cols="80" rows="4" maxlength="400" required></textarea>
          </div>
        </div>
        <a href="shop.php" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-success">Register</button>
      </form>
    </div>
  </div>
</div>

<?php echo foot(); ?>
