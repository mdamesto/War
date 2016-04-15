<?php
header("Content-type: text/css");
require_once("include.php");
if (isset($_SESSION['board']))
{
  $board = unserialize($_SESSION['board']);
  $screen = $board->getSize();

  $size = 10;
  $width = 100;
  $height = 80;

  echo "
  .case {
  width : ".$size."px;
  height : ".$size."px;
  }

  .plateau {
  width : ".$size*$width."px;
  height : ".$size*$height."px;
  }

  ";
  for($x = 0; $x < $screen['x']; $x++)
  {
    for($y = 0; $y < $screen['y']; $y++)
    {
      echo "
      .case_".$x."_".$y." {
          left : ".($size*$x)."px;
          top : ".($size*$y)."px;
      }
      ";
    }
  }
}
?>
