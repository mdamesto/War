<?PHP

require_once ("./trait/Move.trait.php");
require_once ("./trait/Power.trait.php");
require_once ("./trait/Fight.trait.php");
require_once ("./trait/Position.trait.php");
require_once ("./interface/IGeneral.interface.php");

abstract class				Ship implements General{
	
	use 					Move; 				//contain all moves method
	use 					Power;				//contain all PP gestion method
	use 					Fight;				//contain all fight gestion method
	use 					Position;			//return Position? et other math/position stuff

	public static			$verbose = FALSE;
	static protected		$_idCount = 0;
	protected				$_id;
	protected				$_owner;			//	Player 1 || 2
	protected				$_name;				//	Badass Name
	protected				$_spriteSrc;		//	Sprite Path
	protected				$_actived;			//	Boolean TRUE is ever activated this tour
	protected				$_position;			//	array('x' => Xcenter, 'y' => Ycenter, 'dir' => N || S || W || E)
	protected				$_oldPosition;		//	array('x' => Xcenter, 'y' => Ycenter, 'dir' => N || S || W || E)
	protected				$_size;				//	array('x' => largeur, 'y' => Longueur)
	protected				$_maneuvreInit;		//	Carac
	protected				$_speedInit;		//	Carac
	protected				$_PpInit;			//	Carac
	protected				$_PvInit;			//	Carac
	protected				$_PsInit;
	protected				$_Pv;			//	Current Carac PV Value
	protected				$_Pp;			//	Current Carac PP Value
	protected				$_Ps;				//	Current Carac Shield Value (+PP)
	protected				$_moved;		//	Carac
	protected				$_maneuvre;		//	Carac
	protected				$_speed;			//	Current Carac Speed Value (+PP)
	protected				$_weapons;			//	array(new Weapon, new Weapon ...)
	protected				$_lastState;			//	Last mobility state
	protected				$_state;			//	Current mobility state
	protected				$_format = "Ship( type: %s, name: %s, sprite: %s, size: %s, center: %s, direction: %s, PV: %d, PP: %d, speed: %d, maneuvrability: %d, weapons[%d]: %s)";

	public function			__construct($owner)
	{
		if (self::$verbose === TRUE)
			print($this . " constructed." . PHP_EOL);
		self::$_idCount += 1;
		$this->_id = self::$_idCount;
		$this->_owner = $owner;
		$this->_lastState = "motionless";
		$this->_state = "motionless";
		$this->_Pp = $this->_PpInit;
		$this->_Pv = $this->_PvInit;
		$this->_Ps = $this->_PsInit;
		$this->_speed = $this->_speedInit;
		$this->_maneuvre = $this->_maneuvreInit;
		$this->_moved = 0;
		if ($owner === 1)
			$this->_position['dir'] = 'S';
		else
			$this->_position['dir'] = 'N';
		$this->_oldPosition = $this->_position;
		print("dir = " . $this->_position['dir'] . PHP_EOL);
		$this->reset();
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

	public function getAtt( $_att ) {
		return $this->$_att;
	}

	public function			active() {
		$this->_actived = TRUE;
	}

	public function			reset() {
		$this->_actived = FALSE;
		$this->resetPP();
		$this->_maneuvre = $this->_maneuvreInit;
		$this->_moved = 0;
	}

}

?>
