<?php


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


echo json_encode($data);
?>
