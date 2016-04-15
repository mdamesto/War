<?php

Class Board {

	private $player1;
	private $player2;
	private $map;
	private $ships;
	private $width;
	private $height;

	public function __construct () {

		if (isset($_SESSION['board']))
		{
		}
		else {
			$this->player1 = New Player ( array (
				'playerName' => 'Joe',
				'fleetName' => 'Acid Santhil'
			));
			$this->player2 = New Player ( array (
				'playerName' => 'Gus',
				'fleetName' => 'Tibers Chaos'
			));
			$this->width = 100;
			$this->height = 80;
			$this->init_map();


		}
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

	public function addShip(Ship $ship)
	{
		$this->ship[] = $ship;
	}

	private function checkPos(Array $pos)
	{
		foreach ($pos as $k)
		{
			if ($this->map[$k['x']][$k['y']] != 0)
			{
				return False;
			}
		}
		return True;
	}

	public function placeShip()
	{
		foreach ($this->ships as $key => $ship)
		{
			if ($ship->getOwner() == 1)
			{
				$x = 0;
				$y = 0;
				$ship->setPosition(array('x' => $x, 'y'=> $y));
				while(!$this->checkPos($ship->getSpace($x)))
				{
					$x++;
					if ($x >= $this->width)
					{
						$x=0;
						$y++;
					}
					$ship->setPosition(array('x' => $x, 'y'=> $y));
				}
			}

			if ($ship->getOwner() == 2)
			{
				$x = $this->width;
				$y = $this->height;
				$ship->setPosition(array('x' => $x, 'y'=> $y));
				while(!$this->checkPos($ship->getSpace($x)))
				{
					$x--;
					if ($x <= 0)
					{
						$x=$this->width;
						$y--;
					}
					$ship->setPosition(array('x' => $x, 'y'=> $y));
				}
			}
		}

		foreach ($this->ships as $key => $ship)
		{
			var_dump($ship);
		}
	}

	public function sendAsteroid()
	{
		$jsonasteroid = array();
		for ( $i = 0;$i< $this->width; $i++) {
			for ($j = 0;$j < $this->height ; $j++) {
				if ($this->map[$i][$j] == "-1")
				{
					$jsonasteroid[]= array('x' => $i, 'y' => $j);
				}
			}
		}
		return ($jsonasteroid);
	}

	public function print_map() {
		$i = -1;
		while (++$i < $this->width) {
			$j = -1;
			while (++$j < $this->height) {
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
		        $this->map[$i+$x][$j+$y] = "-1";
		    }
			}
    }
	}


	public function init_map() {
		$i = -1;
		while (++$i < $this->width) {
			$j = -1;
			while (++$j < $this->height) {
				$this->map[$i][$j] = '0';
			}
		}
		print ('Map initialized...' . PHP_EOL);
	}

	public function __destruct() {
		$_SESSION['board'] = serialize($this);
	}

	public function __wakeup() {
		//print ('Map unserialize...' . PHP_EOL);
	}

}

?>
