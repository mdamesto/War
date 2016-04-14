<?php

Class Board {

	private $player1;
	private $player2;
	private $map;
	private $ships;

	public function __construct () {
		$this->player1 = New Player ( array (
			'playerName' => 'Joe',
			'fleetName' => 'Acid Santhil'
		));
		$this->player2 = New Player ( array (
			'playerName' => 'Gus',
			'fleetName' => 'Tibers Chaos'
		));
		$this->init_map();
		print ("BOARD CREATED" . PHP_EOL);
	}

	public function getPlayer1()
	{
		return ($this->player1);
	}

	public function getPlayer2()
	{
		return ($this->player2);
	}

	public function getShips()
	{
		return ($this->ships);
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

	public function add_meteor($x, $y , $size) {
		$yRange = 100;
		$xRange = 100;
    for ($j = -$yRange; $j < $yRange; $j++) {
      for ($i = -$xRange; $i < $xRange; $i++) {
		    if ($i*$i + $j*$j > $size * $size) {

		    } else {
		        $this->map[$i+$x][$j+$y] = "X";
		    }
			}
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
