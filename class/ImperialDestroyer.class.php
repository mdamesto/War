<?PHP

class				ImperialDestroyer extends Ship
{
	public function	__construct($owner)
	{
		$this->_name = "Sword Of Absolution";
		$this->_spriteSrc = "img/sprite/ImperialDestroyer.jpg";
		$this->_size['L'] = 3; // 7
		$this->_size['l'] = 1; // 3
		$this->_maneuvrability = 3;
		$this->_speed = 18;
		$this->_PpMax = 10;
		$this->_PvMax = 4;
		$weapon = new HeavyMachineGun();
		$this->_weapons[] = $weapon;
		$this->_weapons[] = clone $weapon;
		parent::__construct($owner);
	}

	public function	fire($target)
	{
		if ($target[0]->hearted(5) === TRUE) //	D6
			return TRUE;
	}
}

?>
