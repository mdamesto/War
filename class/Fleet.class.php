<?php

include_once 'Ship.class.php';

Class Fleet {

	private $fleetName;
	private $fleet = array();

	public function __construct ( array $kwargs ) {
		if ($kwargs['fleetName']) {
			$this->fleetName = $kwargs['fleetName'];
			print ('Fleet ' . $this->fleetName . ' as been created...' . PHP_EOL);
		}
	}

	public function recruit ( $shipType, $shipName ) {
		$ship = new $shipType ( $shipName );
		array_push($this->fleet, $ship);
		print ('and added to fleet ' . $this->fleetName );
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
		foreach ($this->fleet as $key => $fleet) {
			print (($key +1) . ': ');
			print ($fleet);
		}
		return sprintf("");
	}

	public function __clone () {
		return ;
	}

	public function __destruct() {

	}

}

?>