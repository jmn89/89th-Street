<?php
session_start();
require_once 'core/init.php';

$justLeft = false;
if (!empty($_GET['action'])) {
  switch ($_GET['action']) {
    case 'logout':
      unset($_SESSION['Username']);
      unset($_SESSION['Password']);
      unset($_SESSION['isLoggedIn']);
      unset($_SESSION['cart']);
      $justLeft = true;
      break;

    default:
      break;
  }
}

include 'includes/head.php';
echo head();
include 'includes/navigation.php';

if ($justLeft) { ?>
  <div id="josh-green-card">
    <div class="card text-white bg-success mb-3" style="max-width: 80rem;">
      <div class="card-header">Success!</div>
      <div class="card-body">
        <h4 class="card-title">You are now Signed Out!</h4>
      </div>
    </div>
  </div>
<?php } ?>
<div id="josh-blue-card">
  <div class="card text-white bg-primary mb-3" style="max-width: 80rem;">
    <div class="card-header">Welcome to 89th Street!</div>
    <div class="card-body">
        <p class="card-text" id="bluecard-text">89th Street is the UK’s largest musical instrument and technology retailers. Frustrated by the general direction of musical instrument shops, we decided that we’d start our own and run it in the way we think music shops should be run. The store is both owned and run by musicians. As such, we set out to live up to our motto - “The Friendly Music Store” – not only by offering friendly service to our customers, but genuinely caring about our staff and the wider community, including our suppliers and competitors, and the music world that allows us to exist.</p>
        <p class="card-text" id="bluecard-text"><strong>Address: </strong>Northampton Square, London, EC1V 0HB</p>
        <p class="card-text" id="bluecard-text"><strong>Tel: </strong>020 7040 5060</p>
        <p class="card-text" id="bluecard-text"><strong>Email: </strong>89thstreet@89thstreet.com</p>
    </div>
    <div>
      <div id="map" style="width:100%;height:200px"></div>
      <script>
        function myMap() {
          var location = {lat: 51.527560, lng: -0.101858};
          var map = new google.maps.Map(document.getElementById("map"),{
            zoom: 15,
            center: location
          });
          var marker = new google.maps.Marker({
            position: location,
            map: map,
            title : 'Store Location'
          });
          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHI6QfAQau5lQ__pC3nzitSmxLWKtNaSM&callback=myMap"></script>
    </div>
  </div>
</div>
<div id="slideshow" class="carousel slide" data-ride="carousel" data-interval="2000" style="width: 600px; margin: 0 auto">
  <div class="carousel-inner">
    <div class="carousel-item active" id="slideshowItem1">
    <?php for ($i = 1; $i < 9; $i += 1) { ?>
      <img class="d-block w-100" src="images/<?php echo $i?>.png">
    </div>
    <?php if ($i < 8) { ?>
      <div class="carousel-item" id="slideshowItem2">
    <?php } } ?>
      </div>
  </div>
</div>
<?php echo foot(); ?>
