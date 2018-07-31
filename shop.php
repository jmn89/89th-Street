<?php
session_start();
require_once 'core/init.php';
include 'includes/head.php';
echo head();
include 'includes/navigation.php';

$sql = "SELECT * from products";

$isFilterArr = array(false, false, false, false);
$isSortArr = $isFilterArr;

if (isset($_GET['cat']) && $_GET['cat'] != 0) {
    $isFilterArr[$_GET['cat']] = true;
    $sql .= " WHERE Category = " . $_GET['cat'];
} else { $isFilterArr[0] = true; }

if (isset($_POST['filter'])) {
  $statement = " WHERE Category = " . $_POST['filter'];
  switch ($_POST['filter']) {
    case 0:
      $isFilterArr[0] = true;
      break;
    case 1:
      $isFilterArr[1] = true;
      $sql .= $statement;
      break;
    case 2:
      $isFilterArr[2] = true;
      $sql .= $statement;
      break;
    case 3:
      $isFilterArr[3] = true;
      $sql .= $statement;
      break;
    default:
      $sql .= $statement;
      break;
  }
}

if (isset($_POST['Search']) && $_POST['Search'] != "") {
  $st0 = "";
  if (substr($sql, -8) != "products") {
    $st0 .= " AND";
  } else {
    $st0 .= " WHERE";
  }
  $st0 .= " (Name LIKE \"%" . $_POST['Search'] . "%\" OR Manuf LIKE \"%" . $_POST['Search'] . "%\")";
  $sql .= $st0;
  unset($_POST['Search']);
}

if (isset($_POST['sort'])) {
  switch ($_POST['sort']) {
    case 1:
      $sql .= " ORDER BY Manuf ASC";
      $isSortArr[1] = true;
      break;
    case 2:
      $sql .= " ORDER BY Price ASC";
      $isSortArr[2] = true;
      break;
    case 3:
      $sql .= " ORDER BY Price DESC";
      $isSortArr[3] = true;
      break;
    default:
      $sql .= " ORDER BY Name ASC";
      $isSortArr[0] = true;
      break;
  }
}
unset($_POST['Search']);
unset($_POST['filter']);
unset($_GET['cat']);
?>

<div id="josh-blue-card">
  <div class="card text-white bg-primary mb-3" style="max-width: 80rem;">
    <div class="card-header">Search Shop</div>
    <div class="card-body">
      <form action="shop.php" method="post" >
          <div class="form-row">
            <div class="form-group col-md-6">
              <h5 class="card-title"><strong>Search:</strong></h5>
              <input type="text" class="form-control" name="Search">
            </div>
          </div>
          <br>
          <h5 class="card-title"><strong>Filter Categories:</strong></h5>
            <?php
            $check = "checked=\"checked\"";
            $query = $db -> query("SELECT * FROM products_Categories");
            ?>
            <input type="radio" name="filter" value="0" <?php if ($isFilterArr[0]) {echo $check;} ?> > <label id="bluecard-text"> Show All </label>
            <?php $count = 1;
            while ($element = mysqli_fetch_assoc($query)) : ?>
            <input type="radio" name="filter" value="<?php echo $element['ID'];?>" <?php if ($isFilterArr[$count]) {echo $check;} ?> ><label id="bluecard-text"> <?php echo $element['Name'];?> </label>
            <?php $count += 1;
            endwhile; ?>
          <br><br>
          <h5 class="card-title"><strong>Sort By:</strong></h5>
            <input type="radio" name="sort" value="0" <?php if ($isSortArr[0]) {echo $check;} ?> > <label id="bluecard-text"> Product A-Z </label>
            <input type="radio" name="sort" value="1" <?php if ($isSortArr[1]) {echo $check;} ?> > <label id="bluecard-text"> Manufacturer A-Z </label>
            <input type="radio" name="sort" value="2" <?php if ($isSortArr[2]) {echo $check;} ?> > <label id="bluecard-text"> Price [Low-High] </label>
            <input type="radio" name="sort" value="3" <?php if ($isSortArr[3]) {echo $check;} ?> > <label id="bluecard-text"> Price [High-Low] </label>
            <br><br>
          <button type="input" class="btn btn-primary"> Search </button>
      </form>
      <br>

      <?php $query = $db -> query($sql);
      if ($query->num_rows == 0) { ?>
        <div id="josh-red-card">
    			<div class="card text-white bg-danger mb-3" style="max-width: 60rem;">
    				<div class="card-header">Whoops!</div>
    				<div class="card-body">
    					<h3 class="card-title">Your search returned 0 products!</h3>
    				</div>
    			</div>
    		</div>
      <?php } else { ?>
        <ul class="prodList">
          <?php
          $count = 1;
          while ($element = mysqli_fetch_assoc($query)) :
            if ($count < 4) { ?>
              <li id="li-grid-top">
            <?php } else if ($count == 4) { ?>
              <li id="li-grid-topright">
            <?php } else if ($count % 4 != 0) { ?>
              <li>
            <?php } else { ?>
              <li id="li-grid-last">
              <?php } ?>
                <div class="product">
                  <form method="post" action="cart4.php?action=add&code=<?php echo $element['ID']; ?>"  class="small">
                    <img src=" <?php echo $element['Image']; ?> "/>
                    <br><br>
                    <div><label id="bluecard-text"><strong> <?php echo $element['Manuf']; ?> </strong></label></div>
                    <div><a href="shop-detailed.php?id=<?php echo $element['ID'];?>"> <strong> <?php echo $element['Name']; ?> </strong></a></div>
                    <div class="productPrice"><label id="bluecard-text"> £ <?php echo $element['Price']; ?> </label></div>
                    <br>
                    <button type="submit" class="btn btn-success btn-sm"> Add to Cart </button>
                  </form>
                </div>
              </li>
            <?php
            $count += 1;
          endwhile;
          ?>
        </ul>
      <?php } ?>
    </div>
  </div>
</div>

<?php echo foot(); ?>
