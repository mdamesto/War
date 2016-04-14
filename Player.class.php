<?php

include_once 'Fleet.class.php';

Class Player {

	private $playerName;
	private $fleetName;
	private $Fleet;

	Public function __construct ( array $kwargs ) {
		if ($kwargs['playerName']) {
			$this->playerName = $kwargs['playerName'];
			if ($kwargs['fleetName'])
				$this->fleetName = $kwargs['fleetName'];
			else
				$this->fleetName = $kwargs['playerName'] . ' fleet';
			$this->fleet = new Fleet ( 
				array ( 'fleetName' => $this->fleetName )
			);
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
		print ('$this->playerName');
		print ($this->Fleet);
	}

	public function __clone () {
		return ;
	}

	public function __destruct() {

	}

}

?>