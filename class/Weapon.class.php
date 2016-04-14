<?PHP

abstract class				Weapon
{
	public static			$verbose = FALSE;
	protected				$_name;
	protected				$_chargeStrict;
	protected				$_chargePP;
	protected				$_shootAera;
	protected				$_shootType;
	protected				$_format = "Weapon( type: %s, name: %s, charge: %d,  Near: %d, Middle: %d, Far: %d )";

	abstract function		getImpactAera($impactPos);

	public function			__construct()
	{
		if (self::$verbose === TRUE)
			print($this . " constructed." . PHP_EOL);
		$this->reset_chargePP();;
	}

	public function			__destruct()
	{
		if (self::$verbose === TRUE)
			print($this . " destructed." . PHP_EOL);
	}

	public function			__toString()
	{
		return sprintf($this->_format, get_class($this), $this->_name, $this->_chargeStrict, $this->_shootAera['near'], $this->_shootAera['middle'], $this->_shootAera['far']);
	}

	public static function	doc()
	{
		if (file_exists('Weapon.doc.txt'))
			return file_get_contents('Weapon.doc.txt');
	}

	public function			getName()
	{
		return $this->_name;
	}

	public function			getChargeStrict()
	{
		return $this->_charge;
	}

	public function			getShootAera()
	{
		return $this->_shootAera;
	}

	public function			give_chargePP($PP)
	{
		$this->_chargePP += $PP;
	}

	public function			getTotalCharge()
	{
		return $this->_chargeStrict + $this->_chargePP;
	}

	public function			reset_chargePP()
	{
		$this->_chargePP = $this->_chargeStrict;
	}

	public function			getShootableAera($center, $size)	// $size['x'] always refer to E<->W size and $size['y'] to N<->S size..
	{
		$offShipX = ($size['x'] - 1) / 2;
		$offShipY = ($size['y'] - 1) / 2;

		$offNearX = $offShipX + $this->_shootAera['near'];
		$offNearY = $offShipY + $this->_shootAera['near'];

		$offMiddleX = $offShipX + $this->_shootAera['middle'];
		$offMiddleY = $offShipY + $this->_shootAera['middle'];

		$offFarX = $offShipX + $this->_shootAera['far'];
		$offFarY = $offShipY + $this->_shootAera['far'];

		$x_cp = $center['x'] - ($offFarX + 1);
		$y = $center['y'] - ($offFarY + 1);
		$xMax = $center['x'] + $offFarX;
		$yMax = $center['y'] + $offFarY;

		print("x = " . $x_cp . PHP_EOL);
		print("y = " . $y . PHP_EOL);
		print("xMax = " . $xMax . PHP_EOL);
		print("xMax = " . $xMax . PHP_EOL);

		while (++$y <= $yMax)
		{
			if ($y < 0)
				continue ;
			$x = $x_cp;
			while (++$x <= $xMax)
			{
				if ($x < 0)
					continue ;
				if (($x > ($center['x'] + $offMiddleX) OR $y > ($center['y'] + $offMiddleY)) OR ($x < ($center['x'] - $offMiddleX) OR $y < (($center['y'] - $offMiddleY))))
					$dist = 'far';
				else if (($x > ($center['x'] + $offNearX) OR $y > ($center['y'] + $offNearY)) OR ($x < ($center['x'] - $offNearX) OR $y < (($center['y'] - $offNearY))))
					$dist = 'middle';
				else if (($x > ($center['x'] + $offShipX) OR $y > ($center['y'] + $offShipY)) OR ($x < ($center['x'] - $offShipX) OR $y < (($center['y'] - $offShipY))))
					$dist = 'near';
				else
					$dist = 'ship';
				$aera[] = array('x' => $x, 'y' => $y, 'dist' => $dist);
			}
		}
		return $aera;
	}
}

?>
