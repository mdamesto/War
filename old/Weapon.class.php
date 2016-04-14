<?php

Class Fleet {

	private $fleet;

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