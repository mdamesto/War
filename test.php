<?php
echo "\n---HELLO---\n";

include_once ('Player.class.php');
include_once ('Fleet.class.php');
include_once ('Ship.class.php');
include_once ('ImperialDestroyer.class.php');
include_once ('Moove.trait.php');

//$destroy1 = new ImperialDestroyer ('RUN BITCH');
//print ($destroy1);

print ("\n\nPLAYER CREATION-----------------\n\n");
$player1 = new Player ( array ( 'playerName' => 'JENAIPAS', 'fleetName' => 'FLEETNAME'));
//print ($player1);

print ("\n\nRECRUITING----------------------\n\n");
	$player1->getAtt('Fleet')->recruit("ImperialDestroyer", "OVER OF THE STARDEATH");
	$player1->getAtt('Fleet')->recruit("ImperialDestroyer", "BATTLESTAR GALACTICA");
	$player1->getAtt('Fleet')->recruit("ImperialDestroyer", "STONEHEART JHIN");
//print ($destroy1);


print ("\n\nMOOVES--------------------------\n\n");
$player1->getAtt('Fleet')->getAtt('fleet')[0]->orient('West');
$player1->getAtt('Fleet')->getAtt('fleet')[0]->moove(2);
$player1->getAtt('Fleet')->getAtt('fleet')[0]->orient('South');
$player1->getAtt('Fleet')->getAtt('fleet')[0]->moove(5);
$player1->getAtt('Fleet')->getAtt('fleet')[0]->orient('North');
$player1->getAtt('Fleet')->getAtt('fleet')[0]->moove(10);
$player1->getAtt('Fleet')->getAtt('fleet')[2]->moove(42);

print ("\n\nPLAYER RESUME-------------------\n\n");
print ($player1);
echo "\n---BABAILLE---\n\n";

?> 