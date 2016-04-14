<?php

include_once 'ImperialDestroyer.class.php';
//include 'IMooveShoot.class.php';

abstract Class Ship  {

	private $name;
	private $size;
	private $sprite;
	private $hP;
	private $pP;
	private $speed;
	private $man;
	private $weapons;
	private $isMoving;
	private $pos;

	Public function __construct () {

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

	}

	public function __clone () {
		return ;
	}

	public function __destruct() {

	}

}