<?php
require_once("include.php");
if (isset($_SESSION['board']))
{
  $board = unserialize($_SESSION['board']);
  $size = $board->getSize();
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
  for ($x = 0;$x < $size['x']; $x++)
  {
    for ($y = 0;$y <$size['y']; $y++)
    {
      echo '<div class="case case_'.$x.'_'.$y.'"></div>';
    }
  }
?>
</div>
<div class="panel">
  <div class="sub-panel">
    PP
  </div>
  <div class="sub-panel">
    Movement
  </div>
  <div class="sub-panel">
    Attack
  </div>
</div>
<script src="./resources/ajax.js"></script>
</body>
</html>
<?php
}
?>
