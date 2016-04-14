<?php
header("Content-type: text/css");
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
for($x = 0; $x < 100; $x++)
{
  for($y = 0; $y < 80; $y++)
  {
    echo "
    .case_".$x."_".$y." {
        left : ".($size*$x)."px;
        top : ".($size*$y)."px;
    }
    ";
  }
}
?>
