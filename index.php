<?php
require_once("include.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
    <link rel="stylesheet" type="text/css" href="./resources/style.css">
    <link rel="stylesheet" type="text/css" href="./map.css.php">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  </head>
<body>
<div class="plateau">
<?php
  for ($x = 1;$x <=150; $x++)
  {
    for ($y = 1;$y <=100; $y++)
    {
      echo '<div class="case case_'.$x.'_'.$y.'"></div>';
    }
  }
?>
</div>
<script src="./resources/ajax.js"></script>
</body>
</html>
