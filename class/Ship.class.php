<?PHP

abstract class				Ship
{
	public static			$verbose = FALSE;
	static protected		$_idCount;
	protected				$_id;
	protected				$_owner;			//	Player 1 || 2
	protected				$_name;				//	Badass Name
	protected				$_spriteSrc;		//	Sprite Path
	protected				$_actived;			//	Boolean TRUE is ever activated this tour
	protected				$_position;			//	array('x' => Xcenter, 'y' => Ycenter, 'dir' => N || S || W || E)
	protected				$_size;				//	array('x' => largeur, 'y' => Longueur)
	protected				$_maneuvrability;	//	Carac
	protected				$_speed;			//	Carac
	protected				$_PpMax;			//	Carac
	protected				$_PvMax;			//	Carac
	protected				$_PvCurr;			//	Current Carac PV Value
	protected				$_PpCurr;			//	Current Carac PP Value
	protected				$_PsPp;				//	Current Carac Shield Value (+PP)
	protected				$_speedPp;			//	Current Carac Speed Value (+PP)
	protected				$_weapons;			//	array(new Weapon, new Weapon ...)
	protected				$_state;			//	Current mobility state
	protected				$_format = "Ship( type: %s, name: %s, sprite: %s, size: %s, center: %s, direction: %s, PV: %d, PP: %d, speed: %d, maneuvrability: %d, weapons[%d]: %s)";

	abstract function		fire($target);

	protected function		resetPP()
	{
		$this->_PpCurr = $this->_PpMax;
		$this->_speedPp = $this->_speed;;
		$this->_PsPp = 0;
		foreach ($this->_weapons as $weapon)
			$weapon->reset_chargePP();
	}

	public function			__construct($owner)
	{
		if (self::$verbose === TRUE)
			print($this . " constructed." . PHP_EOL);
		$this->_id = self::$_idCount++;
		$this->_owner = $owner;
		$this->_state = "motionless";
		$this->_position['dir'] = (($owner === 1) ? 'N' : 'S');
		$this->resetPP();
	}

	public function			__destruct()
	{
		if (self::$verbose === TRUE)
			print($this . " destructed." . PHP_EOL);
	}

	public function			__toString()
	{
		$i = sizeof($this->_weapons);
		foreach ($this->_weapons as $weapon)
		{
			$str .= $weapon->getName();
			if (--$i !== 0)
				$str .= ", ";
			else
				$str .= " ";
		}
		return sprintf($this->_format, get_class($this), $this->_name, $this->_spriteSrc, $this->_size['L'] . "x" . $this->_size['l'], $this->center['L'] . "x" . $this->center['l'], $this->dir, $this->_PvMax, $this->_PpMax, $this->_speed, $this->_maneuvrability, sizeof($this->_weapons), $str);
	}

	public static function	doc()
	{
		if (file_exists('Ship.doc.txt'))
			return file_get_contents('Ship.doc.txt');
	}

	public function			getId();
	{
		return $this->_id;
	}

	public function			getOwner()
	{
		return $this->_owner;
	}

	public function			getName()
	{
		return $this->_name;
	}

	public function			getSprite()
	{
		return $this->_spriteSrc;
	}

	public function			getSize()
	{
		return $this->_size;
	}

	public function			getManeuvrability()
	{
		return $this->_maneuvrability;
	}

	public function			getSpeed()
	{
		return $this->_speed;
	}

	public function			getPv()
	{
		return $this->_PvMax;
	}

	public function			getPp()
	{
		return $this->_Pp;
	}

	public function			getPvCurr()
	{
		return $this->_PvCurr;
	}

	public function			getPpCurr()
	{
		return $this->_PpCurr;
	}

	public function			getPs()
	{
		return $this->_PsPp;
	}

	public function			getSpeedPp()
	{
		return $this->_speedPp;
	}

	public function			getWeapons()
	{
		return $this->_weapons;
	}

	public function			getActivated()
	{
		return $this->_activated;
	}

	public function			getPosition()
	{
		return $this->_position;
	}

	public function			setPosition($position)
	{
		if (isset($position['dir']))
			$this->_position['dir'] = $position['dir'];
		$this->_position = array('x' => $position['x'], 'y' => $position['y']);
	}

	public function			active()
	{
		$this->_actived = TRUE;
	}

	public function			repare()
	{
		if ($this->_PvCurr < $this->_PvMax)	// D6
			$this->_PvCurr += 1;
	}

	public function			givePPshield($PP)
	{
		if ($PP > $this->_PpCurr)
			return FALSE;
		$this->_PpCurr -= $PP;
		$this->_PsPp += $PP;
	}

	public function			givePPspeed($PP)
	{
		if ($PP > $this->_PpCurr)
			return FALSE;
		$this->_PpCurr -= $PP;
		$this->_speedPp += $PP;				//	D6
	}

	public function			get_speedCurr()
	{
		return $this->_speedPp;
	}

	public function			get_shieldCurr()
	{
		return $this->_PsPp;
	}

	public function			getSpace($physical = FALSE)
	{
		$offX = ($this->_size['x'] - 1) / 2;
		$offY = ($this->_size['y'] - 1) / 2;
		if ($physical !== TRUE)
		{
			$offX += $this->_weapons[0]->getShootAera()['near'];
			$offY += $this->_weapons[0]->getShootAera()['near'];
		}
		$x = $this->_position['x'] - $offX;
		$y = $this->_position['y'] - $offY;
		$xMax = $this->_position['x'] + $offX;
		$yMax = $this->_position['y'] + $offY;

		print("toto" . PHP_EOL);
		for ($i = $y; $i <= $yMax; $i++)
		{
			for ($j = $x; $j <= $xMax; $j++)
				$aera[] = array('x' => $j, 'y' => $i);
		}
		return $aera;
	}

	public function			reset()
	{
		$this->_actived = FALSE;
		$this->resetPP();
	}

	public function			hearted($damage)
	{
		if ($damage >= ($this->_PvCurr + $this->_PsPp))
			return TRUE;
		if ($damage <= $this->_PsPp)
		{
			$this->_PsPp -= $damage;
			return FALSE;
		}
		$damage -= $this->_PsPp;
		$this->_PsPp = 0;
		$this->_PvCurr -= $damage;
		return FALSE;
	}
}

?>
