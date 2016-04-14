<?PHP

require_once "Weapon.class.php";

class				HeavyMachineGun extends Weapon
{
	public function	__construct()
	{
		$this->_name = "Heavy Machine Gun";
		$this->_charge = 0;
		$this->_shootAera['near'] = 3;
		$this->_shootAera['middle'] = 7;
		$this->_shootAera['far'] = 10;
		$this->_shootType = array('traverse' => FALSE, 'zone' => FALSE);
		parent::__construct();
	}

	public function	getImpactAera($impactPos)
	{
		return array(array('x' => $impactPos['x'], 'y' => $impactPos['y']));
	}
}

?>
