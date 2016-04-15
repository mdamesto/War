<?php
require_once("include.php");

//var_dump($_SESSION);



$data = array(
  array(
    'pos'=>array('x'=>10, 'y'=>50),
    'orient' => "south",
    'size' => array(1 ,3)
  ),
  array(
    'pos'=>array('x'=>20, 'y'=>10),
    'orient' => "south",
    'size' => array(1 ,3)
  ),
  array(
    'pos'=>array('x'=>30, 'y'=>70),
    'orient' => "south",
    'size' => array(1 ,3)
  ),
  array(
    'pos'=>array('x'=>50, 'y'=>50),
    'orient' => "south",
    'size' => array(1 ,3)
  ),
  array(
    'pos'=>array('x'=>75, 'y'=>50),
    'orient' => "south",
    'size' => array(1 ,3)
  )
);

if (isset($_SESSION['board']))
{
  $board = unserialize($_SESSION['board']);

  if ($_GET['get'] == "asteroid") {
    echo json_encode($board->sendAsteroid());
  }
  else if ($_GET['get'] == "ships") {
    $ship = $board->sendShips();
    echo json_encode($ship);
  }
}


?>
