<?PHP
require_once "Weapon.class.php";
require_once "Ship.class.php";
require_once "HeavyMachineGun.class.php";
require_once "ImperialDestroyer.class.php";

$s = new ImperialDestroyer(1);
print($s->getId().PHP_EOL);
$s = new ImperialDestroyer(1);
print($s->getId().PHP_EOL);
$s = new ImperialDestroyer(2);
print($s->getId().PHP_EOL);
$s = new ImperialDestroyer(2);
print($s->getId().PHP_EOL);

?>
