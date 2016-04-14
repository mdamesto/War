<?php

include 'Ship.class.php';

Class Fleet {

	private $fleetName;
	private $fleet;

	public function __construct ( array $kwargs ) {
		if ($kwargs['fleetName']) {
			$this->fleetName = $kwargs['fleetName'];
		}
	}

	public function recruit ( $shipType, $shipName ) {
		$ship = new $ship_type ( $shipName );
		array_push($this->fleet, $ship);
		print ('and added to fleet' . $this->fleetName . PHP_EOL);
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
		print_r ($this->fleet);
	}

	public function __clone () {
		return ;
	}

	public function __destruct() {

	}

}

?>