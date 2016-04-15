<?PHP

class				HeavyMachineGun extends Weapon
{
	public function	__construct()
	{
		$this->_name = "Heavy Machine Gun";
		$this->_charge = 0;
		$this->_shootAera = array('near' => 3, 'middle' => 7, 'far' => 10);
		$this->_shootType = array('traverse' => FALSE, 'zone' => FALSE);
		parent::__construct();
	}

	public function	getImpactAera($impactPos)
	{
		return array(array('x' => $impactPos['x'], 'y' => $impactPos['y']));
	}
}

?>
