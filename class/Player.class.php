<?php

include_once 'Fleet.class.php';

Class Player {

	private $playerName;
	private $fleetName;
	private $Fleet;

	Public function __construct ( array $kwargs ) {
		if ($kwargs['playerName']) {
			$this->playerName = $kwargs['playerName'];
			print ("Player " . $this->playerName . " created..." . PHP_EOL);
			if ($kwargs['fleetName'])
				$this->fleetName = $kwargs['fleetName'];
			else
				$this->fleetName = $kwargs['playerName'] . '\'s fleet';
			$this->Fleet = new Fleet ( 
				array ( 'fleetName' => $this->fleetName )
			);
			print ($this->playerName . ' takes control of ' . $this->Fleet->getAtt('fleetName') . PHP_EOL . PHP_EOL);
		}
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
		print ('Player Name: ' . $this->playerName . PHP_EOL);
		print ($this->getAtt('Fleet'));
		return sprintf ("");
	}

	public function __clone () {
		return ;
	}

	public function __destruct() {

	}

}

?>