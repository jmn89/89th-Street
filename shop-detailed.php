<?php
session_start();
require_once 'core/init.php';
include 'includes/head.php';
echo head();
include 'includes/navigation.php';

if (empty($_GET['id'])) {
  header('location:shop.php');
}
$selectedProduct = $_GET['id'];
$sql = "SELECT * FROM products WHERE ID = " . $selectedProduct;
$query = $db -> query($sql);
$element = mysqli_fetch_assoc($query);
$elementName = $element['Name'];

$reviewPosted = false;
if (!empty($_GET["action"])) {

  if ($_GET["action"] == "add") {
    $name = $_POST["name"];
    $location = $_POST["loc"];
    $review = $_POST["review"];
    if (!empty($_POST["reviewRating"])) {
      $rating = $_POST["reviewRating"];
    }
    $statement = "INSERT INTO reviews542 (Name, Location, ProductID, Rating, Review) VALUES
    ('$name', '$location', '$selectedProduct', '$rating', '$review')";
    $addReview = $db -> query($statement);
    $reviewPosted = true;
  }
}
?>

<?php if ($reviewPosted) { ?>
<div id="josh-green-card">
  <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
    <div class="card-header">Success!</div>
    <div class="card-body">
      <h4 class="card-title">Your review is now posted.</h4>
    </div>
  </div>
</div>
<?php } ?>

<div id="josh-blue-card">
  <div class="card text-white bg-primary mb-3" style="max-width: 60rem;">
    <div class="card-header"><a href="#" style="color:white"> <?php echo $elementName ?> </a></div>
    <div class="card-body">
      <p class="card-text" id="bluecard-text"> <?php echo $element['Description']; ?> </p>
      <p><img src=" <?php echo $element['Image']; ?> "/></p>
      <p class="card-text" id="bluecard-text"> from <?php echo $element['Manuf'] ?> </p>
      <div class="productPrice" id="bluecard-text"> £<?php echo $element['Price']; ?> </div>
      <br>
      <form method="post" action="cart4.php?action=add&code=<?php echo $selectedProduct; ?>" class="small">
        <button type="submit" class="btn btn-primary">Add To Cart</button>
      </form>
      <br>
    </div>
  </div>
</div>

<?php
$sql2 = "SELECT * FROM reviews542 WHERE ProductID = " . $selectedProduct;
$query = $db -> query($sql2);
while ($e = mysqli_fetch_assoc($query)) : ?>
  <div class="card bg-light mb-3" style="max-width: 60rem;">
    <div class="card-header"> Review from <?php echo $e['Name'] ?>, <?php echo $e['Location'] ?> </div>
    <div class="card-body">
      <h5 class="card-title"> <?php echo $e['Rating'] ?> / 5 </h5>
      <p class="card-text"> <?php echo $e['Review'] ?> </p>
    </div>
  </div>
<?php endwhile ?>

<div id="josh-green-card">
  <div class="card text-white bg-success mb-3" style="max-width: 60rem;">
    <div class="card-header">What Do You Think?</div>
    <div class="card-body">
      <form action="shop-detailed.php?action=add&id=<?php echo $selectedProduct?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Joe Bloggs" required>
          </div>
          <div class="form-group col-md-6">
            <label>Location</label>
            <input type="text" class="form-control" name="loc" placeholder="Manchester" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label text-align="center">Review</label>
            <br>
            <textarea cols="100" rows="2" maxlength="100" name="review" required></textarea>
          </div>
        </div>
        <p style="color:black">Rating:</p>
        <?php
        for ($i = 5; $i > 0; $i -= 1) { ?>
          <input type="radio" class="rButton" name="reviewRating" value=" <?php echo $i ?>">
            <span class="ratings">
            <?php for ($i2 = 1; $i2 <= $i; $i2 += 1) { ?>
              <i class="far fa-star"></i>
            <?php } ?>
            </span><br>
        <?php } ?>
        <br>
        <button type="submit" class="btn btn-success">Submit Review</button>
      </form>
    </div>
  </div>
</div>

<?php echo foot(); ?>
