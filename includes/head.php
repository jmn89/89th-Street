<?php
session_start();
function head() {
  $html =
    '<!doctype html>
    <html lang = "en">
    <head>
        <title>89th Street Shop</title>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/fa/css/fontawesome-all.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>';
    return $html;
}

function foot() {
  $html =
  "<br>
  <hr/>
  <div id=\"footer\">
    <p> 89th Street <i class=\"far fa-copyright fa-sm\"></i> 2018 </p>
    <a href=\"https://www.twitter.com\"><i class=\"fab fa-twitter-square fa-3x\"></i></a>
    <a href=\"https://www.facebook.com\"><i class=\"fab fa-facebook-square fa-3x\"></i></a>
    <a href=\"https://www.instagram.com\"><i class=\"fab fa-instagram fa-3x\"></i></a>
  </div>
  <br>

  </body>
  </html>";
  return $html;
}
?>
