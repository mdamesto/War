<?php

include_once ('Moove.trait.php');

Class  ImperialDestroyer {

	use Moove;

	private $type = "imperial destroyer";
	private $name;
	private $size = array (1, 3);
	private $sprite = "/sprites/imperial_destroyer.png";
	private $hP = 4;
	private $pP = 10;
	private $speed = 18;
	private $currentSpeed = 18;
	private $man = 6;
	private $currentMan = 0;
	private $shield = 0;
	private $weapons = arrays;
	private $isMoving = false;
	private $orient = 'South';	
	private $pos = array ('x' => 0, 'y' => 0);

	Public function __construct ($shipName) {
			$this->name = $shipName;
		print ($this->name . ' (' . get_class($this) . ') as been created...' . PHP_EOL);

	}

	public static function doc () {
		printf (file_get_contents($this->getAtt('doc')) . PHP_EOL);
	}

	public function getAtt( $_att ) {
		return $this->$_att;
	}

	public function setAtt( $_att, $val ) {
		$this->$_att = $val;
		return ;
	}

	public function __toString() {
		print ($this->name . " (STATS)" . PHP_EOL . 
		'Type: ' . $this->type . ' ( ' . $this->size[0] . ' x ' . $this->size[1] . ' ) ' . PHP_EOL . 
		'HP: ' . $this->hP . ', PP: ' . $this->pP . ', shield: ' . $this->shield . ', speed: ' . $this->speed . ' , manoeuvre: ' .     $this->man . PHP_EOL );
		return sprintf("");
	}

	public function __clone () {
		return ;
	}

	public function __destruct() {

	}
}

?>