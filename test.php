<?php
echo "\n---HELLO---\n";

include_once ('class/Board.class.php');
include_once ('class/Player.class.php');
include_once ('class/Fleet.class.php');
include_once ('class/Ship.class.php');
include_once ('class/ImperialDestroyer.class.php');
include_once ('trait/Moove.trait.php');

//$destroy1 = new ImperialDestroyer ('RUN BITCH');
//print ($destroy1);

print ("\n\nBOARD CREATION-----------------\n\n");
$board = new Board ();


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


print ("\n\nPLAYER RESUME-------------------\n\n");
print ($board->getAtt('player1') . PHP_EOL);
print ($board->getAtt('player2') . PHP_EOL);


print ("\n\nMAP----------------------------\n\n");
$board->print_map();

echo "\n---BABAILLE---\n\n";

?>