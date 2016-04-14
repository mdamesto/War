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
  for ($x = 1;$x <100; $x++)
  {
    for ($y = 1;$y <80; $y++)
    {
      echo '<div class="case case_'.$x.'_'.$y.'"></div>';
    }
  }
?>
</div>

<script src="./ajax.js"></script>
</body>

</html>
