<?php
require_once("./include.php");

if (isset($_SESSION['board']))
{
  $board = unserialize($_SESSION['board']);
}
else {
  $board = new Board ();
}




$board->add_meteor(mt_rand(20,80), mt_rand(20,80), mt_rand(1,8));


/*
print ("\n\nRECRUITING----------------------\n\n");
$board->recruit(1, "ImperialDestroyer", "OVER OF THE STARDEATH");
$board->recruit(1, "ImperialDestroyer", "PHP BADASS");
$board->recruit(2, "ImperialDestroyer", "YOUPI");

//print ($destroy1);


print ("\n\nMOVES--------------------------\n\n");
$board->orient(1, 0, "West");
$board->move(1, 0, 2);
$board->orient(1, 0, "South");
$board->move(1, 0, 5);
$board->orient(1, 0, "North");
$board->move(1, 0, 15);
$board->move(1, 0, 11);
$board->move(1, 0, 5);
$board->move(2, 0, 42);
*/


/*
print ("\n\nPLAYER RESUME-------------------\n\n");
print ($board->getPlayer1() . PHP_EOL);
print ($board->getPlayer2() . PHP_EOL);

$board->getShips();

*/
print ("\n\nMAP----------------------------\n\n");
$board->print_map();

print_r($board->sendAsteroid());


echo "\n---BABAILLE---\n\n";

?>
