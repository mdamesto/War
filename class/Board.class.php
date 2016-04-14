<?php

Class Board {

	private $player1;
	private $player2;
	private $map;

	public function __construct () {
		$this->player1 = New Player ( array (
			'playerName' => 'Joe',
			'fleetName' => 'Acid Santhil',
		));
		$this->player2 = New Player ( array (
			'playerName' => 'Gus',
			'fleetName' => 'Tibers Chaos',
		));
		$this->init_map();
		print ("BOARD CREATED" . PHP_EOL);
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
		return sprintf("");
	}

	public function __clone () {
		return ;
	}

	public function recruit ($player, $shipType, $shipName) {
		if ($player == 1) {
			$ret = $this->player1->getAtt('Fleet')->recruit($shipType, $shipName);
			print (' of ' . $this->player1->getAtt('playerName') . PHP_EOL);
		}
		if ($player == 2) {
			$this->player2->getAtt('Fleet')->recruit($shipType, $shipName);
			print (' of ' . $this->player2->getAtt('playerName') . PHP_EOL);
		}
		$this->fill_map ($player);
	}

	public function fill_map ($player) {
		if ($player == 1) {
			$i = -1;
			while ($this->map[0][++$i] != '.')
				;
			$this->map[0][$i] = 2;
		}
		if ($player == 2) {
			$i = 150;
			while ($this->map[99][--$i] != '.')
				;
			$this->map[99][$i] = 2;
		}
	}

	public function print_map() {
		$i = -1;
		while (++$i < 100) {
			$j = -1;
			while (++$j < 150) {
				print ($this->map[$i][$j]);
			}
			print (PHP_EOL);
		}

	}

	public function move ($player, $shipNmb, $move) {
		if ($player == 1) {
			$this->player1->getAtt('Fleet')->getAtt('fleet')[$shipNmb]->move($move);
		}
		if ($player == 2) {
			$this->player2->getAtt('Fleet')->getAtt('fleet')[$shipNmb]->move($move);
		}
	}

	public function orient ($player, $shipNmb, $orient) {
		if ($player == 1) {
			$this->player1->getAtt('Fleet')->getAtt('fleet')[$shipNmb]->orient($orient);
		}
		if ($player == 2) {
			$this->player2->getAtt('Fleet')->getAtt('fleet')[$shipNmb]->orient($orient);
		}
	}

	public function init_map() {
		$i = -1;
		while (++$i < 100) {
			$j = -1;
			while (++$j < 150) {
				$this->map[$i][$j] = '.';
			}
		}
		print ('Map initialized...' . PHP_EOL);
	}

	public function __destruct() {

	}

}

?>